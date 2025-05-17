<!-- Head View Start -->
<?= $this->include('head_view') ?>
<!-- Head View End -->

<!-- Add your custom styles -->
<style>
    .BorderBox {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 6px;
    }

    #selectedColumnsContainer {
        display: flex;
        flex-direction: column;
    }

    #columnsContainer {
        height: 200px;
        border: 1px solid #d4d4d4;
        border-radius: 5px;
        padding: 8px 14px;
        overflow-y: auto;
    }

    .ColumnBorderBox {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .ColumnBorderBox i {
        font-size: 18px;
        cursor: pointer;
        transition: transform 0.3s ease;
        color: #000;
    }

    .ColumnBorderBox label {
        font-size: 14px;
        font-weight: 500;
    }

    .selected-column {
        margin-bottom: 10px;
    }

    .selected-column .badge {
        font-size: 12px;
        margin-right: 5px;
        margin-top: 5px;
    }

    table {
        padding: 3rem;
    }

    #filterBox,
    #dataTable {
        display: none;
    }

    .sort-asc::after {
        content: ' ▲';
    }

    .sort-desc::after {
        content: ' ▼';
    }

    th.sortable {
        cursor: pointer;
    }

    #conditionContainer {
        margin-bottom: 15px;
    }

    .selected-column {
        cursor: move;
        margin-bottom: 5px;
    }

    .sortable-ghost {
        opacity: 0.4;
        background: #c8ebfb;
    }
</style>

<body class="dashboard-container">

    <!-- Header View Start -->
    <?= $this->include('header_view') ?>
    <!-- Header View End -->

    <!-- Left View Start -->
    <?= $this->include('left_view') ?>
    <!-- Left View Start -->

    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="title pb-20 d-flex justify-content-between align-items-center">
                <a href="<?= base_url('analytics/reports') ?>"><i class="fa-solid fa-arrow-left"></i></a>
                <div class="d-flex align-items-center">
                    <button class="btn btn-success" id="saveReportBtn" type="button">Save</button>
                    <button class="btn btn-primary mx-2" id="scheduleReportBtn" type="button">Schedule</button>
                    <div class="d-flex align-items-center mx-2">
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                Export
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" id="exportCsv">Excel/CSV</a>
                                <a class="dropdown-item" href="#" id="exportPdf">PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Schedule Report Form -->
            <div class="row" id="scheduleReportRow" style="display: none;">
                <div class="col-md-12">
                    <div class="pd-20 card-box mb-30">
                        <h5 class="text-blue mb-20">Schedule Report</h5>
                        <form id="scheduleReportForm">
                            <div class="form-group">
                                <label for="scheduleReportName">Report Name</label>
                                <input type="text" class="form-control" id="scheduleReportName" name="report_name" value="<?= isset($report) ? esc($report['report_name']) : '' ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="scheduleEmail">Email(s) <small>(comma-separated for multiple)</small></label>
                                <input type="text" class="form-control" id="scheduleEmail" name="email" placeholder="e.g., user1@example.com,user2@example.com">
                            </div>
                            <div class="form-group">
                                <label for="scheduleType">Schedule Type</label>
                                <select class="form-control" id="scheduleType" name="schedule_type">
                                    <option value="one_time">One-Time</option>
                                    <option value="daily">Daily</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                </select>
                            </div>
                            <div class="form-group" id="oneTimeDateTimeGroup">
                                <label for="scheduleDateTime">Date and Time</label>
                                <input type="datetime-local" class="form-control" id="scheduleDateTime" name="schedule_datetime">
                            </div>
                            <div class="form-group" id="weeklyDayGroup" style="display: none;">
                                <label for="scheduleDayOfWeek">Day of Week</label>
                                <select class="form-control" id="scheduleDayOfWeek" name="day_of_week">
                                    <option value="0">Sunday</option>
                                    <option value="1">Monday</option>
                                    <option value="2">Tuesday</option>
                                    <option value="3">Wednesday</option>
                                    <option value="4">Thursday</option>
                                    <option value="5">Friday</option>
                                    <option value="6">Saturday</option>
                                </select>
                            </div>
                            <div class="form-group" id="monthlyDayGroup" style="display: none;">
                                <label for="scheduleDayOfMonth">Day of Month</label>
                                <input type="number" class="form-control" id="scheduleDayOfMonth" name="day_of_month" min="1" max="31" placeholder="e.g., 15">
                            </div>
                            <div class="form-group" id="recurringTimeGroup" style="display: none;">
                                <label for="scheduleTime">Time</label>
                                <input type="time" class="form-control" id="scheduleTime" name="schedule_time">
                            </div>
                            <div class="form-group mt-3">
                                <button type="button" class="btn btn-primary" id="saveScheduleBtn">Save Schedule</button>
                                <button type="button" class="btn btn-secondary" id="cancelScheduleBtn">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Full Page Loader -->
            <div id="loaderOverlay" class="loader-overlay" style="display: none;">
                <div class="dot-spinner">
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="pd-20 card-box mb-30">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label>Report Name:</label>
                                    <input type="text" class="form-control" id="reportName" value="<?= isset($report) ? esc($report['report_name']) : '' ?>" placeholder="Enter report name">
                                    <input type="hidden" id="reportId" value="<?= isset($report) ? $report['id'] : '' ?>">
                                </div>

                                <div class="form-group">
                                    <label>Section<i class="fa-solid fa-star-of-life" style="color: #f50000; font-size: 6px;"></i></label>
                                    <select class="custom-select2 form-control" name="table_name" id="table_name" style="width: 100%; height: 38px">
                                        <option value="">Select Section</option>
                                        <?php foreach ($tables as $table) : ?>
                                            <option value="<?= $table ?>" <?= isset($report) && $report['table_name'] === $table ? 'selected' : '' ?>>
                                                <?= ucwords(str_replace('_', ' ', $table)) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Select Attributes<i class="fa-solid fa-star-of-life" style="color: #f50000; font-size: 6px;"></i></label>
                                    <div class="form-group">
                                        <input type="text" id="columnSearch" class="form-control" placeholder="Search...">
                                    </div>

                                    <div id="columnsContainer">
                                        <!-- Columns will be populated here -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md mt-4">
                                <div id="selectedColumnsContainer" class="BorderBox" style="display: none;">
                                    <!-- Selected columns will appear here -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <button class="btn btn-primary" id="generateReportBtn" type="button">Show</button>
                            <button class="btn btn-secondary" id="openConditionBoxBtn" type="button">Add Filters</button>
                        </div>
                    </div>
                </div>

                <div class="col-md">
                    <div class="pd-20 card-box mb-30" id="conditionBox" style="display: none;">
                        <h5 class="text-blue mb-30">Filters</h5>
                        <p>Conditions</p>
                        <div id="conditionContainer">
                            <!-- Conditions will be added here dynamically -->
                        </div>
                        <button class="btn btn-light" id="addConditionBtn" style="margin-top: 10px;"><i class="fa-solid fa-plus"></i></button>
                        <div class="mt-3">
                            <button class="btn btn-dark" id="applyConditionsBtn" style="display: none;">Apply</button>
                            <button class="btn btn-dark" id="clearConditionsBtn" style="display: none;">Clear</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h5 class="text-blue mb-2">Results</h5>
                    <div class="">
                        <table id="dataTable" class="table table-bordered card-box p-3 mb-3" style="display: none;">
                            <thead>
                                <tr id="tableHeaders"></tr>
                            </thead>
                            <tbody id="tableBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer View Start -->
    <?= $this->include('footer_view') ?>
    <!-- Footer View End -->

