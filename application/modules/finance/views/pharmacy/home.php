<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('pharmacy'); ?> <?php echo lang('dashboard'); ?></h1>
        </div>
        <div class="section-body">
            <?php if ($this->ion_auth->in_group('admin')) { ?>
                <div class="row">
                    <div class="col-sm-3">
                        <a href="finance/pharmacy/todaySales">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo lang('today_sales'); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $settings->currency; ?> <?php echo number_format($today_sales_amount, 2, '.', ','); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="finance/pharmacy/todayExpense">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-minus"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo lang('today_expense'); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $settings->currency; ?> <?php echo number_format($today_expenses_amount, 2, '.', ','); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="medicine">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-info">
                                    <i class="fas fa-medkit"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo lang('medicine'); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $this->db->count_all('medicine'); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="accountant">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4><?php echo lang('staff'); ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <?php echo $this->db->count_all('accountant'); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-6">
                    <div id="chart_div" class="card">
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo lang('latest_sales'); ?></h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <div class="space15"></div>
                                <table class="table table-striped" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th> <?php echo lang('date'); ?> </th>
                                            <th> <?php echo lang('grand_total'); ?> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($payments as $payment) {
                                            $i = $i + 1;
                                        ?>
                                            <?php $patient_info = $this->db->get_where('patient', array('id' => $payment->patient))->row(); ?>
                                            <tr class="">
                                                <td><?php echo date('d/m/y', $payment->date); ?></td>
                                                <td><?php echo $settings->currency; ?> <?php echo number_format($payment->gross_total, 2, '.', ','); ?></td>
                                            </tr>
                                        <?php
                                            if ($i == 10)
                                                break;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo lang('latest_expense'); ?></h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <div class="space15"></div>
                                <table class="table table-striped" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th> <?php echo lang('category'); ?> </th>
                                            <th> <?php echo lang('date'); ?> </th>
                                            <th> <?php echo lang('amount'); ?> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($expenses as $expense) {
                                            $i = $i + 1;
                                        ?>
                                            <tr class="">
                                                <td><?php echo $expense->category; ?></td>
                                                <td> <?php echo date('d/m/y', $expense->date); ?></td>
                                                <td><?php echo $settings->currency; ?> <?php echo number_format($expense->amount, 2, '.', ','); ?></td>
                                            </tr>
                                        <?php
                                            if ($i == 10)
                                                break;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo lang('statistics'); ?> <?php echo lang('this_month'); ?></h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <div class="space15"></div>
                                <table class="table table-striped" id="editable-sample">
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <?php echo lang('number_of_sales'); ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary">
                                                    <?php
                                                    $query_n_o_s = $this->db->get('pharmacy_payment')->result();
                                                    $i = 0;
                                                    foreach ($query_n_o_s as $q_n_o_s) {
                                                        if (date('m/y', time()) == date('m/y', $q_n_o_s->date)) {
                                                            $i = $i + 1;
                                                        }
                                                    }
                                                    echo $i;
                                                    ?>
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>
                                                <?php echo lang('total_sales'); ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary">
                                                    <?php echo $settings->currency; ?>
                                                    <?php
                                                    $query = $this->db->get('pharmacy_payment')->result();
                                                    $sales_total = array();
                                                    foreach ($query as $q) {
                                                        if (date('m', time()) == date('m', $q->date)) {
                                                            $sales_total[] = $q->gross_total;
                                                        }
                                                    }
                                                    if (!empty($sales_total)) {
                                                        echo number_format(array_sum($sales_total), 2, '.', ',');
                                                    }
                                                    ?>
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td>
                                                <?php echo lang('number_of_expenses'); ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-success">
                                                    <?php
                                                    $query_n_o_e = $this->db->get('pharmacy_expense')->result();
                                                    $i = 0;
                                                    foreach ($query_n_o_e as $q_n_o_e) {
                                                        if (date('m', time()) == date('m', $q_n_o_e->date)) {
                                                            $i = $i + 1;
                                                        }
                                                    }
                                                    echo $i;
                                                    ?>
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>4</td>
                                            <td>
                                                <?php echo lang('total_expense'); ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-success">
                                                    <?php echo $settings->currency; ?>
                                                    <?php
                                                    $query_expense = $this->db->get('pharmacy_expense')->result();
                                                    $sales_total = array();
                                                    foreach ($query_expense as $q_expense) {
                                                        if (date('m', time()) == date('m', $q_expense->date)) {
                                                            $expense_total[] = $q_expense->amount;
                                                        }
                                                    }
                                                    if (!empty($expense_total)) {
                                                        echo number_format(array_sum($expense_total), 2, '.', ',');
                                                    }
                                                    ?>
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>5</td>
                                            <td>
                                                <?php echo lang('medicine_number'); ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-info">
                                                    <?php
                                                    $query_medicine_number = $this->db->get('medicine')->result();
                                                    $i = 0;
                                                    foreach ($query_medicine_number as $q_medicine_number) {
                                                        $i = $i + 1;
                                                    }
                                                    echo $i;
                                                    ?>
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>6</td>
                                            <td>
                                                <?php echo lang('medicine_quantity'); ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-info">
                                                    <?php
                                                    $query_medicine = $this->db->get('medicine')->result();
                                                    $i = 0;
                                                    foreach ($query_medicine as $q_medicine) {
                                                        if ($q_medicine->quantity > 0) {
                                                            $i = $i + $q_medicine->quantity;
                                                        }
                                                    }
                                                    echo number_format($i, 2, '.', ',');
                                                    ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>
                                                <?php echo lang('medicine_o_s'); ?>
                                            </td>
                                            <td>
                                                <span class="badge badge-warning">
                                                    <?php
                                                    $query_medicine = $this->db->get('medicine')->result();
                                                    $i = 0;
                                                    foreach ($query_medicine as $q_medicine) {
                                                        if ($q_medicine->quantity == 0) {
                                                            $i = $i + 1;
                                                        }
                                                    }
                                                    echo $i;
                                                    ?>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4><?php echo lang('latest_medicines'); ?></h4>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <div class="space15"></div>
                                <table class="table table-striped" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th> <?php echo lang('name'); ?></th>
                                            <th> <?php echo lang('category'); ?></th>
                                            <th> <?php echo lang('price'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 0;
                                        foreach ($latest_medicines as $latest_medicine) {
                                            $i = $i + 1;
                                        ?>
                                            <tr class="">
                                                <td><?php echo $latest_medicine->name; ?></td>
                                                <td> <?php echo $latest_medicine->category; ?></td>
                                                <td><?php echo $settings->currency; ?> <?php echo number_format($latest_medicine->s_price, 2, '.', ','); ?></td>
                                            </tr>
                                        <?php
                                            if ($i == 10)
                                                break;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript" src="common/js/google-loader.js"></script>
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