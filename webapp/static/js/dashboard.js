
const API_BASE_URL = 'https://api.blackeye.site';

let currentFileData = null;
let fileColumns = [];
let columnMappings = {};
let chartInstances = {
    datasetDistribution: null,
    featuresTargets: null,
    modelAccuracy: null,
    performanceOverview: null
};

document.addEventListener('DOMContentLoaded', function() {
    initDataVisualization();
    setupEventListeners();
    initTable();
    initFileUpload();
    initModal();
});
async function initDataVisualization() {
    try {
        const response = await fetch(`${API_BASE_URL}/model/info`);
        const modelInfo = await response.json();

        initDatasetDistributionChart(modelInfo);
        initFeaturesTargetsChart(modelInfo);
        initModelAccuracyChart(modelInfo);
        initPerformanceOverviewChart(modelInfo);

    } catch (error) {
        console.error('Failed to load model info for charts:', error);
    }
}

function initDatasetDistributionChart(modelInfo) {
    if (chartInstances.datasetDistribution) {
        chartInstances.datasetDistribution.destroy();
    }
    
    const ctx = document.getElementById('datasetDistributionChart').getContext('2d');
    const totalSamples = modelInfo?.dataset?.samples || 1000;
    const labels = ['CONFIRMED', 'CANDIDATE', 'FALSE POSITIVE'];
    const data = [
        Math.round(totalSamples * 0.4),   // 40% confirmed
        Math.round(totalSamples * 0.35),  // 35% candidates
        Math.round(totalSamples * 0.25)   // 25% false positives
    ];

    chartInstances.datasetDistribution = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: [
                    '#10b981', // Green for CONFIRMED
                    '#f59e0b', // Yellow for CANDIDATE
                    '#ef4444', // Red for FALSE POSITIVE
                ],
                borderWidth: 2,
                borderColor: '#1f2937'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#e5e7eb',
                        padding: 20
                    }
                },
                title: {
                    display: true,
                    text: `Total: ${totalSamples.toLocaleString()} samples`,
                    color: '#e5e7eb'
                }
            }
        }
    });
}

function initFeaturesTargetsChart(modelInfo) {
    if (chartInstances.featuresTargets) {
        chartInstances.featuresTargets.destroy();
    }
    
    const ctx = document.getElementById('featuresTargetsChart').getContext('2d');
    const rawFeatures = modelInfo?.features?.raw?.length || 0;
    const engFeatures = modelInfo?.features?.engineered?.length || 0;
    const totalTargets = (modelInfo?.targets?.planet?.length || 0) +
                        (modelInfo?.targets?.stellar?.length || 0) +
                        (modelInfo?.targets?.quality?.length || 0) + 1; // +1 for classification

    chartInstances.featuresTargets = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Raw Features', 'Engineered Features', 'Target Variables'],
            datasets: [{
                data: [rawFeatures, engFeatures, totalTargets],
                backgroundColor: [
                    '#14b8a6', // Teal
                    '#f59e0b', // Yellow
                    '#ef4444', // Red
                ],
                borderWidth: 2,
                borderColor: '#1f2937'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#e5e7eb',
                        padding: 20
                    }
                },
                title: {
                    display: true,
                    text: `Total: ${rawFeatures + engFeatures + totalTargets} variables`,
                    color: '#e5e7eb'
                }
            }
        }
    });
}

function initModelAccuracyChart(modelInfo) {
    if (chartInstances.modelAccuracy) {
        chartInstances.modelAccuracy.destroy();
    }
    
    const ctx = document.getElementById('modelAccuracyChart').getContext('2d');
    const classificationAcc = (modelInfo?.performance?.classification || 0) * 100;
    const planetScores = modelInfo?.performance?.planet || {};
    const stellarScores = modelInfo?.performance?.stellar || {};
    const qualityScores = modelInfo?.performance?.quality || {};
    const avgPlanetScore = Object.keys(planetScores).length > 0 ?
        (Object.values(planetScores).reduce((a, b) => a + ((b?.r2 || b) || 0), 0) / Object.keys(planetScores).length) * 100 : 0;
    const avgStellarScore = Object.keys(stellarScores).length > 0 ?
        (Object.values(stellarScores).reduce((a, b) => a + ((b?.r2 || b) || 0), 0) / Object.keys(stellarScores).length) * 100 : 0;
    const avgQualityScore = Object.keys(qualityScores).length > 0 ?
        (Object.values(qualityScores).reduce((a, b) => a + ((b?.r2 || b) || 0), 0) / Object.keys(qualityScores).length) * 100 : 0;

    chartInstances.modelAccuracy = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Classification', 'Planet Models', 'Stellar Models', 'Quality Models'],
            datasets: [{
                data: [classificationAcc, avgPlanetScore, avgStellarScore, avgQualityScore],
                backgroundColor: [
                    '#6b46c1', // Purple
                    '#3b82f6', // Blue
                    '#10b981', // Green
                    '#f59e0b', // Yellow
                ],
                borderWidth: 1,
                borderColor: '#1f2937'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    grid: {
                        color: 'rgba(107, 70, 193, 0.1)'
                    },
                    ticks: {
                        color: '#e5e7eb',
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                },
                x: {
                    grid: {
                        color: 'rgba(107, 70, 193, 0.1)'
                    },
                    ticks: {
                        color: '#e5e7eb'
                    }
                }
            }
        }
    });
}

function initPerformanceOverviewChart(modelInfo) {
    if (chartInstances.performanceOverview) {
        chartInstances.performanceOverview.destroy();
    }
    
    const ctx = document.getElementById('performanceOverviewChart').getContext('2d');
    const accuracy = (modelInfo?.performance?.classification || 0) * 100;
    const completeness = parseFloat(modelInfo?.dataset?.completeness?.replace('%', '') || '0');
    const modelStatus = modelInfo?.model?.status === 'trained' ? 100 : 0;
    const featureCount = ((modelInfo?.model?.features || 0) / 20) * 100;

    chartInstances.performanceOverview = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['Model Accuracy', 'Data Completeness', 'Training Status', 'Feature Richness'],
            datasets: [{
                label: 'Performance Metrics',
                data: [accuracy, completeness, modelStatus, Math.min(featureCount, 100)],
                borderColor: '#14b8a6',
                backgroundColor: 'rgba(20, 184, 166, 0.2)',
                borderWidth: 2,
                pointBackgroundColor: '#14b8a6',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                r: {
                    beginAtZero: true,
                    max: 100,
                    grid: {
                        color: 'rgba(107, 70, 193, 0.1)'
                    },
                    pointLabels: {
                        color: '#e5e7eb',
                        font: {
                            size: 11
                        }
                    },
                    ticks: {
                        color: '#e5e7eb',
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                }
            }
        }
    });
}

