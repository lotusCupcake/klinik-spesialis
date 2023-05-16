<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('case'); ?> </h1>
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
        <div class="section-body no-print">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="section-title"><?php echo lang('add'); ?> <?php echo lang('case'); ?></h2>
                    <div class="card">
                        <form role="form" action="patient/addMedicalHistory" class="clearfix" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                                            <input type="date" class="form-control" name="date" id="exampleInputEmail1" value='' placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                                            <select class="form-control select2" id="patientchoose" name="patient_id">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo lang('title'); ?></label>
                                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" value='' placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class=""><?php echo lang('case'); ?></label>
                                    <textarea class="form-control ckeditor" name="description" value="" rows="70" cols="70"></textarea>
                                </div>
                                <input type="hidden" name="redirect" value='patient/caseList'>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary submit_button float-right mb-4"><?php echo lang('submit'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-7">
                    <h2 class="section-title"><?php echo lang('all'); ?> <?php echo lang('case'); ?></h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="space15"></div>
                                <table class="table table-striped table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%"><?php echo lang('date'); ?></th>
                                            <th style="width: 15%"><?php echo lang('patient'); ?></th>
                                            <th style="width: 15%"><?php echo lang('case'); ?> <?php echo lang('title'); ?></th>
                                            <th style="width: 10%;" class="no-print"><?php echo lang('options'); ?></th>
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
    </section>
</div>

<div class="modal fade" role="dialog" id="myModal2">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit_medical_history'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="patient/addMedicalHistory" id="medical_historyEditForm" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                                <input type="date" class="form-control" name="date" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                                <select class="form-control select2" id="patientchoose1" name="patient_id">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('title'); ?></label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label class=""><?php echo lang('description'); ?></label>
                        <textarea class="ckeditor form-control editor" id="editor" name="description" value="" rows="10"></textarea>
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="redirect" value='patient/caseList'>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="caseModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('case'); ?> <?php echo lang('details'); ?></h5>
                <button type="button" class="close no-print" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="exampleInputEmail1"><strong><?php echo lang('case'); ?> <?php echo lang('creation'); ?> <?php echo lang('date'); ?></strong></label>
                        <div class="case_date"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail1"><strong><?php echo lang('patient'); ?></strong></label>
                        <div class="case_patient"></div>
                        <div class="case_patient_id"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputEmail1"><strong><?php echo lang('title'); ?></strong></label>
                        <div class="case_title"></div>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="exampleInputEmail1"><strong><?php echo lang('details'); ?></strong></label>
                        <div class="case_details"></div>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="float-right">
                            <?php echo $settings->title . '<br>' . $settings->address; ?>
                        </h6>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br no-print">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="javascript:window.print();"><?php echo lang('print'); ?></button>
            </div>
        </div>
    </div>
</div>

<script src="common/js/codearistos.min.js"></script>

<style>
    @media print {

        .modal-content {
            position: absolute;
            top: 0;
            font-size: 30px;
        }

        .modal-content h5 {
            font-size: 35px;
        }

        .modal-content h6 {
            font-size: 35px;
        }

        .modal {
            overflow: hidden;
        }

        .modal-dialog {
            max-width: 100%;
            width: 100%;
        }
    }

    /* @page {
        size: A5;
    } */
</style>
<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('Doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
}
?>
<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    $(".table").on("click", ".editbutton", function() {
        var iid = $(this).attr('data-id');
        $.ajax({
            url: 'patient/editMedicalHistoryByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).success(function(response) {
            var de = response.medical_history.date * 1000;
            var d = new Date(de);
            var da = d.getDate() + '-' + (d.getMonth() + 1) + '-' + d.getFullYear();
            $('#medical_historyEditForm').find('[name="id"]').val(response.medical_history.id).end()
            reformat(da)
            $('#medical_historyEditForm').find('[name="title"]').val(response.medical_history.title).end()
            CKEDITOR.instances['editor'].setData(response.medical_history.description)
            var option = new Option(response.patient.name + '-' + response.patient.id, response.patient.id, true, true);
            $('#medical_historyEditForm').find('[name="patient_id"]').append(option).trigger('change');
            $('#myModal2').modal('show');
        });
    });

    function reformat(date) {
        var tanggal = date;
        var parts = tanggal.split('-');
        var newDate = new Date(parts[2], parts[1] - 1, parts[0]);
        var tahun = newDate.getFullYear();
        var bulan = ("0" + (newDate.getMonth() + 1)).slice(-2);
        var hari = ("0" + newDate.getDate()).slice(-2);
        var tanggalBaru = tahun + "-" + bulan + "-" + hari;
        console.log(tanggalBaru);
        $('#medical_historyEditForm').find('[name="date"]').empty()
        $('#medical_historyEditForm').find('[name="date"]').val(tanggalBaru).end()
    }
</script>
<script type="text/javascript">
    $(".table").on("click", ".case", function() {
        var iid = $(this).attr('data-id');
        $('.case_date').html("").end()
        $('.case_details').html("").end()
        $('.case_title').html("").end()
        $('.case_patient').html("").end()
        $('.case_patient_id').html("").end()
        $.ajax({
            url: 'patient/getCaseDetailsByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).success(function(response) {
            var de = response.case.date * 1000;
            var d = new Date(de);
            var monthNames = [
                "January", "February", "March",
                "April", "May", "June", "July",
                "August", "September", "October",
                "November", "December"
            ];
            var day = d.getDate();
            var monthIndex = d.getMonth();
            var year = d.getFullYear();
            var da = day + ' ' + monthNames[monthIndex] + ', ' + year;
            $('.case_date').append(da).end()
            $('.case_patient').append(response.patient.name).end()
            $('.case_patient_id').append('ID: ' + response.patient.id).end()
            $('.case_title').append(response.case.title).end()
            $('.case_details').append(response.case.description).end()
            $('#caseModal').modal('show');
        });
    });
</script>
<script>
    $(document).ready(function() {
        var table = $('#editable-sample').DataTable({
            responsive: true,
            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "patient/getCaseList",
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
                        columns: [0, 1, 2],
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2],
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1, 2],
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2],
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2],
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
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
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