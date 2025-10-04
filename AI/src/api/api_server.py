from fastapi import FastAPI, File, UploadFile, HTTPException, Form
from fastapi.responses import StreamingResponse, FileResponse
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
from typing import Optional, Dict, Any
import pandas as pd
import numpy as np
from io import StringIO, BytesIO
import traceback
from src.models.exoplanet_model import ExoplanetModel
import os
import json
import threading

app = FastAPI(
    title="Exoplanet Prediction API",
    description="ML predictions from telescope observations",
    version="1.0.0"
)

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

model = None
training_status = {"status": "idle", "progress": "", "error": None}

# Pydantic models for request/response
class HyperparametersUpdate(BaseModel):
    classifier: Optional[Dict[str, Any]] = None
    planet_regressor: Optional[Dict[str, Any]] = None
    stellar_regressor: Optional[Dict[str, Any]] = None
    quality_regressor: Optional[Dict[str, Any]] = None


def load_model():
    """
    Load or train the exoplanet prediction model.
    
    Returns:
        ExoplanetModel: Loaded or newly trained model
    """
    global model
    if model is not None:
        return model

    # Try to load fresh model first
    try:
        fresh_model = "models/exoplanet_model_fresh.pkl"
        if os.path.exists(fresh_model):
            model = ExoplanetModel.load_model(fresh_model)
            print("Loaded fresh model successfully")
            return model
    except Exception as e:
        print(f"Fresh model load failed: {e}")

    # Try to load any existing model
    try:
        models_dir = "models"
        if os.path.exists(models_dir):
            model_files = [f for f in os.listdir(models_dir) 
                          if f.startswith('exoplanet_model_') and f.endswith('.pkl')]
            if model_files:
                latest = sorted(model_files)[-1]
                model_path = os.path.join(models_dir, latest)
                model = ExoplanetModel.load_model(model_path)
                print(f"Loaded existing model: {latest}")
                return model
    except Exception as e:
        print(f"Pre-trained model load failed: {e}")

    # Train new model if no existing model found
    print("Training new model...")
    try:
        model = ExoplanetModel()
        data_path = 'data/raw/merged_kepler_toi_dataset.csv'
        if os.path.exists(data_path):
            df = model.load_dataset(data_path)
            model.train_models(df)
            os.makedirs('models', exist_ok=True)
            model.save_model("models/exoplanet_model_runtime.pkl")
            print("New model trained and saved successfully")
        else:
            print("No training data found, using empty model")
            model = ExoplanetModel()
    except Exception as e:
        print(f"Training failed: {e}")
        model = ExoplanetModel()

    return model


@app.on_event("startup")
async def startup():
    print("Starting Exoplanet API...")
    threading.Thread(target=load_model, daemon=True).start()




@app.get("/health")
async def health():
    """
    Health check endpoint to verify API and model status.
    
    Returns:
        dict: Health status with model and dataset information
    """
    try:
        model_status = "not_loaded"
        model_details = {}

        if model is not None:
            if hasattr(model, 'classifier') and model.classifier is not None:
                model_status = "loaded_and_trained"
                model_details = {
                    "features": len(model.raw_features + model.engineered_features),
                    "classification_ready": True,
                    "planet_models": len(model.planet_models),
                    "stellar_models": len(model.stellar_models)
                }
            else:
                model_status = "loaded_not_trained"

        dataset_path = 'data/raw/merged_kepler_toi_dataset.csv'
        dataset_status = "available" if os.path.exists(dataset_path) else "not_found"

        return {
            "status": "healthy" if model_status == "loaded_and_trained" else "degraded",
            "timestamp": pd.Timestamp.now().isoformat(),
            "model": {"status": model_status, "details": model_details},
            "dataset": {"status": dataset_status, "path": dataset_path}
        }
    except Exception as e:
        return {"status": "error", "error": str(e)}


def convert_numpy(obj):
    if isinstance(obj, np.integer):
        return int(obj)
    elif isinstance(obj, np.floating):
        return float(obj)
    elif isinstance(obj, np.ndarray):
        return obj.tolist()
    elif isinstance(obj, dict):
        return {k: convert_numpy(v) for k, v in obj.items()}
    elif isinstance(obj, list):
        return [convert_numpy(item) for item in obj]
    return obj


