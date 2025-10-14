# 🌌 BlackEye - Universe Observation Platform

## 📋 Summary

BlackEye is an advanced universe observation platform that makes space exploration accessible to everyone. Using NASA's space telescope data and intelligent AI, we discover new worlds, analyze cosmic phenomena, and unlock the secrets of the universe. Whether you're a researcher, educator, or space enthusiast, BlackEye brings the cosmos to your fingertips.

## 🛠️ Our Solution

**An advanced universe observation platform that combines NASA's space telescope data with intelligent AI to discover new worlds, analyze cosmic phenomena, and make space exploration accessible to everyone.**

### 🎯 Core Features

#### 🤖 **Machine Learning Engine**
- **Multi-Target Approach**: Simultaneous classification and parameter prediction
- **XGBoost Models**: State-of-the-art gradient boosting for both tasks
- **Feature Engineering**: Physics-based features for better model performance
- **Confidence Estimates**: Reliability metrics for all predictions

#### 📊 **Data Processing**
- **17,232 Objects**: Analyzed from merged Kepler and TESS datasets
- **12 Raw Features**: Core observational parameters (period, depth, duration, etc.)
- **3 Engineered Features**: Derived features based on astronomical principles
- **Quality Filtering**: Automated data quality assessment and cleaning

#### 🔬 **Scientific Targets**
- **Classification**: Exoplanet disposition (CONFIRMED, CANDIDATE, FALSE_POSITIVE, UNKNOWN)
- **Planet Properties**: Radius, equilibrium temperature, insolation flux
- **Stellar Properties**: Temperature, surface gravity, radius
- **7 Key Parameters**: Orbital period, planet radius, equilibrium temperature, stellar temperature, surface gravity, stellar radius, stellar mass

#### 🌐 **API Interface**
- **FastAPI Server**: RESTful API for model predictions
- **Multiple Input Formats**: JSON and CSV file uploads
- **Real-Time Processing**: Fast inference on new data

## 🛰️ NASA Data Usage

Our project utilizes NASA's Kepler Objects of Interest (KOI) Dataset (9,564 objects) and NASA's TESS Objects of Interest (TOI) Dataset (7,668 objects) from the NASA Exoplanet Archive. We extract 12 raw features plus 3 physics-based engineered features from the NASA data, using XGBoost machine learning to simultaneously classify exoplanet candidates and predict 7 key scientific parameters.

## 🚀 Installation & Setup

### Prerequisites
- Python 3.8+
- pip (Python package installer)
- Git
- Docker (optional, for containerized deployment)

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd "BlackEye"
   ```

2. **Create virtual environment**
   ```bash
   python -m venv venv
   ```

3. **Activate virtual environment**
   - Windows: `venv\Scripts\activate`
   - macOS/Linux: `source venv/bin/activate`

4. **Install dependencies**
   ```bash
   pip install -r AI/requirements.txt
   ```

### Quick Start

```bash
# Train the model
cd AI
python train_model.py

# Run API server
python run_api.py
```

The API will be available at:
- Dashboard: http://localhost:3000
- Model Dashboard: http://localhost:3000/dashboard

## 🐳 Docker Deployment

### Using Docker Compose (Recommended)

```bash
# Build and start the container
docker-compose up -d

# View logs
docker-compose logs -f

# Stop the container
docker-compose down
```

### Accessing the API

Once the container is running, you can access:
- **API Dashboard**: http://localhost:3000
- **Model Dashboard**: http://localhost:3000/dashboard
- **Health Check**: http://localhost:3000/health

## 💻 Usage Examples

### Basic Prediction

```python
from AI.src.models.exoplanet_model import ExoplanetModel

# Load trained model
model = ExoplanetModel.load_model('AI/models/exoplanet_model_tested.pkl')

# Make prediction
result = model.predict({
    'pl_orbper': 365.25,    # Earth-like orbital period
    'st_teff': 5778,        # Sun-like star temperature
    'pl_rade': 1.0,         # Earth-sized planet
    'st_rad': 1.0           # Sun-sized star
})

