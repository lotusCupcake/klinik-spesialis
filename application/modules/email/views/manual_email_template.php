<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('emailtemplate'); ?></h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i><?php echo lang('add_new'); ?> <?php echo lang('template'); ?></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table table-striped table-bordered" id="editable-sample1">
                            <thead>
                                <tr>
                                    <th>No.</th>
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
    </section>
</div>

<div class="modal fade" role="dialog" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add_new'); ?> <?php echo lang('manual'); ?> <?php echo lang('template'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="email/addNewManualTemplate" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('templatename'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('message'); ?> <?php echo lang('template'); ?></label>
                        <div class="selectgroup w-100">
                            <?php
                            foreach ($shortcode as $shortcodes) { ?>
                                <label class="selectgroup-item">
                                    <input type="radio" name="myBtn" value="<?php echo $shortcodes->name; ?>" class="selectgroup-input" onClick="addtextMan1(this);">
                                    <span class="selectgroup-button"><?php echo $shortcodes->name; ?></span>
                                </label>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control ckeditor" name="message" value="" required id="editor5" rows="70" cols="70"></textarea>
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="type" value='email'>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="myModal1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit'); ?> <?php echo lang('manual'); ?> <?php echo lang('template'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="smstemp" name="myform" action="email/addNewManualTemplate" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('templatename'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('message'); ?> <?php echo lang('template'); ?></label>
                        <div class="selectgroup w-100">
                            <?php
                            foreach ($shortcode as $shortcodes) { ?>
                                <label class="selectgroup-item">
                                    <input type="radio" name="myBtn" value="<?php echo $shortcodes->name; ?>" class="selectgroup-input" onClick="addtextMan(this);">
                                    <span class="selectgroup-button"><?php echo $shortcodes->name; ?></span>
                                </label>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control ckeditor" name="message" value="" required id="editor4" rows="70" cols="70"></textarea>
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="type" value='email'>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="common/js/codearistos.min.js"></script>
<!-- <script>
    $(document).ready(function() {
        CKEDITOR.config.autoParagraph = false;
    });
</script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".table").on("click", ".manualTemplate", function() {
            var iid = $(this).attr('data-id');
            var type = 'email';

            $.ajax({
                url: 'email/editManualEmailTemplate?id=' + iid + '&type=' + type,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                $('#smstemp').find('[name="id"]').val(response.templatename.id).end();
                $('#smstemp').find('[name="name"]').val(response.templatename.name).end();
                CKEDITOR.instances['editor4'].setData(response.templatename.message)
                $('#myModal1').modal('show');
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        var table = $('#editable-sample1').DataTable({
            responsive: true,
            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "email/getManualEmailTemplateList",
                type: 'POST',
                'data': {
                    'type': 'email'
                }
            },
            scroller: {
                loadingIndicator: true
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",

            buttons: [{
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    }
                },
            ],
            aLengthMenu: [
                [1, 2, 50, 100, -1],
                [1, 2, 50, 100, "All"]
            ],
            iDisplayLength: 100,
            "order": [
                [0, "desc"]
            ],
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
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
<script>
    function addtextMan(ele) {
        var fired_button = ele.value;
        var value = CKEDITOR.instances.editor4.getData()
        value += fired_button;
        CKEDITOR.instances['editor4'].setData(value)
    }
</script>
<script>
    function addtextMan1(ele) {
        var fired_button = ele.value;
        var value = CKEDITOR.instances.editor5.getData()
        value += fired_button;
        CKEDITOR.instances['editor5'].setData(value)
    }
</script>