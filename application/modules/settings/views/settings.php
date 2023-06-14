<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('settings'); ?></h1>
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
                    <form role="form" action="settings/update" method="post" enctype="multipart/form-data">
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('system_name'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                                                                                        if (!empty($settings->system_vendor)) {
                                                                                                                            echo $settings->system_vendor;
                                                                                                                        }
                                                                                                                        ?>' placeholder="system name">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('title'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" value='<?php
                                                                                                                        if (!empty($settings->title)) {
                                                                                                                            echo $settings->title;
                                                                                                                        }
                                                                                                                        ?>' placeholder="title">
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
                                                                                                                            if (!empty($settings->address)) {
                                                                                                                                echo $settings->address;
                                                                                                                            }
                                                                                                                            ?>' placeholder="address">
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
                                                                                                                        if (!empty($settings->phone)) {
                                                                                                                            echo $settings->phone;
                                                                                                                        }
                                                                                                                        ?>' placeholder="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('hospital_email'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                                                                                                        if (!empty($settings->email)) {
                                                                                                                            echo $settings->email;
                                                                                                                        }
                                                                                                                        ?>' placeholder="email">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('currency'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="currency" id="exampleInputEmail1" value='<?php
                                                                                                                            if (!empty($settings->currency)) {
                                                                                                                                echo $settings->currency;
                                                                                                                            }
                                                                                                                            ?>' placeholder="currency">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('timezone'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="timezone">
                                        <?php
                                        foreach ($timezones as $key => $timezone) {
                                        ?>
                                            <option value="<?php echo $key ?>" <?php
                                                                                if ($key == $settings->timezone) {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>><?php echo $timezone; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('invoice_logo') ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" class="form-control" name="img_url" value="<?php
                                                                                                    if (!empty($settings->invoice_logo)) {
                                                                                                        echo $settings->invoice_logo;
                                                                                                    }
                                                                                                    ?>">
                                    <p class="text-warning mt-2"><?php echo lang('recommended_size'); ?> : 200x100</p>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control" name="buyer" id="exampleInputEmail1" value='<?php
                                                                                                                if (!empty($settings->codec_username)) {
                                                                                                                    echo $settings->buyer;
                                                                                                                }
                                                                                                                ?>' placeholder="codec_username">
                        <input type="hidden" class="form-control" name="p_code" id="exampleInputEmail1" value='<?php
                                                                                                                if (!empty($settings->codec_purchase_code)) {
                                                                                                                    echo $settings->phone;
                                                                                                                }
                                                                                                                ?>' placeholder="codec_purchase_code">
                        <input type="hidden" name="id" value='<?php
                                                                if (!empty($settings->id)) {
                                                                    echo $settings->id;
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
    </section>
</div>