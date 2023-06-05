
<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>
            <?php
                if (!empty($laboratorist->id))
                    echo lang('edit_laboratorist');
                else
                    echo lang('add_new_laboratorist');
                ?>
            </h1>
        </div>
        <?php $this->session->flashdata('feedback'); ?>
        <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
            <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <div class="alert-title">Failed!</div>
                <?= validation_errors(); ?>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form role="form" action="laboratorist/addNew" method="post" enctype="multipart/form-data">
                                        <div class="row" style="padding-right:30px">
                                            <div class="col-md-12 row mb-4">
                                                <div class="col-md-4 text-right">
                                                    <label class="col-form-label"><?php echo lang('name'); ?></label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                if (!empty($setval)) {
                                                    echo set_value('name');
                                                }
                                                if (!empty($laboratorist->name)) {
                                                    echo $laboratorist->name;
                                                }
                                                ?>' placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-right:30px">
                                            <div class="col-md-12 row mb-4">
                                                <div class="col-md-4 text-right">
                                                    <label class="col-form-label"><?php echo lang('email'); ?></label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                                if (!empty($setval)) {
                                                    echo set_value('email');
                                                }
                                                if (!empty($laboratorist->email)) {
                                                    echo $laboratorist->email;
                                                }
                                                ?>' placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-right:30px">
                                            <div class="col-md-12 row mb-4">
                                                <div class="col-md-4 text-right">
                                                    <label class="col-form-label"><?php echo lang('password'); ?></label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-right:30px">
                                            <div class="col-md-12 row mb-4">
                                                <div class="col-md-4 text-right">
                                                    <label class="col-form-label"><?php echo lang('address'); ?></label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                                if (!empty($setval)) {
                                                    echo set_value('address');
                                                }
                                                if (!empty($laboratorist->address)) {
                                                    echo $laboratorist->address;
                                                }
                                                ?>' placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-right:30px">
                                            <div class="col-md-12 row mb-4">
                                                <div class="col-md-4 text-right">
                                                    <label class="col-form-label"><?php echo lang('phone'); ?></label>
                                                </div>
                                                <div class="col-md-8">
                                                <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                                    if (!empty($setval)) {
                                                        echo set_value('phone');
                                                    }
                                                    if (!empty($laboratorist->phone)) {
                                                        echo $laboratorist->phone;
                                                    }
                                                    ?>' placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-right:30px">
                                            <div class="col-md-12 row mb-4">
                                                <div class="col-md-4 text-right">
                                                    <label class="col-form-label"><?php echo lang('image') ?></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="file" class="form-control" name="img_url">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($laboratorist->id)) {
                                            echo $laboratorist->id;
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
