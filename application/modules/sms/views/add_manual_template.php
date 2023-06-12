<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>
                <?php if (empty($id)) { ?>
                        <i class="fa fa-plus-circle"></i> <?php echo lang('add_new'); ?> <?php echo lang('manual'); ?> <?php echo lang('template');
                } else { ?>
                        <i class="fa fa-edit"></i> <?php echo lang('edit'); ?> <?php echo lang('manual'); ?> <?php echo lang('template');
                } ?>
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
                    <form role="form" name="myform" action="sms/addNewManualTemplate" method="post" enctype="multipart/form-data">
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('templatename'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                                if (!empty($templatename->name)) {
                                                    echo $templatename->name;
                                                }
                                                if (!empty($setval)) {
                                                    echo set_value('name');
                                                }
                                                ?>' placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('message'); ?> <?php echo lang('template'); ?></label>
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
                                                ?> <br><br>
                                                <textarea class="" id="editor1" name="message" value='<?php
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
                            </div>
                        </div>
                        <input type="hidden" name="id" value='<?php
                            if (!empty($templatename->id)) {
                                echo $templatename->id;
                            }
                        ?>'>
                        <input type="hidden" name="type" value='sms'>
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
<script>
    function addtext(ele) {
        var fired_button = ele.value;
        document.myform.message.value += fired_button;
    }
</script>
