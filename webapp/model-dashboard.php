<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>Model Dashboard - BlackEye</title>
    <link rel="stylesheet" href="static/css/main.css">
    <link rel="stylesheet" href="static/css/unified.css">
    <link rel="stylesheet" href="static/css/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main class="main-content">
        <div class="container">
            <section class="page-header">
                <h1 class="page-title">BlackEye Dashboard</h1>
                <p class="page-subtitle">
                    Monitor and configure the BlackEye machine learning system for exoplanet analysis. The system processes NASA's Kepler 
                    and TESS datasets to identify and characterize exoplanets through a multi-target learning approach, analyzing 17,232 
                    space objects with 12 basic features plus 3 smart calculated features. Customize settings for all AI models, 
                    configure data splits, and analyze new astronomical data.
                </p>
                <div class="stats">
                    <div class="stat stat-primary">
                        <span class="stat-value">17,232</span>
                        <span class="stat-label">Objects Analyzed</span>
                    </div>
                    <div class="stat stat-primary">
                        <span class="stat-value">12+3</span>
                        <span class="stat-label">Features</span>
                    </div>
                    <div class="stat stat-primary">
                        <span class="stat-value">7</span>
                        <span class="stat-label">Parameters</span>
                    </div>
                </div>
            </section>

            <section class="section">
                <h2 class="section-title">BlackEye System Analytics</h2>
                <div class="cards-grid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dataset Distribution</h3>
                        </div>
                        <div class="card-content">
                            <canvas id="datasetDistributionChart"></canvas>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Features vs Targets</h3>
                        </div>
                        <div class="card-content">
                            <canvas id="featuresTargetsChart"></canvas>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Model Accuracy by Type</h3>
                        </div>
                        <div class="card-content">
                            <canvas id="modelAccuracyChart"></canvas>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Performance Overview</h3>
                        </div>
                        <div class="card-content">
                            <canvas id="performanceOverviewChart"></canvas>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <h2 class="section-title">Model Configuration</h2>
                <p class="section-subtitle">Configure AI settings and retrain the smart learning system with custom options. 
                The system provides comprehensive customization for all AI models (planet finder, planet property predictor, star property predictor, 
                quality regressor) with customizable parameters including n_estimators, max_depth, learning_rate, subsample, and colsample_bytree.</p>

                <div class="section-controls">
                    <button class="btn btn-primary btn-large" id="openRetrainModalBtn">
                        <span class="btn-text">⚙️ Configure & Retrain Model</span>
                    </button>
                </div>

                <div id="trainingMetrics" class="training-metrics"></div>
            </section>

            <section class="section">
                <h2 class="section-title">Exoplanet Analysis</h2>
                <p class="section-subtitle">Analyze new astronomical data using BlackEye's multi-target learning system. The system can classify 
                objects as CONFIRMED, CANDIDATE, FALSE_POSITIVE, or UNKNOWN while simultaneously predicting 7 key scientific parameters 
                including orbital period, planet radius, equilibrium temperature, and stellar properties.</p>
                <div class="section-controls">
                    <button class="btn btn-secondary" id="addRowBtn">
                        <span class="btn-text">+ Add Row</span>
                    </button>
                    <button class="btn btn-warning" id="deleteRowsBtn">
                        <span class="btn-text">🗑️ Delete Selected</span>
                    </button>
                    <div class="file-upload-container">
                        <input type="file" id="fileInput" accept=".xlsx,.csv" style="display: none;">
                        <button class="btn btn-primary" id="uploadBtn">
                            <span class="btn-text">📁 Upload File</span>
                        </button>
                        <button class="btn btn-success" id="downloadFutureTestBtn" title="Download future test data for validation">
                            <span class="btn-text">📥 Download Future Test Data</span>
                        </button>
                    </div>
                </div>

                <div class="table-container">
                    <table class="prediction-table" id="predictionTable">
                        <thead>
                            <tr>
                                <th class="checkbox-column">
                                    <input type="checkbox" id="selectAllRows" title="Select All">
                                </th>
                                <th class="column">ra_deg</th>
                                <th class="column">dec_deg</th>
                                <th class="column">mag</th>
                                <th class="column">period_days</th>
                                <th class="column">duration_hrs</th>
                                <th class="column">depth_ppm</th>
                                <th class="column">period_err_up</th>
                                <th class="column">period_err_low</th>
                                <th class="column">duration_err_up</th>
                                <th class="column">duration_err_low</th>
                                <th class="column">depth_err_up</th>
                                <th class="column">depth_err_low</th>
                                <th class="actions-column">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                        </tbody>
                    </table>
                </div>

                <div class="predict-section">
                    <button class="btn btn-primary btn-predict" id="predictBtn">
                        <span class="btn-text">🚀 Analyze Exoplanets</span>
        
                        <span class="btn-loading" style="display: none;">
                            <div class="loading-spinner"></div>
                        </span>
                    </button>
                    <div class="predict-results" id="predictResults" style="display: none;">
                        <h3 class="results-title">Analysis Results</h3>
                        <div class="results-content" id="resultsContent"></div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
    <div id="retrainModal" class="modal">
        <div class="modal-content modal-large">
            <div class="modal-header">
                <h2 class="modal-title">BlackEye Model Configuration</h2>
                <span class="modal-close" id="closeRetrainModal">&times;</span>
            </div>
            <div class="modal-body">
                <div class="retrain-modal-section">
                    <h3 class="modal-section-title">Hyperparameters Configuration</h3>
                    <div class="retrain-option">
                        <label class="option-label">
                            <input type="checkbox" id="useCustomHyperparameters" checked>
                            Use Custom Hyperparameters
                        </label>
                        <p class="option-description">Configure AI settings for the smart learning system below</p>
                    </div>

                    <div id="modalHyperparametersSection" class="modal-hyperparameters">
                        <div class="modal-tuning-grid">
                            <div class="modal-param-card">
                                <h4 class="modal-param-title">Classifier</h4>
                                <div class="modal-param-grid">
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">n_estimators</label>
                                        <input type="number" id="modal_classifier_n_estimators" class="modal-param-input" value="200" min="50" max="1000" step="50">
                                    </div>
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">max_depth</label>
                                        <input type="number" id="modal_classifier_max_depth" class="modal-param-input" value="10" min="3" max="20" step="1">
                                    </div>
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">learning_rate</label>
                                        <input type="number" id="modal_classifier_learning_rate" class="modal-param-input" value="0.1" min="0.01" max="0.3" step="0.01">
                                    </div>
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">subsample</label>
                                        <input type="number" id="modal_classifier_subsample" class="modal-param-input" value="0.8" min="0.5" max="1.0" step="0.1">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-param-card">
                                <h4 class="modal-param-title">Planet Regressor</h4>
                                <div class="modal-param-grid">
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">n_estimators</label>
                                        <input type="number" id="modal_planet_regressor_n_estimators" class="modal-param-input" value="200" min="50" max="1000" step="50">
                                    </div>
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">max_depth</label>
                                        <input type="number" id="modal_planet_regressor_max_depth" class="modal-param-input" value="10" min="3" max="20" step="1">
                                    </div>
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">learning_rate</label>
                                        <input type="number" id="modal_planet_regressor_learning_rate" class="modal-param-input" value="0.1" min="0.01" max="0.3" step="0.01">
                                    </div>
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">subsample</label>
                                        <input type="number" id="modal_planet_regressor_subsample" class="modal-param-input" value="0.8" min="0.5" max="1.0" step="0.1">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-param-card">
                                <h4 class="modal-param-title">Stellar Regressor</h4>
                                <div class="modal-param-grid">
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">n_estimators</label>
                                        <input type="number" id="modal_stellar_regressor_n_estimators" class="modal-param-input" value="200" min="50" max="1000" step="50">
                                    </div>
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">max_depth</label>
                                        <input type="number" id="modal_stellar_regressor_max_depth" class="modal-param-input" value="10" min="3" max="20" step="1">
                                    </div>
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">learning_rate</label>
                                        <input type="number" id="modal_stellar_regressor_learning_rate" class="modal-param-input" value="0.1" min="0.01" max="0.3" step="0.01">
                                    </div>
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">subsample</label>
                                        <input type="number" id="modal_stellar_regressor_subsample" class="modal-param-input" value="0.8" min="0.5" max="1.0" step="0.1">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-param-card">
                                <h4 class="modal-param-title">Quality Regressor</h4>
                                <div class="modal-param-grid">
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">n_estimators</label>
                                        <input type="number" id="modal_quality_regressor_n_estimators" class="modal-param-input" value="200" min="50" max="1000" step="50">
                                    </div>
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">max_depth</label>
                                        <input type="number" id="modal_quality_regressor_max_depth" class="modal-param-input" value="10" min="3" max="20" step="1">
                                    </div>
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">learning_rate</label>
                                        <input type="number" id="modal_quality_regressor_learning_rate" class="modal-param-input" value="0.1" min="0.01" max="0.3" step="0.01">
                                    </div>
                                    <div class="modal-param-input-group">
                                        <label class="modal-param-label">subsample</label>
                                        <input type="number" id="modal_quality_regressor_subsample" class="modal-param-input" value="0.8" min="0.5" max="1.0" step="0.1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="retrain-modal-section">
                    <h3 class="modal-section-title">Training Data</h3>
                    
                    <div class="data-format-info">
                        <h4 class="info-title">📋 Required Dataset Format</h4>
                        <p class="info-description">Your CSV file must include the following columns:</p>
                        
                        <div class="columns-grid">
                            <div class="column-group">
                                <h5 class="column-group-title">Core Features (Required)</h5>
                                <ul class="column-list">
                                    <li><code>ra_deg</code> - Right Ascension (degrees)</li>
                                    <li><code>dec_deg</code> - Declination (degrees)</li>
                                    <li><code>mag</code> - Apparent Magnitude</li>
                                    <li><code>period_days</code> - Orbital Period (days)</li>
                                    <li><code>duration_hrs</code> - Transit Duration (hours)</li>
                                    <li><code>depth_ppm</code> - Transit Depth (parts per million)</li>
                                </ul>
                            </div>
                            
                            <div class="column-group">
                                <h5 class="column-group-title">Error Measurements (Required)</h5>
                                <ul class="column-list">
                                    <li><code>period_err_up</code> - Period Upper Error</li>
                                    <li><code>period_err_low</code> - Period Lower Error</li>
                                    <li><code>duration_err_up</code> - Duration Upper Error</li>
                                    <li><code>duration_err_low</code> - Duration Lower Error</li>
                                    <li><code>depth_err_up</code> - Depth Upper Error</li>
                                    <li><code>depth_err_low</code> - Depth Lower Error</li>
                                </ul>
                            </div>
                            
                            <div class="column-group">
                                <h5 class="column-group-title">Target Labels (For Training)</h5>
                                <ul class="column-list">
                                    <li><code>disposition</code> - Classification (1-4)</li>
                                    <li><code>planet_radius_earth</code> - Planet Radius</li>
                                    <li><code>eq_temp_k</code> - Equilibrium Temperature</li>
                                    <li><code>insolation_earth</code> - Insolation Flux</li>
                                    <li><code>stellar_temp_k</code> - Stellar Temperature</li>
                                    <li><code>stellar_logg</code> - Surface Gravity</li>
                                    <li><code>stellar_radius_sun</code> - Stellar Radius</li>
                                    <li><code>depth_snr</code> - SNR</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="format-note">
                            <strong>💡 Note:</strong> The disposition values should be: 1 (CONFIRMED), 2 (CANDIDATE), 3 (FALSE_POSITIVE), or 4 (UNKNOWN)
                        </div>
                    </div>

                    <div class="retrain-option" style="margin-top: 1.5rem;">
                        <button class="btn btn-secondary" id="downloadTrainingDataBtn">
                            <span class="btn-text">Download Current Training Data as Template</span>
                            <span class="btn-icon">📥</span>
                        </button>
                    </div>

                    <div class="retrain-option">
                        <label class="option-label">Upload New Training Data (CSV)</label>
                        <input type="file" id="trainingDataFile" accept=".csv" class="file-input">
                        <p class="option-description">Optional: Upload new training data or leave empty to use existing data</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancelRetrainBtn">Cancel</button>
                <button class="btn btn-primary btn-large" id="startRetrainBtn">
                    <span class="btn-text">Start Retraining</span>
                    <span class="btn-icon">🚀</span>
                </button>
            </div>
        </div>
    </div>
    <div id="matchingModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Column Matching</h2>
                <span class="modal-close" id="closeMatchingModal">&times;</span>
            </div>
            <div class="modal-body">
                <p class="modal-description">
                    Map all 12 required fields from your file columns (fields marked with * are required):
                </p>
                <div class="column-mapping-container">
                    <div class="mapping-row">
                        <label class="field-label required">ra_deg</label>
                        <select class="column-select" data-field="ra_deg">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Right Ascension (degrees)</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label required">dec_deg</label>
                        <select class="column-select" data-field="dec_deg">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Declination (degrees)</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label required">mag</label>
                        <select class="column-select" data-field="mag">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Apparent magnitude</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label required">period_days</label>
                        <select class="column-select" data-field="period_days">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Orbital period (days)</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label required">duration_hrs</label>
                        <select class="column-select" data-field="duration_hrs">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Transit duration (hours)</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label required">depth_ppm</label>
                        <select class="column-select" data-field="depth_ppm">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Transit depth (parts per million)</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label required">period_err_up</label>
                        <select class="column-select" data-field="period_err_up">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Period upper error</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label required">period_err_low</label>
                        <select class="column-select" data-field="period_err_low">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Period lower error</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label required">duration_err_up</label>
                        <select class="column-select" data-field="duration_err_up">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Duration upper error</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label required">duration_err_low</label>
                        <select class="column-select" data-field="duration_err_low">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Duration lower error</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label required">depth_err_up</label>
                        <select class="column-select" data-field="depth_err_up">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Depth upper error</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label required">depth_err_low</label>
                        <select class="column-select" data-field="depth_err_low">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Depth lower error</span>
                    </div>
                </div>

                <div class="matching-summary">
                    <p id="matchingSummary">Please select columns for the required fields marked with *</p>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancelMatchingBtn">Cancel</button>
                <button class="btn btn-primary" id="confirmMatchingBtn" disabled>Import Data</button>
            </div>
        </div>
    </div>

    <script src="static/js/main.js"></script>
    <script src="static/js/dashboard.js"></script>
</body>
</html>
