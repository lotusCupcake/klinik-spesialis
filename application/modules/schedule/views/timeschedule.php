<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?php echo lang('time_schedule'); ?> (<?php echo $this->db->get_where('doctor', array('id' => $doctorr))->row()->name; ?>)</h1>
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
                                    <th width="5%">No.</th>
                                    <th><?php echo lang('weekday'); ?></th>
                                    <th><?php echo lang('start_time'); ?></th>
                                    <th><?php echo lang('end_time'); ?></th>
                                    <th><?php echo lang('duration'); ?></th>
                                    <th align="center" width="20%"><?php echo lang('options'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($schedules as $schedule) {
                                    $i = $i + 1;
                                ?>
                                    <tr class="">
                                        <td align="center"> <?php echo $i; ?></td>
                                        <td> <?php echo $schedule->weekday; ?></td>
                                        <td><?php echo $schedule->s_time; ?></td>
                                        <td><?php echo $schedule->e_time; ?></td>
                                        <td><?php echo $schedule->duration * 5 . ' ' . lang('minitues'); ?></td>
                                        <td align="center">
                                            <button class="btn btn-icon icon-left btn-light editbutton" data-id="<?php echo $schedule->id; ?>"><i class="fas fa-edit"></i> <?php echo lang('edit'); ?></button>
                                            <a href="schedule/deleteSchedule?id=<?php echo $schedule->id; ?>&doctor=<?php echo $doctorr; ?>&weekday=<?php echo $schedule->weekday; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-icon icon-left btn-danger delete_button"><i class="fas fa-trash"></i> <?php echo lang('delete'); ?></button></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" role="dialog" id="myModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('add'); ?> <?php echo lang('time_slots'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="schedule/addSchedule" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label><?php echo lang('weekday') ?></label>
                        <select class="form-control select2" name="weekday">
                            <option value="Friday"><?php echo lang('friday') ?></option>
                            <option value="Saturday"><?php echo lang('saturday') ?></option>
                            <option value="Sunday"><?php echo lang('sunday') ?></option>
                            <option value="Monday"><?php echo lang('monday') ?></option>
                            <option value="Tuesday"><?php echo lang('tuesday') ?></option>
                            <option value="Wednesday"><?php echo lang('wednesday') ?></option>
                            <option value="Thursday"><?php echo lang('thursday') ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('start_time') ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control timepicker" name="s_time">
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('end_time') ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control timepicker" name="e_time">
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('appointment') ?> <?php echo lang('duration') ?></label>
                        <select class="form-control select2" name="duration">
                            <option value="3" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '3') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 15 Minitues </option>

                            <option value="4" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '4') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 20 Minitues </option>

                            <option value="6" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '6') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 30 Minitues </option>

                            <option value="9" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '9') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 45 Minitues </option>

                            <option value="12" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '12') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 60 Minitues </option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="doctor" value='<?php echo $doctorr; ?>'>
                <input type="hidden" name="redirect" value='schedule/timeSchedule?doctor=<?php echo $doctorr; ?>'>
                <input type="hidden" name="id" value=''>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="myModal2">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit'); ?> <?php echo lang('time_slot'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editTimeSlotForm" action="schedule/addSchedule" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label><?php echo lang('weekday') ?></label>
                        <select class="form-control select2" id="weekday" name="weekday">
                            <option value="Friday"><?php echo lang('friday') ?></option>
                            <option value="Saturday"><?php echo lang('saturday') ?></option>
                            <option value="Sunday"><?php echo lang('sunday') ?></option>
                            <option value="Monday"><?php echo lang('monday') ?></option>
                            <option value="Tuesday"><?php echo lang('tuesday') ?></option>
                            <option value="Wednesday"><?php echo lang('wednesday') ?></option>
                            <option value="Thursday"><?php echo lang('thursday') ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('start_time') ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control timepicker" name="s_time">
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('end_time') ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control timepicker" name="e_time">
                        </div>
                    </div>
                    <div class="form-group">
                        <label><?php echo lang('appointment') ?> <?php echo lang('duration') ?></label>
                        <select class="form-control select2" name="duration">
                            <option value="3" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '3') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 15 Minitues </option>

                            <option value="4" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '4') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 20 Minitues </option>

                            <option value="6" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '6') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 30 Minitues </option>

                            <option value="9" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '9') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 45 Minitues </option>

                            <option value="12" <?php
                                                if (!empty($settings->duration)) {
                                                    if ($settings->duration == '12') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>> 60 Minitues </option>
                        </select>
                    </div>
                    <input type="hidden" name="doctor" value="<?php echo $doctorr; ?>">
                    <input type="hidden" name="redirect" value='schedule/timeSchedule'>
                    <input type="hidden" name="id" value=''>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".editbutton").click(function(e) {
            e.preventDefault(e);
            var iid = $(this).attr('data-id');
            $('#editTimeSlotForm').trigger("reset");
            $('#myModal2').modal('show');
            $.ajax({
                url: 'schedule/editScheduleByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                console.log(response);
                $('#editTimeSlotForm').find('[name="id"]').val(response.schedule.id).end()
                $('#editTimeSlotForm').find('[name="s_time"]').val(response.schedule.s_time).end()
                $('#editTimeSlotForm').find('[name="e_time"]').val(response.schedule.e_time).end()
                $('#editTimeSlotForm').find('[name="weekday"]').val(response.schedule.weekday).change()
                $('#editTimeSlotForm').find('[name="duration"]').val(response.schedule.duration).change()
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        var table = $('#editable-sample').DataTable({
            responsive: true,
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",

            buttons: [{
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                    }
                },
            ],
            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: -1,
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
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>