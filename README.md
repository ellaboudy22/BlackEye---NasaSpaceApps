# NASA Space Apps - Exoplanet Detection Project

##  Project Overview

This project is developed for NASA Space Apps Challenge, focusing on exoplanet detection and analysis using machine learning techniques. The system processes astronomical data from Kepler, K2, and TESS missions to identify and classify potential exoplanets.

##  Project Structure

`
 data/                # All project data
    raw/             # Raw data (Kepler, K2, TESS)
    processed/       # Cleaned and processed data
    notebooks/       # Jupyter Notebooks for experiments

 model/               # Model training and evaluation code

 webapp/              # User interface (Web)
    static/          # Static files (CSS, images, JavaScript)
       css/         # CSS files for styling
       js/          # JavaScript files for frontend logic
       img/         # Images and icons
    pages/           # HTML pages (landing, upload, results, dashboard)

 presentation/        # Project presentation
    assets/          # Images and media used in presentation

 docs/                # Project documentation

 tests/               # Model and code test files
`

##  Features

- **Data Processing**: Automated pipeline for processing astronomical data
- **Machine Learning Models**: Advanced algorithms for exoplanet detection
- **Web Interface**: User-friendly web application for data upload and results visualization
- **Real-time Analysis**: Live processing of uploaded data
- **Interactive Dashboard**: Comprehensive visualization of results

##  Installation & Setup

### Prerequisites

- Python 3.8+
- pip (Python package installer)
- Git

### Installation Steps

1. **Clone the repository**
   `ash
   git clone <repository-url>
   cd "Nasa Space Apps"
   `

2. **Create virtual environment**
   `ash
   python -m venv venv
   `

3. **Activate virtual environment**
   - Windows:
     `ash
     venv\Scripts\activate
     `
   - macOS/Linux:
     `ash
     source venv/bin/activate
     `

4. **Install dependencies**
   `ash
   pip install -r requirements.txt
   `

##  Data Sources

- **Kepler Mission**: Primary dataset for exoplanet detection
- **K2 Mission**: Extended Kepler mission data
- **TESS Mission**: Transiting Exoplanet Survey Satellite data

##  Model Information

The project utilizes state-of-the-art machine learning algorithms for:
- Light curve analysis
- Transit detection
- False positive filtering
- Exoplanet classification

##  Web Application

The web application provides:
- Data upload interface
- Real-time processing status
- Interactive results visualization
- Export functionality for results

##  Usage

1. **Data Upload**: Use the web interface to upload astronomical data
2. **Processing**: The system automatically processes and analyzes the data
3. **Results**: View detailed results and visualizations
4. **Export**: Download results in various formats

##  Testing

Run the test suite:
`ash
python -m pytest tests/
`

##  Documentation

Detailed documentation is available in the docs/ directory:
- Model documentation
- API reference
- User guide
- Developer guide

##  Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests for new functionality
5. Submit a pull request

##  License

This project is developed for NASA Space Apps Challenge. Please refer to the license file for more details.

##  Team

- [Team Member Names]
- [Contact Information]

##  NASA Space Apps Challenge

This project was developed for the NASA Space Apps Challenge [Year], addressing the challenge: [Challenge Name].

##  Support

For questions or support, please contact:
- Email: [team-email]
- GitHub Issues: [repository-issues-link]

---

**Note**: This project is part of NASA Space Apps Challenge and is intended for educational and research purposes.







