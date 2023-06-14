
<!--sidebar end-->
<!--main content start-->
<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1><?php echo lang('gridsection'); ?></h1>
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
                    <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> <?php echo lang('add_gridsection'); ?></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table-striped table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th><?php echo lang('image'); ?></th>
                                    <th><?php echo lang('category'); ?></th>
                                    <th><?php echo lang('title'); ?></th>
                                    <th><?php echo lang('description'); ?></th>
                                    <th><?php echo lang('position'); ?></th>
                                    <th><?php echo lang('status'); ?></th>
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

                            <?php foreach ($gridsections as $gridsection) { ?>
                                <tr class="">
                                    <td style="width:10%;"><img style="width:95%;" src="<?php echo $gridsection->img; ?>"></td>
                                    <td><?php echo $gridsection->category; ?></td>
                                    <td> <?php echo $gridsection->title; ?></td>
                                    <td><?php echo $gridsection->description; ?></td>
                                    <td><?php echo $gridsection->position; ?></td>
                                    <td>
                                        <?php
                                        if ($gridsection->status == 'Active') {
                                            echo lang('active');
                                        } else {
                                            echo lang('in_active');
                                        }
                                        ?>
                                    </td>
                                    <td class="no-print" style="width: 10%;">
                                        <button type="button" class="btn btn-info btn-xs btn_width editbutton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $gridsection->id; ?>"><i class="fa fa-edit"> </i></button>   
                                        <a class="btn btn-danger btn-xs btn_width delete_button" title="<?php echo lang('delete'); ?>" href="gridsection/delete?id=<?php echo $gridsection->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"> </i></a>
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

<style>
    textarea.form-control {
        height: auto !important;
    }
</style>


<!-- Add Slide Modal-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add_gridsection'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="gridsection/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('title'); ?></label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" value=''>
                    </div>
    
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('category'); ?></label>
                        <input type="text" class="form-control" name="category" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('description'); ?></label>
                        <textarea class="form-control" name="description" id="exampleInputEmail1" value='' placeholder="" cols="20"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('position'); ?></label>
                        <input type="number" class="form-control" name="position" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('status'); ?></label>
                        <select class="form-control m-bot15" name="status" value=''>
                            <option value="Active" <?php
                            if (!empty($setval)) {
                                if ($gridsection->status == set_value('status')) {
                                    echo 'selected';
                                }
                            }
                            if (!empty($gridsection->status)) {
                                if ($gridsection->status == 'Active') {
                                    echo 'selected';
                                }
                            }
                            ?> > <?php echo lang('active'); ?> 
                            </option>
                            <option value="Inactive" <?php
                            if (!empty($setval)) {
                                if ($gridsection->status == set_value('status')) {
                                    echo 'selected';
                                }
                            }
                            if (!empty($gridsection->status)) {
                                if ($gridsection->status == 'Inactive') {
                                    echo 'selected';
                                }
                            }
                            ?> > <?php echo lang('in_active'); ?> 
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Image Upload</label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="<?= base_url() . '/template/assets/img/news/img01.jpg' ?>" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        <input type="file" class="default" name="img_url" />
                                    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>
                        </div>
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
<!-- Add Slide Modal-->







<!-- Edit Event Modal-->
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit_gridsection'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" id="editSlideForm"  action="gridsection/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('title'); ?></label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" value=''>
                    </div>
    
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('category'); ?></label>
                        <input type="text" class="form-control" name="category" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('description'); ?></label>
                        <textarea class="form-control" name="description" id="exampleInputEmail1" value='' placeholder="" cols="20"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('position'); ?></label>
                        <input type="number" class="form-control" name="position" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('status'); ?></label>
                        <select class="form-control m-bot15" name="status" value=''>
                            <option value="Active" <?php
                            if (!empty($setval)) {
                                if ($gridsection->status == set_value('status')) {
                                    echo 'selected';
                                }
                            }
                            if (!empty($gridsection->status)) {
                                if ($gridsection->status == 'Active') {
                                    echo 'selected';
                                }
                            }
                            ?> > <?php echo lang('active'); ?> 
                            </option>
                            <option value="Inactive" <?php
                            if (!empty($setval)) {
                                if ($gridsection->status == set_value('status')) {
                                    echo 'selected';
                                }
                            }
                            if (!empty($gridsection->status)) {
                                if ($gridsection->status == 'Inactive') {
                                    echo 'selected';
                                }
                            }
                            ?> > <?php echo lang('in_active'); ?> 
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Image Upload</label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="<?= base_url() . '/template/assets/img/news/img01.jpg' ?>" id="img" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                        <input type="file" class="default" name="img_url" />
                                    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>
                        </div>
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
                                    $('#editSlideForm').trigger("reset");
                                    $("#img").attr("src", "uploads/cardiology-patient-icon-vector-6244713.jpg");
                                    $.ajax({
                                    url: 'gridsection/editGridsectionByJason?id=' + iid,
                                            method: 'GET',
                                            data: '',
                                            dataType: 'json',
                                    }).success(function (response) {
                                    // Populate the form fields with the data returned from server
                                    $('#editSlideForm').find('[name="id"]').val(response.gridsection.id).end()
                                            $('#editSlideForm').find('[name="title"]').val(response.gridsection.title).end()
                                            $('#editSlideForm').find('[name="category"]').val(response.gridsection.category).end()
                                            $('#editSlideForm').find('[name="description"]').val(response.gridsection.description).end()
                                            $('#editSlideForm').find('[name="position"]').val(response.gridsection.position).end()
                                            $('#editSlideForm').find('[name="status"]').val(response.gridsection.status).end()

                                            if (typeof response.gridsection.img !== 'undefined' && response.gridsection.img != '') {
                                    $("#img").attr("src", response.gridsection.img);
                                    }

                                    $('#myModal2').modal('show');
                                    });
                                    });
                                    });</script>




<script>
    $(document).ready(function () {
    $('#editable-sample').DataTable({
    responsive: true,
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        
             buttons: [
                {extend: 'copyHtml5', exportOptions: {columns: [1, 2, 3, 4], }},
                {extend: 'excelHtml5', exportOptions: {columns: [1, 2, 3, 4], }},
                {extend: 'csvHtml5', exportOptions: {columns: [1, 2, 3, 4], }},
                {extend: 'pdfHtml5', exportOptions: {columns: [1, 2, 3, 4], }},
                {extend: 'print', exportOptions: {columns: [1, 2, 3, 4], }},
            ],
            aLengthMenu: [
            [10, 25, 50, 100, - 1],
            [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: - 1,
            "order": [[0, "desc"]],
            "language": {
            "lengthMenu": "_MENU_",
                    search: "_INPUT_",
                    "url": "common/assets/DataTables/languages/" + bahasa + ".json"
            },
    });
    table.buttons().container()
            .appendTo('.custom_buttons');
    });</script>






<script>
    $(document).ready(function () {
    $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
