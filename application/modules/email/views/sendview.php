<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('send_email'); ?></h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4></h4>
                    <div class="card-header-form">
                        <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i><?php echo lang('add'); ?> <?php echo lang('template'); ?></button>
                        <button class="btn btn-icon icon-left btn-info ml-2" onclick="location.href = 'email/manualEmailTemplate'"><i class="fa-brands fa-squarespace"></i> <?php echo lang('template'); ?></button>
                        <button class="btn btn-icon icon-left btn-success ml-2" onclick="location.href = 'email/sent'"><i class="fa-solid fa-paper-plane"></i> <?php echo lang('sent_messages'); ?></button>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" action="email/send" method="post" enctype="multipart/form-data">
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('send_email_to'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="radio" id="optionsRadios1" value="allpatient" class="custom-control-input">
                                        <label class="custom-control-label" for="optionsRadios1"><?php echo lang('all_patient'); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="radio" id="optionsRadios2" value="alldoctor" class="custom-control-input">
                                        <label class="custom-control-label" for="optionsRadios2"><?php echo lang('all_doctor'); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="radio" id="optionsRadios3" value="single_patient" class="custom-control-input">
                                        <label class="custom-control-label" for="optionsRadios3"><?php echo lang('single_patient'); ?></label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="radio" id="optionsRadios4" value="other" class="custom-control-input">
                                        <label class="custom-control-label" for="optionsRadios4"><?php echo lang('others'); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row single_patient" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"></label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" id="patientchoose" name="patient">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row other" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" name="other_email" value="" class="form-control" placeholder="<?php echo lang('email'); ?> <?php echo lang('address'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('select_template'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" id='selUser5' name="templates">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('subject'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="subject" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('message'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="selectgroup w-100">
                                        <?php
                                        foreach ($shortcode as $shortcodes) { ?>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="myBtn" value="<?php echo $shortcodes->name; ?>" class="selectgroup-input" onClick="addtext(this);">
                                                <span class="selectgroup-button"><?php echo $shortcodes->name; ?></span>
                                            </label>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"></label>
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control ckeditor" name="message" value="" id="editor1" rows="70" cols="70"></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value=''>
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
        $('.single_patient').hide();
        $('input[type=radio][name=radio]').change(function() {
            if (this.value == 'single_patient') {
                $('.single_patient').show();
            } else {
                $('.single_patient').hide();
            }
        });

    });
</script>
<script>
    $(document).ready(function() {
        $('.other').hide();
        $('input[type=radio][name=radio]').change(function() {
            if (this.value == 'other') {
                $('.other').show();
            } else {
                $('.other').hide();
            }
        });

    });
</script>
<script>
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
<script>
    $(document).ready(function() {
        $("#patientchoose").select2({
            placeholder: '<?php echo lang('select_patient'); ?>',
            allowClear: true,
            ajax: {
                url: 'patient/getPatientinfo',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });
    });
</script>