| **Unified Concept**              | **KOI (Kepler)**            | **K2**                             | **TOI (TESS)**             | **Description**                                       | **Source Type**                                       | **Source Type Clarification**                         |
| -------------------------------- | --------------------------- | ---------------------------------- | -------------------------- | ----------------------------------------------------- | ----------------------------------------------------- | ------------------------------------------------------ |
| **Planet ID**                    | `kepoi_name`, `kepler_name` | `pl_name`                          | `toi`                      | Unique identifier assigned to each planet candidate or confirmed planet | Raw (catalog IDs)                                     | Direct observational designations from mission catalogs |
| **Star ID**                      | `kepid`                     | `hostname`                         | `tid` (TIC ID)             | Unique identifier for the host star system           | Raw (catalog IDs)                                     | Direct observational designations from star catalogs |
| **Disposition (Classification)** | `koi_pdisposition`          | `disposition`                      | `tfopwg_disp`              | Current classification status (planet candidate, confirmed planet, false positive, etc.) | Scientists (review / vetting)                         | Expert assessment based on follow-up observations and validation |
| **Default Parameter Set**        | —                           | `default_flag`                     | —                          | Flag indicating if this is the preferred parameter set when multiple exist | Raw (database meta)                                   | Database management designation for data organization |
| **Disposition Reference**        | —                           | `disp_refname`                     | —                          | Literature reference supporting the disposition classification | Scientists (reference source)                         | Peer-reviewed publication validating the classification |
| **System Star Count**            | —                           | `sy_snum`                          | —                          | Number of stars detected in the planetary system     | Raw (catalog meta)                                    | Direct count from observational analysis |
| **System Planet Count**          | —                           | `sy_pnum`                          | —                          | Number of planets detected in the system             | Raw (catalog meta)                                    | Direct count from transit or RV detections |
| **Discovery Year**               | —                           | `disc_year`                        | —                          | Year when the planet was first discovered or announced | Raw (meta info)                                       | Historical record from discovery publications |
| **Discovery Method**             | —                           | `discoverymethod`                  | —                          | Technique used to detect the planet (transit, RV, direct imaging, etc.) | Raw (meta info)                                       | Observational method classification |
| **Discovery Facility**           | —                           | `disc_facility`                    | —                          | Telescope or instrument that made the initial detection | Raw (meta info)                                       | Direct observational facility identification |
| **Solution Type**                | —                           | `soltype`                          | —                          | Method used to derive planetary parameters (e.g., published, calculated) | Scientists (analysis method)                          | Computational or analytical approach classification |
| **Controversial Flag**           | —                           | `pl_controv_flag`                  | —                          | Indicates if the planet's existence or parameters are disputed | Scientists (data quality assessment)                  | Expert evaluation of measurement reliability |
| **Orbital Period**               | `koi_period`                | `pl_orbper`                        | `pl_orbper`                | Time for planet to complete one orbit around its star | Predicted (fitted from light curve)                   | Statistical fit to periodic transit or RV signals |
| **Orbital Period Error**         | `koi_period_err1/err2`      | `pl_orbpererr1/err2`               | `pl_orbpererr1/err2`       | Uncertainty bounds on the orbital period measurement | Scientists (uncertainty modeling)                     | Statistical error propagation from observational data |
| **Orbital Period Limit Flag**    | —                           | `pl_orbperlim`                     | `pl_orbperlim`             | Indicates if period is an upper/lower limit rather than measurement | Scientists (measurement quality)                      | Statistical assessment of measurement constraints |
| **Semi-Major Axis**              | —                           | `pl_orbsmax`                       | —                          | Average distance between planet and star during orbit | Scientists (derived from period + stellar mass)       | Calculated using Kepler's third law and stellar parameters |
| **Semi-Major Axis Error**        | —                           | `pl_orbsmaxerr1/err2`              | —                          | Uncertainty bounds on the semi-major axis calculation | Scientists (uncertainty modeling)                     | Error propagation from period and stellar mass uncertainties |
| **Semi-Major Axis Limit Flag**   | —                           | `pl_orbsmaxlim`                    | —                          | Indicates if semi-major axis is an upper/lower limit | Scientists (measurement quality)                      | Statistical assessment based on input parameter quality |
| **Transit Epoch (Midpoint)**     | `koi_time0bk`               | —                                  | `pl_tranmid`               | Time of the center of a transit event                | Predicted                                             | Statistical fit to transit light curve timing |
| **Transit Midpoint Error**       | —                           | —                                  | `pl_tranmiderr1/err2`      | Uncertainty bounds on transit timing measurement     | Scientists (uncertainty modeling)                     | Statistical error from light curve fitting |
| **Transit Midpoint Limit Flag**  | —                           | —                                  | `pl_tranmidlim`            | Indicates if timing is an upper/lower limit          | Scientists (measurement quality)                      | Statistical assessment of timing precision |
| **Transit Duration**             | `koi_duration`              | —                                  | `pl_trandurh`              | Time from start to end of transit across stellar disk | Predicted                                             | Direct measurement from transit light curve shape |
| **Transit Duration Error**       | —                           | —                                  | `pl_trandurherr1/err2`     | Uncertainty bounds on transit duration measurement   | Scientists (uncertainty modeling)                     | Statistical error from light curve fitting |
| **Transit Duration Limit Flag**  | —                           | —                                  | `pl_trandurhlim`           | Indicates if duration is an upper/lower limit        | Scientists (measurement quality)                      | Statistical assessment of measurement precision |
| **Transit Depth**                | `koi_depth`                 | —                                  | `pl_trandep`               | Fractional decrease in stellar brightness during transit | Raw (from light curve)                                | Direct photometric measurement from observation |
| **Transit Depth Error**          | —                           | —                                  | `pl_trandeperr1/err2`      | Uncertainty bounds on transit depth measurement      | Scientists (uncertainty modeling)                     | Statistical error from photometric analysis |
| **Transit Depth Limit Flag**     | —                           | —                                  | `pl_trandeplim`            | Indicates if depth is an upper/lower limit           | Scientists (measurement quality)                      | Statistical assessment of photometric precision |
| **Planet Radius [R⊕]**          | `koi_prad`                  | `pl_rade`                          | `pl_rade`                  | Planet radius in units of Earth radii                | Scientists (derived from transit depth + star radius) | Calculated from transit depth and stellar radius measurements |
| **Planet Radius [R⊕] Error**    | —                           | `pl_radeerr1/err2`                 | `pl_radeerr1/err2`         | Uncertainty bounds on Earth-radius measurement       | Scientists (uncertainty modeling)                     | Error propagation from transit and stellar parameters |
| **Planet Radius [R⊕] Limit**    | —                           | `pl_radelim`                       | `pl_radelim`               | Indicates if radius is an upper/lower limit          | Scientists (measurement quality)                      | Statistical assessment based on input data quality |
| **Planet Radius [R♃]**          | —                           | `pl_radj`                          | —                          | Planet radius in units of Jupiter radii              | Scientists                                            | Unit conversion from Earth radii measurements |
| **Planet Radius [R♃] Error**    | —                           | `pl_radjerr1/err2`                 | —                          | Uncertainty bounds on Jupiter-radius measurement     | Scientists (uncertainty modeling)                     | Error propagation with unit conversion |
| **Planet Radius [R♃] Limit**    | —                           | `pl_radjlim`                       | —                          | Indicates if Jupiter radius is an upper/lower limit  | Scientists (measurement quality)                      | Statistical assessment with unit conversion |
| **Planet Mass [M⊕]**            | —                           | `pl_bmasse`                        | —                          | Planet mass in units of Earth masses                 | Scientists (from mass–radius relation or RV)          | Derived from radial velocity measurements or mass-radius relations |
| **Planet Mass [M⊕] Error**      | —                           | `pl_bmasseerr1/err2`               | —                          | Uncertainty bounds on Earth-mass measurement         | Scientists (uncertainty modeling)                     | Statistical error from RV analysis or empirical relations |
| **Planet Mass [M⊕] Limit**      | —                           | `pl_bmasselim`                     | —                          | Indicates if mass is an upper/lower limit            | Scientists (measurement quality)                      | Assessment of measurement or estimation constraints |
| **Planet Mass [M♃]**            | —                           | `pl_bmassj`                        | —                          | Planet mass in units of Jupiter masses               | Scientists (from mass–radius relation or RV)          | Unit conversion from Earth mass measurements |
| **Planet Mass [M♃] Error**      | —                           | `pl_bmassjerr1/err2`               | —                          | Uncertainty bounds on Jupiter-mass measurement       | Scientists (uncertainty modeling)                     | Error propagation with unit conversion |
| **Planet Mass [M♃] Limit**      | —                           | `pl_bmassjlim`                     | —                          | Indicates if Jupiter mass is an upper/lower limit    | Scientists (measurement quality)                      | Statistical assessment with unit conversion |
| **Planet Mass Provenance**       | —                           | `pl_bmassprov`                     | —                          | Method used to determine planet mass (RV, mass-radius relation, etc.) | Scientists (measurement method)                       | Classification of mass determination technique |
| **Eccentricity**                 | —                           | `pl_orbeccen`                      | —                          | Measure of how elliptical the orbit is (0=circular, >0=elliptical) | Scientists                                            | Derived from radial velocity curve fitting or transit timing |
| **Eccentricity Error**           | —                           | `pl_orbeccenerr1/err2`             | —                          | Uncertainty bounds on eccentricity measurement       | Scientists (uncertainty modeling)                     | Statistical error from orbital fitting |
| **Eccentricity Limit Flag**      | —                           | `pl_orbeccenlim`                   | —                          | Indicates if eccentricity is an upper/lower limit    | Scientists (measurement quality)                      | Assessment of orbital fitting constraints |
| **Equilibrium Temp. [K]**       | `koi_teq`                   | `pl_eqt`                           | `pl_eqt`                   | Predicted planet temperature assuming no atmosphere   | Scientists (model from star flux + orbit)             | Theoretical calculation from stellar flux and orbital distance |
| **Equilibrium Temp. Error**      | —                           | `pl_eqterr1/err2`                  | `pl_eqterr1/err2`          | Uncertainty bounds on equilibrium temperature        | Scientists (uncertainty modeling)                     | Error propagation from stellar and orbital parameters |
| **Equilibrium Temp. Limit**      | —                           | `pl_eqtlim`                        | `pl_eqtlim`                | Indicates if temperature is an upper/lower limit     | Scientists (measurement quality)                      | Assessment based on input parameter constraints |
| **Insolation Flux**              | `koi_insol`                 | `pl_insol`                         | `pl_insol`                 | Amount of stellar energy received by planet relative to Earth | Scientists                                            | Calculated from stellar luminosity and orbital distance |
| **Insolation Flux Error**        | —                           | `pl_insolerr1/err2`                | `pl_insolerr1/err2`        | Uncertainty bounds on insolation flux calculation    | Scientists (uncertainty modeling)                     | Error propagation from stellar and orbital parameters |
| **Insolation Flux Limit**        | —                           | `pl_insollim`                      | `pl_insollim`              | Indicates if insolation is an upper/lower limit      | Scientists (measurement quality)                      | Assessment based on input parameter quality |
| **Transit Timing Variations**    | —                           | `ttv_flag`                         | —                          | Flag indicating if transit times show systematic variations | Raw (data analysis flag)                              | Direct detection from transit timing analysis |
| **Planetary Parameter Ref**      | —                           | `pl_refname`                       | —                          | Literature reference for planetary parameter values   | Scientists (reference source)                         | Peer-reviewed publication containing measurements |
| **Stellar Parameter Ref**        | —                           | `st_refname`                       | —                          | Literature reference for stellar parameter values     | Scientists (reference source)                         | Peer-reviewed publication with stellar characterization |
| **System Parameter Ref**         | —                           | `sy_refname`                       | —                          | Literature reference for system-level parameters     | Scientists (reference source)                         | Peer-reviewed publication with system analysis |
| **Stellar Teff [K]**            | `koi_steff`                 | `st_teff`                          | `st_teff`                  | Effective temperature of the host star               | Scientists (spectroscopy / models)                    | Derived from spectroscopic analysis or photometric calibrations |
| **Stellar Teff Error**          | —                           | `st_tefferr1/err2`                 | `st_tefferr1/err2`         | Uncertainty bounds on stellar temperature measurement | Scientists (uncertainty modeling)                     | Statistical error from spectroscopic or photometric analysis |
| **Stellar Teff Limit**          | —                           | `st_tefflim`                       | `st_tefflim`               | Indicates if temperature is an upper/lower limit     | Scientists (measurement quality)                      | Assessment of spectroscopic measurement constraints |
| **Stellar log(g)**               | `koi_slogg`                 | `st_logg`                          | `st_logg`                  | Logarithm of stellar surface gravity (density indicator) | Scientists                                            | Derived from spectroscopic analysis or stellar evolution models |
| **Stellar log(g) Error**         | —                           | `st_loggerr1/err2`                 | `st_loggerr1/err2`         | Uncertainty bounds on surface gravity measurement    | Scientists (uncertainty modeling)                     | Statistical error from spectroscopic fitting |
| **Stellar log(g) Limit**         | —                           | `st_logglim`                       | `st_logglim`               | Indicates if surface gravity is an upper/lower limit | Scientists (measurement quality)                      | Assessment of spectroscopic measurement precision |
| **Stellar Radius [R☉]**         | `koi_srad`                  | `st_rad`                           | `st_rad`                   | Radius of the host star in units of solar radii      | Scientists                                            | Derived from stellar models, interferometry, or transit analysis |
| **Stellar Radius Error**         | —                           | `st_raderr1/err2`                  | `st_raderr1/err2`          | Uncertainty bounds on stellar radius measurement     | Scientists (uncertainty modeling)                     | Error propagation from observational constraints |
| **Stellar Radius Limit**         | —                           | `st_radlim`                        | `st_radlim`                | Indicates if stellar radius is an upper/lower limit  | Scientists (measurement quality)                      | Assessment based on measurement method limitations |
| **Stellar Mass [M☉]**           | —                           | `st_mass`                          | —                          | Mass of the host star in units of solar masses       | Scientists                                            | Derived from stellar evolution models and observational constraints |
| **Stellar Mass Error**           | —                           | `st_masserr1/err2`                 | —                          | Uncertainty bounds on stellar mass measurement       | Scientists (uncertainty modeling)                     | Error propagation from stellar modeling |
| **Stellar Mass Limit**           | —                           | `st_masslim`                       | —                          | Indicates if stellar mass is an upper/lower limit    | Scientists (measurement quality)                      | Assessment of stellar modeling constraints |
| **Stellar Metallicity [dex]**   | —                           | `st_met`                           | —                          | Metal abundance relative to solar (log scale)        | Scientists                                            | Derived from high-resolution spectroscopic analysis |
| **Stellar Metallicity Error**   | —                           | `st_meterr1/err2`                  | —                          | Uncertainty bounds on metallicity measurement        | Scientists (uncertainty modeling)                     | Statistical error from spectroscopic fitting |
| **Stellar Metallicity Limit**   | —                           | `st_metlim`                        | —                          | Indicates if metallicity is an upper/lower limit     | Scientists (measurement quality)                      | Assessment of spectroscopic measurement precision |
| **Stellar Metallicity Ratio**   | —                           | `st_metratio`                      | —                          | Specific elemental abundance ratio used for metallicity | Scientists                                            | Classification of which elements were measured |
| **Spectral Type**                | —                           | `st_spectype`                      | —                          | Stellar classification based on spectral features    | Scientists                                            | Traditional astronomical classification from spectroscopy |
| **Stellar Proper Motion RA**     | —                           | —                                  | `st_pmra`                  | Star's motion across sky in right ascension direction | Raw (astrometry)                                      | Direct astrometric measurement from precise positioning |
| **Stellar PM RA Error**          | —                           | —                                  | `st_pmraerr1/err2`         | Uncertainty bounds on RA proper motion measurement   | Scientists (uncertainty modeling)                     | Statistical error from astrometric fitting |
| **Stellar PM RA Limit**          | —                           | —                                  | `st_pmralim`               | Indicates if RA proper motion is an upper/lower limit | Scientists (measurement quality)                      | Assessment of astrometric measurement precision |
| **Stellar Proper Motion Dec**    | —                           | —                                  | `st_pmdec`                 | Star's motion across sky in declination direction    | Raw (astrometry)                                      | Direct astrometric measurement from precise positioning |
| **Stellar PM Dec Error**         | —                           | —                                  | `st_pmdecerr1/err2`        | Uncertainty bounds on Dec proper motion measurement  | Scientists (uncertainty modeling)                     | Statistical error from astrometric fitting |
| **Stellar PM Dec Limit**         | —                           | —                                  | `st_pmdeclim`              | Indicates if Dec proper motion is an upper/lower limit | Scientists (measurement quality)                      | Assessment of astrometric measurement precision |
| **V Band Magnitude**             | —                           | `sy_vmag`                          | —                          | Brightness in Johnson V filter (yellow-green light)  | Raw (Johnson V photometry)                            | Direct photometric measurement in standard filter system |
| **V Band Magnitude Error**       | —                           | `sy_vmagerr1/err2`                 | —                          | Uncertainty bounds on V magnitude measurement        | Scientists (uncertainty modeling)                     | Statistical error from photometric analysis |
| **Ks Band Magnitude**            | —                           | `sy_kmag`                          | —                          | Brightness in 2MASS Ks filter (near-infrared)       | Raw (2MASS Ks photometry)                             | Direct photometric measurement from 2MASS survey |
| **Ks Band Magnitude Error**      | —                           | `sy_kmagerr1/err2`                 | —                          | Uncertainty bounds on Ks magnitude measurement      | Scientists (uncertainty modeling)                     | Statistical error from 2MASS photometry |
| **Gaia Magnitude**               | —                           | `sy_gaiamag`                       | —                          | Brightness in Gaia G filter (broad optical)          | Raw (Gaia photometry)                                 | Direct photometric measurement from Gaia satellite |
| **Gaia Magnitude Error**         | —                           | `sy_gaiamagerr1/err2`              | —                          | Uncertainty bounds on Gaia magnitude measurement     | Scientists (uncertainty modeling)                     | Statistical error from Gaia photometric analysis |
| **Kepler Magnitude**             | `koi_kepmag`                | —                                  | —                          | Brightness in Kepler filter (red optical)            | Raw (Kepler photometry)                               | Direct photometric measurement from Kepler mission |
| **TESS Magnitude**               | —                           | —                                  | `st_tmag`                  | Brightness in TESS filter (red optical)              | Raw (TESS photometry)                                 | Direct photometric measurement from TESS mission |
| **TESS Magnitude Error**         | —                           | —                                  | `st_tmagerr1/err2`         | Uncertainty bounds on TESS magnitude measurement     | Scientists (uncertainty modeling)                     | Statistical error from TESS photometric analysis |
| **TESS Magnitude Limit**         | —                           | —                                  | `st_tmaglim`               | Indicates if TESS magnitude is an upper/lower limit  | Scientists (measurement quality)                      | Assessment of TESS photometric measurement precision |
| **RA (deg)**                     | `ra`                        | `ra`                               | `ra`                       | Right ascension coordinate in decimal degrees         | Raw                                                   | Direct astrometric position from catalog |
| **RA (sexagesimal)**             | —                           | `rastr`                            | `rastr`                    | Right ascension in hours:minutes:seconds format      | Raw (coordinate format)                               | Traditional astronomical coordinate format conversion |
| **Dec (deg)**                    | `dec`                       | `dec`                              | `dec`                      | Declination coordinate in decimal degrees             | Raw                                                   | Direct astrometric position from catalog |
| **Dec (sexagesimal)**            | —                           | `decstr`                           | `decstr`                   | Declination in degrees:arcminutes:arcseconds format  | Raw (coordinate format)                               | Traditional astronomical coordinate format conversion |
| **Distance [pc]**               | —                           | `sy_dist` (system)                 | `st_dist` (stellar)        | Distance to star/system in parsecs                   | Scientists (parallax from Gaia etc.)                  | Calculated from trigonometric parallax measurements |
| **Distance Error**              | —                           | `sy_disterr1/err2`                 | `st_disterr1/err2`         | Uncertainty bounds on distance measurement           | Scientists (uncertainty modeling)                     | Statistical error from parallax measurement precision |
| **Distance Limit**              | —                           | —                                  | `st_distlim`               | Indicates if distance is an upper/lower limit        | Scientists (measurement quality)                      | Assessment of parallax measurement constraints |
| **Planet Publication Date**      | —                           | `pl_pubdate`                       | —                          | Date when planetary parameters were published         | Raw (database meta)                                   | Publication timestamp from literature |
| **TOI Created Date**             | —                           | —                                  | `toi_created`              | Date when TOI designation was assigned                | Raw (database meta)                                   | Administrative timestamp from TESS pipeline |
| **Update / Release Date**        | —                           | `rowupdate`, `releasedate`         | `rowupdate`                | Date when database entry was last modified           | Raw (database meta)                                   | Database management timestamp for version control |