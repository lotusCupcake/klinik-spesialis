<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('email_settings'); ?></h1>
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
                    <form role="form" action="email/addNewSettings" method="post" enctype="multipart/form-data">
                        <?php if ($settings->type == 'Domain Email') { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('admin'); ?> <?php echo lang('email'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="email" name="email" value="<?php
                                                                                if (!empty($settings->admin_email)) {
                                                                                    echo $settings->admin_email;
                                                                                }
                                                                                ?>" class="form-control" placeholder="From which you want to send the email">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"></label>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="text-danger"><?php echo lang('email_settings_instruction_1') ?> <br> <?php echo lang('email_settings_instruction_2') ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($settings->type == 'Smtp') { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('admin'); ?> <?php echo lang('email'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control select2 pos_select" id="emailCompany" name="email_company">
                                            <option><?php echo lang('select'); ?></option>
                                            <option value="gmail" <?php
                                                                    if ($settings->mail_provider == 'gmail') {
                                                                        echo 'selected';
                                                                    }
                                                                    ?>><?php echo lang('gmail'); ?></option>
                                            <option value="yahoo" <?php
                                                                    if ($settings->mail_provider == 'yahoo') {
                                                                        echo 'selected';
                                                                    }
                                                                    ?>><?php echo lang('yahoo_mail'); ?></option>
                                            <option value="zoho" <?php
                                                                    if ($settings->mail_provider == 'zoho') {
                                                                        echo 'selected';
                                                                    }
                                                                    ?>><?php echo lang('zoho_mail'); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label for="exampleInputEmail1"><?php echo lang('email'); ?> <?php echo lang('address'); ?></label>
                                    </div>
                                    <?php
                                    if (!empty($settings->user)) {
                                        $extension = explode("@", $settings->user);
                                    }
                                    ?>
                                    <div class="col-md-8">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="user" id="emailAddress" value='<?php
                                                                                                                            if (!empty($settings->user)) {
                                                                                                                                echo $extension[0];
                                                                                                                            }
                                                                                                                            ?>' placeholder="Email user" required="">
                                            <div class="input-group-append">
                                                <div class="input-group-text" id="mailExtension"><?php
                                                                                                    if (!empty($settings->user)) {
                                                                                                        echo '@' . $extension[1];
                                                                                                    }
                                                                                                    ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label for="exampleInputEmail1"> <?php echo lang('email'); ?> <?php echo lang('password'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="password" id="exampleInputEmail1" value='<?php
                                                                                                                                    if (!empty($settings->password)) {
                                                                                                                                        echo base64_decode($settings->password);
                                                                                                                                    }
                                                                                                                                    ?>' placeholder="<?php echo lang('email') . " " . lang('password'); ?>" required="">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"></label>
                                </div>
                                <div class="col-md-8">
                                    <p class="text-danger"><?php echo lang('yahoo_mail_password_instruction1') ?><br><?php echo lang('yahoo_mail_password_instruction2') ?><br><?php echo lang('yahoo_mail_password_instruction3') ?><br><?php echo lang('yahoo_mail_password_instruction4') ?></p>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value='<?php
                                                                if (!empty($settings->id)) {
                                                                    echo $settings->id;
                                                                }
                                                                ?>'>
                        <input type="hidden" name="type" value='<?php
                                                                if (!empty($settings->type)) {
                                                                    echo $settings->type;
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

<div class="modal fade" role="dialog" id="myModal1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add_new'); ?> <?php echo lang('template'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="myform1" action="email/addNewManualTemplate" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('templatename'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                                                                            if (!empty($templatename->name)) {
                                                                                                                echo $templatename->name;
                                                                                                            }
                                                                                                            if (!empty($setval)) {
                                                                                                                echo set_value('name');
                                                                                                            }
                                                                                                            ?>' placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('message'); ?> <?php echo lang('template'); ?></label>
                        <div class="selectgroup w-100">
                            <?php
                            foreach ($shortcode as $shortcodes) { ?>
                                <label class="selectgroup-item">
                                    <input type="radio" name="myBtn" value="<?php echo $shortcodes->name; ?>" class="selectgroup-input" onClick="addtext1(this);">
                                    <span class="selectgroup-button"><?php echo $shortcodes->name; ?></span>
                                </label>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control ckeditor" name="message" value="<?php
                                                                                        if (!empty($templatename->message)) {
                                                                                            echo $templatename->message;
                                                                                        }
                                                                                        if (!empty($setval)) {
                                                                                            echo set_value('message');
                                                                                        }
                                                                                        ?>" required id="editor2" rows="70" cols="70"><?php
                                                                                                                                        if (!empty($templatename->message)) {
                                                                                                                                            echo $templatename->message;
                                                                                                                                        }
                                                                                                                                        if (!empty($setval)) {
                                                                                                                                            echo set_value('message');
                                                                                                                                        }
                                                                                                                                        ?></textarea>
                    </div>
                </div>
                <input type="hidden" name="id" value='<?php
                                                        if (!empty($templatename->id)) {
                                                            echo $templatename->id;
                                                        }
                                                        ?>'>
                <input type="hidden" name="type" value='email'>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="common/js/codearistos.min.js"></script>
<script>
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
        $('#emailCompany').select2();
        $('#emailCompany').change(function() {
            var value = $(this).val();
            $('#mailExtension').html(" ");
            if (value == 'gmail') {
                var extension = '@gmail.com';
            }
            if (value == 'yahoo') {
                var extension = '@yahoo.com';
            }
            if (value == 'outlook') {
                var extension = '@outlook.com';
            }
            if (value == 'hotmail') {
                var extension = '@hotmail.com';
            }
            if (value == 'zoho') {
                var extension = '@zohomail.com';
            }
            $('#mailExtension').html(extension);
            $('#emailAddress').val("");
        })
    })
</script>