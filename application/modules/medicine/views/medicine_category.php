<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('medicine_categories'); ?></h1>
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
                    <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> <?php echo lang('create_medicine_category'); ?></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table-striped table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th> <?php echo lang('category'); ?></th>
                                    <th> <?php echo lang('description'); ?></th>
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

                            <?php foreach ($categories as $category) { ?>
                                <tr class="">
                                    <td><?php echo $category->category; ?></td>
                                    <td> <?php echo $category->description; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-xs btn_width editbutton" data-toggle="modal" data-id="<?php echo $category->id; ?>"><i class="fa fa-edit"> </i></button>   
                                        <a class="btn btn-danger btn-xs btn_width delete_button" href="medicine/deleteMedicineCategory?id=<?php echo $category->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i></a>
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
                <h5 class="modal-title"><?php echo lang('create_medicine_category'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="medicine/addNewCategory" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group col-md-12"> 
                        <label for="exampleInputEmail1"> <?php echo lang('category'); ?> <?php echo lang('name'); ?> </label>
                        <input type="text" class="form-control" name="category" id="exampleInputEmail1" value='' placeholder="">    
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"> <?php echo lang('description'); ?></label>
                        <input type="text" class="form-control" name="description" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                    </div>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Accountant Modal-->







<!-- Edit Event Modal-->
<div class="modal fade" role="dialog" id="myModal2">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit_medicine_category'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" id="editCategoryForm" action="medicine/addNewCategory" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group col-md-12"> 
                        <label for="exampleInputEmail1"> <?php echo lang('category'); ?> <?php echo lang('name'); ?> </label>
                        <input type="text" class="form-control" name="category" id="exampleInputEmail1" value='' placeholder="">    
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"> <?php echo lang('description'); ?></label>
                        <input type="text" class="form-control" name="description" id="exampleInputEmail1" value='' placeholder="">
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
<!-- Edit Event Modal-->

<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
                                    $(document).ready(function () {
                                        $(".editbutton").click(function (e) {
                                            e.preventDefault(e);
                                            // Get the record's ID via attribute  
                                            var iid = $(this).attr('data-id');
                                            $('#editCategoryForm').trigger("reset");
                                            $('#myModal2').modal('show');
                                            $.ajax({
                                                url: 'medicine/editMedicineCategoryByJason?id=' + iid,
                                                method: 'GET',
                                                data: '',
                                                dataType: 'json',
                                            }).success(function (response) {
                                                // Populate the form fields with the data returned from server
                                                $('#editCategoryForm').find('[name="id"]').val(response.medicinecategory.id).end()
                                                $('#editCategoryForm').find('[name="category"]').val(response.medicinecategory.category).end()
                                                $('#editCategoryForm').find('[name="description"]').val(response.medicinecategory.description).end()
                                            });
                                        });
                                    });
</script>
<script src="common/js/codearistos.min.js"></script>
<script>
                                    $(document).ready(function () {
                                        $('#editable-sample').DataTable({
                                            responsive: true,

                                            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                                                    "<'row'<'col-sm-12'tr>>" +
                                                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",

                                            buttons: [
                                                {extend: 'copyHtml5', exportOptions: {columns: [0, 1], }},
                                                {extend: 'excelHtml5', exportOptions: {columns: [0, 1], }},
                                                {extend: 'csvHtml5', exportOptions: {columns: [0, 1], }},
                                                {extend: 'pdfHtml5', exportOptions: {columns: [0, 1], }},
                                                {extend: 'print', exportOptions: {columns: [0, 1], }},
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