@app.get("/model/info")
async def model_info():
    """
    Get detailed information about the loaded model.
    
    Returns:
        dict: Model information including performance metrics and feature details
    """
    try:
        if model is None:
            load_model()

        dataset_info = {}
        try:
            dataset_path = 'data/raw/merged_kepler_toi_dataset.csv'
            if os.path.exists(dataset_path):
                df = pd.read_csv(dataset_path)
                dataset_info = {
                    "samples": int(len(df)),
                    "features": int(len(df.columns)),
                    "completeness": f"{((1 - df.isnull().sum().sum() / (len(df)*len(df.columns)))*100):.1f}%"
                }
        except Exception as e:
            dataset_info = {"error": str(e)}

        return {
            "model": {
                "type": "Exoplanet Prediction Model",
                "architecture": "Target-Specific (XGBoost + RandomForest)",
                "version": "1.0.0",
                "features": len(model.raw_features + model.engineered_features),
                "status": "trained" if model.classifier is not None else "not_trained"
            },
            "dataset": dataset_info,
            "features": {
                "raw": model.raw_features,
                "engineered": model.engineered_features
            },
            "targets": {
                "classification": model.classification_target,
                "planet": model.planet_targets,
                "stellar": model.stellar_targets,
                "quality": model.quality_targets
            },
            "performance": {
                "classification": convert_numpy(model.classification_score),
                "planet": convert_numpy(model.planet_scores),
                "stellar": convert_numpy(model.stellar_scores),
                "quality": convert_numpy(model.quality_scores)
            }
        }
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))


@app.post("/predict/json")
async def predict_json(request_data: dict):
    try:
        if model is None:
            load_model()

        data_rows = request_data.get('data', [])
        if not data_rows:
            raise HTTPException(status_code=400, detail="No data provided")

        results = []
        successful = 0
        failed = 0

        for idx, row_data in enumerate(data_rows):
            try:
                prediction = model.predict(row_data)
                result = {
                    "row_index": idx,
                    "input_data": row_data,
                    "predictions": {},
                    "average_confidence": prediction.get('average_confidence', 0.0)
                }

                for target, pred_info in prediction.items():
                    if target == 'average_confidence':
                        continue
                    if pred_info.get('value') is not None:
                        result["predictions"][target] = {
                            "value": pred_info['value'],
                            "confidence": pred_info.get('confidence', 0.0)
                        }
                    else:
                        result["predictions"][target] = {
                            "value": None,
                            "confidence": 0.0,
                            "error": "Prediction failed"
                        }

                results.append(result)
                successful += 1

            except Exception as e:
                results.append({
                    "row_index": idx,
                    "input_data": row_data,
                    "error": str(e),
                    "predictions": {},
                    "average_confidence": 0.0
                })
                failed += 1

        return {
            "status": "success",
            "total_rows": len(data_rows),
            "successful": successful,
            "failed": failed,
            "success_rate": f"{(successful/len(data_rows)*100):.1f}%",
            "results": results
        }

    except HTTPException:
        raise
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))


@app.post("/predict")
async def predict_csv(file: UploadFile = File(...)):
    try:
        if not file.filename.endswith('.csv'):
            raise HTTPException(status_code=400, detail="File must be CSV")

        if model is None:
            load_model()

        contents = await file.read()

        try:
            csv_data = pd.read_csv(StringIO(contents.decode('utf-8')), comment='#')
        except UnicodeDecodeError:
            csv_data = pd.read_csv(StringIO(contents.decode('latin-1')), comment='#')

        if csv_data.empty:
            raise HTTPException(status_code=400, detail="CSV is empty")

        required = model.raw_features
        available = [col for col in required if col in csv_data.columns]

        if len(available) < 6:
            raise HTTPException(status_code=400, detail=f"Need at least 6 core features")

        results = []
        successful = 0
        failed = 0

        for idx, row in csv_data.iterrows():
            try:
                input_data = {f: row[f] if pd.notna(row[f]) else 0.0 for f in available}
                prediction = model.predict(input_data)

                result_row = row.to_dict()

                # Add average confidence
                result_row['average_confidence'] = prediction.get('average_confidence', 0.0)

                for target, pred_info in prediction.items():
                    if target == 'average_confidence':
                        continue
                    if pred_info.get('value') is not None:
                        result_row[f'predicted_{target}'] = pred_info['value']
                        result_row[f'confidence_{target}'] = pred_info['confidence']
                    else:
                        result_row[f'predicted_{target}'] = 'ERROR'
                        result_row[f'confidence_{target}'] = 0.0

                results.append(result_row)
                successful += 1

            except Exception as e:
                result_row = row.to_dict()
                result_row['prediction_error'] = str(e)
                result_row['average_confidence'] = 0.0
                results.append(result_row)
                failed += 1

        results_df = pd.DataFrame(results)

        output = StringIO()
        results_df.to_csv(output, index=False)

        output.seek(0)
        csv_content = output.getvalue()

        output_filename = f"{file.filename.rsplit('.', 1)[0]}_predictions.csv"

        return StreamingResponse(
            BytesIO(csv_content.encode('utf-8')),
            media_type="text/csv",
            headers={"Content-Disposition": f"attachment; filename={output_filename}"}
        )

    except HTTPException:
        raise
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))


