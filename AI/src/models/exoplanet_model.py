import pandas as pd
import numpy as np
import os
import json
import pickle
import warnings
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler, RobustScaler
from sklearn.metrics import r2_score, accuracy_score
from sklearn.impute import KNNImputer
import xgboost as xgb

warnings.filterwarnings('ignore')


class ExoplanetModel:
    def __init__(self, config_path='config/model_config.json', hyperparameters=None):
        # Load configuration
        self.config = self._load_config(config_path)
        
        # Override with provided hyperparameters if any
        if hyperparameters:
            self.config['hyperparameters'].update(hyperparameters)
        
        self.hyperparameters = self.config.get('hyperparameters', {})
        self.data_split = self.config.get('data_split', {
            'train_ratio': 0.70,
            'val_ratio': 0.20,
            'test_ratio': 0.05,
            'future_test_ratio': 0.05
        })
        self.training_data_path = self.config.get('training_data_path', 'data/raw/merged_kepler_toi_dataset.csv')
        
        self.classifier = None
        self.planet_models = {}
        self.stellar_models = {}
        self.quality_models = {}

        self.feature_scaler = StandardScaler()
        self.planet_scaler = RobustScaler()
        self.stellar_scaler = RobustScaler()

        self.raw_features = [
            'ra_deg', 'dec_deg', 'mag', 'period_days', 'duration_hrs', 'depth_ppm',
            'period_err_up', 'period_err_low', 'duration_err_up', 'duration_err_low',
            'depth_err_up', 'depth_err_low'
        ]

        self.engineered_features = [
            'period_to_duration_ratio', 'depth_to_mag_ratio', 'error_quality_score'
        ]

        self.classification_target = 'disposition'
        self.planet_targets = ['planet_radius_earth', 'eq_temp_k', 'insolation_earth']
        self.stellar_targets = ['stellar_temp_k', 'stellar_logg', 'stellar_radius_sun']
        self.quality_targets = ['depth_snr']

        self.classification_score = None
        self.planet_scores = {}
        self.stellar_scores = {}
        self.quality_scores = {}
        self.feature_medians = {}

        self.target_descriptions = {
            'disposition': 'Scientist Classification Decision',
            'planet_radius_earth': 'Planet Radius [Earth Radius]',
            'eq_temp_k': 'Equilibrium Temperature [K]',
            'insolation_earth': 'Insolation Flux [Earth Flux]',
            'stellar_temp_k': 'Stellar Effective Temperature [K]',
            'stellar_logg': 'Stellar Surface Gravity [log10(cm/s²)]',
            'stellar_radius_sun': 'Stellar Radius [Solar Radius]',
            'depth_snr': 'Transit Depth Signal-to-Noise Ratio'
        }

    def _load_config(self, config_path):
        """Load configuration from JSON file"""
        try:
            if os.path.exists(config_path):
                with open(config_path, 'r') as f:
                    return json.load(f)
            else:
                print(f"Config file not found at {config_path}, using defaults")
                return self._get_default_config()
        except Exception as e:
            print(f"Error loading config: {e}, using defaults")
            return self._get_default_config()
    
    def _get_default_config(self):
        """Return default configuration"""
        return {
            'training_data_path': 'data/raw/merged_kepler_toi_dataset.csv',
            'hyperparameters': {
                'classifier': {
                    'n_estimators': 200,
                    'max_depth': 10,
                    'learning_rate': 0.1,
                    'subsample': 0.8,
                    'colsample_bytree': 0.8,
                    'random_state': 42
                },
                'planet_regressor': {
                    'n_estimators': 200,
                    'max_depth': 10,
                    'learning_rate': 0.1,
                    'subsample': 0.8,
                    'colsample_bytree': 0.8,
                    'random_state': 42
                },
                'stellar_regressor': {
                    'n_estimators': 200,
                    'max_depth': 10,
                    'learning_rate': 0.1,
                    'subsample': 0.8,
                    'colsample_bytree': 0.8,
                    'random_state': 42
                },
                'quality_regressor': {
                    'n_estimators': 200,
                    'max_depth': 10,
                    'learning_rate': 0.1,
                    'subsample': 0.8,
                    'colsample_bytree': 0.8,
                    'random_state': 42
                }
            },
            'data_split': {
                'train_ratio': 0.70,
                'val_ratio': 0.20,
                'test_ratio': 0.05,
                'future_test_ratio': 0.05
            }
        }

    def engineer_features(self, df, verbose=True):
        """
        Create engineered features from raw data.
        
        Args:
            df (pd.DataFrame): Input dataframe
            verbose (bool): Whether to print progress messages
            
        Returns:
            pd.DataFrame: Dataframe with engineered features
        """
        if verbose:
            print("Engineering features...")

        df_eng = df.copy()
        safe_duration = np.where(df_eng['duration_hrs'] == 0, 1e-6, df_eng['duration_hrs'])
        safe_mag = np.where(df_eng['mag'] == 0, 1e-6, df_eng['mag'])

        df_eng['period_to_duration_ratio'] = df_eng['period_days'] / safe_duration
        df_eng['depth_to_mag_ratio'] = df_eng['depth_ppm'] / safe_mag

        total_err = (df_eng['period_err_up'].abs() + df_eng['period_err_low'].abs() +
                     df_eng['duration_err_up'].abs() + df_eng['duration_err_low'].abs() +
                     df_eng['depth_err_up'].abs() + df_eng['depth_err_low'].abs())
        df_eng['error_quality_score'] = 1.0 / (total_err + 1e-6)

        return df_eng

    def load_dataset(self, data_path='data/raw/merged_kepler_toi_dataset.csv'):
        print("="*70)
        print("EXOPLANET MODEL TRAINING")
        print("="*70)
        print(f"Loading dataset from {data_path}...")
        df = pd.read_csv(data_path)
        print(f"Dataset: {df.shape[0]} rows, {df.shape[1]} columns")
        return self.engineer_features(df)

    def filter_data_quality(self, df):
        print("Filtering data quality...")
        initial = len(df)

        numeric_cols = df.select_dtypes(include=[np.number]).columns
        for col in numeric_cols:
            if col in df.columns:
                mean_val, std_val = df[col].mean(), df[col].std()
                if std_val > 0:
                    df = df[np.abs(df[col] - mean_val) <= 5 * std_val]

        key_features = ['period_days', 'duration_hrs', 'depth_ppm', 'mag']
        df = df[df[key_features].isnull().sum(axis=1) <= 2]
        df = df[(df['period_days'] > 0) & (df['duration_hrs'] > 0) & (df['depth_ppm'] > 0)]

        target_cols = ['planet_radius_earth', 'eq_temp_k', 'insolation_earth',
                      'stellar_temp_k', 'stellar_logg', 'stellar_radius_sun']
        for col in target_cols:
            if col in df.columns:
                q1, q3 = df[col].quantile([0.25, 0.75])
                iqr = q3 - q1
                df = df[(df[col] >= q1 - 3*iqr) & (df[col] <= q3 + 3*iqr)]

        print(f"Filtered: {initial - len(df)} samples removed ({(initial-len(df))/initial*100:.1f}%)")
        return df

    def prepare_data(self, df):
        """
        Prepare and preprocess the dataset for training.
        
        Args:
            df (pd.DataFrame): Raw dataset
            
        Returns:
            tuple: (X, y_class, y_planet, y_stellar, y_quality, 
                   available_features, available_planet, available_stellar, available_quality)
        """
        print("Preparing data...")
        df = self.filter_data_quality(df)

        all_features = self.raw_features + self.engineered_features
        available_features = [f for f in all_features if f in df.columns]

        available_planet = [t for t in self.planet_targets if t in df.columns]
        available_stellar = [t for t in self.stellar_targets if t in df.columns]
        available_quality = [t for t in self.quality_targets if t in df.columns]

        X = df[available_features].copy()

        if X.isnull().sum().sum() > 0:
            imputer = KNNImputer(n_neighbors=5, weights='distance')
            X = pd.DataFrame(imputer.fit_transform(X), columns=X.columns, index=X.index)

        for col in X.columns:
            self.feature_medians[col] = X[col].median()

        y_class = df[self.classification_target] - 1
        y_class = y_class.fillna(3)

        y_planet = df[available_planet].copy() if available_planet else pd.DataFrame()
        y_stellar = df[available_stellar].copy() if available_stellar else pd.DataFrame()
        y_quality = df[available_quality].copy() if available_quality else pd.DataFrame()

        for df_group in [y_planet, y_stellar, y_quality]:
            if not df_group.empty:
                for col in df_group.columns:
                    if df_group[col].isnull().sum() > 0:
                        median_val = df_group[col].median()
                        std_val = df_group[col].std()
                        noise = np.random.normal(0, 0.01 * std_val, df_group[col].isnull().sum())
                        df_group.loc[df_group[col].isnull(), col] = median_val + noise

        return (X, y_class, y_planet, y_stellar, y_quality,
                available_features, available_planet, available_stellar, available_quality)

    def train_models(self, df):
        print("\n" + "="*70)
        print("TRAINING MODELS")
        print("="*70)

        (X, y_class, y_planet, y_stellar, y_quality,
         features, planet_names, stellar_names, quality_names) = self.prepare_data(df)

        # First split: 95% (train+val+test) and 5% (future test)
        first_split = train_test_split(X, y_class, y_planet, y_stellar, y_quality,
                                       test_size=0.05, random_state=42, stratify=y_class)
        X_temp, X_future_test = first_split[0], first_split[1]
        y_class_temp, y_class_future = first_split[2], first_split[3]
        y_planet_temp, y_planet_future = first_split[4], first_split[5]
        y_stellar_temp, y_stellar_future = first_split[6], first_split[7]
        y_quality_temp, y_quality_future = first_split[8], first_split[9]

        # Second split: 5% test from the remaining 95%
        test_splits = train_test_split(X_temp, y_class_temp, y_planet_temp,
                                       y_stellar_temp, y_quality_temp,
                                       test_size=0.0526, random_state=43, stratify=y_class_temp)  # 0.0526 * 0.95 ≈ 0.05
        X_trainval, X_test = test_splits[0], test_splits[1]
        y_class_trainval, y_class_test = test_splits[2], test_splits[3]
        y_planet_trainval, y_planet_test = test_splits[4], test_splits[5]
        y_stellar_trainval, y_stellar_test = test_splits[6], test_splits[7]
        y_quality_trainval, y_quality_test = test_splits[8], test_splits[9]

        # Third split: 70% train and 20% val from remaining 90%
        val_splits = train_test_split(X_trainval, y_class_trainval, y_planet_trainval,
                                      y_stellar_trainval, y_quality_trainval,
                                      test_size=0.222, random_state=44, stratify=y_class_trainval)  # 0.222 * 0.9 ≈ 0.2
        X_train, X_val = val_splits[0], val_splits[1]
        y_class_train, y_class_val = val_splits[2], val_splits[3]
        y_planet_train, y_planet_val = val_splits[4], val_splits[5]
        y_stellar_train, y_stellar_val = val_splits[6], val_splits[7]
        y_quality_train, y_quality_val = val_splits[8], val_splits[9]

        # Save future test data (features only)
        future_test_df = X_future_test.copy()
        os.makedirs('data/raw', exist_ok=True)
        future_test_df.to_csv('data/raw/training_test_features_only.csv', index=False)
        print(f"Future test data saved: {len(X_future_test)} samples")

        X_train_scaled = self.feature_scaler.fit_transform(X_train)
        X_val_scaled = self.feature_scaler.transform(X_val)
        X_test_scaled = self.feature_scaler.transform(X_test)

        print(f"Train: {len(X_train)} (~70%), Val: {len(X_val)} (~20%), Test: {len(X_test)} (~5%), Future: {len(X_future_test)} (~5%)")

        print("\nTraining classifier...")
        classifier_params = self.hyperparameters.get('classifier', {})
        self.classifier = xgb.XGBClassifier(
            n_estimators=classifier_params.get('n_estimators', 200),
            max_depth=classifier_params.get('max_depth', 10),
            learning_rate=classifier_params.get('learning_rate', 0.1),
            subsample=classifier_params.get('subsample', 0.8),
            colsample_bytree=classifier_params.get('colsample_bytree', 0.8),
            random_state=classifier_params.get('random_state', 42),
            n_jobs=-1,
            objective='multi:softprob',
            num_class=4,
            early_stopping_rounds=20,
            eval_metric='mlogloss'
        )
        self.classifier.fit(X_train_scaled, y_class_train,
                          eval_set=[(X_val_scaled, y_class_val)], verbose=False)

        y_pred = self.classifier.predict(X_test_scaled)
        self.classification_score = accuracy_score(y_class_test, y_pred)
        print(f"Classification accuracy: {self.classification_score:.4f}")

        if not y_planet.empty:
            print("\nTraining planet models...")
            y_planet_train_scaled = self.planet_scaler.fit_transform(y_planet_train)
            y_planet_val_scaled = self.planet_scaler.transform(y_planet_val)
            y_planet_test_scaled = self.planet_scaler.transform(y_planet_test)

            planet_params = self.hyperparameters.get('planet_regressor', {})
            for i, target in enumerate(planet_names):
                model = xgb.XGBRegressor(
                    n_estimators=planet_params.get('n_estimators', 200),
                    max_depth=planet_params.get('max_depth', 10),
                    learning_rate=planet_params.get('learning_rate', 0.1),
                    subsample=planet_params.get('subsample', 0.8),
                    colsample_bytree=planet_params.get('colsample_bytree', 0.8),
                    random_state=planet_params.get('random_state', 42),
                    n_jobs=-1,
                    early_stopping_rounds=20
                )
                model.fit(X_train_scaled, y_planet_train_scaled[:, i],
                         eval_set=[(X_val_scaled, y_planet_val_scaled[:, i])], verbose=False)

                y_pred = model.predict(X_test_scaled)
                r2 = r2_score(y_planet_test_scaled[:, i], y_pred)

                self.planet_models[target] = model
                self.planet_scores[target] = {'r2': r2}
                print(f"  {target}: R² = {r2:.4f}")

        if not y_stellar.empty:
            print("\nTraining stellar models...")
            y_stellar_train_scaled = self.stellar_scaler.fit_transform(y_stellar_train)
            y_stellar_val_scaled = self.stellar_scaler.transform(y_stellar_val)
            y_stellar_test_scaled = self.stellar_scaler.transform(y_stellar_test)

            stellar_params = self.hyperparameters.get('stellar_regressor', {})
            for i, target in enumerate(stellar_names):
                model = xgb.XGBRegressor(
                    n_estimators=stellar_params.get('n_estimators', 200),
                    max_depth=stellar_params.get('max_depth', 10),
                    learning_rate=stellar_params.get('learning_rate', 0.1),
                    subsample=stellar_params.get('subsample', 0.8),
                    colsample_bytree=stellar_params.get('colsample_bytree', 0.8),
                    random_state=stellar_params.get('random_state', 42),
                    n_jobs=-1
                )
                model.fit(X_train_scaled, y_stellar_train_scaled[:, i])

                y_pred = model.predict(X_test_scaled)
                r2 = r2_score(y_stellar_test_scaled[:, i], y_pred)

                self.stellar_models[target] = model
                self.stellar_scores[target] = {'r2': r2}
                print(f"  {target}: R² = {r2:.4f}")

        if not y_quality.empty:
            print("\nTraining quality models...")
            quality_params = self.hyperparameters.get('quality_regressor', {})
            for i, target in enumerate(quality_names):
                model = xgb.XGBRegressor(
                    n_estimators=quality_params.get('n_estimators', 200),
                    max_depth=quality_params.get('max_depth', 10),
                    learning_rate=quality_params.get('learning_rate', 0.1),
                    subsample=quality_params.get('subsample', 0.8),
                    colsample_bytree=quality_params.get('colsample_bytree', 0.8),
                    random_state=quality_params.get('random_state', 42),
                    n_jobs=-1
                )
                model.fit(X_train_scaled, y_quality_train.iloc[:, i])

                y_pred = model.predict(X_test_scaled)
                r2 = r2_score(y_quality_test.iloc[:, i], y_pred)

                self.quality_models[target] = model
                self.quality_scores[target] = {'r2': r2}
                print(f"  {target}: R² = {r2:.4f}")

        self.feature_names = features
        self.planet_target_names = planet_names
        self.stellar_target_names = stellar_names
        self.quality_target_names = quality_names

        print(f"\nTraining complete!")

    def predict(self, input_data):
        if isinstance(input_data, dict):
            input_data = pd.DataFrame([input_data])

        input_data = self.engineer_features(input_data, verbose=False)
        results = {}

        try:
            X = input_data[self.feature_names].copy()

            for col in X.columns:
                if X[col].isnull().any():
                    if col in self.feature_medians:
                        X[col] = X[col].fillna(self.feature_medians[col])
                    else:
                        X[col] = X[col].fillna(X[col].median() if not X[col].isnull().all() else 0)

            X_scaled = self.feature_scaler.transform(X)

            confidences = []

            if self.classifier is not None:
                class_pred = self.classifier.predict(X_scaled)[0]
                class_map = {0: 'CONFIRMED', 1: 'CANDIDATE', 2: 'FALSE_POSITIVE', 3: 'UNKNOWN'}
                conf = self.classification_score if self.classification_score else 0.0
                results[self.classification_target] = {
                    'value': class_map.get(class_pred, 'UNKNOWN'),
                    'confidence': conf,
                    'description': self.target_descriptions[self.classification_target]
                }
                confidences.append(conf)

            if self.planet_models:
                for i, target in enumerate(self.planet_target_names):
                    if target in self.planet_models and target != 'planet_radius_earth':
                        pred_scaled = self.planet_models[target].predict(X_scaled)[0]
                        dummy = np.zeros(len(self.planet_target_names))
                        dummy[i] = pred_scaled
                        pred_unscaled = self.planet_scaler.inverse_transform([dummy])[0][i]

                        conf = max(0.1, self.planet_scores.get(target, {}).get('r2', 0.5))
                        results[target] = {
                            'value': float(pred_unscaled),
                            'confidence': conf,
                            'description': self.target_descriptions.get(target, target)
                        }
                        confidences.append(conf)

            if self.stellar_models:
                for i, target in enumerate(self.stellar_target_names):
                    if target in self.stellar_models:
                        pred_scaled = self.stellar_models[target].predict(X_scaled)[0]
                        dummy = np.zeros(len(self.stellar_target_names))
                        dummy[i] = pred_scaled
                        pred_unscaled = self.stellar_scaler.inverse_transform([dummy])[0][i]

                        conf = max(0.1, self.stellar_scores.get(target, {}).get('r2', 0.5))
                        results[target] = {
                            'value': float(pred_unscaled),
                            'confidence': conf,
                            'description': self.target_descriptions.get(target, target)
                        }
                        confidences.append(conf)

            for target, model in self.quality_models.items():
                pred = model.predict(X_scaled)[0]
                conf = max(0.1, self.quality_scores.get(target, {}).get('r2', 0.5))
                results[target] = {
                    'value': float(pred),
                    'confidence': conf,
                    'description': self.target_descriptions.get(target, target)
                }
                confidences.append(conf)

            # Calculate average confidence
            avg_confidence = np.mean(confidences) if confidences else 0.0
            results['average_confidence'] = float(avg_confidence)

        except Exception as e:
            print(f"Prediction error: {e}")
            for target in ([self.classification_target] + self.planet_target_names +
                          self.stellar_target_names + self.quality_target_names):
                results[target] = {'value': None, 'confidence': 0.0, 'error': str(e)}
            results['average_confidence'] = 0.0

        return results

    def save_model(self, filename=None):
        """
        Save the trained model to a pickle file.
        
        Args:
            filename (str, optional): Path to save the model. If None, generates timestamped filename.
            
        Returns:
            str: Path to the saved model file
        """
        if filename is None:
            filename = f'models/exoplanet_model_{pd.Timestamp.now().strftime("%Y%m%d_%H%M%S")}.pkl'

        model_data = {
            'classifier': self.classifier,
            'planet_models': self.planet_models,
            'stellar_models': self.stellar_models,
            'quality_models': self.quality_models,
            'feature_scaler': self.feature_scaler,
            'planet_scaler': self.planet_scaler,
            'stellar_scaler': self.stellar_scaler,
            'classification_score': self.classification_score,
            'planet_scores': self.planet_scores,
            'stellar_scores': self.stellar_scores,
            'quality_scores': self.quality_scores,
            'feature_names': self.feature_names,
            'planet_target_names': self.planet_target_names,
            'stellar_target_names': self.stellar_target_names,
            'quality_target_names': self.quality_target_names,
            'raw_features': self.raw_features,
            'engineered_features': self.engineered_features,
            'feature_medians': self.feature_medians
        }

        with open(filename, 'wb') as f:
            pickle.dump(model_data, f)

        print(f"\nModel saved: {filename}")
        print(f"Classification accuracy: {self.classification_score:.3f}")
        return filename

    @classmethod
    def load_model(cls, filename):
        with open(filename, 'rb') as f:
            data = pickle.load(f)

        model = cls()
        for key, value in data.items():
            setattr(model, key, value)

        print(f"Model loaded: {filename}")
        return model


def main():
    model = ExoplanetModel()
    df = model.load_dataset()
    model.train_models(df)
    model.save_model()


if __name__ == "__main__":
    main()