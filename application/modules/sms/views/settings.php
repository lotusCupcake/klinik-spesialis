<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><i class="fa fa-gear"></i>  <?php echo $settings->name; ?> <?php echo lang('sms_settings'); ?></h1>
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
                    <form role="form" action="sms/addNewSettings" method="post" enctype="multipart/form-data">
                        <?php if ($settings->name == 'Clickatell') { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo $settings->name; ?> <?php echo lang('username'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" value='<?php
                                                    if (!empty($settings->username)) {
                                                        echo base64_decode($settings->username);
                                                    }
                                                    ?>' placeholder="" <?php
                                                           if (!$this->ion_auth->in_group('admin')) {
                                                               echo 'disabled';
                                                           }
                                                           ?>>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo $settings->name; ?> <?php echo lang('api'); ?> <?php echo lang('password'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="password" class="form-control" name="password" id="exampleInputEmail1"value='<?php
                                                    if (!empty($settings->password)) {
                                                        echo base64_decode($settings->password);
                                                    }
                                                    ?>'  placeholder="********">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('api'); ?> <?php echo lang('id'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control" name="api_id" id="exampleInputEmail1" value='<?php
                                                    if (!empty($settings->api_id)) {
                                                        echo $settings->api_id;
                                                    }
                                                    ?>' placeholder="" <?php
                                                           if (!empty($settings->username)) {
                                                               echo $settings->username;
                                                           }
                                                           ?> <?php
                                                           if (!$this->ion_auth->in_group('admin')) {
                                                               echo 'disabled';
                                                           }
                                                           ?>>
                                    </div>
                                </div>
                            </div>
                            
                        <?php } ?>

                        <?php if ($settings->name == 'Bulk Sms') { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo $settings->name; ?> <?php echo lang('username'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" value='<?php
                                                    if (!empty($settings->username)) {
                                                        echo base64_decode($settings->username);
                                                    }
                                                    ?>' placeholder="" <?php
                                                           if (!$this->ion_auth->in_group('admin')) {
                                                               echo 'disabled';
                                                           }
                                                    ?>>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo $settings->name; ?> <?php echo lang('password'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="password" class="form-control" name="password" value='<?php
                                                    if (!empty($settings->password)) {
                                                        echo base64_decode($settings->password);
                                                    }
                                                    ?>' id="exampleInputEmail1" placeholder="********">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php if ($settings->name == 'MSG91') { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('authkey'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control" name="authkey" id="exampleInputEmail1" value='<?php
                                                    if (!empty($settings->authkey)) {
                                                        echo $settings->authkey;
                                                    }
                                                    ?>' placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('sender'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control" name="sender" id="exampleInputEmail1" value='<?php
                                                    if (!empty($settings->sender)) {
                                                        echo $settings->sender;
                                                    }
                                                    ?>' placeholder="">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($settings->name == 'Twilio') { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo $settings->name; ?> <?php echo lang('sid'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control" name="sid" id="exampleInputEmail1" value='<?php
                                                    if (!empty($settings->sid)) {
                                                        echo $settings->sid;
                                                    }
                                                    ?>' placeholder="" <?php
                                                           if (!$this->ion_auth->in_group('admin')) {
                                                               echo 'disabled';
                                                           }
                                                           ?>>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo $settings->name; ?> <?php echo lang('token'); ?> <?php echo lang('password'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control" name="token" id="exampleInputEmail1"value='<?php
                                                    if (!empty($settings->token)) {
                                                        echo $settings->token;
                                                    }
                                                    ?>'<?php
                                                           if (!$this->ion_auth->in_group('admin')) {
                                                               echo 'disabled';
                                                           }
                                                           ?>  >
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('sendernumber'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control" name="sendernumber" id="exampleInputEmail1" value='<?php
                                                    if (!empty($settings->sendernumber)) {
                                                        echo $settings->sendernumber;
                                                    }
                                                    ?>' <?php
                                                           if (!$this->ion_auth->in_group('admin')) {
                                                               echo 'disabled';
                                                           }
                                                           ?>>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($settings->name == 'Bd Bulk Sms') { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo $settings->name; ?> <?php echo lang('token'); ?> <?php echo lang('password'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control" name="token" id="exampleInputEmail1"value='<?php
                                                    if (!empty($settings->token)) {
                                                        echo $settings->token;
                                                    }
                                                    ?>'<?php
                                                           if (!$this->ion_auth->in_group('admin')) {
                                                               echo 'disabled';
                                                           }
                                                           ?>  >
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
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
        </div>
    </div>
</div>
<!--main content end-->
<!--footer start-->

<script src="common/js/codearistos.min.js"></script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>