# View classification
print(f"Classification: {result['classification']['prediction']}")
print(f"Confidence: {result['classification']['confidence']:.3f}")

# View parameter predictions
for param, pred in result['parameters'].items():
    if pred['confidence'] > 0.7:  # High confidence only
        print(f"{pred['description']}: {pred['value']:.3f}")
```

### API Endpoints

- `GET /health` - Health check
- `GET /model/info` - Model information
- `POST /predict/json` - JSON prediction
- `POST /predict` - CSV file prediction

## 🧪 Model Performance

### Classification Metrics

| Class | Precision | Recall | F1-Score | Support |
|-------|-----------|--------|----------|---------|
| CONFIRMED | 0.89 | 0.91 | 0.90 | 1,245 |
| CANDIDATE | 0.76 | 0.82 | 0.79 | 2,156 |
| FALSE_POSITIVE | 0.94 | 0.87 | 0.90 | 1,832 |
| **Overall** | **0.86** | **0.87** | **0.86** | **5,233** |

### Parameter Prediction Performance

| Parameter | R² Score | RMSE | MAE | Samples |
|-----------|----------|------|-----|---------|
| Orbital Period | 0.95 | 45.2 days | 12.1 days | 4,234 |
| Planet Radius | 0.87 | 0.34 R⊕ | 0.21 R⊕ | 3,567 |
| Equilibrium Temp | 0.91 | 67.3 K | 42.1 K | 3,891 |
| Stellar Temperature | 0.93 | 156.7 K | 98.4 K | 4,102 |

## 🏗️ Project Structure

```
BlackEye/
├── AI/                              # Machine Learning System
│   ├── src/                         # Source code
│   │   ├── models/                  # ML models
│   │   │   └── exoplanet_model.py   # Main prediction model
│   │   └── api/                     # FastAPI server
│   │       └── api_server.py        # API endpoints
│   ├── data/                        # Data files
│   │   └── raw/                     # Original datasets
│   ├── models/                      # Trained model files (.pkl)
│   ├── run_api.py                   # Start API server
│   ├── train_model.py               # Train model
│   ├── requirements.txt             # Python dependencies
│   ├── Dockerfile                   # Docker configuration
│   └── docker-compose.yml           # Docker Compose setup
├── webapp/                          # User interface (Web)
│   ├── static/                      # Static files (CSS, images, JavaScript)
│   ├── assets/                      # Images and assets
│   ├── includes/                    # PHP includes
│   ├── index.php                    # Main landing page
│   ├── about.php                    # About page
│   ├── solution.php                 # Solution details
│   ├── contact.php                  # Contact page
│   └── model-dashboard.php          # Model dashboard
├── docker-compose.yml               # Main Docker Compose
└── README.md                        # This file
```

## 🌐 Web Application (BlackEye)

BlackEye is an AI-powered exoplanet classification platform that uses NASA's Kepler and TESS TOI datasets to identify and classify exoplanets with unprecedented accuracy.

### Key Features
- **NASA Data Integration**: Uses Kepler and TESS TOI datasets
- **AI-Powered Classification**: 86% accuracy in exoplanet identification
- **Real-time Processing**: 50ms processing speed per object
- **Multi-Parameter Prediction**: 18+ scientific parameters
- **Responsive Design**: Works on all devices

### Core Pages
- **Home Page**: Project introduction and key features
- **About Page**: Mission, vision, and unique features
- **Solution Page**: Technical specifications and pricing
- **Contact Page**: Contact information
- **Model Dashboard**: Interactive model demonstration

## 👥 Team

### Team Members
- **Moaz Ellaboudy** - Project Lead
- **Adam Ezzat** - Machine Learning Engineer
- **Yahia Awad** - Hardware Engineer
- **Karim Soliman** - Hardware Engineer
- **Batool Saleh** - Researcher
