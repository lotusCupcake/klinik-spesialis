
<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('smstemplate'); ?></h1>
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
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> <?php echo lang('add_new'); ?></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table table-striped table-bordered" id="editable-sample1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo lang('templatename'); ?></th>                        
                                    <th><?php echo lang('options'); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--main content end-->

<!--  add Modal-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add_new'); ?> <?php echo lang('manual'); ?> <?php echo lang('template');?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" name="myform1" action="sms/addNewManualTemplate" method="post" enctype="multipart/form-data">                                                                                    
                <div class="modal-body">
                    <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('templatename'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('message'); ?> <?php echo lang('template'); ?></label><br>
                        <?php
                        $count = 0;
                        foreach ($shortcode as $shortcodes) {
                            ?>
                            <input type="button" name="myBtn" value="<?php echo $shortcodes->name; ?>" onClick="addtext1(this);">
                            <?php
                            $count+=1;
                            if ($count === 7) {
                                ?>
                                <br>
                                <?php
                            }
                        }
                        ?> <br><br>
                        <textarea class="" id="editor5" name="message" value='' cols="70" rows="10"></textarea>
                    </div>
                    <input type="hidden" name="id" value=''>
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
<!-- Add Area Modal-->

<!-- Edit sms temp Modal-->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit'); ?> <?php echo lang('manual'); ?> <?php echo lang('template');?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" name="myform" id="smstemp" action="sms/addNewManualTemplate" method="post" enctype="multipart/form-data">                                                                                    
                <div class="modal-body">
                    <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('templatename'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('message'); ?> <?php echo lang('template'); ?></label><br>
                        <?php
                        $count = 0;
                        foreach ($shortcode as $shortcodes) {
                            ?>
                            <input type="button" name="myBtn" value="<?php echo $shortcodes->name; ?>" onClick="addtext1(this);">
                            <?php
                            $count+=1;
                            if ($count === 7) {
                                ?>
                                <br>
                                <?php
                            }
                        }
                        ?> <br><br>
                        <textarea class="" id="editor5" name="message" value='' cols="70" rows="10"></textarea>
                    </div>
                    <input type="hidden" name="id" value=''>
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
<script>
    $(document).ready(function () {
        CKEDITOR.config.autoParagraph = false;
    });
</script>
<script type="text/javascript">
                                    $(document).ready(function () {
                                         $(".table").on("click", ".editbutton1", function () {
                                           // e.preventDefault(e);
                                            // Get the record's ID via attribute  
                                            var iid = $(this).attr('data-id');
                                            var type = 'sms';
                                           
                                            $.ajax({
                                                url: 'sms/editManualSMSTemplate?id=' + iid + '&type=' + type,
                                                method: 'GET',
                                                data: '',
                                                dataType: 'json',
                                            }).success(function (response) {
                                                // Populate the form fields with the data returned from server
                                                $('#smstemp').find('[name="id"]').val(response.templatename.id).end() ;
                                                $('#smstemp').find('[name="name"]').val(response.templatename.name).end() ;
                                                 $('#smstemp').find('[name="message"]').val(response.templatename.message).end() ;
                                               // CKEDITOR.instances['editor4'].setData(response.templatename.message)
                                             //   $('#smstemp').find('[name="message"]').val(response.templatename.message).end();
                                                $('#myModal1').modal('show');
                                            });
                                        });
                                    });
</script>
<script>


    $(document).ready(function () {
        var table = $('#editable-sample1').DataTable({
            responsive: true,
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "sms/getManualSMSTemplateList",
                type: 'POST',
                'data': {'type': 'sms'}
            },
            scroller: {
                loadingIndicator: true
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            
             buttons: [
                {extend: 'copyHtml5', exportOptions: {columns: [0, 1, 2, 3], }},
                {extend: 'excelHtml5', exportOptions: {columns: [0, 1, 2, 3], }},
                {extend: 'csvHtml5', exportOptions: {columns: [0, 1, 2, 3], }},
                {extend: 'pdfHtml5', exportOptions: {columns: [0, 1, 2, 3], }},
                {extend: 'print', exportOptions: {columns: [0, 1, 2, 3], }},
            ],
            aLengthMenu: [
                [1, 2, 50, 100, -1],
                [1, 2, 50, 100, "All"]
            ],
            iDisplayLength: 100,
            "order": [[0, "desc"]],
            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            },
        });
        table.buttons().container()
                .appendTo('.custom_buttons');
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