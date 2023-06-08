<!-- Main Content -->

<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('Doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
    $doctordetails = $this->db->get_where('doctor', array('id' => $doctor_id))->row();
}
?>

<div class="main-content no-print">
    <section class="section">
        <div class="section-header">
            <h1><?php
                if (!empty($prescription->id))
                    echo lang('edit_prescription');
                else
                    echo lang('add_prescription');
                ?>
            </h1>
        </div>
        <?php
        $message = validation_errors();
        if (!empty($message)) {
        ?><div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <div class="alert-title">Failed!</div>
                    <?= $message; ?>
                </div>
            </div>
        <?php } ?>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form role="form" action="prescription/addNewPrescription" method="post" enctype="multipart/form-data">
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('date'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="date" class="form-control" name="date" value='<?php
                                                                                                if (!empty($setval)) {
                                                                                                    echo set_value('date');
                                                                                                }
                                                                                                if (!empty($prescription->date)) {
                                                                                                    echo date('Y-m-d', $prescription->date);
                                                                                                }
                                                                                                ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('patient'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" id="patientchoose" name="patient">
                                        <?php if (!empty($prescription->patient)) { ?>
                                            <option value="<?php echo $patients->id; ?>" selected="selected"><?php echo $patients->name; ?> - (<?php echo lang('id'); ?> : <?php echo $patients->id; ?>)</option>
                                        <?php } ?>
                                        <?php
                                        if (!empty($setval)) {
                                            $patientdetails = $this->db->get_where('patient', array('id' => set_value('patient')))->row();
                                        ?>
                                            <option value="<?php echo $patientdetails->id; ?>" selected="selected"><?php echo $patientdetails->name; ?> - (<?php echo lang('id'); ?> : <?php echo $patientdetails->id; ?>)</option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <?php if (!$this->ion_auth->in_group('Doctor')) { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('doctor'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control select2" id="doctorchoose" name="doctor">
                                            <?php if (!empty($prescription->doctor)) { ?>
                                                <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctors->id; ?>)</option>
                                            <?php } ?>
                                            <?php
                                            if (!empty($setval)) {
                                                $doctordetails1 = $this->db->get_where('doctor', array('id' => set_value('doctor')))->row();
                                            ?>
                                                <option value="<?php echo $doctordetails1->id; ?>" selected="selected"><?php echo $doctordetails1->name; ?> -(<?php echo lang('id'); ?> : <?php echo $doctordetails1->id; ?>)</option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row" style="padding-right:30px">
                                <div class="col-md-12 row mb-4">
                                    <div class="col-md-4 text-right">
                                        <label class="col-form-label"><?php echo lang('doctor'); ?></label>
                                    </div>
                                    <div class="col-md-8">
                                        <?php if (!empty($prescription->doctor)) { ?>
                                            <select class="form-control select2" name="doctor">
                                                <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctors->id; ?>)</option>
                                            </select>
                                        <?php } else { ?>
                                            <select class="form-control select2" id="doctorchoose1" name="doctor">
                                                <?php if (!empty($prescription->doctor)) { ?>
                                                    <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctors->id; ?>)</option>
                                                <?php } ?>
                                                <?php if (!empty($doctordetails)) { ?>
                                                    <option value="<?php echo $doctordetails->id; ?>" selected="selected"><?php echo $doctordetails->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctordetails->id; ?>)</option>
                                                <?php } ?>
                                                <?php
                                                if (!empty($setval)) {
                                                    $doctordetails1 = $this->db->get_where('doctor', array('id' => set_value('doctor')))->row();
                                                ?>
                                                    <option value="<?php echo $doctordetails1->id; ?>" selected="selected"><?php echo $doctordetails1->name; ?> - (<?php echo lang('id'); ?> : <?php echo $doctordetails->id; ?>)</option>
                                                <?php }
                                                ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('history'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control ckeditor" id="editor1" name="symptom" value="" rows="70" cols="70"><?php
                                                                                                                                        if (!empty($setval)) {
                                                                                                                                            echo set_value('symptom');
                                                                                                                                        }
                                                                                                                                        if (!empty($prescription->symptom)) {
                                                                                                                                            echo $prescription->symptom;
                                                                                                                                        }
                                                                                                                                        ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('note'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control ckeditor" id="editor3" name="note" value="" rows="70" cols="70"><?php
                                                                                                                                    if (!empty($setval)) {
                                                                                                                                        echo set_value('note');
                                                                                                                                    }
                                                                                                                                    if (!empty($prescription->note)) {
                                                                                                                                        echo $prescription->note;
                                                                                                                                    }
                                                                                                                                    ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row medicine_block" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('medicine'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <?php if (empty($prescription->medicine)) { ?>
                                        <select class="form-control select2 medicinee" id="my_select1_disabled" name="category"></select>
                                    <?php } else { ?>
                                        <select class="form-control select2 medicinee" id="my_select1_disabled" name="category" multiple>
                                            <?php
                                            if (!empty($prescription->medicine)) {
                                                $prescription_medicine = explode('###', $prescription->medicine);
                                                foreach ($prescription_medicine as $key => $value) {
                                                    $prescription_medicine_extended = explode('***', $value);
                                                    $medicine = $this->medicine_model->getMedicineById($prescription_medicine_extended[0]);
                                            ?>
                                                    <option value="<?php echo $medicine->id . '*' . $medicine->name; ?>" <?php echo 'data-dosage="' . $prescription_medicine_extended[1] . '"' . 'data-frequency="' . $prescription_medicine_extended[2] . '"data-days="' . $prescription_medicine_extended[3] . '"data-instruction="' . $prescription_medicine_extended[4] . '"'; ?> selected="selected">
                                                        <?php echo $medicine->name; ?>
                                                    </option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="medicine_block row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                </div>
                                <div class="col-md-8 medicine">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                    <label class="col-form-label"><?php echo lang('advice'); ?></label>
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control ckeditor" id="editor3" name="advice" value="" rows="70" cols="70"><?php
                                                                                                                                    if (!empty($setval)) {
                                                                                                                                        echo set_value('advice');
                                                                                                                                    }
                                                                                                                                    if (!empty($prescription->advice)) {
                                                                                                                                        echo $prescription->advice;
                                                                                                                                    }
                                                                                                                                    ?></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="admin" value='admin'>
                        <input type="hidden" name="id" value='<?php
                                                                if (!empty($prescription->id)) {
                                                                    echo $prescription->id;
                                                                }
                                                                ?>'>
                        <div class="row" style="padding-right:30px">
                            <div class="col-md-12 row mb-4">
                                <div class="col-md-4 text-right">
                                </div>
                                <div class="col-md-8">
                                    <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $("#patientchoose").select2({
            placeholder: '<?php echo lang('select_patient'); ?>',
            allowClear: true,
            ajax: {
                url: 'patient/getPatientinfo',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#doctorchoose").select2({
            placeholder: '<?php echo lang('select_doctor'); ?>',
            allowClear: true,
            ajax: {
                url: 'doctor/getDoctorinfo',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $("#doctorchoose1").select2({
            placeholder: '<?php echo lang('select_doctor'); ?>',
            allowClear: true,
            ajax: {
                url: 'doctor/getDoctorInfo',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#my_select1').select2({
            multiple: true,
            placeholder: '<?php echo lang('medicine'); ?>',
            allowClear: true,
            closeOnSelect: true,
            ajax: {
                url: 'medicine/getMedicinenamelist',
                dataType: 'json',
                type: "post",
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data, params) {
                    params.page = params.page || 1;

                    return {
                        results: data,
                        newTag: true,
                        pagination: {
                            more: (params.page * 1) < data.total_count
                        }
                    };
                },
                cache: true
            },
        });
    });
</script>