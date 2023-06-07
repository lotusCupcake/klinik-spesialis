<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('medicine'); ?></h1>
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
                <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> <?php echo lang('add_medicine'); ?></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table-striped table-bordered tables" id="editable-sample1">
                        <thead>
                            <tr>
                                <th> <?php echo lang('id'); ?></th>
                                <th> <?php echo lang('name'); ?></th>
                                <th> <?php echo lang('category'); ?></th>
                                <th> <?php echo lang('store_box'); ?></th>
                                <th> <?php echo lang('p_price'); ?></th>
                                <th> <?php echo lang('s_price'); ?></th>
                                <th> <?php echo lang('quantity'); ?></th>
                                <th> <?php echo lang('generic_name'); ?></th>
                                <th> <?php echo lang('company'); ?></th>
                                <th> <?php echo lang('effects'); ?></th>
                                <th> <?php echo lang('expiry_date'); ?></th>
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

                            .load{
                                float: right !important;
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




<!-- Add Accountant Modal-->
<div class="modal fade" role="dialog" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add_medicine'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="medicine/addNewMedicine" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="exampleInputEmail1"> <?php echo lang('name'); ?></label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group col">
                            <label for="exampleInputEmail1"> <?php echo lang('category'); ?></label>
                            <select class="form-control m-bot15" name="category" value=''>
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?php echo $category->category; ?>" <?php
                                    if (!empty($medicine->category)) {
                                        if ($category->category == $medicine->category) {
                                            echo 'selected';
                                        }
                                    }
                                    ?> > <?php echo $category->category; ?> </option>
                                        <?php } ?> 
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="exampleInputEmail1"> <?php echo lang('p_price'); ?></label>
                            <input type="text" class="form-control" name="price" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group col">
                            <label for="exampleInputEmail1"> <?php echo lang('s_price'); ?></label>
                            <input type="text" class="form-control" name="s_price" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group col">
                            <label for="exampleInputEmail1"> <?php echo lang('quantity'); ?></label>
                            <input type="text" class="form-control" name="quantity" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="exampleInputEmail1"> <?php echo lang('generic_name'); ?></label>
                            <input type="text" class="form-control" name="generic" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group col">
                            <label for="exampleInputEmail1"> <?php echo lang('company'); ?></label>
                            <input type="text" class="form-control" name="company" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="exampleInputEmail1"> <?php echo lang('effects'); ?></label>
                            <input type="text" class="form-control" name="effects" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group col-md-4"> 
                            <label for="exampleInputEmail1"> <?php echo lang('store_box'); ?></label>
                            <input type="text" class="form-control" name="box" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1"> <?php echo lang('expiry_date'); ?></label>
                            <input type="date" class="form-control" name="e_date" value=''>
                        </div>
                    </div>
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
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit_medicine'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="medicine/addNewMedicine" id="editMedicineForm" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col">
                            <label for="exampleInputEmail1"> <?php echo lang('name'); ?></label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group col">
                            <label for="exampleInputEmail1"> <?php echo lang('category'); ?></label>
                            <select class="form-control m-bot15" name="category" value=''>
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?php echo $category->category; ?>" <?php
                                    if (!empty($medicine->category)) {
                                        if ($category->category == $medicine->category) {
                                            echo 'selected';
                                        }
                                    }
                                    ?> > <?php echo $category->category; ?> </option>
                                        <?php } ?> 
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="exampleInputEmail1"> <?php echo lang('p_price'); ?></label>
                            <input type="text" class="form-control" name="price" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group col">
                            <label for="exampleInputEmail1"> <?php echo lang('s_price'); ?></label>
                            <input type="text" class="form-control" name="s_price" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group col">
                            <label for="exampleInputEmail1"> <?php echo lang('quantity'); ?></label>
                            <input type="text" class="form-control" name="quantity" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="exampleInputEmail1"> <?php echo lang('generic_name'); ?></label>
                            <input type="text" class="form-control" name="generic" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group col">
                            <label for="exampleInputEmail1"> <?php echo lang('company'); ?></label>
                            <input type="text" class="form-control" name="company" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="exampleInputEmail1"> <?php echo lang('effects'); ?></label>
                            <input type="text" class="form-control" name="effects" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group col-md-4"> 
                            <label for="exampleInputEmail1"> <?php echo lang('store_box'); ?></label>
                            <input type="text" class="form-control" name="box" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleInputEmail1"> <?php echo lang('expiry_date'); ?></label>
                            <input type="date" class="form-control" name="e_date" value=''>
                        </div>
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









<!-- Load Medicine -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('load_medicine'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" id="editMedicineForm" class="clearfix" action="medicine/load" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('add_quantity'); ?></label>
                        <input type="text" class="form-control" name="qty" id="exampleInputEmail1" value='' placeholder="">
                    </div>
    
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
<!-- Load Medicine -->












<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".tables").on("click", ".editbutton", function () {

            var iid = $(this).attr('data-id');
            $('#editMedicineForm').trigger("reset");
            $('#myModal2').modal('show');
            $.ajax({
                url: 'medicine/editMedicineByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#editMedicineForm').find('[name="id"]').val(response.medicine.id).end()
                $('#editMedicineForm').find('[name="name"]').val(response.medicine.name).end()
                $('#editMedicineForm').find('[name="box"]').val(response.medicine.box).end()
                $('#editMedicineForm').find('[name="price"]').val(response.medicine.price).end()
                $('#editMedicineForm').find('[name="s_price"]').val(response.medicine.s_price).end()
                $('#editMedicineForm').find('[name="quantity"]').val(response.medicine.quantity).end()
                $('#editMedicineForm').find('[name="generic"]').val(response.medicine.generic).end()
                $('#editMedicineForm').find('[name="company"]').val(response.medicine.company).end()
                $('#editMedicineForm').find('[name="effects"]').val(response.medicine.effects).end()
                $('#editMedicineForm').find('[name="e_date"]').val(response.medicine.e_date).end()
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".tables").on("click", ".load", function () {

            // e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#editMedicineForm').trigger("reset");
            $('#myModal3').modal('show');

            //  var id = $(this).data('id');

            // Populate the form fields with the data returned from server
            $('#editMedicineForm').find('[name="id"]').val(iid).end()
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
                url: "medicine/getMedicineList",
                type: 'POST',
            },
            scroller: {
                loadingIndicator: true
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
         
             buttons: [
                {extend: 'copyHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10], }},
                {extend: 'excelHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10], }},
                {extend: 'csvHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10], }},
                {extend: 'pdfHtml5', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10], }},
                {extend: 'print', exportOptions: {columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10], }},
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

