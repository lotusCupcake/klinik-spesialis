<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('dashboard'); ?></h1>
        </div>
        <div class="section-body">
            <?php if ($this->ion_auth->in_group('admin')) { ?>
                <div class="row">
                    <div class="col-sm-3">
                        <a href="doctor">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-user-md"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo lang('doctor'); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $this->db->count_all('doctor'); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="patient">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-user-injured"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo lang('patient'); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $this->db->count_all('patient'); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="appointment">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-info">
                                    <i class="fas fa-calendar"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo lang('appointment'); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $this->db->count_all('appointment'); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="prescription/all">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-file-medical"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo lang('prescription'); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $this->db->count_all('prescription'); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <a href="patient/caseList">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-medkit"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo lang('case_history'); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $this->db->count_all('medical_history'); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="lab">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-info">
                                    <i class="fas fa-flask"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo lang('lab_report'); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $this->db->count_all('lab'); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="patient/documents">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-file"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo lang('documents'); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $this->db->count_all('patient_material'); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="finance/payment">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-money-check"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo lang('payment'); ?> <?php echo lang('invoice'); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $this->db->count_all('payment'); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-8">
                    <div id="chart_div" class="card">
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <aside class="calendar_ui col-md-12 calendar_ui">
                                <section class="">
                                    <div class="">
                                        <div id="calendar" class="has-toolbar calendar_view"></div>
                                    </div>
                                </section>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="piechart_3d" class="card">
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo date('D d F, Y'); ?></h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong><?php echo lang('income'); ?></strong> : <?php echo $settings->currency; ?><?php echo number_format($this_day['payment'], 2, '.', ','); ?></li>
                                <li class="list-group-item"><strong><?php echo lang('expense'); ?></strong> : <?php echo $settings->currency; ?><?php echo number_format($this_day['expense'], 2, '.', ','); ?></li>
                                <li class="list-group-item"><strong><?php echo lang('appointment'); ?></strong> : <?php echo $this_day['appointment']; ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo date('F, Y'); ?></h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong><?php echo lang('income'); ?></strong> : <?php echo $settings->currency; ?><?php echo number_format($this_month['payment'], 2, '.', ','); ?></li>
                                <li class="list-group-item"><strong><?php echo lang('expense'); ?></strong> : <?php echo $settings->currency; ?><?php echo number_format($this_month['expense'], 2, '.', ','); ?></li>
                                <li class="list-group-item"><strong><?php echo lang('appointment'); ?></strong> : <?php echo $this_month['appointment']; ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo date('Y'); ?></h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong><?php echo lang('income'); ?></strong> : <?php echo $settings->currency; ?><?php echo number_format($this_year['payment'], 2, '.', ','); ?></li>
                                <li class="list-group-item"><strong><?php echo lang('expense'); ?></strong> : <?php echo $settings->currency; ?><?php echo number_format($this_year['expense'], 2, '.', ','); ?></li>
                                <li class="list-group-item"><strong><?php echo lang('appointment'); ?></strong> : <?php echo $this_year['appointment']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript" src="common/js/google-loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var months = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        var d = new Date();
        var selectedMonthName = months[d.getMonth()] + ', ' + d.getFullYear();
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Income', <?php
                        if (!empty($this_month['payment'])) {
                            echo $this_month['payment'];
                        } else {
                            echo '0';
                        }
                        ?>],
            ['Expense', <?php
                        if (!empty($this_month['expense'])) {
                            echo $this_month['expense'];
                        } else {
                            echo '0';
                        }
                        ?>],
        ]);
        var options = {
            title: selectedMonthName,
            is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawVisualization);

    function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
            ['Month', 'Income', 'Expense'],
            ['Jan', <?php echo $this_year['payment_per_month']['january']; ?>, <?php echo $this_year['expense_per_month']['january']; ?>],
            ['Feb', <?php echo $this_year['payment_per_month']['february']; ?>, <?php echo $this_year['expense_per_month']['february']; ?>],
            ['Mar', <?php echo $this_year['payment_per_month']['march']; ?>, <?php echo $this_year['expense_per_month']['march']; ?>],
            ['Apr', <?php echo $this_year['payment_per_month']['april']; ?>, <?php echo $this_year['expense_per_month']['april']; ?>],
            ['May', <?php echo $this_year['payment_per_month']['may']; ?>, <?php echo $this_year['expense_per_month']['may']; ?>],
            ['June', <?php echo $this_year['payment_per_month']['june']; ?>, <?php echo $this_year['expense_per_month']['june']; ?>],
            ['July', <?php echo $this_year['payment_per_month']['july']; ?>, <?php echo $this_year['expense_per_month']['july']; ?>],
            ['Aug', <?php echo $this_year['payment_per_month']['august']; ?>, <?php echo $this_year['expense_per_month']['august']; ?>],
            ['Sep', <?php echo $this_year['payment_per_month']['september']; ?>, <?php echo $this_year['expense_per_month']['september']; ?>],
            ['Oct', <?php echo $this_year['payment_per_month']['october']; ?>, <?php echo $this_year['expense_per_month']['october']; ?>],
            ['Nov', <?php echo $this_year['payment_per_month']['november']; ?>, <?php echo $this_year['expense_per_month']['november']; ?>],
            ['Dec', <?php echo $this_year['payment_per_month']['december']; ?>, <?php echo $this_year['expense_per_month']['december']; ?>],
        ]);
        var options = {
            title: new Date().getFullYear() + ' <?php echo lang('per_month_income_expense'); ?>',
            vAxis: {
                title: '<?php echo $settings->currency; ?>'
            },
            hAxis: {
                title: '<?php echo lang('months'); ?>'
            },
            seriesType: 'bars',
            series: {
                5: {
                    type: 'line'
                }
            }
        };
        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>