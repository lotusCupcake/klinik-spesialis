<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1>
                <?php echo lang('lab'); ?>
            </h1>
        </div>
        <div class="section-body no-print">
            <div class="row">
                <div class="col-md-5">
                    <h2 class="section-title"><?php
                                                if (!empty($lab_single->id))
                                                    echo lang('edit_lab_report');
                                                else
                                                    echo lang('add_lab_report');
                                                ?>
                    </h2>
                    <div class="card">
                        <form role="form" id="editLabForm" action="lab/addLab" class="clearfix" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                                        <input type="date" class="form-control" name="date" id="exampleInputEmail1" value='<?php
                                                                                                                            if (!empty($lab_single->date)) {
                                                                                                                                echo date('Y-m-d', $lab_single->date);
                                                                                                                            } else {
                                                                                                                                echo date('Y-m-d');
                                                                                                                            }
                                                                                                                            ?>' placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                                        <select class="form-control select2 pos_select" id="pos_select" name="patient">
                                            <option value=""><?php echo lang('select_patient'); ?></option>
                                            <?php if (!empty($lab_single->patient)) { ?>
                                                <option value="<?php echo $patients->id; ?>" selected="selected"><?php echo $patients->name; ?> - <?php echo $patients->id; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="pos_client">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                            <input type="text" class="form-control pay_in" name="p_name" value='<?php
                                                                                                                if (!empty($lab_single->p_name)) {
                                                                                                                    echo $lab_single->p_name;
                                                                                                                }
                                                                                                                ?>' placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                                            <input type="text" class="form-control pay_in" name="p_email" value='<?php
                                                                                                                    if (!empty($lab_single->p_email)) {
                                                                                                                        echo $lab_single->p_email;
                                                                                                                    }
                                                                                                                    ?>' placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                                            <input type="text" class="form-control pay_in" name="p_phone" value='<?php
                                                                                                                    if (!empty($lab_single->p_phone)) {
                                                                                                                        echo $lab_single->p_phone;
                                                                                                                    }
                                                                                                                    ?>' placeholder="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
                                            <input type="text" class="form-control pay_in" name="p_age" value='<?php
                                                                                                                if (!empty($lab_single->p_age)) {
                                                                                                                    echo $lab_single->p_age;
                                                                                                                }
                                                                                                                ?>' placeholder="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                                            <select class="form-control select2" name="p_gender">
                                                <option value="Male" <?php
                                                                        if (!empty($patient->sex)) {
                                                                            if ($patient->sex == 'Male') {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        ?>> Male </option>
                                                <option value="Female" <?php
                                                                        if (!empty($patient->sex)) {
                                                                            if ($patient->sex == 'Female') {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        ?>> Female </option>
                                                <option value="Others" <?php
                                                                        if (!empty($patient->sex)) {
                                                                            if ($patient->sex == 'Others') {
                                                                                echo 'selected';
                                                                            }
                                                                        }
                                                                        ?>> Others </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1"><?php echo lang('refd_by_doctor'); ?></label>
                                        <select class="form-control select2 add_doctor" id="add_doctor" name="doctor">
                                            <option value=""><?php echo lang('select_doctor'); ?></option>
                                            <?php if (!empty($lab_single->doctor)) { ?>
                                                <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - <?php echo $doctors->id; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1"><?php echo lang('template'); ?></label>
                                        <select class="form-control select2 template" id="template" name="template">
                                            <option value="">Select .....</option>
                                            <?php foreach ($templates as $template) { ?>
                                                <option value="<?php echo $template->id; ?>"><?php echo $template->name; ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="pos_doctor">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1"><?php echo lang('doctor'); ?> <?php echo lang('name'); ?></label>
                                            <input type="text" class="form-control pay_in" name="d_name" value='<?php
                                                                                                                if (!empty($lab_single->p_name)) {
                                                                                                                    echo $lab_single->p_name;
                                                                                                                }
                                                                                                                ?>' placeholder="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1"><?php echo lang('doctor'); ?> <?php echo lang('email'); ?></label>
                                            <input type="text" class="form-control pay_in" name="d_email" value='<?php
                                                                                                                    if (!empty($lab_single->p_email)) {
                                                                                                                        echo $lab_single->p_email;
                                                                                                                    }
                                                                                                                    ?>' placeholder="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputEmail1"><?php echo lang('doctor'); ?> <?php echo lang('phone'); ?></label>
                                            <input type="text" class="form-control pay_in" name="d_phone" value='<?php
                                                                                                                    if (!empty($lab_single->p_phone)) {
                                                                                                                        echo $lab_single->p_phone;
                                                                                                                    }
                                                                                                                    ?>' placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><?php echo lang('files'); ?></label>
                                    <input type="file" class="form-control" name="img_url" accept="image/*, application/pdf">
                                    <p class="text-warning">file berformat image atau PDF</p>
                                </div>
                                <div class="form-group">
                                    <label class=""><?php echo lang('report'); ?></label>
                                    <textarea class="form-control ckeditor" id="editor" name="report" value="" rows=" 70" cols="70">
                                        <?php
                                        if (!empty($setval)) {
                                            echo set_value('report');
                                        }
                                        if (!empty($lab_single->report)) {
                                            echo $lab_single->report;
                                        }
                                        ?>
                                    </textarea>
                                </div>
                                <input type="hidden" name="redirect" value="<?php
                                                                            if (!empty($lab_single)) {
                                                                                echo 'lab?id=' . $lab_single->id;
                                                                            } else {
                                                                                echo 'lab';
                                                                            }
                                                                            ?>">

                                <input type="hidden" name="id" value='<?php
                                                                        if (!empty($lab_single->id)) {
                                                                            echo $lab_single->id;
                                                                        }
                                                                        ?>'>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary submit_button float-right mb-4"><?php echo lang('submit'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-7">
                    <h2 class="section-title"><?php echo lang('lab_report'); ?></h2>
                    <div class="card">
                        <div class="card-header">
                            <a href="lab/addLabView"><button class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i><?php echo lang('add_lab_report'); ?></button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="space15"></div>
                                <table class="table table-striped table-bordered" id="editable-sample">
                                    <thead>
                                        <tr>
                                            <th><?php echo lang('report_id'); ?></th>
                                            <th><?php echo lang('patient'); ?></th>
                                            <th><?php echo lang('date'); ?></th>
                                            <th class=""><?php echo lang('options'); ?></th>
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

<div class="modal fade" role="dialog" id="fileModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('files'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="fileLab" style="text-align:center">

            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a id="download" download><button type="button" class="btn btn-primary"><?php echo lang('download'); ?></button></a>
            </div>
        </div>
    </div>
</div>

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

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "lab/getLab",
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
                searchPlaceholder: "Search..."
            }
        });
        table.buttons().container().appendTo('.custom_buttons');
    });
</script>
<script>
    $(document).ready(function() {
        $('.pos_client').hide();
        $(document.body).on('change', '#pos_select', function() {

            var v = $("select.pos_select option:selected").val()
            if (v == 'add_new') {
                $('.pos_client').show();
            } else {
                $('.pos_client').hide();
            }
        });

    });
</script>
<script>
    $(document).ready(function() {
        $('.pos_doctor').hide();
        $(document.body).on('change', '#add_doctor', function() {

            var v = $("select.add_doctor option:selected").val()
            if (v == 'add_new') {
                $('.pos_doctor').show();
            } else {
                $('.pos_doctor').hide();
            }
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document.body).on('change', '#template', function() {
            var iid = $("select.template option:selected").val();
            $.ajax({
                url: 'lab/getTemplateByIdByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                var data = CKEDITOR.instances.editor.getData();
                if (response.template.template != null) {
                    var data1 = data + response.template.template;
                } else {
                    var data1 = data;
                }
                CKEDITOR.instances['editor'].setData(data1)
            });
        });
    });
</script>
<script>
    function fileLab(url) {
        let fileFormat = url.substring(url.lastIndexOf('.') + 1)
        html = ''
        if (fileFormat == 'pdf') {
            html += '<iframe src="' + url + '" width="100%" height="500px" frameborder="0"></iframe>'
        } else {
            html += '<img src="' + url + '" alt=""  width="100%" height="100%">'
        }
        $('#fileLab').empty()
        $('#fileLab').append(html)
        $('#download').removeAttr('href')
        $('#download').attr('href', url)
        $('#fileModal').modal('show')
    }
</script>