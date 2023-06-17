<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header no-print">
            <h1><?php echo lang('print'); ?> <?php echo lang('prescription'); ?></h1>
        </div>
        <?php
        $doctor = $this->doctor_model->getDoctorById($prescription->doctor);
        $patient = $this->patient_model->getPatientById($prescription->patient);
        ?>
        <div class="section-body">
            <div class="card">
                <div class="card-header no-print">
                    <h4></h4>
                    <div class="card-header-form">
                        <button class="btn btn-icon icon-left btn-success invoice_button" onclick="javascript:window.print();"><i class="fas fa-print"></i><?php echo lang('print'); ?> <?php echo lang('prescription'); ?></button>
                        <!-- <button class="btn btn-icon icon-left detailsbutton btn-info ml-2 download" id="download"><i class="fa fa-download"></i> <?php echo lang('download'); ?> <?php echo lang('prescription'); ?></button> -->
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <a class="btn btn-icon icon-left btn-warning ml-2" href='prescription/all'><i class="fa fa-medkit"></i> <?php echo lang('all'); ?> <?php echo lang('prescription'); ?> </a>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                            <a class="btn btn-icon icon-left btn-warning ml-2" href='prescription'><i class="fa fa-medkit"></i> <?php echo lang('all'); ?> <?php echo lang('prescription'); ?> </a>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor'))) { ?>
                            <a class="btn btn-icon icon-left btn-primary ml-2" href='prescription/addPrescriptionView'><i class="fa fa-plus"></i> <?php echo lang('add_prescription'); ?> </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-body print" id="prescription">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            if (!empty($doctor)) { ?>
                                <h2 style="color: #2f80bf;"><?php echo $doctor->name;; ?></h2>
                            <?php } else {
                            ?>
                                <h2 style="color: #2f80bf;"><?php echo $settings->title; ?></h2>
                                <h5><?php echo $settings->address; ?></h5>
                                <h5><?php echo $settings->phone; ?></h5>
                            <?php }
                            ?>
                            <h4>
                                <?php
                                if (!empty($doctor)) {
                                    echo $doctor->profile;
                                }
                                ?>
                            </h4>
                        </div>
                        <div class="col-md-6">
                            <img align="right" src="<?php echo $settings->logo; ?>" height="150">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h5><?php echo lang('date'); ?> : <?php echo date('d-m-Y', $prescription->date); ?></h5>
                        </div>
                        <div class="col-md-2">
                            <h5><?php echo lang('prescription_id'); ?> : <?php echo $prescription->id; ?></h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h5><?php echo lang('patient'); ?>: <?php
                                                                if (!empty($patient)) {
                                                                    echo $patient->name;
                                                                }
                                                                ?></h5>
                        </div>
                        <div class="col-md-2">
                            <h5><?php echo lang('patient_id'); ?>: <?php
                                                                    if (!empty($patient)) {
                                                                        echo $patient->id;
                                                                    }
                                                                    ?></h5>
                        </div>
                        <div class="col-md-3">
                            <h5><?php echo lang('age'); ?>:
                                <?php
                                if (!empty($patient)) {
                                    $birthDate = strtotime($patient->birthdate);
                                    $birthDate = date('m/d/Y', $birthDate);
                                    $birthDate = explode("/", $birthDate);
                                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
                                    echo $age . ' Year(s)';
                                }
                                ?></h5>
                        </div>
                        <div class="col-md-3">
                            <h5 align="right"><?php echo lang('gender'); ?>: <?php echo $patient->sex; ?></h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-5">
                        <div class="col-md-5 ml-3" style="border-right: 1px solid #ccc;">
                            <h5><strong><?php echo lang('history'); ?>: </strong> <br> <br> <?php echo $prescription->symptom; ?></h5>
                            <hr>
                            <h5><strong><?php echo lang('note'); ?>:</strong> <br> <br> <?php echo $prescription->note; ?></h5>
                            <hr>
                            <h5><strong><?php echo lang('advice'); ?>: </strong> <br> <br> <?php echo $prescription->advice; ?></h5>
                        </div>
                        <div class="col-md-6">
                            <h5>Rx</h5>
                            <?php
                            if (!empty($prescription->medicine)) {
                            ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5><?php echo lang('medicine'); ?></h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5><?php echo lang('instruction'); ?></h5>
                                    </div>
                                    <div class="col-md-3" align="right">
                                        <h5><?php echo lang('frequency'); ?></h5>
                                    </div>
                                </div>
                                <?php
                                $medicine = $prescription->medicine;
                                $medicine = explode('###', $medicine);
                                foreach ($medicine as $key => $value) {
                                ?>
                                <?php } ?>
                                <?php $single_medicine = explode('***', $value); ?>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p style="font-size: 18px;"><?php echo $this->medicine_model->getMedicineById($single_medicine[0])->name . ' - ' . $single_medicine[1]; ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p style="font-size: 18px;"><?php echo $single_medicine[3] . ' - ' . $single_medicine[4]; ?></p>
                                    </div>
                                    <div class="col-md-3" align="right">
                                        <p style="font-size: 18px;"><?php echo $single_medicine[2] ?></p>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" style="font-size: 18px; margin-top: 100px;">
                            <hr><?php echo lang('signature'); ?>
                        </div>
                        <div class="col-md-8 text-right">
                            <h3 style="color: #2f80bf; margin-top: 100px;"><?php echo $settings->title; ?></h3>
                            <h5><?php echo $settings->address; ?></h5>
                            <h5><?php echo $settings->phone; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<script src="common/js/codearistos.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script> -->

<script>
    // $('#download').click(function() {
    //     var pdf = new jsPDF('p', 'pt', 'letter');
    //     pdf.addHTML($('#prescription'), function() {
    //         pdf.save('prescription_id_<?php echo $prescription->id; ?>.pdf');
    //     });
    // });
</script>

<style>
    @media print {
        .print {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99;
        }
    }
</style>

<script type="text/javascript">
    window.print();
</script>