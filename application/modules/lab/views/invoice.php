<!--sidebar end-->
<!--main content start-->
<div class="main-content" id="main-content">
    <div class="wrapper section">
        <div class="section-header no-print">
            <h1>
                <?php
                echo lang('lab');
                ?>
            </h1>
        </div>
        <div class="section-body">
            <style>
                th {
                    text-align: center;
                }

                td {
                    text-align: center;
                }

                tr.total {
                    color: green;
                }



                .control-label {
                    width: 100px;
                }



                h1 {
                    margin-top: 5px;
                }


                .print_width {
                    width: 50%;
                    float: left;
                }

                ul.amounts li {
                    padding: 0px !important;
                }

                .invoice-list {
                    margin-bottom: 10px;
                }




                .page {
                    border: 0px solid #5c5c47;
                    background: #fff !important;
                    height: 100%;
                    margin: 20px 5px 5px 5px;
                    border-radius: 0px !important;

                }



                .table.main {
                    margin-top: -50px;
                }



                .control-label {
                    margin-bottom: 0px;
                }

                tr.total td {
                    color: green !important;
                }

                .theadd th {
                    background: #edfafa !important;
                }

                td {
                    font-size: 12px;
                    padding: 5px;
                    font-weight: bold;
                }

                .details {
                    font-weight: bold;
                }

                hr {
                    border-bottom: 2px solid green !important;
                }

                .corporate-id {
                    margin-bottom: 5px;
                }

                .adv-table table tr td {
                    padding: 5px 10px;
                }



                .btn {
                    margin: 10px 10px 10px 0px;
                }


                @media print {

                    h1 {
                        margin-top: 5px;
                    }

                    #main-content {
                        margin: 0;
                        padding-top: 0px;
                    }

                    .card1,
                    .section-header,
                    .section-title,
                    .card-footer {
                        display: none;
                    }

                    .print_width {
                        width: 100%;
                    }

                    ul.amounts li {
                        padding: 0px !important;
                    }

                    .invoice-list {
                        margin-bottom: 10px;
                    }

                    .wrapper {
                        margin-top: 0px;
                    }

                    .wrapper {
                        padding: 0px 0px !important;
                        background: #fff !important;

                    }

                    .wrapper {
                        border: 2px solid #777;
                        min-height: 910px;
                    }

                    .card {
                        border: 0px solid #5c5c47;
                        background: #fff !important;
                        padding: 0px 0px;
                        margin: 5px 5px 5px 5px;
                        border-radius: 0px !important;

                    }



                    .table.main {
                        margin-top: -50px;
                    }



                    .control-label {
                        margin-bottom: 0px;
                    }

                    tr.total td {
                        color: green !important;
                    }

                    .theadd th {
                        background: #edfafa !important;
                    }

                    td {
                        font-size: 12px;
                        padding: 5px;
                        font-weight: bold;
                    }

                    .details {
                        font-weight: bold;
                    }

                    hr {
                        border-bottom: 2px solid green !important;
                    }

                    .corporate-id {
                        margin-bottom: 5px;
                    }

                    .adv-table table tr td {
                        padding: 5px 10px;
                    }
                }
            </style>
            <div class="card">
                <div class="card-header no-print">
                    <h4></h4>
                    <div class="card-header-form">
                        <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>
                            <a class="btn btn-icon icon-left btn-primary ml-2" href='lab'><i class="fa fa-arrow-left"></i> <?php echo lang('back_to_lab_module'); ?></a>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('Patient'))) { ?>
                            <a class="btn btn-icon icon-left btn-primary ml-2" href='lab/myLab'><i class="fa fa-arrow-left"></i> <?php echo lang('back_to_lab_module'); ?></a>
                        <?php } ?>
                        <button class="btn btn-icon icon-left btn-success invoice_button" onclick="javascript:window.print();"><i class="fas fa-print"></i><?php echo lang('print'); ?></button>
                        <a class="btn btn-icon icon-left btn-light ml-2" href="lab?id=<?php echo $lab->id; ?>"><i class="fa fa-edit"></i> <?php echo lang('edit_report'); ?></a>
                        <a class="btn btn-icon icon-left btn-primary ml-2" href="lab"><i class="fa fa-plus"></i> <?php echo lang('add_a_new_report'); ?></a>
                    </div>
                </div>
                <div class="card-body invoice-list" style="font-size: 10px;">
                    <div class="text-center corporate-id">
                        <h3>
                            <?php echo $settings->title ?>
                        </h3>
                        <h4>
                            <?php echo $settings->address ?>
                        </h4>
                        <h4>
                            Tel: <?php echo $settings->phone ?>
                        </h4>
                        <img alt="" src="<?php echo $this->settings_model->getSettings()->logo; ?>" width="200" height="185">
                        <h4 style="font-weight: bold; margin-top: 20px; text-transform: uppercase;">
                            <?php echo lang('lab_report') ?>
                            <hr style="width: 200px; border-bottom: 1px solid #000; margin-top: 5px; margin-bottom: 5px;">
                        </h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pull-left" style="text-align: left;">
                            <div class="col-md-12 details">
                                <p>
                                    <?php
                                    if (!empty($lab)) {
                                        $patient_info = $this->db->get_where('patient', array('id' => $lab->patient))->row();
                                    }
                                    ?>
                                    <label class="control-label"><?php echo lang('patient'); ?> <?php echo lang('name'); ?> </label>
                                    <span style="text-transform: uppercase;"> :
                                        <?php
                                        if (!empty($patient_info)) {
                                            echo $patient_info->name . ' <br>';
                                        }
                                        ?>
                                    </span>
                                </p>
                            </div>
                            <div class="col-md-12 details">
                                <p>
                                    <label class="control-label"><?php echo lang('patient_id'); ?> </label>
                                    <span style="text-transform: uppercase;"> :
                                        <?php
                                        if (!empty($patient_info)) {
                                            echo $patient_info->id . ' <br>';
                                        }
                                        ?>
                                    </span>
                                </p>
                            </div>
                            <div class="col-md-12 details">
                                <p>
                                    <label class="control-label"> <?php echo lang('address'); ?> </label>
                                    <span style="text-transform: uppercase;"> :
                                        <?php
                                        if (!empty($patient_info)) {
                                            echo $patient_info->address . ' <br>';
                                        }
                                        ?>
                                    </span>
                                </p>
                            </div>
                            <div class="col-md-12 details">
                                <p>
                                    <label class="control-label"><?php echo lang('phone'); ?> </label>
                                    <span style="text-transform: uppercase;"> :
                                        <?php
                                        if (!empty($patient_info)) {
                                            echo $patient_info->phone . ' <br>';
                                        }
                                        ?>
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="col-md-12 details">
                                <p>
                                    <label class="control-label"> <?php echo lang('lab'); ?> <?php echo lang('report'); ?> <?php echo lang('id'); ?> </label>
                                    <span style="text-transform: uppercase;"> :
                                        <?php
                                        if (!empty($lab->id)) {
                                            echo $lab->id;
                                        }
                                        ?>
                                    </span>
                                </p>
                            </div>


                            <div class="col-md-12 details">
                                <p>
                                    <label class="control-label"><?php echo lang('date'); ?> </label>
                                    <span style="text-transform: uppercase;"> :
                                        <?php
                                        if (!empty($lab->date)) {
                                            echo date('d-m-Y', $lab->date) . ' <br>';
                                        }
                                        ?>
                                    </span>
                                </p>
                            </div>

                            <div class="col-md-12 details">
                                <p>
                                    <label class="control-label"><?php echo lang('doctor'); ?> </label>
                                    <span style="text-transform: uppercase;"> :
                                        <?php
                                        if (!empty($lab->doctor)) {
                                            echo $this->doctor_model->getDoctorById($lab->doctor)->name . ' <br>';
                                        }
                                        ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 panel-body">
                        <?php
                        if (!empty($lab->report)) {
                            echo $lab->report;
                        }
                        ?>
                    </div>
                    <div class="card-footer">
                        <div class="row text-center">
                            <div class="col">
                                <a href="lab/addLabView" class="btn btn-primary invoice_button">
                                    <i class="fa fa-plus-circle"></i> <?php echo lang('add_a_new_report'); ?>
                                </a>
                            </div>
                            <div class="col">
                                <a class="btn btn-info text-white" onclick="javascript:window.print();"><i class="fa fa-print"></i> <?php echo lang('print'); ?> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.print();
</script>