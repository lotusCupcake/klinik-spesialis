<!DOCTYPE html>
<html lang="en" <?php if ($this->db->get('settings')->row()->language == 'arabic' || $this->db->get('settings')->row()->language == 'persian') { ?> dir="rtl" <?php } ?>>

<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Rizvi">
    <meta name="keyword" content="Php, Hospital, Clinic, Management, Software, Php, CodeIgniter, Hms, Accounting">
    <link rel="shortcut icon" href="uploads/favicon.png">
    <?php
    $class_name = $this->router->fetch_class();
    $class_name_lang = lang($class_name);
    if (empty($class_name_lang)) {
        $class_name_lang = $class_name;
    }
    ?>

    <title><?php echo $class_name_lang; ?> | <?php echo $this->db->get('settings')->row()->system_vendor; ?> </title>

    <link href="common/assets/DataTables/datatables.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="common/assets/DataTables/DataTables-1.10.16/custom/css/datatable-responsive-cdn-version-1-0-7.css" />

    <!-- CSS NEW -->
    <!-- General CSS Files -->
    <link rel="stylesheet" href="template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="template/node_modules/@fortawesome/fontawesome-free/css/all.css">
    <!-- CSS Libraries -->
    <!-- <link href="common/css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="template/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="template/node_modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="template/node_modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="template/node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="template/node_modules/selectric/public/selectric.css">
    <link rel="stylesheet" href="template/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="template/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="template/node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="template/node_modules/izitoast/dist/css/iziToast.min.css">
    <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link href="common/assets/fullcalendar/fullcalendar.css" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="template/assets/css/style.css">
    <link rel="stylesheet" href="template/assets/css/components.css">

    <style>
        @media print {
            .no-print {
                visibility: hidden;
            }
        }
    </style>

    <?php if ($this->db->get('settings')->row()->language == 'arabic' || $this->db->get('settings')->row()->language == 'persian') { ?>
    <?php } ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="fa fa-money-check"></i></a>
                            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                <div class="dropdown-header"><?= lang('payments'); ?></div>
                                <div class="dropdown-list-content dropdown-list-icons" style="height: 100px">
                                    <a href="finance/payment" class="dropdown-item dropdown-item-unread">
                                        <div class="dropdown-item-icon bg-success text-white">
                                            <i class="fa fa-money-check"></i>
                                        </div>
                                        <div class="dropdown-item-desc">
                                            <?php
                                            $query = $this->db->get('payment');
                                            $query = $query->result();
                                            foreach ($query as $payment) {
                                                $payment_date = date('y/m/d', $payment->date);
                                                if ($payment_date == date('y/m/d')) {
                                                    $payment_number[] = '1';
                                                }
                                            }
                                            if (!empty($payment_number)) {
                                                $payment_number = array_sum($payment_number);
                                            } else {
                                                $payment_number = 0;
                                            }
                                            ?>
                                            <p style="margin: auto; padding-top: 7px;"><?php
                                                                                        echo $payment_number . ' ';
                                                                                        if ($payment_number <= 1) {
                                                                                            echo lang('payment_today');
                                                                                        } else {
                                                                                            echo lang('payments_today');
                                                                                        }
                                                                                        ?></p>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer text-center">
                                    <a href="finance/payment" class="text-success"><?php echo lang('see_all_payments'); ?><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Nurse', 'Laboratorist'))) { ?>
                        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="fa fa-user-injured"></i></a>
                            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                <div class="dropdown-header"><?= lang('patient'); ?></div>
                                <div class="dropdown-list-content dropdown-list-icons" style="height: 100px">
                                    <a href="patient" class="dropdown-item dropdown-item-unread">
                                        <div class="dropdown-item-icon bg-warning text-white">
                                            <i class="fa fa-user-injured"></i>
                                        </div>
                                        <div class="dropdown-item-desc">
                                            <?php
                                            $this->db->where('add_date', date('m/d/y'));
                                            $query = $this->db->get('patient');
                                            $query = $query->result();
                                            foreach ($query as $patient) {
                                                $patient_number[] = '1';
                                            }
                                            if (!empty($patient_number)) {
                                                $patient_number = array_sum($patient_number);
                                            } else {
                                                $patient_number = 0;
                                            }
                                            ?>
                                            <p style="margin: auto; padding-top: 7px;"><?php
                                                                                        echo $patient_number . ' ';
                                                                                        if ($patient_number <= 1) {
                                                                                            echo lang('patient_registerred_today');
                                                                                        } else {
                                                                                            echo lang('patients_registerred_today');
                                                                                        }
                                                                                        ?></p>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer text-center">
                                    <a href="patient" class="text-warning"><?php echo lang('see_all_patients'); ?><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist', 'Doctor'))) { ?>
                        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="fa fa-medkit"></i></a>
                            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                <div class="dropdown-header"><?= lang('medicine'); ?></div>
                                <div class="dropdown-list-content dropdown-list-icons" style="height: 100px">
                                    <a href="medicine" class="dropdown-item dropdown-item-unread">
                                        <div class="dropdown-item-icon bg-danger text-white">
                                            <i class="fa fa-medkit"></i>
                                        </div>
                                        <div class="dropdown-item-desc">
                                            <?php
                                            $this->db->where('add_date', date('m/d/y'));
                                            $query = $this->db->get('medicine');
                                            $query = $query->result();
                                            foreach ($query as $medicine) {
                                                $medicine_number[] = '1';
                                            }
                                            if (!empty($medicine_number)) {
                                                $medicine_number = array_sum($medicine_number);
                                            } else {
                                                $medicine_number = 0;
                                            }
                                            ?>
                                            <p style="margin: auto; padding-top: 7px;"><?php
                                                                                        echo $medicine_number . ' ';
                                                                                        if ($medicine_number <= 1) {
                                                                                            echo lang('medicine_registered_today');
                                                                                        } else {
                                                                                            echo lang('medicines_registered_today');
                                                                                        }
                                                                                        ?></p>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer text-center">
                                    <a href="medicine" class="text-danger"><?php echo lang('see_all_medicines'); ?><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist', 'Nurse'))) { ?>
                        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="fa fa-notes-medical"></i></a>
                            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                <div class="dropdown-header"><?= lang('reports'); ?></div>
                                <div class="dropdown-list-content dropdown-list-icons" style="height: 100px">
                                    <a href="report" class="dropdown-item dropdown-item-unread">
                                        <div class="dropdown-item-icon bg-info text-white">
                                            <i class="fa fa-notes-medical"></i>
                                        </div>
                                        <div class="dropdown-item-desc">
                                            <?php
                                            $this->db->where('add_date', date('m/d/y'));
                                            $query = $this->db->get('report');
                                            $query = $query->result();
                                            foreach ($query as $report) {
                                                $report_number[] = '1';
                                            }
                                            if (!empty($report_number)) {
                                                $report_number = array_sum($report_number);
                                            } else {
                                                $report_number = 0;
                                            }
                                            ?>
                                            <p style="margin: auto; padding-top: 7px;"><?php
                                                                                        echo $report_number . ' ';
                                                                                        if ($report_number <= 1) {
                                                                                            echo lang('report_added_today');
                                                                                        } else {
                                                                                            echo lang('reports_added_today');
                                                                                        }
                                                                                        ?></p>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer text-center">
                                    <a href="report" class="text-info"><?php echo lang('see_all_reports'); ?><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <?php if ($this->ion_auth->in_group('Patient')) { ?>
                        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="fa fa-notes-medical"></i></a>
                            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                <div class="dropdown-header"><?= lang('reports'); ?></div>
                                <div class="dropdown-list-content dropdown-list-icons" style="height: 100px">
                                    <a href="report/myreports" class="dropdown-item dropdown-item-unread">
                                        <div class="dropdown-item-icon bg-info text-white">
                                            <i class="fa fa-notes-medical"></i>
                                        </div>
                                        <div class="dropdown-item-desc">
                                            <?php
                                            $query = $this->db->get('report');
                                            $query = $query->result();
                                            foreach ($query as $report) {
                                                if ($this->ion_auth->user()->row()->id == explode('*', $report->patient)[1]) {
                                                    $report_number[] = '1';
                                                }
                                            }
                                            if (!empty($report_number)) {
                                                $report_number = array_sum($report_number);
                                            } else {
                                                $report_number = 0;
                                            }
                                            ?>
                                            <p style="margin: auto; padding-top: 7px;"><?php
                                                                                        echo $report_number . ' ';
                                                                                        if ($report_number <= 1) {
                                                                                            echo lang('report_is_available_for_you');
                                                                                        } else {
                                                                                            echo lang('reports_are_available_for_you');
                                                                                        }
                                                                                        ?></p>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer text-center">
                                    <a href="report/myreports" class="text-info"><?php echo lang('see_all_reports'); ?><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?php $username = $this->ion_auth->user()->row()->username;
                                                                            if (!empty($username)) {
                                                                                $username = explode(' ', $username);
                                                                                $first_name = $username[0];
                                                                                echo $first_name;
                                                                            } ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title"></div>
                            <div class="buttons">
                                <a style="display: inline-block;  margin-left: 18px; margin-bottom: 10px;" href="home" class="btn btn-icon btn-secondary"></i> Close</a>
                                <a tstyle="display: inline-block; margin-bottom: 20px;" class="btn btn-icon icon-left btn-danger" href="auth/logout"><i class="fas fa-sign-out-alt"></i> logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar no-print">
                <aside id="sidebar-wrapper no-print">
                    <?php
                    $settings_title = $this->db->get('settings')->row()->title;
                    $settings_title = explode(' ', $settings_title);
                    ?>
                    <div class="sidebar-brand">
                        <a href="home"><?php echo $settings_title[0]; ?> <?php if (!empty($settings_title[1])) {
                                                                                echo $settings_title[1];
                                                                            } ?> <?php
                                                                                    if (!empty($settings_title[2])) {
                                                                                        echo $settings_title[2];
                                                                                    }
                                                                                    ?></a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                    </div>
                    <ul class="sidebar-menu">
                        <li><a class="nav-link" href="home"><i class="fas fa-home"></i><span><?php echo lang('dashboard') ?></span></a></li>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-user-md"></i><span><?php echo lang('doctor'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="doctor"><span><?php echo lang('list_of_doctors'); ?></span></a></li>
                                    <li><a class="nav-link" href="appointment/treatmentReport"></i><span><?php echo lang('treatment_history'); ?></span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Nurse', 'Doctor', 'Laboratorist', 'Receptionist'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-user-injured"></i><span><?php echo lang('patient'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="patient"><span><?php echo lang('patient_list'); ?></span></a></li>
                                    <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Receptionist'))) { ?>
                                        <li><a class="nav-link" href="patient/patientPayments"><span><?php echo lang('payments'); ?></span></a></li>
                                    <?php } ?>
                                    <?php if (!$this->ion_auth->in_group(array('Accountant', 'Receptionist'))) { ?>
                                        <li><a class="nav-link" href="patient/caseList"><span><?php echo lang('case'); ?> <?php echo lang('manager'); ?></span></a></li>
                                        <li><a class="nav-link" href="patient/documents"><span><?php echo lang('documents'); ?></span></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Receptionist'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-clock"></i><span><?php echo lang('schedule'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="schedule"><span><?php echo lang('all'); ?> <?php echo lang('schedule'); ?></span></a></li>
                                    <li><a class="nav-link" href="schedule/allHolidays"><span><?php echo lang('holidays'); ?></span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-clock"></i><span><?php echo lang('schedule'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="schedule/timeSchedule"><span><?php echo lang('all'); ?></span></a></li>
                                    <li><a class="nav-link" href="schedule/holidays"><span><?php echo lang('holidays'); ?></span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Receptionist'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-calendar-check"></i><span><?php echo lang('appointment'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="appointment"><span><?php echo lang('all'); ?></span></a></li>
                                    <li><a class="nav-link" href="appointment/addNewView"><span><?php echo lang('add'); ?></span></a></li>
                                    <li><a class="nav-link" href="appointment/todays"><span><?php echo lang('todays'); ?></span></a></li>
                                    <li><a class="nav-link" href="appointment/upcoming"><span><?php echo lang('upcoming'); ?></span></a></li>
                                    <li><a class="nav-link" href="appointment/calendar"><span><?php echo lang('calendar'); ?></span></a></li>
                                    <li><a class="nav-link" href="appointment/request"><span><?php echo lang('request'); ?></span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array(''))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-headphones"></i><span><?php echo lang('live'); ?> <?php echo lang('meetings'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                        <li><a class="nav-link" href="meeting/addNewView"><span><?php echo lang('create'); ?> <?php echo lang('meeting'); ?></span></a></li>
                                    <?php } ?>
                                    <li><a class="nav-link" href="meeting"><i class="fas fa-video"></i><span><?php echo lang('live'); ?> <?php echo lang('now'); ?></span></a></li>
                                    <li><a class="nav-link" href="meeting/upcoming"><span><?php echo lang('upcoming'); ?> <?php echo lang('meetings'); ?></span></a></li>
                                    <li><a class="nav-link" href="meeting/previous"><span><?php echo lang('previous'); ?> <?php echo lang('meetings'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array(''))) { ?>
                            <li><a class="nav-link" href="meeting"><i class="fas fa-headphones"></i><span><?php echo lang('join_live') ?></span></a></li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('Patient'))) { ?>
                            <li><a class="nav-link" href="appointment/myTodays"><i class="fas fa-headphones"></i><span><?php echo lang('todays'); ?> <?php echo lang('appointment'); ?></span></a></li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-users"></i><span><?php echo lang('human_resources'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="nurse"><span><?php echo lang('nurse'); ?></span></a></li>
                                    <li><a class="nav-link" href="pharmacist"><span><?php echo lang('pharmacist'); ?></span></a></li>
                                    <li><a class="nav-link" href="laboratorist"><span><?php echo lang('laboratorist'); ?></span></a></li>
                                    <li><a class="nav-link" href="accountant"><span><?php echo lang('accountant'); ?></span></a></li>
                                    <li><a class="nav-link" href="receptionist"><span><?php echo lang('receptionist'); ?></span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-money-check"></i><span><?php echo lang('financial_activities'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="finance/payment"><span><?php echo lang('payments'); ?></span></a></li>
                                    <li><a class="nav-link" href="finance/addPaymentView"><span><?php echo lang('add_payment'); ?></span></a></li>
                                    <li><a class="nav-link" href="finance/paymentCategory"><span><?php echo lang('payment_procedures'); ?></span></a></li>
                                    <li><a class="nav-link" href="finance/expense"><span><?php echo lang('expense'); ?></span></a></li>
                                    <li><a class="nav-link" href="finance/addExpenseView"><span><?php echo lang('add_expense'); ?></span></a></li>
                                    <li><a class="nav-link" href="finance/expenseCategory"><span><?php echo lang('expense_categories'); ?></span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('Receptionist'))) { ?>
                            <li><a class="nav-link" href="appointment/calendar"><i class="fas fa-calendar"></i><span><?php echo lang('calendar') ?></span></a></li>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-money-check"></i><span><?php echo lang('financial_activities'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="finance/payment"><span><?php echo lang('payments'); ?></span></a></li>
                                    <li><a class="nav-link" href="finance/addPaymentView"></i><span><?php echo lang('add_payment'); ?></span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                            <li><a class="nav-link" href="prescription/all"><i class="fas fa-prescription"></i><span><?php echo lang('prescription') ?></span></a></li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('Receptionist'))) { ?>
                            <li><a class="nav-link" href="lab/lab1"><i class="fas fa-file-medical"></i><span><?php echo lang('lab_reports') ?></span></a></li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('Accountant', 'Receptionist'))) { ?>
                            <li><a class="nav-link" href="finance/UserActivityReport"><i class="fas fa-file"></i><span><?php echo lang('user_activity_report') ?></span></a></li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                            <li><a class="nav-link" href="prescription"><i class="fas fa-prescription"></i><span><?php echo lang('prescription') ?></span></a></li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-flask"></i><span><?php echo lang('labs'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="lab"><span><?php echo lang('lab_reports'); ?></span></a></li>
                                    <li><a class="nav-link" href="lab/addLabView"><span><?php echo lang('add_lab_report'); ?></span></a></li>
                                    <li><a class="nav-link" href="lab/template"></i><span><?php echo lang('template'); ?></span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-medkit"></i><span><?php echo lang('medicine'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="medicine"><span><?php echo lang('medicine_list'); ?></span></a></li>
                                    <li><a class="nav-link" href="medicine/addMedicineView"><span><?php echo lang('add_medicine'); ?></span></a></li>
                                    <li><a class="nav-link" href="medicine/medicineCategory"></i><span><?php echo lang('medicine_category'); ?></span></a></li>
                                    <li><a class="nav-link" href="medicine/addCategoryView"></i><span><?php echo lang('add_medicine_category'); ?></span></a></li>
                                    <li><a class="nav-link" href="medicine/medicineStockAlert"></i><span><?php echo lang('medicine_stock_alert'); ?></span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-capsules"></i><span><?php echo lang('pharmacy'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <?php if (!$this->ion_auth->in_group(array('Pharmacist'))) { ?>
                                        <li><a class="nav-link" href="finance/pharmacy/home"><span><?php echo lang('dashboard'); ?></span></a></li>
                                    <?php } ?>
                                    <li><a class="nav-link" href="finance/pharmacy/payment"><span><?php echo lang('sales'); ?></span></a></li>
                                    <li><a class="nav-link" href="finance/pharmacy/addPaymentView"></i><span><?php echo lang('add_new_sale'); ?></span></a></li>
                                    <li><a class="nav-link" href="finance/pharmacy/expense"></i><span><?php echo lang('expense'); ?></span></a></li>
                                    <li><a class="nav-link" href="finance/pharmacy/addExpenseView"></i><span><?php echo lang('add_expense'); ?></span></a></li>
                                    <li><a class="nav-link" href="finance/pharmacy/expenseCategory"></i><span><?php echo lang('expense_categories'); ?></span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-file-medical-alt"></i><span><?php echo lang('reports'); ?> (<?php echo lang('pharmacy'); ?>)</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="finance/pharmacy/financialReport"><span><?php echo lang('pharmacy'); ?></a></li>
                                    <li><a class="nav-link" href="finance/pharmacy/monthly"></i><span><?php echo lang('monthly_sales'); ?></span></a></li>
                                    <li><a class="nav-link" href="finance/pharmacy/daily"></i><span><?php echo lang('daily_sales'); ?></span></a></li>
                                    <li><a class="nav-link" href="finance/pharmacy/monthlyExpense"></i><span><?php echo lang('monthly_expense'); ?></span></a></li>
                                    <li><a class="nav-link" href="finance/pharmacy/dailyExpense"></i><span><?php echo lang('daily_expense'); ?></span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Laboratorist', 'Doctor'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-file-medical-alt"></i><span><?php echo lang('reports'); ?> <?php echo lang('other'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <li><a class="nav-link" href="finance/financialReport"><span><?php echo lang('financial_report'); ?></span></a></li>
                                        <li><a class="nav-link" href="finance/AllUserActivityReport"></i><span><?php echo lang('user_activity_report'); ?></span></a></li>
                                    <?php } ?>
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <li><a class="nav-link" href="finance/doctorsCommission"><span><?php echo lang('doctors_commission'); ?></span></a></li>
                                        <li><a class="nav-link" href="finance/monthly"></i><span><?php echo lang('monthly_sales'); ?></span></a></li>
                                        <li><a class="nav-link" href="finance/daily"></i><span><?php echo lang('daily_sales'); ?></span></a></li>
                                        <li><a class="nav-link" href="finance/monthlyExpense"></i><span><?php echo lang('monthly_expense'); ?></span></a></li>
                                        <li><a class="nav-link" href="finance/dailyExpense"></i><span><?php echo lang('daily_expense'); ?></span></a></li>
                                    <?php } ?>
                                    <li><a class="nav-link" href="report/birth"></i><span><?php echo lang('birth_report'); ?></span></a></li>
                                    <li><a class="nav-link" href="report/operation"></i><span><?php echo lang('operation_report'); ?></span></a></li>
                                    <li><a class="nav-link" href="report/expire"></i><span><?php echo lang('expire_report'); ?></span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-mail-bulk"></i><span><?php echo lang('email'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="email/autoEmailTemplate"><span><?php echo lang('autoemailtemplate'); ?></span></a></li>
                                    <li><a class="nav-link" href="email/sendView"><span><?php echo lang('new'); ?></span></a></li>
                                    <li><a class="nav-link" href="email/sent"><span><?php echo lang('sent'); ?></span></a></li>
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <li><a class="nav-link" href="email/emailSettings"><span><?php echo lang('settings'); ?></span></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-sms"></i><span><?php echo lang('sms'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="sms/autoSMSTemplate"><span><?php echo lang('autosmstemplate'); ?></span></a></li>
                                    <li><a class="nav-link" href="sms/sendView"><span><?php echo lang('write_message'); ?></span></a></li>
                                    <li><a class="nav-link" href="sms/sent"><span><?php echo lang('sent_messages'); ?></span></a></li>
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <li><a class="nav-link" href="sms"><span><?php echo lang('sms_settings'); ?></span></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-globe"></i><span><?php echo lang('website'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="frontend"><span><?php echo lang('visit_site'); ?></span></a></li>
                                    <li><a class="nav-link" href="frontend/settings"><span><?php echo lang('website_settings'); ?></span></a></li>
                                    <li><a class="nav-link" href="review"><span><?php echo lang('reviews'); ?></span></a></li>
                                    <li><a class="nav-link" href="gridsection"><span><?php echo lang('gridsections'); ?></span></a></li>
                                    <li><a class="nav-link" href="gallery"><span><?php echo lang('gallery'); ?></span></a></li>
                                    <li><a class="nav-link" href="slide"><span><?php echo lang('slides'); ?></span></a></li>
                                    <li><a class="nav-link" href="service"><span><?php echo lang('services'); ?></span></a></li>
                                    <li><a class="nav-link" href="featured"><span><?php echo lang('featured_doctors'); ?></span></a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-cogs"></i><span><?php echo lang('settings'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="settings"><span><?php echo lang('system_settings'); ?></span></a></li>
                                    <li><a class="nav-link" href="pgateway"><span><?php echo lang('payment_gateway'); ?></span></a></li>
                                    <li><a class="nav-link" href="settings/language"><span><?php echo lang('language'); ?></span></a></li>
                                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                        <li><a class="nav-link" href="import"><span><?php echo lang('import'); ?></span></a></li>
                                    <?php } ?>
                                    <li><a class="nav-link" href="settings/backups"><span><?php echo lang('backup_database'); ?></span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('Accountant'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-money-bill-alt"></i><span><?php echo lang('payments'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="finance/payment"><span><?php echo lang('payments'); ?></span></a></li>
                                    <li><a class="nav-link" href="finance/addPaymentView"><span><?php echo lang('add_payment'); ?></span></a></li>
                                    <li><a class="nav-link" href="finance/paymentCategory"><span><?php echo lang('payment_procedures'); ?></span></a></li>
                                </ul>
                            </li>
                            <li><a class="nav-link" href="finance/expense"><i class="fas fa-money-check"></i><span><?php echo lang('expense') ?></span></a></li>
                            <li><a class="nav-link" href="finance/addExpenseView"><i class="fas fa-plus-circle"></i><span><?php echo lang('add_expense') ?></span></a></li>
                            <li><a class="nav-link" href="finance/expenseCategory"><i class="fas fa-edit"></i><span><?php echo lang('expense_categories') ?></span></a></li>
                            <li><a class="nav-link" href="finance/financialReport"><i class="fas fa-book"></i><span><?php echo lang('financial_report') ?></span></a></li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('Pharmacist'))) { ?>
                            <li><a class="nav-link" href="medicine"><i class="fas fa-medkit"></i><span><?php echo lang('medicine_list') ?></span></a></li>
                            <li><a class="nav-link" href="medicine/addMedicineView"><i class="fas fa-plus-circle"></i><span><?php echo lang('add_medicine') ?></span></a></li>
                            <li><a class="nav-link" href="medicine/medicineCategory"><i class="fas fa-medkit"></i><span><?php echo lang('medicine_category') ?></span></a></li>
                            <li><a class="nav-link" href="medicine/addCategoryView"><i class="fas fa-plus-circle"></i><span><?php echo lang('add_medicine_category') ?></span></a></li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('Nurse'))) { ?>
                            <li><a class="nav-link" href="donor/bloodBank"><i class="fas fa-tint"></i><span><?php echo lang('blood_bank') ?></span></a></li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('Patient'))) { ?>
                            <li><a class="nav-link" href="lab/myLab"><i class="fas fa-file-medical-alt"></i><span><?php echo lang('diagnosis'); ?> <?php echo lang('reports'); ?></span></a></li>
                            <li><a class="nav-link" href="patient/calendar"><i class="fas fa-calendar"></i><span><?php echo lang('appointment'); ?> <?php echo lang('calendar'); ?></span></a></li>
                            <li><a class="nav-link" href="patient/myCaseList"><i class="fas fa-file-medical"></i><span><?php echo lang('cases'); ?></span></a></li>
                            <li><a class="nav-link" href="patient/myPrescription"><i class="fas fa-medkit"></i><span><?php echo lang('prescription'); ?></span></a></li>
                            <li><a class="nav-link" href="patient/myDocuments"><i class="fas fa-file-upload"></i><span><?php echo lang('documents'); ?></span></a></li>
                            <li><a class="nav-link" href="patient/myPaymentHistory"><i class="fas fa-money-bill-alt"></i><span><?php echo lang('payment'); ?></span></a></li>
                            <li><a class="nav-link" href="report/myreports"><i class="fas fa-file-medical-alt"></i><span><?php echo lang('other'); ?> <?php echo lang('reports'); ?></span></a></li>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group(array('im'))) { ?>
                            <li><a class="nav-link" href="patient/addNewView"><i class="fas fa-user"></i><span><?php echo lang('add_patient'); ?></span></a></li>
                            <li><a class="nav-link" href="finance/addPaymentView"><i class="fas fa-user"></i><span><?php echo lang('add_payment'); ?></span></a></li>
                        <?php } ?>
                        <?php if (!$this->ion_auth->in_group(array('admin', 'Patient'))) { ?>
                            <li class="nav-item dropdown"><a href="javascript:;" class="nav-link has-dropdown"><i class="fas fa-mail-bulk"></i><span><?php echo lang('email'); ?></span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="email/sendView"><span><?php echo lang('new'); ?></span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <li><a class="nav-link" href="profile"><i class="fas fa-user"></i><span><?php echo lang('profile') ?></span></a></li>
                </aside>
            </div>