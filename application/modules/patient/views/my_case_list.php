<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('my'); ?> <?php echo lang('cases'); ?> </h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table-striped table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="width: 10%"><?php echo lang('id'); ?></th>
                                    <th style="width: 20%"><?php echo lang('case'); ?> <?php echo lang('title'); ?></th>
                                    <th style="width: 60%"><?php echo lang('case'); ?></th> 
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($medical_histories as $medical_history) { ?>
                                    <?php $patient_info = $this->db->get_where('patient', array('id' => $medical_history->patient_id))->row(); ?>

                                    <tr class="">

                                        <td>
                                            <?php
                                            echo $medical_history->id;
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo $medical_history->title;
                                            ?>
                                        </td>

                                        <td><?php
                                            if (!empty($medical_history->description)) {
                                                echo $medical_history->description;
                                            }
                                            ?></td>

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





<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('Doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
}
?>




<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".editbutton").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#myModal2').modal('show');
            $.ajax({
                url: 'patient/editMedicalHistoryByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#medical_historyEditForm').find('[name="id"]').val(response.medical_history.id).end()
                $('#medical_historyEditForm').find('[name="date"]').val(response.medical_history.date).end()
                $('#medical_historyEditForm').find('[name="patient"]').val(response.medical_history.patient_id).end()
                CKEDITOR.instances['editor'].setData(response.medical_history.description)

                $('.js-example-basic-single.patient').val(response.medical_history.patient_id).trigger('change');
            });
        });
    });</script>


<script>
    $(document).ready(function () {
        var table = $('#editable-sample').DataTable({
            responsive: true,
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
           
             buttons: [
                {extend: 'copyHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5], }},
                {extend: 'excelHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5], }},
                {extend: 'csvHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5], }},
                {extend: 'pdfHtml5', exportOptions: {columns: [0, 1, 2, 3, 4, 5], }},
                {extend: 'print', exportOptions: {columns: [0, 1, 2, 3, 4, 5], }},
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
