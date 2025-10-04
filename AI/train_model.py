"""
Exoplanet Model Training Script

This script trains the exoplanet prediction model using the merged dataset.
"""

import sys
import os

# Add current directory to path for imports
sys.path.insert(0, os.path.dirname(__file__))

from src.models.exoplanet_model import ExoplanetModel


def main():
    """
    Train the exoplanet prediction model.
    
    This function:
    1. Initializes the ExoplanetModel
    2. Loads the training dataset
    3. Trains all models (classification and regression)
    4. Saves the trained model
    """
    print("="*70)
    print("EXOPLANET MODEL TRAINING")
    print("="*70)

    # Initialize model
    model = ExoplanetModel()

    # Load dataset
    try:
        df = model.load_dataset('data/raw/merged_kepler_toi_dataset.csv')
        print(f"Dataset loaded: {df.shape[0]} samples, {df.shape[1]} features")
    except Exception as e:
        print(f"Error loading dataset: {e}")
        return

    # Train models
    try:
        model.train_models(df)
    except Exception as e:
        print(f"Error training models: {e}")
        return

    # Save model
    os.makedirs('models', exist_ok=True)
    model_file = model.save_model('models/exoplanet_model.pkl')

    print(f"\n{'='*70}")
    print("TRAINING COMPLETE!")
    print(f"Model saved to: {model_file}")
    print("="*70)

if __name__ == "__main__":
    main()