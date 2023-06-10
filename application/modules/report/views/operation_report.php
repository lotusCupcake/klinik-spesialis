
<!--sidebar end-->
<!--main content start-->

<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('operation_report'); ?></h1>
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
                    <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>  <?php echo lang('add_new_report'); ?></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table-striped table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th><?php echo lang('patient'); ?></th>
                                    <th><?php echo lang('description'); ?></th>
                                    <th><?php echo lang('doctor'); ?></th>
                                    <th><?php echo lang('date'); ?></th>
                                    <th class="no-print"><?php echo lang('options'); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                            <style>

                                .img_url{
                                    height:20px;
                                    width:20px;
                                    background-size: contain; 
                                    max-height:20px;
                                    border-radius: 100px;
                                }

                            </style>

                            <?php foreach ($reports as $report) { ?>
                                <tr class="">
                                    <td><?php echo explode('*', $report->patient)[0]; ?></td>
                                    <td> <?php echo $report->description; ?></td>
                                    <td><?php echo $report->doctor; ?></td>
                                    <td class="center"><?php echo $report->date; ?></td>
                                    <td class="no-print">
                                        <button type="button" class="btn btn-info btn-xs btn_width editbutton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $report->id; ?>"><i class="fa fa-edit"></i> </button>   
                                        <a class="btn btn-danger btn-xs btn_width delete_button" href="report/delete?id=<?php echo $report->id; ?>" title="<?php echo lang('delete'); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--main content end-->
<!--footer start-->








<!-- Add Accountant Modal-->
<div class="modal fade" role="dialog" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add_new_report'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="report/addReport" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('select_type'); ?></label>
                        <select class="form-control m-bot15" name="type" value=''>
                            <option value="birth" <?php
                            if (!empty($report->report_type)) {
                                if ($report->report_type == 'birth') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('birth'); ?></option>
                            <option value="operation" <?php
                            if (!empty($report->report_type)) {
                                if ($report->report_type == 'operation') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('operation'); ?></option>
                            <option value="expire" <?php
                            if (!empty($report->report_type)) {
                                if ($report->report_type == 'expire') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('expire'); ?></option>
                        </select>
                    </div>
                    <div class="form-group">


                        <label for="exampleInputEmail1"><?php echo lang('description'); ?></label>
                        <input type="text" class="form-control" name="description" id="exampleInputEmail1" value='' placeholder="">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                        <select class="form-control m-bot15" name="patient" value=''> 
                            <?php foreach ($patients as $patient) { ?>
                                <option value="<?php echo $patient->name . '*' . $patient->ion_user_id; ?>" <?php
                                if (!empty($report->patient)) {
                                    if (explode('*', $report->patient)[1] == $patient->ion_user_id) {
                                        echo 'selected';
                                    }
                                }
                                ?> ><?php echo $patient->name; ?> </option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                        <select class="form-control m-bot15" name="doctor" value=''> 
                            <?php foreach ($doctors as $doctor) { ?>
                                <option value="<?php echo $doctor->name; ?>" <?php
                                if (!empty($report->doctor)) {
                                    if ($report->doctor == $doctor->name) {
                                        echo 'selected';
                                    }
                                }
                                ?> ><?php echo $doctor->name; ?> </option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date"><?php echo lang('date'); ?></label>
                        <input type="date" class="form-control" name="date" value="">
                    </div>
                    <input type="hidden" name="id" value=''>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Accountant Modal-->







<!-- Edit Event Modal-->
<div class="modal fade" role="dialog" id="myModal2">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit_birth_report'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" id="editReportForm" class="clearfix" action="report/addReport" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('select_type'); ?></label>
                        <select class="form-control m-bot15" name="type" value=''>
                            <option value="birth" <?php
                            if (!empty($report->report_type)) {
                                if ($report->report_type == 'birth') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('birth'); ?></option>
                            <option value="operation" <?php
                            if (!empty($report->report_type)) {
                                if ($report->report_type == 'operation') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('operation'); ?></option>
                            <option value="expire" <?php
                            if (!empty($report->report_type)) {
                                if ($report->report_type == 'expire') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('expire'); ?></option>
                        </select>
                    </div>
                    <div class="form-group">


                        <label for="exampleInputEmail1"><?php echo lang('description'); ?></label>
                        <input type="text" class="form-control" name="description" id="exampleInputEmail1" value='' placeholder="">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                        <select class="form-control m-bot15" name="patient" value=''> 
                            <?php foreach ($patients as $patient) { ?>
                                <option value="<?php echo $patient->name . '*' . $patient->ion_user_id; ?>" <?php
                                if (!empty($report->patient)) {
                                    if (explode('*', $report->patient)[1] == $patient->ion_user_id) {
                                        echo 'selected';
                                    }
                                }
                                ?> ><?php echo $patient->name; ?> </option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                        <select class="form-control m-bot15" name="doctor" value=''> 
                            <?php foreach ($doctors as $doctor) { ?>
                                <option value="<?php echo $doctor->name; ?>" <?php
                                if (!empty($report->doctor)) {
                                    if ($report->doctor == $doctor->name) {
                                        echo 'selected';
                                    }
                                }
                                ?> ><?php echo $doctor->name; ?> </option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date"><?php echo lang('date'); ?></label>
                        <input type="date" class="form-control" name="date" value="">
                    </div>
                    <input type="hidden" name="id" value=''>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Event Modal-->

<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
                                    $(document).ready(function () {
                                        $(".editbutton").click(function (e) {
                                            e.preventDefault(e);
                                            // Get the record's ID via attribute  
                                            var iid = $(this).attr('data-id');
                                            $('#editReportForm').trigger("reset");

                                            $.ajax({
                                                url: 'report/editReportByJason?id=' + iid,
                                                method: 'GET',
                                                data: '',
                                                dataType: 'json',
                                            }).success(function (response) {
                                                // Populate the form fields with the data returned from server
                                                $('#editReportForm').find('[name="id"]').val(response.report.id).end()
                                                $('#editReportForm').find('[name="type"]').val(response.report.type).end()
                                                $('#editReportForm').find('[name="description"]').val(response.report.description).end()
                                                $('#editReportForm').find('[name="patient"]').val(response.report.patient).end()
                                                $('#editReportForm').find('[name="doctor"]').val(response.report.doctor).end()
                                                $('#editReportForm').find('[name="date"]').val(response.report.date).end()
                                                $('#myModal2').modal('show');
                                            });

                                        });
                                    });
</script>
<script>
    $(document).ready(function () {
        var table = $('#editable-sample').DataTable({
            responsive: true,

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
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: -1,
            "order": [[0, "desc"]],

            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                "url": "common/assets/DataTables/languages/" + bahasa + ".json"
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
