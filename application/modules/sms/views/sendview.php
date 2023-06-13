<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1 class="col"><?php echo lang('send_sms'); ?></h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4></h4>
                    <div class="card-header-form">
                        <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i><?php echo lang('add'); ?> <?php echo lang('template'); ?></button>
                        <button class="btn btn-icon icon-left btn-info ml-2" onclick="location.href = 'sms/manualSMSTemplate'"><i class="fa-brands fa-squarespace"></i> <?php echo lang('template'); ?></button>
                        <button class="btn btn-icon icon-left btn-success ml-2" onclick="location.href = 'sms/sent'"><i class="fa-solid fa-paper-plane"></i> <?php echo lang('sent_messages'); ?></button>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" name="myform" id="myform" class="clearfix" action="sms/send" method="post">
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('send_sms_to'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="radio" id="optionsRadios1" value="allpatient">
                                            <?php echo lang('all_patient'); ?>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="radio" id="optionsRadios2" value="alldoctor">
                                            <?php echo lang('all_doctor'); ?>
                                        </label>
                                    </div>
                                


                                    <div class="radio pos_client">
                                        <label>
                                            <?php echo lang('select_blood_group'); ?>
                                            <select class="form-control m-bot15" name="bloodgroup" value=''>
                                                <?php foreach ($groups as $group) { ?>
                                                    <option value="<?php echo $group->group; ?>"> <?php echo $group->group; ?> </option>
                                                <?php } ?> 
                                            </select>
                                        </label>

                                    </div>




                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="radio" id="optionsRadios2" value="single_patient">
                                            <?php echo lang('single_patient'); ?>
                                        </label>
                                    </div>

                                    <div class="radio single_patient">
                                        <label>
                                            <?php echo lang('select_patient'); ?>
                                            <select class="form-control m-bot15" id='patientchoose' name="patient" value=''>
                                                <?php //foreach ($patients as $patient) { ?>
                                                <!-- <option value="<?php echo $patient->id; ?>"> <?php echo $patient->name; ?> </option>-->
                                                <?php // } ?> 
                                            </select>
                                        </label>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('select_template'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control m-bot15" id='selUser5' name="templatess" style='width: 100%;'>
                                    <!-- <option value='0'><?php echo lang('select_template'); ?></option>-->
                                    </select>
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
                                        $count = 0;
                                        foreach ($shortcode as $shortcodes) {
                                            ?>
                                            <input type="button" name="myBtn" value="<?php echo $shortcodes->name; ?>" onClick="addtext(this);">
                                            <?php
                                            $count+=1;
                                            if ($count === 7) {
                                                ?>
                                                <br>
                                                <?php
                                            }
                                        }
                                    ?> <br>
                                    <textarea class="" id="editor1" name="message" value="" cols="70" rows="10"></textarea>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" value=''>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right"></div>
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







<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add_new'); ?> <?php echo lang('template'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" name="myform1" action="sms/addNewManualTemplate" method="post" enctype="multipart/form-data">                                                                                    
                <div class="modal-body">
                    <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('templatename'); ?></label>
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
                        <label for="exampleInputEmail1"> <?php echo lang('message'); ?> <?php echo lang('template'); ?></label><br>
                        <?php
                        $count1 = 0;
                        foreach ($shortcode as $shortcodes) {
                            ?>
                            <input type="button" name="myBtn" value="<?php echo $shortcodes->name; ?>" onClick="addtext1(this);">
                            <?php
                            $count1+=1;
                            if ($count1 === 7) {
                                ?>
                                <br>
                                <?php
                            }
                        }
                        ?> <br><br>
    
                        <textarea class="" id="editor2"name="message" value='<?php
                        if (!empty($templatename->message)) {
                            echo $templatename->message;
                        }
                        if (!empty($setval)) {
                            echo set_value('message');
                        }
                        ?>' cols="70" rows="10"placeholder="" required> <?php
                                      if (!empty($templatename->message)) {
                                          echo $templatename->message;
                                      }
                                      if (!empty($setval)) {
                                          echo set_value('message');
                                      }
                                      ?></textarea>
                    </div>
                    <input type="hidden" name="id" value='<?php
                    if (!empty($templatename->id)) {
                        echo $templatename->id;
                    }
                    ?>'>
                    <input type="hidden" name="type" value='sms'>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>














<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">


                                $(document).ready(function () {
                                    $(".voterAW").click(function () {
                                        $("#area_id").val($(this).attr('data-id'));
                                        $('#myModal2').modal('show');
                                    });
                                    $(".volunteerAW").click(function () {
                                        $("#area_idd").val($(this).attr('data-id'));
                                        $('#myModal4').modal('show');
                                    });
                                });

</script>


<script>
    $(document).ready(function () {
        $('.pos_client').hide();
        $('input[type=radio][name=radio]').change(function () {
            if (this.value == 'bloodgroupwise') {
                $('.pos_client').show();
            } else {
                $('.pos_client').hide();
            }
        });

    });


</script> 

<script>
    $(document).ready(function () {
        $('.single_patient').hide();
        $('input[type=radio][name=radio]').change(function () {
            if (this.value == 'single_patient') {
                $('.single_patient').show();
            } else {
                $('.single_patient').hide();
            }
        });

    });


</script> 




<script>
    $(document).ready(function () {
        $('.staff').hide();
        $('input[type=radio][name=radio]').change(function () {
            if (this.value == 'staff') {
                $('.staff').show();
            } else {
                $('.staff').hide();
            }
        });

    });


</script> 

<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
<script>
    function addtext(ele) {
        var fired_button = ele.value;
        document.myform.message.value += fired_button;
    }
</script>
<script>
    function addtext1(ele) {
        var fired_button = ele.value;
        document.myform1.message.value += fired_button;
    }
</script>

<script>
     $(document).ready(function () {
         $("#patientchoose").select2({
            placeholder: '<?php echo lang('select_patient'); ?>',
            allowClear: true,
            ajax: {
                url: 'patient/getPatientinfo',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });
     });
    </script>