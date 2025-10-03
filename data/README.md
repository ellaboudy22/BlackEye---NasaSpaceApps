# Data Directory

This directory contains all the data used in the NASA Space Apps exoplanet detection project.

##  Structure

- **aw/** - Raw astronomical data from various missions
- **processed/** - Cleaned and preprocessed data ready for analysis
- **
otebooks/** - Jupyter notebooks for data exploration and analysis

##  Data Sources

### Raw Data (aw/)
- **Kepler Mission Data**: Primary dataset for exoplanet detection
- **K2 Mission Data**: Extended Kepler mission observations
- **TESS Mission Data**: Transiting Exoplanet Survey Satellite data

### Processed Data (processed/)
- Cleaned light curves
- Normalized transit data
- Feature-engineered datasets
- Model-ready training/test sets

##  Data Formats

- **Light Curves**: Time series data in CSV format
- **Transit Data**: JSON format with metadata
- **Feature Matrices**: NumPy arrays (.npy) for ML models

##  Usage

1. Place raw data files in the aw/ directory
2. Use notebooks in 
otebooks/ for data exploration
3. Processed data is automatically saved to processed/
4. Always maintain data versioning and documentation

##  Important Notes

- Raw data files are typically large (>1GB)
- Use .gitignore to exclude large data files from version control
- Document data sources and processing steps
- Maintain data integrity and backup procedures

##  Related Files

- See ../model/ for model training scripts
- See ../webapp/ for data upload interfaces
- See ../docs/ for detailed data documentation
