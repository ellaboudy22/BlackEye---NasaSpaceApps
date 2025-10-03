<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>Model Dashboard - BlackEye</title>
    <link rel="stylesheet" href="static/css/main.css">
    <link rel="stylesheet" href="static/css/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main class="dashboard-main">
        <div class="container">
            <section class="dashboard-header">
                <h1 class="dashboard-title">Model Dashboard</h1>
                <p class="dashboard-subtitle">Monitor model performance and analyze exoplanet predictions</p>
            </section>

            <section class="data-visualization-section">
                <h2 class="section-title">Dataset & Model Analytics</h2>
                <div class="viz-grid">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Dataset Distribution</h3>
                        </div>
                        <div class="chart-container">
                            <canvas id="datasetDistributionChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Features vs Targets</h3>
                        </div>
                        <div class="chart-container">
                            <canvas id="featuresTargetsChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Model Accuracy by Type</h3>
                        </div>
                        <div class="chart-container">
                            <canvas id="modelAccuracyChart"></canvas>
                        </div>
                    </div>

                    <div class="chart-card">
                        <div class="chart-header">
                            <h3 class="chart-title">Performance Overview</h3>
                        </div>
                        <div class="chart-container">
                            <canvas id="performanceOverviewChart"></canvas>
                        </div>
                    </div>
                </div>
            </section>


            <section class="prediction-section">
                <div class="section-header">
                    <h2 class="section-title">Prediction Data</h2>
                    <div class="section-controls">
                        <button class="btn btn-secondary" id="addRowBtn">
                            <span class="btn-text">Add Row</span>
                            <span class="btn-icon">+</span>
                        </button>
                        <button class="btn btn-warning" id="deleteRowsBtn">
                            <span class="btn-text">Delete Selected</span>
                            <span class="btn-icon">🗑️</span>
                        </button>
                        <div class="file-upload-container">
                            <input type="file" id="fileInput" accept=".xlsx,.csv" style="display: none;">
                            <button class="btn btn-primary" id="uploadBtn">
                                <span class="btn-text">Upload File</span>
                                <span class="btn-icon">📁</span>
                            </button>
                            <button class="btn btn-success" id="downloadFutureTestBtn" title="Download future test data for validation">
                                <span class="btn-text">Download Future Test Data</span>
                                <span class="btn-icon">📥</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="table-container">
                    <table class="prediction-table" id="predictionTable">
                        <thead>
                            <tr>
                                <th class="checkbox-column">
                                    <input type="checkbox" id="selectAllRows" title="Select All">
                                </th>
                                <th class="ra-deg-column">ra_deg</th>
                                <th class="dec-deg-column">dec_deg</th>
                                <th class="mag-column">mag</th>
                                <th class="period-days-column">period_days</th>
                                <th class="duration-hrs-column">duration_hrs</th>
                                <th class="depth-ppm-column">depth_ppm</th>
                                <th class="period-err-up-column">period_err_up</th>
                                <th class="period-err-low-column">period_err_low</th>
                                <th class="duration-err-up-column">duration_err_up</th>
                                <th class="duration-err-low-column">duration_err_low</th>
                                <th class="depth-err-up-column">depth_err_up</th>
                                <th class="depth-err-low-column">depth_err_low</th>
                                <th class="actions-column">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <!-- Table rows will be added dynamically -->
                        </tbody>
                    </table>
                </div>

                <div class="predict-section">
                    <button class="btn btn-primary btn-predict" id="predictBtn">
                        <span class="btn-text">Predict Exoplanets</span>
                        <span class="btn-icon">🚀</span>
                        <span class="btn-loading" style="display: none;">
                            <div class="loading-spinner"></div>
                        </span>
                    </button>
                    <div class="predict-results" id="predictResults" style="display: none;">
                        <h3 class="results-title">Prediction Results</h3>
                        <div class="results-content" id="resultsContent"></div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>

    <div id="matchingModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Column Matching</h2>
                <span class="modal-close">&times;</span>
            </div>
            <div class="modal-body">
                <p class="modal-description">
                    Select which column from your file matches each required field:
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
                        <label class="field-label">period_err_up</label>
                        <select class="column-select" data-field="period_err_up">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Period upper error</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label">period_err_low</label>
                        <select class="column-select" data-field="period_err_low">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Period lower error</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label">duration_err_up</label>
                        <select class="column-select" data-field="duration_err_up">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Duration upper error</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label">duration_err_low</label>
                        <select class="column-select" data-field="duration_err_low">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Duration lower error</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label">depth_err_up</label>
                        <select class="column-select" data-field="depth_err_up">
                            <option value="">-- Select Column --</option>
                        </select>
                        <span class="field-description">Depth upper error</span>
                    </div>

                    <div class="mapping-row">
                        <label class="field-label">depth_err_low</label>
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