@app.get("/download/future-test-data")
async def download_future_test_data():
    try:
        # Return the future test dataset (features only, no ground truth)
        future_test_path = 'data/raw/training_test_features_only.csv'

        if not os.path.exists(future_test_path):
            raise HTTPException(status_code=404, detail="Future test data not found")

        # Return the file directly without comments
        return FileResponse(
            future_test_path,
            media_type="text/csv",
            filename="future_test_data_features_only.csv"
        )

    except HTTPException:
        raise
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))


@app.get("/hyperparameters")
async def get_hyperparameters():
    """Get current hyperparameters from config file"""
    try:
        config_path = 'config/model_config.json'
        if not os.path.exists(config_path):
            raise HTTPException(status_code=404, detail="Config file not found")
        
        with open(config_path, 'r') as f:
            config = json.load(f)
        
        return {
            "status": "success",
            "hyperparameters": config.get('hyperparameters', {}),
            "data_split": config.get('data_split', {}),
            "training_data_path": config.get('training_data_path', '')
        }
    except HTTPException:
        raise
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))


@app.post("/hyperparameters")
async def update_hyperparameters(hyperparameters: HyperparametersUpdate):
    """Update hyperparameters in config file"""
    try:
        config_path = 'config/model_config.json'
        
        # Load existing config
        if os.path.exists(config_path):
            with open(config_path, 'r') as f:
                config = json.load(f)
        else:
            config = {
                'training_data_path': 'data/raw/merged_kepler_toi_dataset.csv',
                'hyperparameters': {},
                'data_split': {
                    'train_ratio': 0.70,
                    'val_ratio': 0.20,
                    'test_ratio': 0.05,
                    'future_test_ratio': 0.05
                }
            }
        
        # Update hyperparameters
        if 'hyperparameters' not in config:
            config['hyperparameters'] = {}
        
        update_dict = hyperparameters.dict(exclude_none=True)
        for model_type, params in update_dict.items():
            if params:
                config['hyperparameters'][model_type] = params
        
        # Save updated config
        os.makedirs('config', exist_ok=True)
        with open(config_path, 'w') as f:
            json.dump(config, f, indent=2)
        
        return {
            "status": "success",
            "message": "Hyperparameters updated successfully",
            "hyperparameters": config['hyperparameters']
        }
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))


@app.get("/download/training-data")
async def download_training_data():
    """Download the current training dataset"""
    try:
        config_path = 'config/model_config.json'
        training_data_path = 'data/raw/merged_kepler_toi_dataset.csv'
        
        # Get path from config if available
        if os.path.exists(config_path):
            with open(config_path, 'r') as f:
                config = json.load(f)
                configured_path = config.get('training_data_path', training_data_path)
                
                # Use configured path if it exists, otherwise fallback to default
                if os.path.exists(configured_path):
                    training_data_path = configured_path
        
        if not os.path.exists(training_data_path):
            raise HTTPException(
                status_code=404, 
                detail=f"Training data not found. Looked for: {training_data_path}"
            )
        
        return FileResponse(
            training_data_path,
            media_type="text/csv",
            filename=os.path.basename(training_data_path)
        )
    except HTTPException:
        raise
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))