function initTable() {
    const addRowBtn = document.getElementById('addRowBtn');
    const deleteRowsBtn = document.getElementById('deleteRowsBtn');
    const selectAllRows = document.getElementById('selectAllRows');
    const tableBody = document.getElementById('tableBody');

    addTableRow();

    addRowBtn.addEventListener('click', function() {
        addTableRow();
    });

    deleteRowsBtn.addEventListener('click', function() {
        deleteSelectedRows();
    });

    selectAllRows.addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.row-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });
}

function addTableRow(data = {}) {
    const tableBody = document.getElementById('tableBody');

    const row = document.createElement('tr');
    row.innerHTML = `
        <td><input type="checkbox" class="row-checkbox"></td>
        <td><input type="number" step="0.0001" value="${data.ra_deg || ''}" placeholder="0.0000"></td>
        <td><input type="number" step="0.0001" value="${data.dec_deg || ''}" placeholder="0.0000"></td>
        <td><input type="number" step="0.01" value="${data.mag || ''}" placeholder="0.00"></td>
        <td><input type="number" step="0.001" value="${data.period_days || ''}" placeholder="0.000"></td>
        <td><input type="number" step="0.1" value="${data.duration_hrs || ''}" placeholder="0.0"></td>
        <td><input type="number" step="0.1" value="${data.depth_ppm || ''}" placeholder="0.0"></td>
        <td><input type="number" step="0.001" value="${data.period_err_up || ''}" placeholder="0.000"></td>
        <td><input type="number" step="0.001" value="${data.period_err_low || ''}" placeholder="0.000"></td>
        <td><input type="number" step="0.1" value="${data.duration_err_up || ''}" placeholder="0.0"></td>
        <td><input type="number" step="0.1" value="${data.duration_err_low || ''}" placeholder="0.0"></td>
        <td><input type="number" step="0.1" value="${data.depth_err_up || ''}" placeholder="0.0"></td>
        <td><input type="number" step="0.1" value="${data.depth_err_low || ''}" placeholder="0.0"></td>
        <td>
            <button class="delete-row-btn" onclick="deleteTableRow(this)">
                Delete
            </button>
        </td>
    `;
    
    tableBody.appendChild(row);
}

function deleteTableRow(button) {
    const row = button.closest('tr');
    const tableBody = document.getElementById('tableBody');
    
    if (tableBody.children.length > 1) {
        row.remove();
    }
}

function deleteSelectedRows() {
    const checkboxes = document.querySelectorAll('.row-checkbox:checked');
    const tableBody = document.getElementById('tableBody');

    if (checkboxes.length >= tableBody.children.length) {
        alert('Cannot delete all rows. At least one row must remain.');
        return;
    }
    
    if (checkboxes.length === 0) {
        alert('Please select rows to delete.');
        return;
    }
    
    if (confirm(`Are you sure you want to delete ${checkboxes.length} selected row(s)?`)) {
        checkboxes.forEach(checkbox => {
            const row = checkbox.closest('tr');
            row.remove();
        });
        
        document.getElementById('selectAllRows').checked = false;
    }
}

function initFileUpload() {
    const uploadBtn = document.getElementById('uploadBtn');
    const fileInput = document.getElementById('fileInput');

    uploadBtn.addEventListener('click', function() {
        fileInput.click();
    });

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            handleFileUpload(file);
        }
    });

    const downloadFutureTestBtn = document.getElementById('downloadFutureTestBtn');
    if (downloadFutureTestBtn) {
        downloadFutureTestBtn.addEventListener('click', function() {
            downloadFutureTestData();
        });
    }
}

function downloadFutureTestData() {
    try {
        const downloadUrl = `${API_BASE_URL}/download/future-test-data`;

        const link = document.createElement('a');
        link.href = downloadUrl;
        link.download = 'future_test_data_ground_truth_only.csv';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        showSuccessNotification('Future test data download started! This file contains ground truth only - no predictions.');
    } catch (error) {
        console.error('Error downloading future test data:', error);
        alert('Error downloading future test data. Please try again.');
    }
}

function handleFileUpload(file) {
    const fileName = file.name;
    const fileExtension = fileName.split('.').pop().toLowerCase();


    if (fileExtension === 'csv') {
        handleCSVFile(file);
    } else if (fileExtension === 'xlsx') {
        handleExcelFile(file);
    } else {
        alert('Please upload a CSV or Excel (.xlsx) file');
        return;
    }
}

function handleCSVFile(file) {
    showFileProcessingProgress(file.name, 0);

    const reader = new FileReader();
    reader.onload = function(e) {
        try {
            showFileProcessingProgress(file.name, 30);

            setTimeout(() => {
                processCSVData(e.target.result, file);
            }, 10);
        } catch (error) {
            console.error('Error processing CSV:', error);
            hideFileProcessingProgress();
            alert('Error reading CSV file. Please ensure it is properly formatted.');
        }
    };

    reader.onprogress = function(e) {
        if (e.lengthComputable) {
            const progress = Math.round((e.loaded / e.total) * 30);
            showFileProcessingProgress(file.name, progress);
        }
    };

    reader.readAsText(file);
}

