<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1> <?php echo lang('doctors'); ?> </h1>
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
                    <button class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> <?php echo lang('add_new'); ?></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="space15"></div>
                        <table class="table table-striped table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th scope=" col"><?php echo lang('doctor_id'); ?></th>
                                    <th scope="col"><?php echo lang('name'); ?></th>
                                    <th scope="col"><?php echo lang('email'); ?></th>
                                    <th scope="col"><?php echo lang('phone'); ?></th>
                                    <th scope="col"><?php echo lang('profile'); ?></th>
                                    <th class="no-print" width="45%" scope="col"><?php echo lang('options'); ?></th>
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
                <h5 class="modal-title"><?php echo lang('add_new_doctor'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="doctor/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('name'); ?></label>
                                <input name="name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('email'); ?></label>
                                <input name="email" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('password'); ?></label>
                                <input name="password" type="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('address'); ?></label>
                                <input name="address" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('phone'); ?></label>
                                <input name="phone" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('profile'); ?></label>
                                <input name="profile" type="text" class="form-control">
                            </div>
                        </div>
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
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="myModal2">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit_doctor'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="doctor/addNew" class="clearfix" id="editDoctorForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('name'); ?></label>
                                <input name="name" type="text" class="form-control" value='' placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('email'); ?></label>
                                <input name="email" type="text" class="form-control" value='' placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('password'); ?></label>
                                <input name="password" type="password" class="form-control" placeholder="********">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('address'); ?></label>
                                <input name="address" type="text" class="form-control" value='' placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('phone'); ?></label>
                                <input name="phone" type="text" class="form-control" value='' placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('profile'); ?></label>
                                <input name="profile" type="text" class="form-control" value='' placeholder="">
                            </div>
                        </div>
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
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="infoModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('doctor'); ?> <?php echo lang('info'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="editDoctorForm" class="clearfix">
                    <div class="author-box">
                        <div class="author-box-left">
                            <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture" id="img1">
                            <div class="clearfix"></div>
                        </div>
                        <div class="author-box-details">
                            <div class="author-box-name nameClass">
                            </div>
                            <div class="author-box-job emailClass"></div>
                            <div class="author-box-description">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo lang('profile'); ?></label>
                                            <input type="text" class="form-control profileClass" value="" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo lang('phone'); ?></label>
                                            <input type="text" class="form-control phoneClass" value="" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo lang('address'); ?></label>
                                    <input type="text" class="form-control addressClass" value="" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".table").on("click", ".editbutton", function() {
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $("#img").attr("src", "template/assets/img/news/img01.jpg");
            $('#editDoctorForm').trigger("reset");
            $.ajax({
                url: 'doctor/editDoctorByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                // Populate the form fields with the data returned from server
                $('#editDoctorForm').find('[name="id"]').val(response.doctor.id).end()
                $('#editDoctorForm').find('[name="name"]').val(response.doctor.name).end()
                $('#editDoctorForm').find('[name="password"]').val(response.doctor.password).end()
                $('#editDoctorForm').find('[name="email"]').val(response.doctor.email).end()
                $('#editDoctorForm').find('[name="address"]').val(response.doctor.address).end()
                $('#editDoctorForm').find('[name="phone"]').val(response.doctor.phone).end()
                $('#editDoctorForm').find('[name="profile"]').val(response.doctor.profile).end()
                if (typeof response.doctor.img_url !== 'undefined' && response.doctor.img_url != '' && response.doctor.img_url != null) {
                    $("#img").attr("src", response.doctor.img_url);
                }
                $('#myModal2').modal('show');
            });
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $(".table").on("click", ".inffo", function() {
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $("#img1").attr("src", "template/assets/img/avatar/avatar-1.png");
            $('.nameClass').html("").end()
            $('.emailClass').html("").end()
            $('.addressClass').html("").end()
            $('.phoneClass').html("").end()
            $('.profileClass').html("").end()
            $.ajax({
                url: 'doctor/editDoctorByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                // Populate the form fields with the data returned from server
                $('#editDoctorForm').find('[name="id"]').val(response.doctor.id).end()
                $('.nameClass').append(response.doctor.name).end()
                $('.emailClass').append(response.doctor.email).end()
                $('.addressClass').val(response.doctor.address).end()
                $('.phoneClass').val(response.doctor.phone).end()
                $('.profileClass').val(response.doctor.profile).end()
                if (typeof response.doctor.img_url !== 'undefined' && response.doctor.img_url != '' && response.doctor.img_url != null) {
                    $("#img1").attr("src", response.doctor.img_url);
                }
                $('#infoModal').modal('show');
            });
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
                url: "doctor/getDoctor",
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
                        columns: [0, 1, 2, 3, 4, 5],
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5],
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
            }
        });
        table.buttons().container().appendTo('.custom_buttons');
    });
</script>
<script>
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>