<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('autosmstemplate'); ?></h1>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table table-striped table-bordered" id="editable-sample1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo lang('category'); ?></th>
                                    <th><?php echo lang('message'); ?></th> 
                                    <th><?php echo lang('status'); ?></th>
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



<!-- Edit sms temp Modal-->
<div class="modal fade" role="dialog" id="myModal1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit'); ?> <?php echo lang('auto'); ?> <?php echo lang('template'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="sms/addNewAutoSMSTemplate" name="myform" id="smstemp" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('category'); ?></label>
                        <input type="text" class="form-control" name="category" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('message'); ?> <?php echo lang('template'); ?></label><br>
                        <div id="divbuttontag"></div>

                        <br><br>
                        <textarea class="" name="message" id="editor1" value="" cols="70" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('status'); ?> </label>
                        <select class="form-control" id="status" name="status"> 
                        </select> 
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="type" value='sms'>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="common/js/codearistos.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".table").on("click", ".editbutton1", function () {
            var iid = $(this).attr('data-id');
            $('#divbuttontag').html("");

            $.ajax({
                url: 'sms/editAutoSMSTemplate?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#smstemp').find('[name="id"]').val(response.autotemplatename.id).end();
                $('#smstemp').find('[name="category"]').val(response.autotemplatename.name).end();
             //   CKEDITOR.instances['editor1'].setData(response.autotemplatename.message);
             $('#smstemp').find('[name="message"]').val(response.autotemplatename.message).end();
                var option = '';
                var count = 0;
                $.each(response.autotag, function (index, value) {
                    option += '<input type="button" name="myBtn" value="' + value.name + '" onClick="addtext(this);">';
                    count += 1;
                    if (count % 7 === 0) {
                        option += '<br><br>';
                    }
                });
                $('#divbuttontag').html(option);
                   $('#status').html(response.status_options);
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
                url: "sms/getAutoSMSTemplateList",
                type: 'POST',
                'data': {'type': 'sms'}
            },
            scroller: {
                loadingIndicator: true
            },
            dom: "<'row'<'col-sm-3'><'col-sm-5 text-center'B><'col-sm-4'>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'>>",
        
             buttons: [
                {extend: 'copyHtml5', exportOptions: {columns: [0, 1, 2], }},
                {extend: 'excelHtml5', exportOptions: {columns: [0, 1, 2], }},
                {extend: 'csvHtml5', exportOptions: {columns: [0, 1, 2], }},
                {extend: 'pdfHtml5', exportOptions: {columns: [0, 1, 2], }},
                {extend: 'print', exportOptions: {columns: [0, 1, 2], }},
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
