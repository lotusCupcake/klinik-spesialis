<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('import'); ?></h1>
        </div>
        <?php
        $message = $this->session->flashdata('message');
        if (!empty($message)) {
        ?><div class="alert alert-primary alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <div class="alert-title">Info!</div>
                    <?= $message ?>
                </div>
            </div>
        <?php } ?>
        <?php
        $message1 = $this->session->flashdata('message1');
        if (!empty($message1)) {
        ?><div class="alert alert-primary alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <div class="alert-title">Info!</div>
                    <?= $message1 ?>
                </div>
            </div>
        <?php } ?>
        <?php
        $message2 = $this->session->flashdata('message2');
        if (!empty($message2)) {
        ?><div class="alert alert-primary alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <div class="alert-title">Info!</div>
                    <?= $message ?>
                </div>
            </div>
        <?php } ?>
        <div class="section-body">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="section-title"><?php echo lang('bulk'); ?> <?php echo lang('patient'); ?> <?php echo lang('import'); ?> (xl, xlsx, csv)</h2>
                    <div class="card">
                        <div class="card-body">
                            <form role="form" action="<?php echo site_url('import/importPatientInfo') ?>" class="clearfix" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label><?php echo lang('choose_file'); ?></label>
                                    <input type="file" class="form-control" name="filename" required accept=".xls, .xlsx ,.csv">
                                    <input type="hidden" name="tablename" value="patient">
                                </div>
                                <p class="text-warning">
                                    <a class="text-warning" href="files/downloads/patient_xl_format.xlsx"><strong><?php echo lang('download'); ?></strong></a> <?php echo lang('the_format_of_xl_file'); ?>.
                                    <br> <?php echo lang('please_follow_the_exact_format'); ?>.
                                </p>
                                <button type="submit" name="submit" class="btn btn-primary mt-2 float-right"><?php echo lang('submit'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2 class="section-title"><?php echo lang('bulk'); ?> <?php echo lang('doctor'); ?> <?php echo lang('import'); ?> (xl, xlsx, csv)</h2>
                    <div class="card">
                        <div class="card-body">
                            <form role="form" action="<?php echo site_url('import/importDoctorInfo') ?>" class="clearfix" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label><?php echo lang('choose_file'); ?></label>
                                    <input type="file" class="form-control" name="filename" required accept=".xls, .xlsx ,.csv">
                                    <input type="hidden" name="tablename" value="doctor">
                                </div>
                                <p class="text-warning">
                                    <a class="text-warning" href="files/downloads/doctor_xl_format.xlsx"><strong><?php echo lang('download'); ?></strong></a> <?php echo lang('the_format_of_xl_file'); ?>.
                                    <br> <?php echo lang('please_follow_the_exact_format'); ?>.
                                </p>
                                <button type="submit" name="submit" class="btn btn-primary mt-2 float-right"><?php echo lang('submit'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2 class="section-title"><?php echo lang('bulk'); ?> <?php echo lang('medicine'); ?> <?php echo lang('import'); ?> (xl, xlsx, csv)</h2>
                    <div class="card">
                        <div class="card-body">
                            <form role="form" action="<?php echo site_url('import/importMedicineInfo') ?> " class="clearfix" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label><?php echo lang('choose_file'); ?></label>
                                    <input type="file" class="form-control" name="filename" required accept=".xls, .xlsx ,.csv">
                                    <input type="hidden" name="tablename" value="medicine">
                                </div>
                                <p class="text-warning">
                                    <a class="text-warning" href="files/downloads/medicine_xl_format.xlsx"><strong><?php echo lang('download'); ?></strong></a> <?php echo lang('the_format_of_xl_file'); ?>.
                                    <br> <?php echo lang('please_follow_the_exact_format'); ?>.
                                </p>
                                <button type="submit" name="submit" class="btn btn-primary mt-2 float-right"><?php echo lang('submit'); ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>