function processCSVData(csvText, file) {
    const lines = csvText.split('\n').filter(line => line.trim() !== '');

    if (lines.length < 2) {
        hideFileProcessingProgress();
        alert('CSV file must have at least a header row and one data row');
        return;
    }

    const headers = lines[0].split(',').map(h => h.trim().replace(/"/g, ''));
    showFileProcessingProgress(file.name, 50);

    processRowsInChunks(lines.slice(1), headers, file, 0, csvText);
}

function processRowsInChunks(lines, headers, file, startIndex, csvText) {
    const CHUNK_SIZE = 1000; // Process 1000 rows at a time
    const endIndex = Math.min(startIndex + CHUNK_SIZE, lines.length);
    const chunk = lines.slice(startIndex, endIndex);

    const processedChunk = chunk.map(line => line.split(',').map(cell => cell.trim().replace(/"/g, '')));

    if (!currentFileData) {
        currentFileData = {
            type: 'csv',
            file: file,
            headers: headers,
            data: processedChunk,
            rawData: csvText
        };
    } else {
        currentFileData.data = currentFileData.data.concat(processedChunk);
    }

    const progress = 50 + Math.round((endIndex / lines.length) * 50);
    showFileProcessingProgress(file.name, progress);

    if (endIndex < lines.length) {
        setTimeout(() => {
            processRowsInChunks(lines, headers, file, endIndex, csvText);
        }, 10);
    } else {
        hideFileProcessingProgress();
        showMatchingModal(headers, file);
    }
}

function handleExcelFile(file) {
    showFileProcessingProgress(file.name, 0);

    const reader = new FileReader();
    reader.onload = function(e) {
        try {
            showFileProcessingProgress(file.name, 50);

            const data = new Uint8Array(e.target.result);
            const workbook = XLSX.read(data, { type: 'array' });
            const firstSheetName = workbook.SheetNames[0];
            const worksheet = workbook.Sheets[firstSheetName];

            const range = XLSX.utils.decode_range(worksheet['!ref']);
            const headers = [];

            for (let col = range.s.c; col <= range.e.c; col++) {
                const cellRef = XLSX.utils.encode_cell({ r: 0, c: col });
                const cell = worksheet[cellRef];
                headers.push(cell ? String(cell.v).trim() : `Column ${col + 1}`);
            }

            currentFileData = {
                type: 'xlsx',
                file: file,
                headers: headers,
                workbook: workbook,
                worksheet: worksheet,
                totalRows: range.e.r
            };

            hideFileProcessingProgress();
            showMatchingModal(headers, file);
        } catch (error) {
            console.error('Error processing Excel:', error);
            hideFileProcessingProgress();
            alert('Error reading Excel file. Please ensure it is properly formatted.');
        }
    };

    reader.onprogress = function(e) {
        if (e.lengthComputable) {
            const progress = Math.round((e.loaded / e.total) * 50);
            showFileProcessingProgress(file.name, progress);
        }
    };

    reader.readAsArrayBuffer(file);
}

function initModal() {
    const modal = document.getElementById('matchingModal');
    const closeBtn = document.getElementById('closeMatchingModal');
    const cancelBtn = document.getElementById('cancelMatchingBtn');
    const confirmBtn = document.getElementById('confirmMatchingBtn');

    if (closeBtn) {
        closeBtn.addEventListener('click', closeModal);
    }
    cancelBtn.addEventListener('click', closeModal);
    
    window.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    confirmBtn.addEventListener('click', function() {
        confirmColumnMatching();
    });
}

function showMatchingModal(fileHeaders, file) {
    const modal = document.getElementById('matchingModal');

    columnMappings = {};
    fileColumns = fileHeaders;

    const selects = modal.querySelectorAll('.column-select');
    selects.forEach(select => {
        while (select.children.length > 1) {
            select.removeChild(select.lastChild);
        }

        fileHeaders.forEach((header, index) => {
            const option = document.createElement('option');
            option.value = index;
            option.textContent = header;
            select.appendChild(option);
        });

        const fieldName = select.getAttribute('data-field');
        const bestMatch = findBestColumnMatch(fieldName, fileHeaders);
        if (bestMatch !== null) {
            select.value = bestMatch;
            columnMappings[fieldName] = bestMatch;
            select.classList.add('auto-matched');
        }
    });

    selects.forEach(select => {
        select.addEventListener('change', function() {
            handleDropdownChange(this);
        });
    });

    updateMatchingSummary();

    modal.style.display = 'block';
    setTimeout(() => {
        modal.classList.add('show');
    }, 10);
}

function findBestColumnMatch(targetField, fileHeaders) {
    let bestMatchIndex = null;
    let bestScore = 0;

    fileHeaders.forEach((header, index) => {
        const normalizedHeader = header.toLowerCase().replace(/[^a-z0-9]/g, '');
        const normalizedTarget = targetField.toLowerCase().replace(/[^a-z0-9]/g, '');

        let score = 0;
        if (normalizedHeader === normalizedTarget) {
            score = 1.0;
        } else if (normalizedHeader.includes(normalizedTarget) || normalizedTarget.includes(normalizedHeader)) {
            score = 0.9;
        } else {
            score = calculateSimilarity(normalizedHeader, normalizedTarget);
        }

        if (score < 0.8) {
            score = checkSpecialMatches(targetField, header);
        }

        if (score > bestScore && score > 0.7) {
            bestScore = score;
            bestMatchIndex = index;
        }
    });

    return bestMatchIndex;
}

function checkSpecialMatches(targetField, headerName) {
    const target = targetField.toLowerCase();
    const header = headerName.toLowerCase();

    const specialMatches = {
        'ra_deg': ['ra', 'right_ascension', 'rightascension', 'alpha'],
        'dec_deg': ['dec', 'declination', 'delta'],
        'mag': ['magnitude', 'brightness', 'flux', 'kepmag', 'kmag'],
        'period_days': ['period', 'orbital_period', 'p_orbital', 'porbital'],
        'duration_hrs': ['duration', 'transit_duration', 'tdur', 't_dur'],
        'depth_ppm': ['depth', 'transit_depth', 'tdepth', 't_depth'],
        'period_err_up': ['period_err', 'period_error', 'period_upper'],
        'period_err_low': ['period_err', 'period_error', 'period_lower'],
        'duration_err_up': ['duration_err', 'duration_error', 'duration_upper'],
        'duration_err_low': ['duration_err', 'duration_error', 'duration_lower'],
        'depth_err_up': ['depth_err', 'depth_error', 'depth_upper'],
        'depth_err_low': ['depth_err', 'depth_error', 'depth_lower']
    };

    const variations = specialMatches[target] || [];
    for (const variation of variations) {
        if (header.includes(variation) || variation.includes(header)) {
            return 0.8;
        }
    }

    return 0;
}

function calculateSimilarity(str1, str2) {
    const longer = str1.length > str2.length ? str1 : str2;
    const shorter = str1.length > str2.length ? str2 : str1;

    if (longer.length === 0) return 1.0;

    const distance = levenshteinDistance(longer, shorter);
    return (longer.length - distance) / longer.length;
}

function levenshteinDistance(str1, str2) {
    const matrix = [];

    for (let i = 0; i <= str2.length; i++) {
        matrix[i] = [i];
    }

    for (let j = 0; j <= str1.length; j++) {
        matrix[0][j] = j;
    }

    for (let i = 1; i <= str2.length; i++) {
        for (let j = 1; j <= str1.length; j++) {
            if (str2.charAt(i - 1) === str1.charAt(j - 1)) {
                matrix[i][j] = matrix[i - 1][j - 1];
            } else {
                matrix[i][j] = Math.min(
                    matrix[i - 1][j - 1] + 1,
                    matrix[i][j - 1] + 1,
                    matrix[i - 1][j] + 1
                );
            }
        }
    }

    return matrix[str2.length][str1.length];
}

function handleDropdownChange(selectElement) {
    const fieldName = selectElement.getAttribute('data-field');
    const selectedIndex = selectElement.value;

    if (selectedIndex === '') {
        delete columnMappings[fieldName];
        selectElement.classList.remove('mapped', 'auto-matched');
    } else {
        columnMappings[fieldName] = parseInt(selectedIndex);
        selectElement.classList.add('mapped');
    }

    updateMatchingSummary();

}

function updateMatchingSummary() {
    const requiredFields = [
        'ra_deg', 'dec_deg', 'mag', 'period_days', 'duration_hrs', 'depth_ppm',
        'period_err_up', 'period_err_low', 'duration_err_up', 'duration_err_low',
        'depth_err_up', 'depth_err_low'
    ];
    const mappedRequired = requiredFields.filter(field => columnMappings.hasOwnProperty(field) && columnMappings[field] !== '');

    const summaryElement = document.getElementById('matchingSummary');
    const confirmButton = document.getElementById('confirmMatchingBtn');

    const allRequiredMapped = mappedRequired.length === requiredFields.length;

    if (allRequiredMapped) {
        summaryElement.innerHTML = `
            <span class="summary-success">✓ All required fields mapped (${mappedRequired.length}/12)</span><br>
            <span class="summary-ready">Ready to import ${currentFileData ? currentFileData.totalRows : 0} rows</span>
        `;
        summaryElement.className = 'matching-summary success';
        confirmButton.disabled = false;
    } else {
        const missingCount = requiredFields.length - mappedRequired.length;
        summaryElement.innerHTML = `
            <span class="summary-warning">⚠ ${missingCount} required field${missingCount > 1 ? 's' : ''} still need${missingCount === 1 ? 's' : ''} to be mapped</span><br>
            <span class="summary-progress">Progress: ${mappedRequired.length}/${requiredFields.length} required fields</span>
        `;
        summaryElement.className = 'matching-summary warning';
        confirmButton.disabled = true;
    }
}

function closeModal() {
    const modal = document.getElementById('matchingModal');

    modal.classList.remove('show');

    setTimeout(() => {
        modal.style.display = 'none';
    }, 300);

    document.getElementById('fileInput').value = '';

    columnMappings = {};
    fileColumns = [];
}

async function confirmColumnMatching() {
    if (!currentFileData) {
        alert('No file data available');
        return;
    }

    const requiredColumns = [
        'ra_deg', 'dec_deg', 'mag', 'period_days', 'duration_hrs', 'depth_ppm',
        'period_err_up', 'period_err_low', 'duration_err_up', 'duration_err_low',
        'depth_err_up', 'depth_err_low'
    ];
    const mappedColumns = Object.keys(columnMappings);
    const missingRequired = requiredColumns.filter(col => !mappedColumns.includes(col));

    if (missingRequired.length > 0) {
        alert(`All 12 fields are required. Missing: ${missingRequired.join(', ')}`);
        return;
    }

    try {
        const confirmButton = document.getElementById('confirmMatchingBtn');
        const originalText = confirmButton.textContent;
        confirmButton.disabled = true;
        confirmButton.textContent = 'Processing...';

        const processedData = await processFileDataWithMappings();

        if (processedData.length === 0) {
            alert('No valid data rows found');
            confirmButton.disabled = false;
            confirmButton.textContent = originalText;
            return;
        }

        clearTable();

        await populateTableFromDataAsync(processedData);

        const successMsg = `Successfully imported ${processedData.length} rows with ${Object.keys(columnMappings).length} mapped columns`;

        showSuccessNotification(successMsg);

        closeModal();


        confirmButton.disabled = false;
        confirmButton.textContent = originalText;

    } catch (error) {
        console.error('Error processing file data:', error);
        alert(`Error processing file data: ${error.message}`);

        const confirmButton = document.getElementById('confirmMatchingBtn');
        confirmButton.disabled = false;
        confirmButton.textContent = 'Import Data';
    }
}

function populateTableFromDataAsync(data) {
    return new Promise((resolve) => {
        const tableBody = document.getElementById('tableBody');
        showFileProcessingProgress('Populating table...', 0);

        populateTableInChunksAsync(data, tableBody, 0, resolve);
    });
}

function populateTableInChunksAsync(data, tableBody, startIndex, resolve) {
    const CHUNK_SIZE = 50; // Add 50 rows at a time
    const endIndex = Math.min(startIndex + CHUNK_SIZE, data.length);
    const chunk = data.slice(startIndex, endIndex);

    const fragment = document.createDocumentFragment();

    chunk.forEach((row, index) => {
        const tr = document.createElement('tr');

        const checkboxTd = document.createElement('td');
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.className = 'row-checkbox';
        checkboxTd.appendChild(checkbox);
        tr.appendChild(checkboxTd);

        const columns = [
            'ra_deg', 'dec_deg', 'mag', 'period_days', 'duration_hrs', 'depth_ppm',
            'period_err_up', 'period_err_low', 'duration_err_up', 'duration_err_low',
            'depth_err_up', 'depth_err_low'
        ];

        columns.forEach(column => {
            const td = document.createElement('td');
            const input = document.createElement('input');
            input.type = 'number';
            input.step = 'any';
            input.value = row[column] || 0;
            input.className = 'table-input';
            td.appendChild(input);
            tr.appendChild(td);
        });

        const actionsTd = document.createElement('td');
        const deleteBtn = document.createElement('button');
        deleteBtn.innerHTML = '🗑️';
        deleteBtn.className = 'btn btn-sm btn-danger';
        deleteBtn.title = 'Delete row';
        deleteBtn.onclick = function() {
            tr.remove();
        };
        actionsTd.appendChild(deleteBtn);
        tr.appendChild(actionsTd);

        fragment.appendChild(tr);
    });

    tableBody.appendChild(fragment);

    const progress = Math.round((endIndex / data.length) * 100);
    showFileProcessingProgress('Populating table...', progress);

    if (endIndex < data.length) {
        setTimeout(() => {
            populateTableInChunksAsync(data, tableBody, endIndex, resolve);
        }, 10);
    } else {
        hideFileProcessingProgress();
        resolve();
    }
}

function showSuccessNotification(message) {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.9), rgba(5, 150, 105, 0.9));
        color: white;
        padding: 1rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        z-index: 3000;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(16, 185, 129, 0.5);
        max-width: 500px;
        text-align: center;
    `;
    notification.textContent = '✅ ' + message;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.remove();
    }, 4000);
}

function processFileDataWithMappings() {
    if (!currentFileData) {
        return Promise.resolve([]);
    }

    return new Promise((resolve, reject) => {
        showFileProcessingProgress('Processing file data...', 0);

        if (currentFileData.type === 'csv') {
            processCSVDataWithMappings(resolve);
        } else if (currentFileData.type === 'xlsx') {
            processExcelDataWithMappings(resolve);
        } else {
            resolve([]);
        }
    });
}

function parseCSVLine(line) {
    const result = [];
    let current = '';
    let inQuotes = false;

    for (let i = 0; i < line.length; i++) {
        const char = line[i];

        if (char === '"') {
            inQuotes = !inQuotes;
        } else if (char === ',' && !inQuotes) {
            result.push(current.trim());
            current = '';
        } else {
            current += char;
        }
    }

    result.push(current.trim());
    return result;
}

function processCSVDataWithMappings(resolve) {
    if (!currentFileData.rawData) {
        console.error('Raw CSV data not available');
        resolve([]);
        return;
    }

    const lines = currentFileData.rawData.split('\n').filter(line => line.trim() !== '');
    const dataLines = lines.slice(1); // Skip header

    const processedRows = [];
    const expectedColumns = [
        'ra_deg', 'dec_deg', 'mag', 'period_days', 'duration_hrs', 'depth_ppm',
        'period_err_up', 'period_err_low', 'duration_err_up', 'duration_err_low',
        'depth_err_up', 'depth_err_low'
    ];

    processCSVRowsInChunks(dataLines, expectedColumns, processedRows, 0, resolve);
}

function processExcelDataWithMappings(resolve) {
    if (!currentFileData.worksheet) {
        console.error('Excel worksheet not available');
        resolve([]);
        return;
    }

    const worksheet = currentFileData.worksheet;
    const range = XLSX.utils.decode_range(worksheet['!ref']);
    const processedRows = [];
    const expectedColumns = [
        'ra_deg', 'dec_deg', 'mag', 'period_days', 'duration_hrs', 'depth_ppm',
        'period_err_up', 'period_err_low', 'duration_err_up', 'duration_err_low',
        'depth_err_up', 'depth_err_low'
    ];

    processExcelRowsInChunks(worksheet, range, expectedColumns, processedRows, 1, resolve);
}

function processCSVRowsInChunks(dataLines, expectedColumns, processedRows, startIndex, resolve) {
    const CHUNK_SIZE = 500;
    const endIndex = Math.min(startIndex + CHUNK_SIZE, dataLines.length);
    const chunk = dataLines.slice(startIndex, endIndex);

    chunk.forEach(line => {
        const rowData = parseCSVLine(line);
        const processedRow = {};
        let hasValidData = false;

        expectedColumns.forEach(column => {
            if (columnMappings.hasOwnProperty(column)) {
                const fileColumnIndex = columnMappings[column];
                const rawValue = rowData[fileColumnIndex] || '';

                const cleanValue = String(rawValue).trim();
                const numValue = parseFloat(cleanValue);
                processedRow[column] = !isNaN(numValue) && cleanValue !== '' ? numValue : 0;

                if (cleanValue !== '' && cleanValue !== '0') {
                    hasValidData = true;
                }
            } else {
                processedRow[column] = 0;
            }
        });

        if (hasValidData) {
            processedRows.push(processedRow);
        }
    });

    const progress = Math.round((endIndex / dataLines.length) * 100);
    showFileProcessingProgress('Processing data...', progress);

    if (endIndex < dataLines.length) {
        setTimeout(() => {
            processCSVRowsInChunks(dataLines, expectedColumns, processedRows, endIndex, resolve);
        }, 10);
    } else {
        hideFileProcessingProgress();
        resolve(processedRows);
    }
}

function processExcelRowsInChunks(worksheet, range, expectedColumns, processedRows, startRow, resolve) {
    const CHUNK_SIZE = 500;
    const endRow = Math.min(startRow + CHUNK_SIZE, range.e.r + 1);

    for (let row = startRow; row < endRow; row++) {
        const processedRow = {};
        let hasValidData = false;

        expectedColumns.forEach(column => {
            if (columnMappings.hasOwnProperty(column)) {
                const fileColumnIndex = columnMappings[column];
                const cellRef = XLSX.utils.encode_cell({ r: row, c: fileColumnIndex });
                const cell = worksheet[cellRef];
                const rawValue = cell ? cell.v : '';

                const numValue = Number(rawValue);
                processedRow[column] = !isNaN(numValue) && rawValue !== '' ? numValue : 0;

                if (rawValue !== '' && rawValue !== 0) {
                    hasValidData = true;
                }
            } else {
                processedRow[column] = 0;
            }
        });

        if (hasValidData) {
            processedRows.push(processedRow);
        }
    }

    const progress = Math.round(((endRow - 1) / (range.e.r)) * 100);
    showFileProcessingProgress('Processing data...', progress);

    if (endRow <= range.e.r) {
        setTimeout(() => {
            processExcelRowsInChunks(worksheet, range, expectedColumns, processedRows, endRow, resolve);
        }, 10);
    } else {
        hideFileProcessingProgress();
        resolve(processedRows);
    }
}

function clearTable() {
    const tableBody = document.getElementById('tableBody');
    tableBody.innerHTML = '';
}

function showFileProcessingProgress(fileName, progress) {
    let progressContainer = document.getElementById('fileProgressContainer');

    if (!progressContainer) {

        progressContainer = document.createElement('div');
        progressContainer.id = 'fileProgressContainer';
        progressContainer.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(17, 24, 39, 0.95);
            border: 2px solid var(--nebula-purple);
            border-radius: 8px;
            padding: 1rem;
            z-index: 2000;
            min-width: 300px;
            backdrop-filter: blur(10px);
        `;

        progressContainer.innerHTML = `
            <div style="color: var(--star-white); font-weight: 600; margin-bottom: 0.5rem;">
                <span id="progressFileName">Processing...</span>
            </div>
            <div style="background: rgba(107, 70, 193, 0.2); border-radius: 4px; height: 8px; overflow: hidden;">
                <div id="progressBar" style="background: var(--nebula-purple); height: 100%; width: 0%; transition: width 0.3s ease;"></div>
            </div>
            <div style="color: var(--star-gray); font-size: 0.8rem; margin-top: 0.5rem;">
                <span id="progressText">0%</span>
            </div>
        `;

        document.body.appendChild(progressContainer);
    }
    const fileNameEl = document.getElementById('progressFileName');
    const progressBar = document.getElementById('progressBar');
    const progressText = document.getElementById('progressText');

    if (fileNameEl) fileNameEl.textContent = fileName;
    if (progressBar) progressBar.style.width = progress + '%';
    if (progressText) progressText.textContent = progress + '%';
}


function hideFileProcessingProgress() {
    const progressContainer = document.getElementById('fileProgressContainer');
    if (progressContainer) {
        progressContainer.remove();
    }
}

function setupEventListeners() {
    const predictBtn = document.getElementById('predictBtn');
    if (predictBtn) {
        predictBtn.addEventListener('click', async () => {
            await handlePrediction();
        });
    }
}
async function handlePrediction() {
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody.querySelectorAll('tr');

    if (rows.length === 0) {
        alert('Please add some data to the table first');
        return;
    }

    const predictBtn = document.getElementById('predictBtn');
    const btnText = predictBtn.querySelector('.btn-text');
    const btnLoading = predictBtn.querySelector('.btn-loading');
    predictBtn.disabled = true;
    btnText.style.display = 'none';
    btnLoading.style.display = 'inline-block';

    try {
        const data = [];
        rows.forEach(row => {
            const inputs = row.querySelectorAll('input[type="number"]');
            if (inputs.length >= 12) {
                const rowData = {
                    ra_deg: parseFloat(inputs[0].value) || 0,
                    dec_deg: parseFloat(inputs[1].value) || 0,
                    mag: parseFloat(inputs[2].value) || 0,
                    period_days: parseFloat(inputs[3].value) || 0,
                    duration_hrs: parseFloat(inputs[4].value) || 0,
                    depth_ppm: parseFloat(inputs[5].value) || 0,
                    period_err_up: parseFloat(inputs[6].value) || 0,
                    period_err_low: parseFloat(inputs[7].value) || 0,
                    duration_err_up: parseFloat(inputs[8].value) || 0,
                    duration_err_low: parseFloat(inputs[9].value) || 0,
                    depth_err_up: parseFloat(inputs[10].value) || 0,
                    depth_err_low: parseFloat(inputs[11].value) || 0
                };
                if (rowData.ra_deg !== 0 || rowData.dec_deg !== 0 || rowData.period_days !== 0) {
                    data.push(rowData);
                }
            }
        });
        const csvContent = convertToCSV(data);
        const blob = new Blob([csvContent], { type: 'text/csv' });
        const file = new File([blob], 'prediction_data.csv', { type: 'text/csv' });
        const formData = new FormData();
        formData.append('file', file);

        const response = await fetch(`${API_BASE_URL}/predict`, {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            const blob = await response.blob();
            const text = await blob.text();
            let confidenceByTarget = {};

            try {
                const lines = text.split('\n').filter(line => !line.startsWith('#') && line.trim());
                if (lines.length > 1) {
                    const headers = lines[0].split(',').map(h => h.trim());
                    const confidenceColumns = {};
                    headers.forEach((header, index) => {
                        if (header.startsWith('confidence_')) {
                            const target = header.replace('confidence_', '');
                            confidenceColumns[target] = index;
                        }
                    });
                    Object.keys(confidenceColumns).forEach(target => {
                        const colIndex = confidenceColumns[target];
                        const values = [];

                        for (let i = 1; i < lines.length; i++) {
                            const row = lines[i].split(',');
                            if (row[colIndex]) {
                                const conf = parseFloat(row[colIndex]);
                                if (!isNaN(conf)) {
                                    values.push(conf);
                                }
                            }
                        }

                        if (values.length > 0) {
                            confidenceByTarget[target] = values.reduce((a, b) => a + b, 0) / values.length;
                        }
                    });
                }
            } catch (e) {
                console.error('Error parsing confidence:', e);
            }
            const downloadBlob = new Blob([text], { type: 'text/csv' });
            const url = window.URL.createObjectURL(downloadBlob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'predictions_result.csv';
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            document.body.removeChild(a);

            showPredictionResults('Predictions completed successfully! Check your downloads folder.', false, confidenceByTarget);
        } else {
            throw new Error(`Prediction failed: ${response.statusText}`);
        }

    } catch (error) {
        console.error('Prediction error:', error);
        showPredictionResults(`Error: ${error.message}`, true);
    } finally {
        predictBtn.disabled = false;
        btnText.style.display = 'inline-block';
        btnLoading.style.display = 'none';
    }
}

function convertToCSV(data) {
    if (data.length === 0) return '';

    const headers = Object.keys(data[0]);
    const csvRows = [headers.join(',')];

    data.forEach(row => {
        const values = headers.map(header => row[header] || 0);
        csvRows.push(values.join(','));
    });

    return csvRows.join('\n');
}

function showPredictionResults(message, isError = false, confidenceByTarget = null) {
    const resultsDiv = document.getElementById('predictResults');
    const contentDiv = document.getElementById('resultsContent');

    let confidenceDisplay = '';
    if (confidenceByTarget && Object.keys(confidenceByTarget).length > 0 && !isError) {
        const targetNames = {
            'disposition': 'Classification',
            'eq_temp_k': 'Equilibrium Temperature',
            'insolation_earth': 'Insolation Flux',
            'stellar_temp_k': 'Stellar Temperature',
            'stellar_logg': 'Stellar Surface Gravity',
            'stellar_radius_sun': 'Stellar Radius',
            'depth_snr': 'Transit Depth SNR'
        };

        const confidenceBars = Object.entries(confidenceByTarget)
            .map(([target, confidence]) => {
                const confidencePercent = (confidence * 100).toFixed(1);
                const confidenceColor = confidence >= 0.7 ? '#10b981' : confidence >= 0.5 ? '#f59e0b' : '#ef4444';
                const displayName = targetNames[target] || target.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());

                return `
                    <div style="margin-bottom: 0.75rem;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.25rem;">
                            <span style="color: #e5e7eb; font-size: 0.9rem; font-weight: 500;">${displayName}</span>
                            <span style="color: ${confidenceColor}; font-weight: 600; font-size: 0.9rem;">${confidencePercent}%</span>
                        </div>
                        <div style="background: rgba(0,0,0,0.2); border-radius: 4px; height: 16px; overflow: hidden;">
                            <div style="background: ${confidenceColor}; height: 100%; width: ${confidencePercent}%; transition: width 0.5s ease;"></div>
                        </div>
                    </div>
                `;
            }).join('');

        confidenceDisplay = `
            <div style="margin-top: 1rem; padding: 1rem; background: rgba(107, 70, 193, 0.1); border-radius: 8px; border-left: 4px solid #6b46c1;">
                <div style="color: #e5e7eb; font-weight: 600; margin-bottom: 1rem; font-size: 1rem;">Average Confidence by Prediction Target</div>
                ${confidenceBars}
            </div>
        `;
    }

    contentDiv.innerHTML = `
        <div class="result-message ${isError ? 'error' : 'success'}">
            ${message}
        </div>
        ${confidenceDisplay}
    `;

    resultsDiv.style.display = 'block';

    setTimeout(() => {
        resultsDiv.style.display = 'none';
    }, 10000);
}


function collectModalHyperparameters() {
    const modelTypes = ['classifier', 'planet_regressor', 'stellar_regressor', 'quality_regressor'];
    const paramNames = ['n_estimators', 'max_depth', 'learning_rate', 'subsample'];
    
    const hyperparameters = {};
    
    modelTypes.forEach(modelType => {
        hyperparameters[modelType] = {};
        
        paramNames.forEach(paramName => {
            const input = document.getElementById(`modal_${modelType}_${paramName}`);
            if (input && input.value) {
                const value = paramName.includes('rate') || paramName.includes('subsample') || paramName.includes('colsample') 
                    ? parseFloat(input.value) 
                    : parseInt(input.value);
                hyperparameters[modelType][paramName] = value;
            }
        });
        hyperparameters[modelType]['colsample_bytree'] = 0.8;
        hyperparameters[modelType]['random_state'] = 42;
    });
    
    return hyperparameters;
}

async function loadModalHyperparameters() {
    try {
        const response = await fetch(`${API_BASE_URL}/hyperparameters`);
        const data = await response.json();
        
        if (data.status === 'success') {
            populateModalHyperparameterForm(data.hyperparameters);
        }
    } catch (error) {
        console.error('Error loading modal hyperparameters:', error);
    }
}

function populateModalHyperparameterForm(hyperparameters) {
    const modelTypes = ['classifier', 'planet_regressor', 'stellar_regressor', 'quality_regressor'];
    
    modelTypes.forEach(modelType => {
        const params = hyperparameters[modelType] || {};
        
        Object.keys(params).forEach(paramName => {
            const input = document.getElementById(`modal_${modelType}_${paramName}`);
            if (input) {
                input.value = params[paramName];
            }
        });
    });
}

async function retrainModel() {
    try {
        const openRetrainBtn = document.getElementById('openRetrainModalBtn');
        const trainingDataFile = document.getElementById('trainingDataFile').files[0];
        const useCustomHyperparameters = document.getElementById('useCustomHyperparameters').checked;
        openRetrainBtn.disabled = true;
        openRetrainBtn.innerHTML = '<span class="btn-loading" style="display: inline-block;"><div class="loading-spinner"></div></span> Starting...';
        const formData = new FormData();
        
        if (trainingDataFile) {
            formData.append('file', trainingDataFile);
        }
        
        if (useCustomHyperparameters) {
            const hyperparameters = collectModalHyperparameters();
            formData.append('hyperparameters', JSON.stringify(hyperparameters));
        }
        const response = await fetch(`${API_BASE_URL}/retrain`, {
            method: 'POST',
            body: formData
        });
        
        const data = await response.json();
        
        if (data.status === 'started') {
            showNotification('Model retraining started!', 'success');
            pollTrainingStatus(openRetrainBtn);
        } else {
            throw new Error(data.detail || 'Failed to start retraining');
        }
    } catch (error) {
        console.error('Error starting retraining:', error);
        showNotification('Failed to start retraining: ' + error.message, 'error');
        
        const openRetrainBtn = document.getElementById('openRetrainModalBtn');
        openRetrainBtn.disabled = false;
        openRetrainBtn.innerHTML = '<span class="btn-text">Configure & Retrain Model</span><span class="btn-icon">⚙️</span>';
    }
}

async function pollTrainingStatus(openRetrainBtn) {
    try {
        const response = await fetch(`${API_BASE_URL}/retrain/status`);
        const status = await response.json();
        openRetrainBtn.innerHTML = `<span class="btn-loading" style="display: inline-block;"><div class="loading-spinner"></div></span> ${status.progress || 'Training...'}`;
        
        if (status.status === 'training') {
            setTimeout(() => pollTrainingStatus(openRetrainBtn), 2000);
        } else if (status.status === 'completed') {
            openRetrainBtn.disabled = false;
            openRetrainBtn.innerHTML = '<span class="btn-text">Configure & Retrain Model</span><span class="btn-icon">✓</span>';
            
            showNotification('Model retraining completed successfully!', 'success');
            if (status.metrics) {
                displayTrainingMetrics(status.metrics);
            }
            setTimeout(() => {
                initDataVisualization();
            }, 1000);
        } else if (status.status === 'failed') {
            openRetrainBtn.disabled = false;
            openRetrainBtn.innerHTML = '<span class="btn-text">Configure & Retrain Model</span><span class="btn-icon">⚠️</span>';
            
            showNotification('Model retraining failed: ' + (status.error || 'Unknown error'), 'error');
        } else {
            openRetrainBtn.disabled = false;
            openRetrainBtn.innerHTML = '<span class="btn-text">Configure & Retrain Model</span><span class="btn-icon">⚙️</span>';
        }
    } catch (error) {
        console.error('Error polling training status:', error);
        openRetrainBtn.disabled = false;
        openRetrainBtn.innerHTML = '<span class="btn-text">Configure & Retrain Model</span><span class="btn-icon">⚙️</span>';
    }
}

function displayTrainingMetrics(metrics) {
    const metricsDiv = document.getElementById('trainingMetrics');
    if (!metricsDiv) return;
    
    let metricsHTML = `
        <div style="padding: 1rem; background: rgba(16, 185, 129, 0.1); border-radius: 8px; border-left: 4px solid #10b981; margin-top: 1rem;">
            <h4 style="color: #10b981; margin-bottom: 0.75rem;">Training Completed Successfully</h4>
            <div style="color: #e5e7eb;">
                <p><strong>Classification Accuracy:</strong> ${(metrics.classification_accuracy * 100).toFixed(2)}%</p>
    `;
    
    if (metrics.planet_scores && Object.keys(metrics.planet_scores).length > 0) {
        metricsHTML += '<p><strong>Planet Models R²:</strong></p><ul>';
        for (const [target, scores] of Object.entries(metrics.planet_scores)) {
            metricsHTML += `<li>${target}: ${scores.r2.toFixed(4)}</li>`;
        }
        metricsHTML += '</ul>';
    }
    
    if (metrics.stellar_scores && Object.keys(metrics.stellar_scores).length > 0) {
        metricsHTML += '<p><strong>Stellar Models R²:</strong></p><ul>';
        for (const [target, scores] of Object.entries(metrics.stellar_scores)) {
            metricsHTML += `<li>${target}: ${scores.r2.toFixed(4)}</li>`;
        }
        metricsHTML += '</ul>';
    }
    
    metricsHTML += '</div></div>';
    metricsDiv.innerHTML = metricsHTML;
}

async function downloadTrainingData() {
    try {
        const response = await fetch(`${API_BASE_URL}/download/training-data`);
        
        if (!response.ok) {
            throw new Error('Failed to download training data');
        }
        
        const blob = await response.blob();
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'training_data.csv';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        window.URL.revokeObjectURL(url);
        
        showNotification('Training data downloaded successfully', 'success');
    } catch (error) {
        console.error('Error downloading training data:', error);
        showNotification('Failed to download training data', 'error');
    }
}

function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 1rem 1.5rem;
        background: ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6'};
        color: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.3);
        z-index: 10000;
        max-width: 400px;
        animation: slideInRight 0.3s ease;
    `;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 5000);
}
async function openRetrainModal() {
    const modal = document.getElementById('retrainModal');
    if (modal) {
        await loadModalHyperparameters();
        modal.style.display = 'block';
    }
}

function closeRetrainModal() {
    const modal = document.getElementById('retrainModal');
    if (modal) {
        modal.style.display = 'none';
    }
}
document.addEventListener('DOMContentLoaded', function() {
    const openRetrainModalBtn = document.getElementById('openRetrainModalBtn');
    if (openRetrainModalBtn) {
        openRetrainModalBtn.addEventListener('click', openRetrainModal);
    }
    
    const closeRetrainModalBtn = document.getElementById('closeRetrainModal');
    if (closeRetrainModalBtn) {
        closeRetrainModalBtn.addEventListener('click', closeRetrainModal);
    }
    
    const cancelRetrainBtn = document.getElementById('cancelRetrainBtn');
    if (cancelRetrainBtn) {
        cancelRetrainBtn.addEventListener('click', closeRetrainModal);
    }
    
    const startRetrainBtn = document.getElementById('startRetrainBtn');
    if (startRetrainBtn) {
        startRetrainBtn.addEventListener('click', function() {
            closeRetrainModal();
            retrainModel();
        });
    }
    
    const downloadTrainingBtn = document.getElementById('downloadTrainingDataBtn');
    if (downloadTrainingBtn) {
        downloadTrainingBtn.addEventListener('click', downloadTrainingData);
    }
    window.addEventListener('click', function(event) {
        const retrainModal = document.getElementById('retrainModal');
        if (event.target === retrainModal) {
            closeRetrainModal();
        }
    });
    const useCustomHyperparametersCheckbox = document.getElementById('useCustomHyperparameters');
    if (useCustomHyperparametersCheckbox) {
        useCustomHyperparametersCheckbox.addEventListener('change', function() {
            const modalHyperparametersSection = document.getElementById('modalHyperparametersSection');
            if (modalHyperparametersSection) {
                if (this.checked) {
                    modalHyperparametersSection.style.display = 'block';
                } else {
                    modalHyperparametersSection.style.display = 'none';
                }
            }
        });
    }
});
