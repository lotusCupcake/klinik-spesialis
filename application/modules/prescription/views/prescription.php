<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('prescription'); ?></h1>
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
            <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                <div class="card-header">
                    <a class="btn btn-primary btn_width" href="prescription/addPrescriptionView">
                        <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?> 
                    </a>
                </div>
            <?php } ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table-striped table-bordered" id="editable-sample1">
                            <thead>
                                <tr>
                                    <th> <?php echo lang('prescription'); ?> <?php echo lang('id'); ?> </th>
                                    <th> <?php echo lang('date'); ?></th>                                  
                                    <th> <?php echo lang('patient'); ?></th>
                                    <th> <?php echo lang('patient'); ?> <?php echo lang('id'); ?> </th>
                                    <th> <?php echo lang('medicine'); ?> </th>
                                    <th> <?php echo lang('options'); ?></th>
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



<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('Doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
}
?>

<!-- Add Prescription Modal-->
<div class="modal fade" id="myModa3" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">  
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add_prescription'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <form role="form" action="prescription/addNewPrescription" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <input type="hidden" class="form-control form-control-inline input-medium default-date-picker" name="doctor" id="exampleInputEmail1" value='<?php
                        if (!empty($doctor_id)) {
                            echo $doctor_id;
                        }
                        ?>' placeholder="">
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                            <input type="date" class="form-control form-control-inline input-medium " name="date" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group col">
                            <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                            <select class="form-control m-bot15 js-example-basic-single" name="patient" value=''> 
                                <option value="">Select .....</option>
                                <?php foreach ($patients as $patientss) { ?>
                                    <option value="<?php echo $patientss->id; ?>" <?php
                                    if (!empty($prescription->patient)) {
                                        if ($prescription->patient == $patientss->id) {
                                            echo 'selected';
                                        }
                                    }
                                    ?> ><?php echo $patientss->name; ?> </option>
                                        <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('history'); ?></label>
                        <div class="col">
                            <textarea class="ckeditor form-control" name="symptom" value="" rows="10"></textarea>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('medication'); ?></label>
                        <div class="col">
                            <textarea class="ckeditor form-control" name="medicine" value="" rows="10"></textarea>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('note'); ?></label>
                        <div class="col">
                            <textarea class="ckeditor form-control" name="note" value="" rows="10"></textarea>
                        </div>
                    </div>
    
                    <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                    <input type="hidden" name="id" value=''>

                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </div>
                                
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Prescription Modal-->


<!-- Edit Prescription Modal-->
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">  
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> <?php echo lang('edit_prescription'); ?></h4>
            </div> 
            <div class="modal-body">
                <form role="form" id="prescriptionEditForm" action="prescription/addNewPrescription" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <input type="hidden" class="form-control form-control-inline input-medium default-date-picker" name="doctor" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                        <select class="form-control m-bot15" name="patient" value=''> 
                            <option value="">Select .....</option>
                            <?php foreach ($patients as $patientss) { ?>
                                <option value="<?php echo $patientss->id; ?>" <?php
                                if (!empty($prescription->patient)) {
                                    if ($prescription->patient == $patientss->id) {
                                        echo 'selected';
                                    }
                                }
                                ?> ><?php echo $patientss->name; ?> </option>
                                    <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('history'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" id="editor1" name="symptom" value="" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('medication'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" id="editor2" name="medicine" value="" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3"><?php echo lang('note'); ?></label>
                        <div class="col-md-9">
                            <textarea class="ckeditor form-control" id="editor3" name="note" value="" rows="10"></textarea>
                        </div>
                    </div>


                    <input type="hidden" name="id" value=''>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button"><?php echo lang('submit'); ?></button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Prescription Modal-->


<script src="common/js/codearistos.min.js"></script>

<script type="text/javascript">
                                    $(document).ready(function () {
                                        $(".table").on("click", ".editPrescription", function () {

                                            //   e.preventDefault(e);
                                            // Get the record's ID via attribute  
                                            var iid = $(this).attr('data-id');
                                            $('#myModal5').modal('show');
                                            $.ajax({
                                                url: 'prescription/editPrescriptionByJason?id=' + iid,
                                                method: 'GET',
                                                data: '',
                                                dataType: 'json',
                                            }).success(function (response) {
                                                var de = response.prescription.date * 1000;
                                                var d = new Date(de);
                                                var da = (d.getDate() + 1) + '-' + (d.getMonth() + 1) + '-' + d.getFullYear();
                                                // Populate the form fields with the data returned from server
                                                $('#prescriptionEditForm').find('[name="id"]').val(response.prescription.id).end()
                                                $('#prescriptionEditForm').find('[name="date"]').val(da).end()
                                                // Populate the form fields with the data returned from server
                                                $('#prescriptionEditForm').find('[name="patient"]').val(response.prescription.patient).end()
                                                $('#prescriptionEditForm').find('[name="doctor"]').val(response.prescription.doctor).end()

                                                CKEDITOR.instances['editor1'].setData(response.prescription.symptom)
                                                CKEDITOR.instances['editor2'].setData(response.prescription.medicine)
                                                CKEDITOR.instances['editor3'].setData(response.prescription.note)
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
                url: "prescription/getPrescriptionListByDoctor",
                type: 'POST',
            },
            scroller: {
                loadingIndicator: true
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
         
             buttons: [
                {extend: 'copyHtml5', exportOptions: {columns: [0, 1, 2], }},
                {extend: 'excelHtml5', exportOptions: {columns: [0, 1, 2], }},
                {extend: 'csvHtml5', exportOptions: {columns: [0, 1, 2], }},
                {extend: 'pdfHtml5', exportOptions: {columns: [0, 1, 2], }},
                {extend: 'print', exportOptions: {columns: [0, 1, 2], }},
            ],
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: 100,
            "order": [[0, "desc"]],
            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
            },
        });
        table.buttons().container().appendTo('.custom_buttons');
    });
</script>




<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>

