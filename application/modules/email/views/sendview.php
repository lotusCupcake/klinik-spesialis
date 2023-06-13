<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('send_email'); ?></h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">

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

<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".voterAW").click(function() {
            $("#area_id").val($(this).attr('data-id'));
            $('#myModal2').modal('show');
        });
        $(".volunteerAW").click(function() {
            $("#area_idd").val($(this).attr('data-id'));
            $('#myModal4').modal('show');
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('.pos_client').hide();
        $('input[type=radio][name=radio]').change(function() {
            if (this.value == 'bloodgroupwise') {
                $('.pos_client').show();
            } else {
                $('.pos_client').hide();
            }
        });

    });
</script>

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
        $('.staff').hide();
        $('input[type=radio][name=radio]').change(function() {
            if (this.value == 'staff') {
                $('.staff').show();
            } else {
                $('.staff').hide();
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
    function addtext(ele) {
        var fired_button = ele.value;
        var value = CKEDITOR.instances.editor1.getData()
        value += fired_button;
        CKEDITOR.instances['editor1'].setData(value)
    }
</script>
<script>
    function addtext1(ele) {
        var fired_button = ele.value;
        var value = CKEDITOR.instances.editor2.getData()
        value += fired_button;
        CKEDITOR.instances['editor2'].setData(value)
    }
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