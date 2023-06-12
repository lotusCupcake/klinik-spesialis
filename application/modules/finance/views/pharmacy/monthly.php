<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <?php
            $currently_processing_year = date('Y', $first_minute);
            $next_year = $currently_processing_year + 1;
            $previous_year = $currently_processing_year - 1;
            ?>
            <h1><?php echo date('Y', $first_minute) . ' ' . lang('pharmacy') . ' ' . lang('sales_report'); ?></h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header  no-print">
                    <div style="font-size: 30px;">
                        <a href="finance/pharmacy/monthly?year=<?php echo $previous_year; ?>" class="mr-4 "><i class="fa fa-arrow-left"></i></a>
                        <a href="finance/pharmacy/monthly?year=<?php echo $next_year; ?>"><i class="fa fa-arrow-right"></i></a>
                    </div>
                    <h4></h4>
                    <div class="card-header-form">
                        <button class="btn btn-icon icon-left btn-primary" onclick="javascript:window.print();"><i class="fas fa-print"></i> <?php echo lang('print') ?></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table table-striped table-bordered" id="editable-sample1">
                            <thead>
                                <tr>
                                    <th> <?php echo lang('date'); ?> </th>
                                    <th> <?php echo lang('amount'); ?> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($month = 1; $month <= 12; $month++) {
                                    $time = mktime(12, 0, 0, $month, 1, $year);
                                    if (!empty($all_payments[date('m-Y', $time)])) {
                                        if (date('Y', $time) == $year) {
                                            $month_name = date('F', $time);
                                            $amount = $all_payments[date('m-Y', $time)];
                                        }
                                    } else {
                                        if (date('Y', $time) == $year) {
                                            $month_name = date('F', $time);
                                            $amount = 0;
                                        }
                                    }
                                ?>
                                    <tr>
                                        <td><?php echo $month_name; ?></td>
                                        <td><?php echo $this->currency; ?><?php echo number_format($amount, 2, '.', ','); ?></td>
                                        <?php $total_amount[] = $amount; ?>
                                    </tr>
                                <?php
                                }
                                ?>
                                <?php
                                if (!empty($total_amount)) {
                                    $total_amount = array_sum($total_amount);
                                } else {
                                    $total_amount = 0;
                                }
                                ?>
                                <tr style="color: #000 !important; font-weight: bold;">
                                    <td><?php echo lang('total'); ?></td>
                                    <td><?php echo $this->currency; ?><?php echo number_format($total_amount, 2, '.', ','); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="common/js/codearistos.min.js"></script>