@app.post("/retrain")
async def retrain_model(
    file: Optional[UploadFile] = File(None),
    hyperparameters: Optional[str] = Form(None)
):
    """
    Retrain the model with optional new training data and/or hyperparameters.
    
    Parameters:
    - file: Optional CSV file with new training data
    - hyperparameters: Optional JSON string with hyperparameters to update
    """
    global model, training_status
    
    try:
        if training_status["status"] == "training":
            raise HTTPException(status_code=409, detail="Training already in progress")
        
        training_status = {"status": "training", "progress": "Initializing...", "error": None}
        
        # Handle hyperparameters update
        config_path = 'config/model_config.json'
        updated_hyperparams = None
        
        if hyperparameters:
            try:
                hyperparams_dict = json.loads(hyperparameters)
                
                # Load existing config
                if os.path.exists(config_path):
                    with open(config_path, 'r') as f:
                        config = json.load(f)
                else:
                    config = ExoplanetModel()._get_default_config()
                
                # Update hyperparameters
                if 'hyperparameters' not in config:
                    config['hyperparameters'] = {}
                
                for model_type, params in hyperparams_dict.items():
                    if params and model_type in ['classifier', 'planet_regressor', 'stellar_regressor', 'quality_regressor']:
                        config['hyperparameters'][model_type] = params
                
                updated_hyperparams = config['hyperparameters']
                
                # Save updated config
                os.makedirs('config', exist_ok=True)
                with open(config_path, 'w') as f:
                    json.dump(config, f, indent=2)
                
                training_status["progress"] = "Hyperparameters updated"
            except json.JSONDecodeError:
                raise HTTPException(status_code=400, detail="Invalid hyperparameters JSON")
        
        # Handle training data upload
        training_data_path = None
        if file:
            if not file.filename.endswith('.csv'):
                raise HTTPException(status_code=400, detail="Training data must be CSV file")
            
            training_status["progress"] = "Uploading training data..."
            
            # Save uploaded file
            os.makedirs('data/raw', exist_ok=True)
            training_data_path = f'data/raw/training_data_{pd.Timestamp.now().strftime("%Y%m%d_%H%M%S")}.csv'
            
            contents = await file.read()
            with open(training_data_path, 'wb') as f:
                f.write(contents)
            
            # Update config with new path
            if os.path.exists(config_path):
                with open(config_path, 'r') as f:
                    config = json.load(f)
            else:
                config = ExoplanetModel()._get_default_config()
            
            config['training_data_path'] = training_data_path
            
            with open(config_path, 'w') as f:
                json.dump(config, f, indent=2)
            
            training_status["progress"] = "Training data uploaded"
        
        # Start training in background
        def train_in_background():
            global model, training_status
            try:
                training_status["progress"] = "Loading model configuration..."
                
                # Create new model instance with updated config
                new_model = ExoplanetModel(config_path=config_path)
                
                training_status["progress"] = "Loading dataset..."
                
                # Check if training data path exists, fallback to default if not
                data_path = new_model.training_data_path
                if not os.path.exists(data_path):
                    fallback_path = 'data/raw/merged_kepler_toi_dataset.csv'
                    if os.path.exists(fallback_path):
                        print(f"Warning: Configured path '{data_path}' not found, using fallback: '{fallback_path}'")
                        data_path = fallback_path
                        # Update config with working path
                        new_model.training_data_path = data_path
                        if os.path.exists(config_path):
                            with open(config_path, 'r') as f:
                                config = json.load(f)
                            config['training_data_path'] = data_path
                            with open(config_path, 'w') as f:
                                json.dump(config, f, indent=2)
                    else:
                        raise FileNotFoundError(f"Training data not found at '{data_path}' or fallback '{fallback_path}'")
                
                df = new_model.load_dataset(data_path)
                
                training_status["progress"] = "Training models..."
                new_model.train_models(df)
                
                training_status["progress"] = "Saving model..."
                os.makedirs('models', exist_ok=True)
                model_filename = f'models/exoplanet_model_{pd.Timestamp.now().strftime("%Y%m%d_%H%M%S")}.pkl'
                new_model.save_model(model_filename)
                
                # Also save as the current model
                new_model.save_model('models/exoplanet_model_fresh.pkl')
                
                # Update global model
                model = new_model
                
                training_status = {
                    "status": "completed",
                    "progress": "Training completed successfully",
                    "error": None,
                    "model_file": model_filename,
                    "metrics": {
                        "classification_accuracy": float(new_model.classification_score) if new_model.classification_score else 0.0,
                        "planet_scores": convert_numpy(new_model.planet_scores),
                        "stellar_scores": convert_numpy(new_model.stellar_scores),
                        "quality_scores": convert_numpy(new_model.quality_scores)
                    }
                }
            except Exception as e:
                training_status = {
                    "status": "failed",
                    "progress": "Training failed",
                    "error": str(e)
                }
                print(f"Training error: {e}")
                traceback.print_exc()
        
        # Start training thread
        training_thread = threading.Thread(target=train_in_background, daemon=True)
        training_thread.start()
        
        return {
            "status": "started",
            "message": "Model retraining started",
            "training_data_updated": training_data_path is not None,
            "hyperparameters_updated": updated_hyperparams is not None,
            "updated_hyperparameters": updated_hyperparams
        }
        
    except HTTPException:
        training_status = {"status": "idle", "progress": "", "error": None}
        raise
    except Exception as e:
        training_status = {"status": "idle", "progress": "", "error": str(e)}
        raise HTTPException(status_code=500, detail=str(e))


@app.get("/retrain/status")
async def get_training_status():
    """Get the current status of model training"""
    return training_status


if __name__ == "__main__":
    import uvicorn
    port = int(os.getenv("PORT", 3000))
    print(f"Starting API on port {port}...")
    uvicorn.run(app, host="0.0.0.0", port=port)