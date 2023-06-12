<!--sidebar end-->
<!--main content start-->

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('sms_gateways'); ?></h1>
        </div>
        <?php
        $message = $this->session->flashdata('feedback');
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
        <div class="section-body">
            <div class="row">
                <div class="col-md-7">
                    <h2 class="section-title"><?php echo lang('sms_gateways'); ?></h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="space15"></div>
                                <table class="table table-striped table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><?php echo lang('name'); ?></th>
                                            <th><?php echo lang('website'); ?></th>
                                            <th><?php echo lang('options'); ?></th>
        
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php
                                        $i = 0;
                                        foreach ($sgateways as $sgateway) {
                                            $i = $i + 1;
                                            ?>
                                            <tr class="">
                                                <td><?php echo $i; ?></td>
                                                <td><?php
                                                    if (!empty($sgateway->name)) {
                                                        echo $sgateway->name;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a class="" href="<?php echo $sgateway->link; ?>" target="_blank">  <i class="fa fa-"> </i> <?php echo $sgateway->link; ?></a> 
                                                </td>
                                                <td>
                                                    <a class="btn btn-info btn-xs btn_width" href="sms/settings?id=<?php echo $sgateway->id; ?>">  <i class="fa fa-"> </i> <?php echo lang('manage'); ?></a>                               
                                                </td>
        
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h2 class="section-title"><?php echo lang('select'); ?> <?php echo lang('sms_gateway'); ?></h2>
                    <div class="card">
                        <div class="card-body">
                            <form role="form" id="editAppointmentForm" action="settings/selectSmsGateway" class="clearfix" method="post" enctype="multipart/form-data">
                                <?php foreach ($sgateways as $sgateway) { ?>
                                    <div class="form-group">
                                        <input type="radio" class=""  readonly="" name="sms_gateway" id="exampleInputEmail1" value='<?php echo $sgateway->name; ?>' placeholder="" <?php
                                        if (!empty($sgateway->name)) {
                                            if ($settings->sms_gateway == $sgateway->name) {
                                                echo 'checked';
                                            }
                                        }
                                        ?>> <?php echo $sgateway->name; ?>
                                    </div>
                                <?php } ?>
        
        
                                <input type="hidden" name="id" value="<?php echo $settings->id; ?>">
        
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary submit_button float-right mb-4"><?php echo lang('submit'); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--main content end-->




<style>


    input[type=radio], input[type=checkbox]{
        height: auto !important;
    }

</style>


<script src="common/js/codearistos.min.js"></script>

<script>
                            $(document).ready(function () {
                                $(".flashmessage").delay(3000).fadeOut(100);
                            });
</script>