</body>

<!-- Include JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.23/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

<script>
    $(document).ready(function() {
        // Filter options for conditions
        const filterOptions = {
            Text: [
                'is', 'is_not', 'is_in', 'is_not_in', 'contains', 'does_not_contain',
                'starts_with', 'ends_with', 'does_not_start_with', 'does_not_end_with',
                'like', 'not_like', 'is_unknown', 'is_known'
            ],
            Number: [
                'equals', 'not_equals', 'greater_than', 'greater_than_equal',
                'less_than', 'less_than_equal', 'is_in', 'is_not_in',
                'is_unknown', 'is_known'
            ],
            Boolean: ['is_true', 'is_false', 'is_unknown', 'is_known'],
            DateTime: [
                'is_on', 'is_not_on', 'is_before', 'is_after', 'is_on_or_before',
                'is_on_or_after', 'is_within_range', 'is_not_within_range',
                'is_in_last', 'is_not_in_last', 'is_unknown', 'is_known'
            ],
            Enum: ['is', 'is_not', 'is_in', 'is_not_in', 'is_unknown', 'is_known'],
            List: ['contains', 'does_not_contain', 'is_empty', 'is_not_empty', 'is_unknown', 'is_known']
        };

        // Global variables
        let columnTypes = {};
        let rawData = {
            columns: [],
            rows: []
        };
        let sortColumn = null;
        let sortDirection = 'asc';
        let formattedColumnMap = {};
        let savedColumns = <?= isset($report) ? json_encode($report['columns']) : '[]' ?>;
        let savedFilters = <?= isset($report) ? json_encode($report['filters']) : '[]' ?>;

        // Initialize SortableJS on selectedColumnsContainer
        function initSortable() {
            const selectedColumnsContainer = document.getElementById('selectedColumnsContainer');
            new Sortable(selectedColumnsContainer, {
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function(evt) {
                    // Update hidden inputs to reflect new order
                    updateColumnOrder();
                    // Regenerate table to reflect new column order
                    if (rawData.columns.length > 0 && rawData.rows.length > 0) {
                        applyConditions();
                    }
                }
            });
        }

        // Update hidden inputs to maintain column order
        function updateColumnOrder() {
            const selectedColumnsContainer = $('#selectedColumnsContainer');
            const orderedColumns = selectedColumnsContainer.find('.selected-column').map(function() {
                return $(this).data('column');
            }).get();

            // Update hidden inputs
            selectedColumnsContainer.find('input[name="selected_columns[]"]').remove();
            orderedColumns.forEach(column => {
                selectedColumnsContainer.append(
                    `<input type="hidden" name="selected_columns[]" value="${column}">`
                );
            });

            console.log('Updated column order:', orderedColumns);
        }

        // Get current column order
        function getColumnOrder() {
            return $('#selectedColumnsContainer').find('.selected-column').map(function() {
                return $(this).data('column');
            }).get();
        }

        // When a table is selected
        $('#table_name').change(function() {
            const tableName = $(this).val();
            $('#columnsContainer').empty();
            $('#selectedColumnsContainer').empty().hide();

            if (tableName) {
                $.ajax({
                    url: "<?= base_url('event/getColumns/') ?>/" + tableName,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        const columnsContainer = $('#columnsContainer');
                        columnsContainer.empty();

                        let columnData = data.formattedColumns;
                        let rawColumnData = data.columns;
                        columnTypes = data.columnTypes;

                        formattedColumnMap = {};
                        $.each(rawColumnData, function(index, rawName) {
                            formattedColumnMap[rawName] = data.formattedColumns[index];
                        });

                        $.each(columnData, function(index, column) {
                            const isSelected = savedColumns.includes(rawColumnData[index]);
                            const columnHtml = `
                            <div class="ColumnBorderBox" data-column="${rawColumnData[index]}" data-column-name="${column}">
                                <i class="fa-solid ${isSelected ? 'fa-square-minus' : 'fa-square-plus'}" id="column-${rawColumnData[index]}" name="columns[]"></i>
                                <label for="column-${rawColumnData[index]}">${column}</label>
                            </div>
                        `;
                            columnsContainer.append(columnHtml);
                            if (isSelected) {
                                $('#selectedColumnsContainer').append(`
                                <div class="col-md-3 selected-column" data-column="${rawColumnData[index]}">
                                    <span class="badge bg-dark text-light p-1">${column}</span>
                                    <input type="hidden" name="selected_columns[]" value="${rawColumnData[index]}">
                                </div>
                            `).show();
                            }
                        });

                        // Reorder selected columns based on savedColumns order
                        if (savedColumns.length > 0) {
                            const $selectedColumns = $('#selectedColumnsContainer .selected-column');
                            $selectedColumns.sort(function(a, b) {
                                const colA = $(a).data('column');
                                const colB = $(b).data('column');
                                return savedColumns.indexOf(colA) - savedColumns.indexOf(colB);
                            });
                            $('#selectedColumnsContainer').empty().append($selectedColumns).show();
                            updateColumnOrder();
                        }

                        $('#columnSearch').off('keyup').on('keyup', function() {
                            const searchTerm = $(this).val().toLowerCase();
                            columnsContainer.children('.ColumnBorderBox').each(function() {
                                const column = $(this).data('column-name').toLowerCase();
                                $(this).toggle(column.includes(searchTerm));
                            });
                        });

                        columnsContainer.off('click', '.ColumnBorderBox i').on('click', '.ColumnBorderBox i', function() {
                            const $this = $(this);
                            const column = $this.parent().data('column');
                            const columnLabel = $this.parent().find('label').text();
                            const selectedColumnsContainer = $('#selectedColumnsContainer');

                            if ($this.hasClass('fa-square-plus')) {
                                $this.removeClass('fa-square-plus').addClass('fa-square-minus');
                                selectedColumnsContainer.append(`
                                <div class="col-md-3 selected-column" data-column="${column}">
                                    <span class="badge bg-dark text-light p-1">${columnLabel}</span>
                                    <input type="hidden" name="selected_columns[]" value="${column}">
                                </div>
                            `);
                                selectedColumnsContainer.show();
                                updateColumnOrder();
                            } else {
                                $this.removeClass('fa-square-minus').addClass('fa-square-plus');
                                selectedColumnsContainer.find(`.selected-column[data-column="${column}"]`).remove();
                                if (selectedColumnsContainer.find('.selected-column').length === 0) {
                                    selectedColumnsContainer.hide();
                                }
                                updateColumnOrder();
                            }
                        });

                        // Initialize SortableJS after columns are loaded
                        initSortable();

                        // Load saved filters if any
                        if (savedFilters.length > 0) {
                            loadSavedFilters();
                            savedFilters = []; // Clear after loading
                        }

                        // Auto-click "Show" for saved reports
                        if ($('#reportId').val()) {
                            setTimeout(function() {
                                $('#generateReportBtn').trigger('click');
                            }, 1000); // 1-second delay
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching columns:", error);
                        alert('Failed to fetch columns.');
                    }
                });
            }
        });

        // Trigger table change if report is loaded
        if ($('#reportId').val()) {
            $('#table_name').trigger('change');
        }

        // Open condition box
        $('#openConditionBoxBtn').click(function() {
            const selectedColumns = $('input[name="selected_columns[]"]').map(function() {
                return $(this).val();
            }).get();

            if (selectedColumns.length === 0) {
                alert('Please select at least one column before adding conditions.');
                return;
            }
            $('#conditionBox').show();
        });

        // Add condition
        $('#addConditionBtn').click(function() {
            const selectedColumns = $('input[name="selected_columns[]"]').map(function() {
                return $(this).val();
            }).get();

            if (selectedColumns.length === 0) {
                alert('Please select at least one column before adding a condition.');
                return;
            }

            const conditionId = Date.now();
            const conditionHtml = `
            <div class="condition-row mb-3" data-condition-id="${conditionId}">
                <div class="row">
                    <div class="col-md-3">
                        <select class="form-control condition-column" name="condition_column_${conditionId}">
                            <option value="">Select Column</option>
                            ${selectedColumns.map(col => `<option value="${col}">${formattedColumnMap[col]}</option>`).join('')}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-control condition-operator" name="condition_operator_${conditionId}">
                            <option value="">Select Operator</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control condition-value" name="condition_value_${conditionId}" placeholder="Enter value">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-light remove-condition"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
            </div>
        `;

            $('#conditionContainer').append(conditionHtml);
            $('#applyConditionsBtn').show();
            $('#clearConditionsBtn').show();
        });

        // Handle column selection for conditions
        $(document).on('change', '.condition-column', function() {
            const conditionRow = $(this).closest('.condition-row');
            const column = $(this).val();
            const operatorSelect = conditionRow.find('.condition-operator');
            const valueInput = conditionRow.find('.condition-value');

            operatorSelect.empty().append('<option value="">Select Operator</option>');

            if (column && columnTypes[column]) {
                const type = columnTypes[column].type;
                const operators = filterOptions[type] || filterOptions.Text;

                operators.forEach(operator => {
                    operatorSelect.append(`<option value="${operator}">${operator.replace(/_/g, ' ')}</option>`);
                });

                // Replace existing value input with appropriate type
                valueInput.replaceWith(`
                <input type="${type === 'DateTime' ? 'date' : type === 'Number' ? 'number' : 'text'}" 
                       class="form-control condition-value" 
                       name="condition_value_${conditionRow.data('condition-id')}" 
                       placeholder="Enter value">
            `);

                if (type === 'Boolean') {
                    conditionRow.find('.condition-value').replaceWith(`
                    <select class="form-control condition-value" name="condition_value_${conditionRow.data('condition-id')}">
                        <option value="1">True</option>
                        <option value="0">False</option>
                    </select>
                `);
                } else if (type === 'Enum' && columnTypes[column].enum_values) {
                    conditionRow.find('.condition-value').replaceWith(`
                    <select class="form-control condition-value" name="condition_value_${conditionRow.data('condition-id')}">
                        ${columnTypes[column].enum_values.map(val => `<option value="${val}">${val}</option>`).join('')}
                    </select>
                `);
                }
            }
        });

        // Handle operator selection for dynamic value inputs (e.g., date range)
        $(document).on('change', '.condition-operator', function() {
            const conditionRow = $(this).closest('.condition-row');
            const operator = $(this).val();
            const column = conditionRow.find('.condition-column').val();
            const conditionId = conditionRow.data('condition-id');

            if (column && columnTypes[column]?.type === 'DateTime' && ['is_within_range', 'is_not_within_range'].includes(operator)) {
                // Replace with two date inputs for range
                conditionRow.find('.condition-value').replaceWith(`
                <div class="row">
                    <div class="col-md-6">
                        <input type="date" class="form-control condition-start-date" 
                               name="condition_start_date_${conditionId}" 
                               placeholder="Start date">
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control condition-end-date" 
                               name="condition_end_date_${conditionId}" 
                               placeholder="End date">
                    </div>
                </div>
            `);
            } else {
                // Restore single input based on column type
                const type = columnTypes[column]?.type || 'Text';
                conditionRow.find('.condition-start-date, .condition-end-date').parent().parent().replaceWith(`
                <input type="${type === 'DateTime' ? 'date' : type === 'Number' ? 'number' : 'text'}" 
                       class="form-control condition-value" 
                       name="condition_value_${conditionId}" 
                       placeholder="Enter value">
            `);

                if (type === 'Boolean') {
                    conditionRow.find('.condition-value').replaceWith(`
                    <select class="form-control condition-value" name="condition_value_${conditionId}">
                        <option value="1">True</option>
                        <option value="0">False</option>
                    </select>
                `);
                } else if (type === 'Enum' && columnTypes[column]?.enum_values) {
                    conditionRow.find('.condition-value').replaceWith(`
                    <select class="form-control condition-value" name="condition_value_${conditionId}">
                        ${columnTypes[column].enum_values.map(val => `<option value="${val}">${val}</option>`).join('')}
                    </select>
                `);
                }
            }
        });

        // Remove condition
        $(document).on('click', '.remove-condition', function() {
            $(this).closest('.condition-row').remove();
            if ($('#conditionContainer').children().length === 0) {
                $('#applyConditionsBtn').hide();
                $('#clearConditionsBtn').hide();
                $('#conditionBox').hide();
            }
            applyConditions();
        });

        // Clear conditions
        $('#clearConditionsBtn').click(function() {
            $('#conditionContainer').empty();
            $('#applyConditionsBtn').hide();
            $('#clearConditionsBtn').hide();
            $('#conditionBox').hide();
            applyConditions();
        });

        // Apply conditions
        $('#applyConditionsBtn').click(function() {
            applyConditions();
        });

        // Save or update report
        $('#saveReportBtn').click(function() {
            const tableName = $('#table_name').val();
            const selectedColumns = $('input[name="selected_columns[]"]').map(function() {
                return $(this).val();
            }).get();
            const conditions = getConditions();
            const reportName = $('#reportName').val().trim();
            const reportId = $('#reportId').val();

            if (!tableName || selectedColumns.length === 0) {
                alert('Please select a table and at least one column to save the report.');
                return;
            }

            if (!reportName) {
                alert('Please enter a report name.');
                return;
            }

            const reportData = {
                report_name: reportName,
                table_name: tableName,
                columns: selectedColumns,
                filters: conditions
            };

            const url = reportId ? "<?= base_url('event/updateReport/') ?>" + reportId : "<?= base_url('event/saveReport') ?>";
            const action = reportId ? 'updated' : 'saved';

            $.ajax({
                url: url,
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify(reportData),
                success: function(response) {
                    if (response.success) {
                        if (!reportId) {
                            $('#reportId').val(response.id);
                        }
                        alert(`Report ${action} successfully!`);
                    } else {
                        alert(`Failed to ${action} report: ` + (response.error || 'Unknown error'));
                    }
                },
                error: function(xhr, status, error) {
                    console.error(`Error ${action} report:`, error);
                    alert(`Failed to ${action} report.`);
                }
            });
        });

        // Export Functions
        function prepareExportData() {
            if (!rawData.columns || rawData.columns.length === 0 || !rawData.rows || rawData.rows.length === 0) {
                console.warn('No data available to export:', rawData);
                alert('No data available to export. Please generate a report first.');
                return null;
            }

            const orderedColumns = getColumnOrder();
            const headers = orderedColumns.map(col => formattedColumnMap[col] || col);
            const data = rawData.rows.map(row =>
                orderedColumns.map(col => row[col] != null ? row[col] : '')
            );

            return {
                headers,
                data
            };
        }

        $('#exportExcel').click(function(e) {
            e.preventDefault();

            const exportData = prepareExportData();
            if (!exportData) {
                console.warn('Excel export aborted: No data prepared.');
                return;
            }

            try {
                const reportName = ($('#reportName').val().trim() || 'Report');
                const payload = {
                    headers: exportData.headers,
                    data: exportData.data,
                    reportName: reportName
                };

                const form = $('<form>', {
                    action: '<?= base_url('event/exportExcel') ?>',
                    method: 'POST',
                    target: '_blank'
                }).append(
                    $('<input>', {
                        type: 'hidden',
                        name: 'exportData',
                        value: JSON.stringify(payload)
                    })
                );

                $('body').append(form);
                form.submit();
                form.remove();

                console.log('Excel export initiated:', reportName);
            } catch (error) {
                console.error('Error initiating Excel export:', error);
                alert('Failed to export to Excel: ' + error.message);
            }
        });

        $('#exportCsv').click(function(e) {
            e.preventDefault();

            if (typeof XLSX === 'undefined') {
                console.error('SheetJS library not loaded.');
                alert('CSV export failed: Library not loaded.');
                return;
            }

            const exportData = prepareExportData();
            if (!exportData) return;

            try {
                const reportName = ($('#reportName').val().trim() || 'Report').replace(/[^a-zA-Z0-9-_]/g, '_');
                const ws = XLSX.utils.json_to_sheet(
                    exportData.data.map(row =>
                        row.reduce((obj, val, i) => {
                            obj[exportData.headers[i]] = val;
                            return obj;
                        }, {})
                    ), {
                        header: exportData.headers
                    }
                );
                const csv = XLSX.utils.sheet_to_csv(ws);
                const blob = new Blob([csv], {
                    type: 'text/csv;charset=utf-8;'
                });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = `${reportName}.csv`;
                link.click();
                console.log('CSV file generated:', `${reportName}.csv`);
            } catch (error) {
                console.error('Error during CSV export:', error);
                alert('Failed to export to CSV: ' + error.message);
            }
        });

        $('#exportPdf').click(function(e) {
            e.preventDefault();

            if (typeof window.jspdf === 'undefined') {
                console.error('jsPDF library not loaded.');
                alert('PDF export failed: Library not loaded.');
                return;
            }

            const exportData = prepareExportData();
            if (!exportData) return;

            try {
                const {
                    jsPDF
                } = window.jspdf;
                const doc = new jsPDF();
                const reportName = ($('#reportName').val().trim() || 'Report').replace(/[^a-zA-Z0-9-_]/g, '_');

                doc.text(reportName, 14, 20);
                doc.autoTable({
                    startY: 30,
                    head: [exportData.headers],
                    body: exportData.data
                });

                doc.save(`${reportName}.pdf`);
                console.log('PDF file generated:', `${reportName}.pdf`);
            } catch (error) {
                console.error('Error during PDF export:', error);
                alert('Failed to export to PDF: ' + error.message);
            }
        });

        function getConditions() {
            const conditions = [];
            $('.condition-row').each(function() {
                const column = $(this).find('.condition-column').val();
                const operator = $(this).find('.condition-operator').val();
                let value = $(this).find('.condition-value').val();

                // Handle date range inputs
                if (['is_within_range', 'is_not_within_range'].includes(operator)) {
                    const startDate = $(this).find('.condition-start-date').val();
                    const endDate = $(this).find('.condition-end-date').val();
                    if (startDate && endDate) {
                        value = `${startDate},${endDate}`;
                    } else {
                        value = '';
                    }
                }

                if (column && operator && (value || ['is_unknown', 'is_known', 'is_empty', 'is_not_empty'].includes(operator))) {
                    conditions.push({
                        column,
                        operator,
                        value
                    });
                }
            });
            return conditions;
        }

        function loadSavedFilters() {
            $('#conditionContainer').empty();
            $.each(savedFilters, function(index, filter) {
                const conditionId = Date.now() + index;
                let valueInputHtml = `<input type="text" class="form-control condition-value" name="condition_value_${conditionId}" value="${filter.value || ''}" placeholder="Enter value">`;

                // Handle date range for saved filters
                if (filter.operator === 'is_within_range' || filter.operator === 'is_not_within_range') {
                    const [startDate, endDate] = (filter.value || ',').split(',');
                    valueInputHtml = `
                    <div class="row">
                        <div class="col-md-6">
                            <input type="date" class="form-control condition-start-date" name="condition_start_date_${conditionId}" value="${startDate || ''}" placeholder="Start date">
                        </div>
                        <div class="col-md-6">
                            <input type="date" class="form-control condition-end-date" name="condition_end_date_${conditionId}" value="${endDate || ''}" placeholder="End date">
                        </div>
                    </div>
                `;
                } else if (columnTypes[filter.column]?.type === 'Boolean') {
                    valueInputHtml = `
                    <select class="form-control condition-value" name="condition_value_${conditionId}">
                        <option value="1" ${filter.value === '1' ? 'selected' : ''}>True</option>
                        <option value="0" ${filter.value === '0' ? 'selected' : ''}>False</option>
                    </select>
                `;
                } else if (columnTypes[filter.column]?.type === 'Enum' && columnTypes[filter.column].enum_values) {
                    valueInputHtml = `
                    <select class="form-control condition-value" name="condition_value_${conditionId}">
                        ${columnTypes[filter.column].enum_values.map(val => `<option value="${val}" ${val === filter.value ? 'selected' : ''}>${val}</option>`).join('')}
                    </select>
                `;
                } else if (columnTypes[filter.column]?.type === 'DateTime') {
                    valueInputHtml = `<input type="date" class="form-control condition-value" name="condition_value_${conditionId}" value="${filter.value || ''}" placeholder="Enter date">`;
                } else if (columnTypes[filter.column]?.type === 'Number') {
                    valueInputHtml = `<input type="number" class="form-control condition-value" name="condition_value_${conditionId}" value="${filter.value || ''}" placeholder="Enter number">`;
                }

                const conditionHtml = `
                <div class="condition-row mb-3" data-condition-id="${conditionId}">
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-control condition-column" name="condition_column_${conditionId}">
                                <option value="">Select Column</option>
                                ${savedColumns.map(col => `<option value="${col}" ${col === filter.column ? 'selected' : ''}>${formattedColumnMap[col]}</option>`).join('')}
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control condition-operator" name="condition_operator_${conditionId}">
                                <option value="">Select Operator</option>
                                ${filterOptions[columnTypes[filter.column]?.type || 'Text'].map(op => `<option value="${op}" ${op === filter.operator ? 'selected' : ''}>${op.replace(/_/g, ' ')}</option>`).join('')}
                            </select>
                        </div>
                        <div class="col-md-4">
                            ${valueInputHtml}
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-light remove-condition"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            `;
                $('#conditionContainer').append(conditionHtml);
                $('#conditionBox').show();
                $('#applyConditionsBtn').show();
                $('#clearConditionsBtn').show();
            });
        }

        function applyConditions() {
            const conditions = getConditions();

            let filteredRows = rawData.rows;
            if (conditions.length > 0) {
                filteredRows = rawData.rows.filter(row => {
                    return conditions.every(condition => {
                        const {
                            column,
                            operator,
                            value
                        } = condition;
                        const cellValue = row[column];
                        const type = columnTypes[column]?.type;

                        if (['is_unknown', 'is_known'].includes(operator)) {
                            return operator === 'is_unknown' ? cellValue == null : cellValue != null;
                        }

                        if (!value && !['is_empty', 'is_not_empty'].includes(operator)) return true;

                        switch (type) {
                            case 'Text':
                            case 'Enum':
                                return filterText(cellValue, operator, value);
                            case 'Number':
                                return filterNumber(cellValue, operator, parseFloat(value));
                            case 'Boolean':
                                return filterBoolean(cellValue, operator);
                            case 'DateTime':
                                return filterDateTime(cellValue, operator, value);
                            case 'List':
                                return filterList(cellValue, operator, value);
                            default:
                                return true;
                        }
                    });
                });
            }

            if (sortColumn) {
                filteredRows.sort((a, b) => {
                    const valA = a[sortColumn] || '';
                    const valB = b[sortColumn] || '';
                    if (columnTypes[sortColumn]?.type === 'Number') {
                        return sortDirection === 'asc' ? valA - valB : valB - valA;
                    }
                    return sortDirection === 'asc' ?
                        String(valA).localeCompare(String(valB)) :
                        String(valB).localeCompare(String(valA));
                });
            }

            const orderedColumns = getColumnOrder();
            updateTable(orderedColumns, filteredRows);
        }

        function filterText(value, operator, filterValue) {
            const strValue = String(value || '').toLowerCase();
            const strFilter = String(filterValue || '').toLowerCase();
            const values = strFilter.split(',').map(v => v.trim());

            switch (operator) {
                case 'is':
                    return strValue === strFilter;
                case 'is_not':
                    return strValue !== strFilter;
                case 'is_in':
                    return values.includes(strValue);
                case 'is_not_in':
                    return !values.includes(strValue);
                case 'contains':
                    return strValue.includes(strFilter);
                case 'does_not_contain':
                    return !strValue.includes(strFilter);
                case 'starts_with':
                    return strValue.startsWith(strFilter);
                case 'ends_with':
                    return strValue.endsWith(strFilter);
                case 'does_not_start_with':
                    return !strValue.startsWith(strFilter);
                case 'does_not_end_with':
                    return !strValue.endsWith(strFilter);
                case 'like':
                    return strValue.includes(strFilter);
                case 'not_like':
                    return !strValue.includes(strFilter);
                default:
                    return true;
            }
        }

        function filterNumber(value, operator, filterValue) {
            const numValue = parseFloat(value);
            if (isNaN(numValue)) return operator === 'is_unknown';

            switch (operator) {
                case 'equals':
                    return numValue === filterValue;
                case 'not_equals':
                    return numValue !== filterValue;
                case 'greater_than':
                    return numValue > filterValue;
                case 'greater_than_equal':
                    return numValue >= filterValue;
                case 'less_than':
                    return numValue < filterValue;
                case 'less_than_equal':
                    return numValue <= filterValue;
                case 'is_in':
                    return filterValue.split(',').map(Number).includes(numValue);
                case 'is_not_in':
                    return !filterValue.split(',').map(Number).includes(numValue);
                default:
                    return true;
            }
        }

        function filterBoolean(value, operator) {
            const boolValue = value == null ? null : Boolean(Number(value));
            switch (operator) {
                case 'is_true':
                    return boolValue === true;
                case 'is_false':
                    return boolValue === false;
                default:
                    return true;
            }
        }

        function filterDateTime(value, operator, filterValue) {
            if (!value) return operator === 'is_unknown';
            const dateValue = new Date(value);
            if (isNaN(dateValue.getTime())) return false;

            if (['is_within_range', 'is_not_within_range'].includes(operator)) {
                const [start, end] = filterValue.split(',').map(d => new Date(d));
                if (isNaN(start.getTime()) || isNaN(end.getTime())) return false;
                const isInRange = dateValue >= start && dateValue <= end;
                return operator === 'is_within_range' ? isInRange : !isInRange;
            }

            const filterDate = new Date(filterValue);
            if (isNaN(filterDate.getTime()) && !['is_in_last', 'is_not_in_last'].includes(operator)) {
                return false;
            }

            switch (operator) {
                case 'is_on':
                    return dateValue.toDateString() === filterDate.toDateString();
                case 'is_not_on':
                    return dateValue.toDateString() !== filterDate.toDateString();
                case 'is_before':
                    return dateValue < filterDate;
                case 'is_after':
                    return dateValue > filterDate;
                case 'is_on_or_before':
                    return dateValue <= filterDate;
                case 'is_on_or_after':
                    return dateValue >= filterDate;
                case 'is_in_last': {
                    const [amount, unit] = filterValue.split(' ');
                    const pastDate = new Date();
                    pastDate.setDate(pastDate.getDate() - (unit === 'days' ? amount : unit === 'weeks' ? amount * 7 : amount * 30));
                    return dateValue >= pastDate;
                }
                case 'is_not_in_last': {
                    const [amount, unit] = filterValue.split(' ');
                    const pastDate = new Date();
                    pastDate.setDate(pastDate.getDate() - (unit === 'days' ? amount : unit === 'weeks' ? amount * 7 : amount * 30));
                    return dateValue < pastDate;
                }
                default:
                    return true;
            }
        }

        function filterList(value, operator, filterValue) {
            const listValue = Array.isArray(value) ? value : (value ? value.split(',') : []);
            const filterValues = filterValue.split(',').map(v => v.trim());

            switch (operator) {
                case 'contains':
                    return filterValues.some(v => listValue.includes(v));
                case 'does_not_contain':
                    return !filterValues.some(v => listValue.includes(v));
                case 'is_empty':
                    return listValue.length === 0;
                case 'is_not_empty':
                    return listValue.length > 0;
                default:
                    return true;
            }
        }

        function updateTable(columns, rows) {
            const tableHeaders = $('#tableHeaders');
            const tableBody = $('#tableBody');
            tableHeaders.empty();
            tableBody.empty();

            if (columns.length > 0 && rows.length > 0) {
                $.each(columns, function(index, column) {
                    const headerClass = sortColumn === column ? (sortDirection === 'asc' ? 'sort-asc' : 'sort-desc') : '';
                    tableHeaders.append(`<th class="sortable ${headerClass}" data-column="${column}">${formattedColumnMap[column]}</th>`);
                });

                $.each(rows, function(index, row) {
                    const rowHtml = `<tr>
                    ${columns.map(col => `<td>${row[col] || ''}</td>`).join('')}
                </tr>`;
                    tableBody.append(rowHtml);
                });

                $('#dataTable').show();

                $('.sortable').off('click').on('click', function() {
                    const newSortColumn = $(this).data('column');
                    if (sortColumn === newSortColumn) {
                        sortDirection = sortDirection === 'asc' ? 'desc' : 'asc';
                    } else {
                        sortColumn = newSortColumn;
                        sortDirection = 'asc';
                    }
                    applyConditions();
                });
            } else {
                $('#dataTable').hide();
                alert('No data matches the applied conditions.');
            }
        }

        function fetchReportData(tableName, columns) {
            $.ajax({
                url: "<?= base_url('event/getReportData/') ?>/" + tableName,
                type: "POST",
                data: {
                    columns: columns
                },
                dataType: "json",
                success: function(data) {
                    console.log('Fetched report data:', data);
                    rawData = data;
                    sortColumn = null;
                    sortDirection = 'asc';
                    applyConditions();
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", error);
                    alert('Failed to fetch data.');
                }
            });
        }

        // Generate report
        $('#generateReportBtn').click(function() {
            const tableName = $('#table_name').val();
            const selectedColumns = $('input[name="selected_columns[]"]').map(function() {
                return $(this).val();
            }).get();

            if (tableName && selectedColumns.length > 0) {
                fetchReportData(tableName, selectedColumns);
            } else {
                alert('Please select both a table and columns.');
            }
        });

        // Toggle Schedule Report Form
        $('#scheduleReportBtn').click(function() {
            const reportId = $('#reportId').val();
            const reportName = $('#reportName').val().trim();

            if (!reportId || !reportName) {
                alert('Please save the report before scheduling.');
                return;
            }

            $('#scheduleReportName').val(reportName);
            $('#scheduleReportRow').toggle();
        });

        // Cancel Schedule (hide form)
        $('#cancelScheduleBtn').click(function() {
            $('#scheduleReportRow').hide();
            $('#scheduleReportForm')[0].reset();
            $('#oneTimeDateTimeGroup').show();
            $('#weeklyDayGroup').hide();
            $('#monthlyDayGroup').hide();
            $('#recurringTimeGroup').hide();
        });

        // Toggle schedule type fields
        $('#scheduleType').change(function() {
            const scheduleType = $(this).val();
            $('#oneTimeDateTimeGroup').hide();
            $('#weeklyDayGroup').hide();
            $('#monthlyDayGroup').hide();
            $('#recurringTimeGroup').hide();

            if (scheduleType === 'one_time') {
                $('#oneTimeDateTimeGroup').show();
            } else {
                $('#recurringTimeGroup').show();
                if (scheduleType === 'weekly') {
                    $('#weeklyDayGroup').show();
                } else if (scheduleType === 'monthly') {
                    $('#monthlyDayGroup').show();
                }
            }
        });

        // Save schedule
        $('#saveScheduleBtn').click(function() {
            const reportId = $('#reportId').val();
            const reportName = $('#scheduleReportName').val().trim();
            const email = $('#scheduleEmail').val().trim();
            const scheduleType = $('#scheduleType').val();
            let scheduleDateTime = $('#scheduleDateTime').val();
            const scheduleTime = $('#scheduleTime').val();
            const dayOfWeek = $('#scheduleDayOfWeek').val();
            const dayOfMonth = $('#scheduleDayOfMonth').val();

            // Validation
            if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+(,[^\s@]+@[^\s@]+\.[^\s@]+)*$/.test(email)) {
                alert('Please enter valid email address(es).');
                return;
            }

            if (scheduleType === 'one_time' && !scheduleDateTime) {
                alert('Please select a date and time.');
                return;
            }

            if (scheduleType !== 'one_time' && !scheduleTime) {
                alert('Please select a time.');
                return;
            }

            if (scheduleType === 'weekly' && !dayOfWeek) {
                alert('Please select a day of the week.');
                return;
            }

            if (scheduleType === 'monthly' && (!dayOfMonth || dayOfMonth < 1 || dayOfMonth > 31)) {
                alert('Please enter a valid day of the month (1-31).');
                return;
            }

            // Prepare schedule data
            const scheduleData = {
                report_id: reportId,
                report_name: reportName,
                email: email,
                schedule_type: scheduleType
            };

            if (scheduleType === 'one_time') {
                scheduleData.schedule_datetime = scheduleDateTime;
            } else {
                const today = new Date();
                const timeParts = scheduleTime.split(':');
                today.setHours(timeParts[0], timeParts[1], 0, 0);
                scheduleData.schedule_datetime = today.toISOString().slice(0, 19).replace('T', ' ');
                if (scheduleType === 'weekly') {
                    scheduleData.day_of_week = dayOfWeek;
                } else if (scheduleType === 'monthly') {
                    scheduleData.day_of_month = dayOfMonth;
                }
            }

            // Save schedule via AJAX
            $.ajax({
                url: '<?= base_url('event/saveSchedule') ?>',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(scheduleData),
                success: function(response) {
                    if (response.success) {
                        alert('Report scheduled successfully!');
                        $('#scheduleReportRow').hide();
                        $('#scheduleReportForm')[0].reset();
                        $('#oneTimeDateTimeGroup').show();
                        $('#weeklyDayGroup').hide();
                        $('#monthlyDayGroup').hide();
                        $('#recurringTimeGroup').hide();
                    } else {
                        alert('Failed to schedule report: ' + (response.error || 'Unknown error'));
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error scheduling report:', error);
                    alert('Failed to schedule report.');
                }
            });
        });
    });
</script>