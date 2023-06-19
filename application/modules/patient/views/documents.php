<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('patient'); ?> <?php echo lang('documents'); ?></h1>
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
                    <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#myModal1"><i class="fas fa-plus"></i> <?php echo lang('add_new'); ?></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table table-striped table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo lang('date'); ?></th>
                                    <th scope="col"><?php echo lang('patient'); ?></th>
                                    <th scope="col"><?php echo lang('description'); ?></th>
                                    <th style="width: 20%;" scope="col"><?php echo lang('document'); ?></th>
                                    <th class="no-print" scope="col"><?php echo lang('options'); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--main content end-->
<!--footer start-->




<!-- Add Patient Material Modal-->
<div class="modal fade" role="dialog" id="myModal1">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add'); ?> <?php echo lang('files'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="patient/addPatientMaterial" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-grup">
                                <label><?php echo lang('patient'); ?></label>
                                <select name="patient" id="patientchoose" class="form-control select2"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('title'); ?></label>
                                <input type="text" class="form-control" name="title" id="title" value='' placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('file'); ?></label>
                        <input type="file" class="form-control" name="img_url">
                    </div>
                    <input type="hidden" name="redirect" value='patient/documents'>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Patient Modal-->


<script src="common/js/codearistos.min.js"></script>



<script>
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>


<script>
    $(document).ready(function() {
        var table = $('#editable-sample').DataTable({
            responsive: true,
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "patient/getDocuments",
                type: 'POST',
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
                        columns: [1, 2, 3],
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [1, 2, 3],
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [1, 2, 3],
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [1, 2, 3],
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 3],
                    }
                },
            ],
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
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