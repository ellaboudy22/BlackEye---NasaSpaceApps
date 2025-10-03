# BlackEye Web Application

This directory contains the web application for the NASA Space Apps exoplanet detection project - BlackEye.

## Overview

BlackEye is an AI-powered exoplanet classification platform that uses NASA's Kepler and TESS TOI datasets to identify and classify exoplanets with unprecedented accuracy.

## Structure

```
webapp/
├── index.php              # Main landing page
├── about.php              # About page
├── solution.php           # Solution details
├── contact.php            # Contact page
├── model-dashboard.php    # Model dashboard
├── includes/              # PHP includes
│   ├── header.php         # Navigation header
│   ├── footer.php         # Footer
│   └── team.php           # Team section
├── static/                # Static files
│   ├── css/               # Stylesheets
│   └── js/                # JavaScript files
└── assets/                # Images and assets
    └── images/
        └── logo.png       # BlackEye logo
```

## Features

### Core Pages
- **Home Page**: Project introduction and key features
- **About Page**: Mission, vision, and unique features
- **Solution Page**: Technical specifications and pricing
- **Contact Page**: Contact information
- **Model Dashboard**: Interactive model demonstration

### Key Features
- **NASA Data Integration**: Uses Kepler and TESS TOI datasets
- **AI-Powered Classification**: 86% accuracy in exoplanet identification
- **Real-time Processing**: 50ms processing speed per object
- **Multi-Parameter Prediction**: 18+ scientific parameters
- **Responsive Design**: Works on all devices

## Technology Stack

- **Frontend**: PHP, HTML5, CSS3, JavaScript
- **Styling**: Custom CSS with space-themed design
- **Data Sources**: NASA Kepler Dataset, NASA TESS TOI Dataset
- **Performance**: Optimized for speed and accessibility

## NASA Judging Criteria Alignment

The webapp directly addresses all NASA Space Apps judging criteria:
- **Impact**: Benefits global astronomical community
- **Innovation**: Unique multi-mission data integration
- **Feasibility**: Built with current technology using NASA data
- **Relevance**: Directly solves exoplanet discovery challenges
- **Presentation**: Clear, engaging, and inspiring content

## Data Sources

- **NASA Kepler Objects of Interest (KOI)**: Primary training data with confirmed exoplanets, planetary candidates, and false positives using "Disposition Using Kepler Data" column for supervised learning
- **NASA TESS Objects of Interest (TOI)**: Real-time validation with confirmed exoplanets, planetary candidates (PC), false positives (FP), ambiguous planetary candidates (APC), and known planets (KP) using "TFOWPG Disposition" column
- **NASA Exoplanet Archive**: Comprehensive exoplanet catalog integration

## Repository

View the complete project repository: [GitHub Repository](https://github.com/your-username/Nasa-Space-Apps)