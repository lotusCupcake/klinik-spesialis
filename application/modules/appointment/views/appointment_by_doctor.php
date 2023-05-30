<!-- Main Content -->
<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1> <?php echo lang('appointments'); ?></h1>
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
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="calendardetails-tab" data-toggle="tab" href="#calendardetails" role="tab" aria-controls="calendardetails" aria-selected="true"><?php echo lang('appointments'); ?> <?php echo lang('calendar'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false"><?php echo lang('appointments'); ?></a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="calendardetails" role="tabpanel" aria-labelledby="calendardetails-tab">
                                    <div class="col-md-12">
                                        <aside class="calendar_ui col-md-12 panel calendar_ui">
                                            <section class="">
                                                <div class="">
                                                    <div id="calendarview" class="has-toolbar calendar_view"></div>
                                                </div>
                                            </section>
                                        </aside>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
                                    <div class="table-responsive">
                                        <div class="space15"></div>
                                        <table class="table table-striped table-bordered" width="100%" id="editable-sample">
                                            <thead>
                                                <tr>
                                                    <th> <?php echo lang('id'); ?></th>
                                                    <th> <?php echo lang('patient'); ?></th>
                                                    <th> <?php echo lang('date-time'); ?></th>
                                                    <th> <?php echo lang('remarks'); ?></th>
                                                    <th> <?php echo lang('options'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($appointments as $appointment) {
                                                    if ($appointment->doctor == $doctor_id) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $appointment->id; ?></td>
                                                            <td><?php echo $this->db->get_where('patient', array('id' => $appointment->patient))->row()->name; ?></td>
                                                            <td><?php echo date('d-m-Y', $appointment->date); ?> => <?php echo $appointment->time_slot; ?></td>
                                                            <td><?php echo $appointment->remarks; ?></td>
                                                            <td class="no-print">
                                                                <a href="finance/delete?id=<?php echo $payment->id; ?>"><button class="btn btn-icon icon-left btn-danger delete_button" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></button></a>
                                                            </td>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="<?php echo ($mmrdoctor->img_url == null) ? 'template/assets/img/avatar/avatar-1.png' : $mmrdoctor->img_url; ?>" class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label"><?php echo lang('email'); ?></div>
                                    <div class="profile-widget-item-value"><?php echo $mmrdoctor->email; ?></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label"><?php echo lang('phone'); ?></div>
                                    <div class="profile-widget-item-value"><?php echo $mmrdoctor->phone; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description pb-0">
                            <div class="profile-widget-name"><?php echo $mmrdoctor->name; ?></div>
                            <p><?php echo $mmrdoctor->profile; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" role="dialog" id="editAppointmentModal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('edit_appointment'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="appointment/addNew" id="editAppointmentForm" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><?php echo lang('patient'); ?></label>
                                <select name="patient" id="pos_select" class="form-control js-example-basic-single patient pos_select select2">
                                    <option value="">Select .....</option>
                                    <option value="<?php echo $patient->id; ?>"><?php echo $patient->name; ?> </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="doctor"><?php echo lang('doctor'); ?></label>
                                <select name="doctor" id="adoctors1" class="form-control select2">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date"><?php echo lang('date'); ?></label>
                                <input type="date" class="form-control" name="date" id="date1" value='' placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="time_slot"><?php echo lang('available_slots'); ?></label>
                                <select name="time_slot" id="aslots1" class="form-control select2">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status"><?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label>
                                <select name="status" class="form-control m-bot15 select2" value=''>
                                    <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                                        <option value="Pending Confirmation" <?php ?>> <?php echo lang('pending_confirmation'); ?> </option>
                                        <option value="Confirmed" <?php
                                                                    ?>> <?php echo lang('confirmed'); ?> </option>
                                        <option value="Treated" <?php
                                                                ?>> <?php echo lang('treated'); ?> </option>
                                        <option value="Cancelled" <?php ?>> <?php echo lang('cancelled'); ?> </option>
                                    <?php } else { ?>
                                        <option value="Requested" <?php ?>> <?php echo lang('requested'); ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo lang('remarks'); ?></label>
                                <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="sms" value="sms">
                                <label class="form-check-label">
                                    <?php echo lang('send_sms') ?>
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="redirect" value='patient/medicalHistory?id=<?php echo $patient->id; ?>'>>
                        <input type="hidden" name="id" id="appointment_id" value=''>
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

<div class="modal fade" role="dialog" id="cmodal">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body" id='medical_history'>
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
            var iid = $(this).attr('data-id');
            $('#editAppointmentForm').trigger("reset");
            $('#myModal2').modal('show');
            $.ajax({
                url: 'appointment/editAppointmentByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function(response) {
                $('#editAppointmentForm').find('[name="id"]').val(response.appointment.id).end()
                $('#editAppointmentForm').find('[name="date"]').val(response.appointment.date).end()
                $('#editAppointmentForm').find('[name="remarks"]').val(response.appointment.remarks).end()
                var option = new Option(response.patient.name + '-' + response.patient.id, response.patient.id, true, true);
                $('#editAppointmentForm').find('[name="patient"]').append(option).trigger('change');
                var option1 = new Option(response.doctor.name + '-' + response.doctor.id, response.doctor.id, true, true);
                $('#editAppointmentForm').find('[name="doctor"]').append(option1).trigger('change');
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
                        columns: [0, 1, 2, 3],
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    }
                },
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3],
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
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var url_string = window.location.href;
        var url = new URL(url_string)
        var idDoc = url.searchParams.get('id')
        $('#calendarview').fullCalendar({
            lang: 'en',
            // events: 'appointment/getAppointmentByJasonByDoctor?id=' + <?php //echo $doctor_id; 
                                                                            ?>,
            events: 'appointment/getAppointmentByJasonByDoctor?id=' + idDoc,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay',
            },
            timeFormat: 'h(:mm) A',
            eventRender: function(event, element) {
                $(element).css({
                    'text-align': 'left',
                    'color': '#FFFFFF',
                });
                element.find('.fc-time').html(element.find('.fc-time').text())
                element.find('.fc-title').html(element.find('.fc-title').text());
            },
            eventClick: function(event) {
                $('#medical_history').html("");
                if (event.id) {
                    $.ajax({
                        url: 'patient/getMedicalHistoryByJason?id=' + event.id + '&from_where=calendar',
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).success(function(response) {
                        $('#medical_history').html("");
                        $('#medical_history').append(response.view);
                    });
                }
                $('#cmodal').modal('show');
            },
            slotDuration: '00:5:00',
            businessHours: false,
            slotEventOverlap: false,
            editable: false,
            selectable: false,
            lazyFetching: true,
            minTime: "6:00:00",
            maxTime: "24:00:00",
            defaultView: 'month',
            allDayDefault: false,
            displayEventEnd: true,
            timezone: false,
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>