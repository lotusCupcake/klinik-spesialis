<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>
            <?php
                if (!empty($report->id)) {
                    echo '<i class="fa fa-edit"></i> ' . lang('edit_report');
                } else {
                    echo '<i class="fa fa-plus-circle"></i> ' . lang('add_new_report');
                }
            ?>
            </h1>
        </div>
        <?php
        $message = validation_errors();
        if (!empty($message)) {
        ?><div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <div class="alert-title">Failed!</div>
                    <?= $message; ?>
                </div>
            </div>
        <?php } ?>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form role="form" action="report/addReport" method="post" enctype="multipart/form-data">
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('select_type'); ?></label>
                                </div>
                                <div class="col-md-8">
                                        <select class="form-control m-bot15 js-example-basic-single" name="type" value=''>
                                                <option value="birth" <?php
                                                if (!empty($setval)) {
                                                    if (set_value('type') == 'birth') {
                                                        echo 'selected';
                                                    }
                                                }
                                                if (!empty($report->report_type)) {
                                                    if ($report->report_type == 'birth') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>><?php echo lang('birth'); ?></option>
                                                <option value="operation" <?php
                                                if (!empty($setval)) {
                                                    if (set_value('type') == 'operation') {
                                                        echo 'selected';
                                                    }
                                                }
                                                if (!empty($report->report_type)) {
                                                    if ($report->report_type == 'operation') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>><?php echo lang('operation'); ?></option>
                                                <option value="expire" <?php
                                                if (!empty($setval)) {
                                                    if (set_value('type') == 'expire') {
                                                        echo 'selected';
                                                    }
                                                }
                                                if (!empty($report->report_type)) {
                                                    if ($report->report_type == 'expire') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>><?php echo lang('expire'); ?></option>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('description'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="description" id="exampleInputEmail1" value='<?php
                                            if (!empty($setval)) {
                                                echo set_value('description');
                                            }
                                            if (!empty($report->description)) {
                                                echo $report->description;
                                            }
                                            ?>' placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('patient'); ?></label>
                                </div>
                                <div class="col-md-8">
                                        <select class="form-control m-bot15 js-example-basic-single" name="patient" value=''> 
                                                <?php foreach ($patients as $patient) { ?>
                                                    <option value="<?php echo $patient->name . '*' . $patient->ion_user_id; ?>" <?php
                                                    if (!empty($report->patient)) {
                                                        if (explode('*', $report->patient)[1] == $patient->ion_user_id) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> ><?php echo $patient->name; ?> </option>
                                                        <?php } ?>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('doctor'); ?></label>
                                </div>
                                <div class="col-md-8">
                                        <select class="form-control m-bot15 js-example-basic-single" name="doctor" value=''> 
                                                <?php foreach ($doctors as $doctor) { ?>
                                                    <option value="<?php echo $doctor->name; ?>" <?php
                                                    if (!empty($setval)) {
                                                        if (set_value('doctor') == $doctor->name) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    if (!empty($report->doctor)) {
                                                        if ($report->doctor == $doctor->name) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> ><?php echo $doctor->name; ?> </option>
                                                        <?php } ?>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('date'); ?></label>
                                </div>
                                <div class="col-md-8">
                                <input type="date" class="form-control" name="date" value="<?php
                                            if (!empty($setval)) {
                                                echo set_value('date');
                                            }
                                            if (!empty($report->date)) {
                                                echo $report->date;
                                            }
                                            ?>">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value='<?php
                                        if (!empty($report->id)) {
                                            echo $report->id;
                                        }
                                        ?>'>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                </div>
                                <div class="col-md-8">
                                    <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<!--main content end-->
<!--footer start-->
