<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('patient_model');
        $this->load->model('donor/donor_model');
        $this->load->model('appointment/appointment_model');
        $this->load->model('lab/lab_model');
        $this->load->model('finance/finance_model');
        $this->load->model('finance/pharmacy_model');
        $this->load->model('sms/sms_model');
        $this->load->module('sms');
        $this->load->model('prescription/prescription_model');
        require APPPATH . 'third_party/stripe/stripe-php/init.php';
        $this->load->model('medicine/medicine_model');
        $this->load->model('doctor/doctor_model');
        $this->load->module('paypal');
        if (!$this->ion_auth->in_group(array('admin', 'Nurse', 'Patient', 'Doctor', 'Laboratorist', 'Accountant', 'Receptionist'))) {
            redirect('home/permission');
        }
    }

    public function index()
    {
        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['groups'] = $this->donor_model->getBloodBank();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('patient', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function calendar()
    {
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('calendar', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNewView()
    {
        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }
        $data = array();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['groups'] = $this->donor_model->getBloodBank();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNew()
    {

        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }

        $id = $this->input->post('id');
        $redirect = $this->input->get('redirect');
        if (empty($redirect)) {
            $redirect = $this->input->post('redirect');
        }
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $sms = $this->input->post('sms');
        $doctor = $this->input->post('doctor');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $sex = $this->input->post('sex');
        $birthdate = $this->input->post('birthdate');
        $bloodgroup = $this->input->post('bloodgroup');
        $patient_id = $this->input->post('p_id');
        if (empty($patient_id)) {
            $patient_id = rand(10000, 1000000);
        }
        if ((empty($id))) {
            $add_date = date('m/d/y');
            $registration_time = time();
        } else {
            $add_date = $this->patient_model->getPatientById($id)->add_date;
            $registration_time = $this->patient_model->getPatientById($id)->registration_time;
        }


        $email = $this->input->post('email');
        if (empty($email)) {
            $email = $name . '@' . $phone . '.com';
        }



        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        // Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Password Field
        if (empty($id)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[3]|max_length[100]|xss_clean');
        }
        // Validating Email Field
        $this->form_validation->set_rules('email', 'Email', 'trim|min_length[2]|max_length[100]|xss_clean');
        // Validating Doctor Field
        //   $this->form_validation->set_rules('doctor', 'Doctor', 'trim|min_length[1]|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[2]|max_length[500]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[2]|max_length[50]|xss_clean');
        // Validating Email Field
        $this->form_validation->set_rules('sex', 'Sex', 'trim|min_length[2]|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('birthdate', 'Birth Date', 'trim|min_length[2]|max_length[500]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('bloodgroup', 'Blood Group', 'trim|min_length[1]|max_length[10]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $this->session->set_flashdata('feedback', lang('validation_error'));
                redirect("patient/editPatient?id=$id");
            } else {
                $data = array();
                $data['setval'] = 'setval';
                $data['doctors'] = $this->doctor_model->getDoctor();
                $data['groups'] = $this->donor_model->getBloodBank();
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the header file
            }
        } else {
            $file_name = $_FILES['img_url']['name'];
            $file_name_pieces = explode('_', $file_name);
            $new_file_name = '';
            $count = 1;
            foreach ($file_name_pieces as $piece) {
                if ($count !== 1) {
                    $piece = ucfirst($piece);
                }

                $new_file_name .= $piece;
                $count++;
            }
            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => False,
                'max_size' => "10000000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "10000",
                'max_width' => "10000"
            );

            $this->load->library('Upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('img_url')) {
                $path = $this->upload->data();
                $img_url = "uploads/" . $path['file_name'];
                $data = array();
                $data = array(
                    'patient_id' => $patient_id,
                    'img_url' => $img_url,
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'doctor' => $doctor,
                    'phone' => $phone,
                    'sex' => $sex,
                    'birthdate' => $birthdate,
                    'bloodgroup' => $bloodgroup,
                    'add_date' => $add_date,
                    'registration_time' => $registration_time
                );
            } else {
                //$error = array('error' => $this->upload->display_errors());
                $data = array();
                $data = array(
                    'patient_id' => $patient_id,
                    'name' => $name,
                    'email' => $email,
                    'doctor' => $doctor,
                    'address' => $address,
                    'phone' => $phone,
                    'sex' => $sex,
                    'birthdate' => $birthdate,
                    'bloodgroup' => $bloodgroup,
                    'add_date' => $add_date,
                    'registration_time' => $registration_time
                );
            }

            $username = $this->input->post('name');

            if (empty($id)) {     // Adding New Patient
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('feedback', lang('this_email_address_is_already_registered'));
                    redirect('patient/addNewView');
                } else {
                    $dfg = 5;
                    $this->ion_auth->register($username, $password, $email, $dfg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                    $this->patient_model->insertPatient($data);
                    $patient_user_id = $this->db->get_where('patient', array('email' => $email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->patient_model->updatePatient($patient_user_id, $id_info);
                    //sms
                    $set['settings'] = $this->settings_model->getSettings();
                    $autosms = $this->sms_model->getAutoSmsByType('patient');
                    $message = $autosms->message;
                    $doctorname = $this->doctor_model->getDoctorById($doctor)->name;
                    $to = $phone;
                    $name1 = explode(' ', $name);
                    if (!isset($name1[1])) {
                        $name1[1] = null;
                    }
                    $data1 = array(
                        'firstname' => $name1[0],
                        'lastname' => $name1[1],
                        'name' => $name,
                        'doctor' => $doctorname,
                        'company' => $set['settings']->system_vendor
                    );
                    //   if (!empty($sms)) {
                    // $this->sms->sendSmsDuringPatientRegistration($patient_user_id);
                    if ($autosms->status == 'Active') {
                        $messageprint = $this->parser->parse_string($message, $data1);
                        $data2[] = array($to => $messageprint);
                        $this->sms->sendSms($to, $message, $data2);
                    }
                    //end
                    //  }
                    //email

                    $autoemail = $this->email_model->getAutoEmailByType('patient');
                    if ($autoemail->status == 'Active') {
                        $mail_provider = $this->settings_model->getSettings()->emailtype;
                        $settngs_name = $this->settings_model->getSettings()->system_vendor;
                        $email_Settings = $this->email_model->getEmailSettingsByType($mail_provider);
                        $message1 = $autoemail->message;
                        $messageprint1 = $this->parser->parse_string($message1, $data1);
                        if ($mail_provider == 'Domain Email') {
                            $this->email->from($email_Settings->admin_email);
                        }
                        if ($mail_provider == 'Smtp') {
                            $this->email->from($email_Settings->user, $settngs_name);
                        }
                        //  $this->email->from($emailSettings->admin_email);
                        $this->email->to($email);
                        $this->email->subject('Registration confirmation');
                        $this->email->message($messageprint1);
                        $this->email->send();



                        $mail_provider = $this->settings_model->getSettings()->emailtype;
                        $settngs_name = $this->settings_model->getSettings()->system_vendor;
                        $emailSettings = $this->email_model->getEmailSettingsByType($mail_provider);
                        $base_url = str_replace(array('http://', 'https://', '/'), '', base_url());
                        $subject = $base_url . ' - Patient Registration Details';
                        $message = 'Dear ' . $name . ', Thank you for the registration. <br> Here is your login details.<br> <br> Link: ' . base_url() . 'auth/login <br> Username: ' . $email . ' <br> Password: ' . $password . '<br><br> Thank You, <br>' . $this->settings->title;
                        if ($mail_provider == 'Domain Email') {
                            $this->email->from($emailSettings->admin_email);
                        }
                        if ($mail_provider == 'Smtp') {
                            $this->email->from($emailSettings->user, $settngs_name);
                        }
                        $this->email->to($email);
                        $this->email->subject($subject);
                        $this->email->message($message);
                        $this->email->send();
                    }

                    //end



                    $this->session->set_flashdata('feedback', lang('added'));
                }
                //    }
            } else { // Updating Patient
                $ion_user_id = $this->db->get_where('patient', array('id' => $id))->row()->ion_user_id;
                if (empty($password)) {
                    $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                } else {
                    $password = $this->ion_auth_model->hash_password($password);
                }
                $this->patient_model->updateIonUser($username, $email, $password, $ion_user_id);
                $this->patient_model->updatePatient($id, $data);
                $this->session->set_flashdata('feedback', lang('updated'));
            }
            // Loading View
            if (!empty($redirect)) {
                redirect($redirect);
            } else {
                redirect('patient');
            }
        }
    }

    function editPatient()
    {
        $data = array();
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['groups'] = $this->donor_model->getBloodBank();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function editPatientByJason()
    {
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);
        $data['doctor'] = $this->doctor_model->getDoctorById($data['patient']->doctor);
        echo json_encode($data);
    }

    function getPatientByJason()
    {
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);

        $doctor = $data['patient']->doctor;
        $data['doctor'] = $this->doctor_model->getDoctorById($doctor);

        if (!empty($data['patient']->birthdate)) {
            $birthDate = strtotime($data['patient']->birthdate);
            $birthDate = date('m/d/Y', $birthDate);
            $birthDate = explode("/", $birthDate);
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
            $data['age'] = $age . ' Year(s)';
        }

        echo json_encode($data);
    }

    function patientDetails()
    {
        $data = array();
        $id = $this->input->get('id');
        $data['patient'] = $this->patient_model->getPatientById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('details', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function report()
    {
        $data = array();
        $id = $this->input->get('id');
        $data['settings'] = $this->settings_model->getSettings();
        $data['payment'] = $this->finance_model->getPaymentById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('diagnostic_report_details', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function addDiagnosticReport()
    {
        $id = $this->input->post('id');
        $invoice = $this->input->post('invoice');
        $patient = $this->input->post('patient');
        $report = $this->input->post('report');

        $date = time();

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');


        // Validating Name Field
        $this->form_validation->set_rules('invoice', 'Invoice', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Password Field

        $this->form_validation->set_rules('report', 'Report', 'trim|min_length[1]|max_length[10000]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('feedback', lang('validation_error'));
            redirect('patient/report?id=' . $invoice);
        } else {

            //$error = array('error' => $this->upload->display_errors());
            $data = array();
            $data = array(
                'invoice' => $invoice,
                'date' => $date,
                'report' => $report
            );

            if (empty($id)) {     // Adding New department
                $this->patient_model->insertDiagnosticReport($data);
                $this->session->set_flashdata('feedback', lang('added'));
            } else { // Updating department
                $this->patient_model->updateDiagnosticReport($id, $data);
                $this->session->set_flashdata('feedback', lang('updated'));
            }
            // Loading View
            redirect('patient/report?id=' . $invoice);
        }
    }

    function patientPayments()
    {
        $data['groups'] = $this->donor_model->getBloodBank();
        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('patient_payments', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function caseList()
    {
        $data['settings'] = $this->settings_model->getSettings();
        $data['patients'] = $this->patient_model->getPatient();
        $data['medical_histories'] = $this->patient_model->getMedicalHistory();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('case_list', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function documents()
    {
        $data['patients'] = $this->patient_model->getPatient();
        $data['files'] = $this->patient_model->getPatientMaterial();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('documents', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function myCaseList()
    {
        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient_id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
            $data['medical_histories'] = $this->patient_model->getMedicalHistoryByPatientId($patient_id);
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('my_case_list', $data);
            $this->load->view('home/footer'); // just the footer file
        }
    }

    function myDocuments()
    {
        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient_id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
            $data['files'] = $this->patient_model->getPatientMaterialByPatientId($patient_id);
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('my_documents', $data);
            $this->load->view('home/footer'); // just the footer file
        }
    }

    function myPrescription()
    {
        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient_id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
            $data['doctors'] = $this->doctor_model->getDoctor();
            $data['prescriptions'] = $this->prescription_model->getPrescriptionByPatientId($patient_id);
            $data['settings'] = $this->settings_model->getSettings();
            $this->load->view('home/dashboard', $data); // just the header file
            $this->load->view('my_prescription', $data);
            $this->load->view('home/footer'); // just the header file
        }
    }

    public function myPayment()
    {
        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient_id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
            $data['settings'] = $this->settings_model->getSettings();
            $data['payments'] = $this->finance_model->getPaymentByPatientId($patient_id);
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('my_payment', $data);
            $this->load->view('home/footer'); // just the header file
        }
    }

    function myPaymentHistory()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }


        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
        }
        $data['settings'] = $this->settings_model->getSettings();
        $date_from = strtotime($this->input->post('date_from'));
        $date_to = strtotime($this->input->post('date_to'));
        if (!empty($date_to)) {
            $date_to = $date_to + 86399;
        }

        $data['date_from'] = $date_from;
        $data['date_to'] = $date_to;

        if (!empty($date_from)) {
            $data['payments'] = $this->finance_model->getPaymentByPatientIdByDate($patient, $date_from, $date_to);
            $data['deposits'] = $this->finance_model->getDepositByPatientIdByDate($patient, $date_from, $date_to);
            $data['gateway'] = $this->finance_model->getGatewayByName($data['settings']->payment_gateway);
        } else {
            $data['payments'] = $this->finance_model->getPaymentByPatientId($patient);
            $data['pharmacy_payments'] = $this->pharmacy_model->getPaymentByPatientId($patient);
            $data['ot_payments'] = $this->finance_model->getOtPaymentByPatientId($patient);
            $data['deposits'] = $this->finance_model->getDepositByPatientId($patient);
            $data['gateway'] = $this->finance_model->getGatewayByName($data['settings']->payment_gateway);
        }



        $data['patient'] = $this->patient_model->getPatientByid($patient);
        $data['settings'] = $this->settings_model->getSettings();



        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('my_payments_history', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function deposit()
    {
        $id = $this->input->post('id');


        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $patient = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
        } else {
            $this->session->set_flashdata('feedback', lang('undefined_patient_id'));
            redirect('patient/myPaymentsHistory');
        }



        $payment_id = $this->input->post('payment_id');
        $date = time();

        $deposited_amount = $this->input->post('deposited_amount');

        $deposit_type = $this->input->post('deposit_type');

        if ($deposit_type != 'Card') {
            $this->session->set_flashdata('feedback', lang('undefined_payment_type'));
            redirect('patient/myPaymentsHistory');
        }

        $user = $this->ion_auth->get_user_id();

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Patient Name Field
        $this->form_validation->set_rules('patient', 'Patient', 'trim|min_length[1]|max_length[100]|xss_clean');
        // Validating Deposited Amount Field
        $this->form_validation->set_rules('deposited_amount', 'Deposited Amount', 'trim|min_length[1]|max_length[100]|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            redirect('patient/myPaymentsHistory');
        } else {
            $data = array();
            $data = array(
                'patient' => $patient,
                // 'date' => $date,
                'payment_id' => $payment_id,
                'deposited_amount' => $deposited_amount,
                'deposit_type' => $deposit_type,
                'user' => $user
            );
            if (empty($id)) {
                $data['date'] = $date;
            }
            if (empty($id)) {
                if ($deposit_type == 'Card') {
                    $payment_details = $this->finance_model->getPaymentById($payment_id);

                    $gateway = $this->settings_model->getSettings()->payment_gateway;

                    if ($gateway == 'PayPal') {
                        $card_type = $this->input->post('card_type');
                        $card_number = $this->input->post('card_number');
                        $expire_date = $this->input->post('expire_date');
                        $cvv = $this->input->post('cvv_number');
                        $cardholdername = $this->input->post('cardholder');
                        $all_details = array(
                            'patient' => $payment_details->patient,
                            'date' => $payment_details->date,
                            'amount' => $payment_details->amount,
                            'doctor' => $payment_details->doctor_name,
                            'discount' => $payment_details->discount,
                            'flat_discount' => $payment_details->flat_discount,
                            'gross_total' => $payment_details->gross_total,
                            'status' => 'unpaid',
                            'patient_name' => $payment_details->patient_name,
                            'patient_phone' => $payment_details->patient_phone,
                            'patient_address' => $payment_details->patient_address,
                            'deposited_amount' => $deposited_amount,
                            'payment_id' => $payment_details->id,
                            'card_type' => $card_type,
                            'card_number' => $card_number,
                            'expire_date' => $expire_date,
                            'cvv' => $cvv,
                            'from' => 'patient_payment_details',
                            'user' => $user,
                            'cardholdername' => $cardholdername
                        );

                        $this->paypal->paymentPaypal($all_details);
                    } elseif ($gateway == '2Checkout') {

                        $card_type = $this->input->post('card_type');
                        $card_number = $this->input->post('card_number');
                        $expire_date = $this->input->post('expire_date');
                        $cvv = $this->input->post('cvv');
                        $ref = date('Y') . rand() . date('d');
                        $amount = $deposited_amount;
                        $token = $this->input->post('token');
                        //   $token = $this->input->post('token');
                        //  $card_number = base64_encode($card_number);
                        //   $cvv = base64_encode($cvv);
                        //     if ($configuration) {
                        $datapayment = array(
                            'ref' => $ref,
                            'amount' => $amount,
                            'patient' => $patient,
                            'insertid' => $payment_id,
                            'card_type' => $card_type,
                            'card_number' => $card_number,
                            'expire_date' => $expire_date,
                            'cvv' => $cvv,
                            'cardholder' => $this->input->post('cardholder')
                        );

                        $this->load->module('twocheckoutpay');
                        $charge = $this->twocheckoutpay->createCharge($ref, $token, $amount, $datapayment);

                        if ($charge['response']['responseCode'] == 'APPROVED') {
                            $date = time();
                            $data1 = array(
                                'date' => $date,
                                'patient' => $patient,
                                'deposited_amount' => $deposited_amount,
                                'payment_id' => $payment_id,
                                'gateway' => '2Checkout',
                                'deposit_type' => $deposit_type,
                                'user' => $user
                            );
                            $this->finance_model->insertDeposit($data1);
                            $this->session->set_flashdata('feedback', lang('added'));
                            redirect('patient/myPaymentHistory');
                        } else {
                            $this->session->set_flashdata('feedback', lang('transaction_failed'));
                            redirect('patient/myPaymentHistory');
                        }
                    } elseif ($gateway == 'Authorize.Net') {

                        $card_type = $this->input->post('card_type');
                        $card_number = $this->input->post('card_number');
                        $expire_date = $this->input->post('expire_date');
                        $cvv = $this->input->post('cvv_number');
                        $ref = date('Y') . rand() . date('d');
                        $amount = $deposited_amount;

                        $card_number = base64_encode($card_number);
                        $cvv = base64_encode($cvv);
                        //     if ($configuration) {
                        $datapayment = array(
                            'ref' => $ref,
                            'amount' => $amount,
                            'patient' => $patient,
                            'insertid' => $payment_id,
                            'card_type' => $card_type,
                            'card_number' => $card_number,
                            'expire_date' => $expire_date,
                            'cvv' => $cvv,
                            //  'email'=>$patient_email
                        );

                        $this->load->module('authorizenet');
                        $response = $this->authorizenet->paymentAuthorize($datapayment, 'patdep');
                        //  $this->authorizenet->reponseRedirectPageAuthorizenet($respose, $datapayment,'pos');
                        // $this->load->view('paytm/paytminfo', $datapayment);
                        //    }
                        // $email=$patient_email;
                    } elseif ($gateway == 'Stripe') {
                        $card_number = $this->input->post('card_number');
                        $expire_date = $this->input->post('expire_date');
                        $cvv = $this->input->post('cvv_number');
                        $token = $this->input->post('token');

                        $stripe = $this->db->get_where('paymentGateway', array('name =' => 'Stripe'))->row();
                        \Stripe\Stripe::setApiKey($stripe->secret);
                        $charge = \Stripe\Charge::create(array(
                            "amount" => $deposited_amount * 100,
                            "currency" => "usd",
                            "source" => $token
                        ));
                        $chargeJson = $charge->jsonSerialize();
                        if ($chargeJson['status'] == 'succeeded') {
                            $data1 = array(
                                'patient' => $patient,
                                'date' => $date,
                                'payment_id' => $payment_id,
                                'deposited_amount' => $deposited_amount,
                                'deposit_type' => $deposit_type,
                                'gateway' => 'Stripe',
                                'deposit_type' => 'Card',
                                'user' => $user
                            );
                            $this->finance_model->insertDeposit($data1);
                            $this->session->set_flashdata('feedback', 'Added');
                            redirect('patient/myPaymentHistory');
                        } else {
                            $this->session->set_flashdata('feedback', 'Payment failed.');
                            redirect('patient/myPaymentHistory');
                        }
                    } elseif ($gateway == 'Paystack') {

                        $ref = date('Y') . '-' . rand() . date('d') . '-' . date('m');
                        $amount_in_kobo = $deposited_amount;
                        $this->load->module('paystack');
                        $this->paystack->paystack_standard($amount_in_kobo, $ref, $patient, $payment_id, $user, '1');
                    } elseif ($gateway == 'SSLCOMMERZ') {
                        $this->load->module('sslcommerzpayment');
                        $this->sslcommerzpayment->request_api_hosted($deposited_amount, $patient, $payment_id, $user, '0');
                    } elseif ($gateway == 'Paytm') {


                        $ref = date('Y') . '-' . rand() . date('d') . '-' . date('m') . '-1';
                        $amount = $deposited_amount;
                        $this->load->module('paytm');
                        // $configuration=$this->paytm->Configuration();
                        //   if($configuration){
                        $datapayment = array(
                            'ref' => $ref,
                            'amount' => $amount,
                            'patient' => $patient,
                            'insertid' => $payment_id,
                            'channel_id' => 'WEB',
                            'industry_type' => 'Retail',
                            //  'email'=>$patient_email
                        );
                        //  $this->load->module('paytm/pgRedirects');
                        $this->paytm->PaytmGateway($datapayment);
                        //}
                        // $email=$patient_email;
                    } elseif ($gateway == 'Pay U Money') {
                        redirect("payu/check?deposited_amount=" . "$deposited_amount" . '&payment_id=' . $payment_id);
                    } else {
                        $this->session->set_flashdata('feedback', lang('payment_failed_no_gateway_selected'));
                        redirect('patient/myPaymentHistory');
                    }
                } else {
                    $this->finance_model->insertDeposit($data);
                    $this->session->set_flashdata('feedback', lang('added'));
                }
            } else {
                $this->finance_model->updateDeposit($id, $data);

                $amount_received_id = $this->finance_model->getDepositById($id)->amount_received_id;
                if (!empty($amount_received_id)) {
                    $amount_received_payment_id = explode('.', $amount_received_id);
                    $payment_id = $amount_received_payment_id[0];
                    $data_amount_received = array('amount_received' => $deposited_amount);
                    $this->finance_model->updatePayment($amount_received_payment_id[0], $data_amount_received);
                }

                $this->session->set_flashdata('feedback', lang('updated'));
                redirect('patient/myPaymentHistory');
            }
        }
    }

    function myInvoice()
    {
        $id = $this->input->get('id');
        $data['settings'] = $this->settings_model->getSettings();
        $data['discount_type'] = $this->finance_model->getDiscountType();
        $data['payment'] = $this->finance_model->getPaymentById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('myInvoice', $data);
        $this->load->view('home/footer'); // just the footer fi
    }

    function addMedicalHistory()
    {
        $id = $this->input->post('id');
        $patient_id = $this->input->post('patient_id');

        $date = $this->input->post('date');

        $title = $this->input->post('title');

        if (!empty($date)) {
            $date = strtotime($date);
        } else {
            $date = time();
        }

        $description = $this->input->post('description');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $redirect = $this->input->post('redirect');
        if (empty($redirect)) {
            $redirect = 'patient/medicalHistory?id=' . $patient_id;
        }

        // Validating Name Field
        $this->form_validation->set_rules('date', 'Date', 'trim|min_length[1]|max_length[100]|xss_clean');

        // Validating Title Field
        $this->form_validation->set_rules('title', 'Title', 'trim|min_length[1]|max_length[100]|xss_clean');

        // Validating Password Field

        $this->form_validation->set_rules('description', 'Description', 'trim|min_length[5]|max_length[10000]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                redirect("patient/editMedicalHistory?id=$id");
            } else {
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new');
                $this->load->view('home/footer'); // just the header file
            }
        } else {

            if (!empty($patient_id)) {
                $patient_details = $this->patient_model->getPatientById($patient_id);
                $patient_name = $patient_details->name;
                $patient_phone = $patient_details->phone;
                $patient_address = $patient_details->address;
            } else {
                $patient_name = 0;
                $patient_phone = 0;
                $patient_address = 0;
            }

            //$error = array('error' => $this->upload->display_errors());
            $data = array();
            $data = array(
                'patient_id' => $patient_id,
                'date' => $date,
                'title' => $title,
                'description' => $description,
                'patient_name' => $patient_name,
                'patient_phone' => $patient_phone,
                'patient_address' => $patient_address,
            );

            if (empty($id)) {     // Adding New department
                $this->patient_model->insertMedicalHistory($data);
                $this->session->set_flashdata('feedback', lang('added'));
            } else { // Updating department
                $this->patient_model->updateMedicalHistory($id, $data);
                $this->session->set_flashdata('feedback', lang('updated'));
            }
            // Loading View
            redirect($redirect);
        }
    }

    public function diagnosticReport()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }

        if ($this->ion_auth->in_group(array('Patient'))) {
            $current_user = $this->ion_auth->get_user_id();
            $patient_user_id = $this->patient_model->getPatientByIonUserId($current_user)->id;
            $data['payments'] = $this->finance_model->getPaymentByPatientId($patient_user_id);
        } else {
            $data['payments'] = $this->finance_model->getPayment();
        }

        $data['settings'] = $this->settings_model->getSettings();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('diagnostic_report', $data);
        $this->load->view('home/footer'); // just the header file
    }

    function medicalHistory()
    {
        $data = array();
        $id = $this->input->get('id');

        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
        }

        $data['patient'] = $this->patient_model->getPatientById($id);
        $data['appointments'] = $this->appointment_model->getAppointmentByPatient($data['patient']->id);
        $data['patients'] = $this->patient_model->getPatient();
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['groups'] = $this->donor_model->getBloodBank();
        $data['prescriptions'] = $this->prescription_model->getPrescriptionByPatientId($id);
        $data['labs'] = $this->lab_model->getLabByPatientId($id);
        $data['medical_histories'] = $this->patient_model->getMedicalHistoryByPatientId($id);
        $data['patient_materials'] = $this->patient_model->getPatientMaterialByPatientId($id);

        foreach ($data['appointments'] as $appointment) {
            $doctor_details = $this->doctor_model->getDoctorById($appointment->doctor);
            if (!empty($doctor_details)) {
                $doctor_name = $doctor_details->name;
            } else {
                $doctor_name = '';
            }
            $timeline[$appointment->date + 1] = '<div class="activity">
                                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                                            <i class="fas fa-stethoscope"></i>
                                                        </div>
                                                        <div class="activity-detail">
                                                            <div class="mb-2">
                                                                <span class="text-job text-primary">' . date("d-m-Y", $appointment->date) . '</span>
                                                                <span class="bullet"></span>
                                                                <a class="text-job">' . lang("appointment") . '</a>
                                                            </div>
                                                            <p>' . $doctor_name . '</p>
                                                            <p class="text-primary">' . $appointment->s_time . ' - ' . $appointment->e_time . '</p>
                                                        </div>
                                                    </div>';
        }

        foreach ($data['prescriptions'] as $prescription) {
            $doctor_details = $this->doctor_model->getDoctorById($prescription->doctor);
            if (!empty($doctor_details)) {
                $doctor_name = $doctor_details->name;
            } else {
                $doctor_name = '';
            }
            $timeline[$prescription->date + 2] = '<div class="activity">
                                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                                            <i class="fas fa-medkit"></i>
                                                        </div>
                                                        <div class="activity-detail">
                                                            <div class="mb-2">
                                                                <span class="text-job text-primary">' . date("d-m-Y", $prescription->date) . '</span>
                                                                <span class="bullet"></span>
                                                                <a class="text-job">' . lang("prescription") . '</a>
                                                            </div>
                                                            <p>' . $doctor_name . '</p>
                                                            <a href="prescription/viewPrescription?id=' . $prescription->id . '"><button class="btn btn-primary btn_width detailsbutton"><i class="fa fa-eye"></i> View</button></a>
                                                        </div>
                                                    </div>';
        }

        foreach ($data['labs'] as $lab) {

            $doctor_details = $this->doctor_model->getDoctorById($lab->doctor);
            if (!empty($doctor_details)) {
                $lab_doctor = $doctor_details->name;
            } else {
                $lab_doctor = '';
            }

            $timeline[$lab->date + 3] = ' <div class="activity">
                                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                                            <i class="fas fa-flask"></i>
                                                        </div>
                                                        <div class="activity-detail">
                                                            <div class="mb-2">
                                                                <span class="text-job text-primary">' . date("d-m-Y", $lab->date) . '</span>
                                                                <span class="bullet"></span>
                                                                <a class="text-job">' . lang("lab") . '</a>
                                                            </div>
                                                            <p>' . $lab_doctor . '</p>
                                                            <a href="lab/invoice?id=' . $lab->id . '"><button class="btn btn-primary invoicebutton"><i class="fa fa-file"></i> ' . lang('report') . '</button></a>
                                                        </div>
                                                    </div>';
        }

        foreach ($data['medical_histories'] as $medical_history) {
            $timeline[$medical_history->date + 4] = '<div class="activity">
                                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                                            <i class="fas fa-notes-medical"></i>
                                                        </div>
                                                        <div class="activity-detail">
                                                            <div class="mb-2">
                                                                <span class="text-job text-primary">' . date("d-m-Y", $medical_history->date) . '</span>
                                                                <span class="bullet"></span>
                                                                <a class="text-job">' . lang("case_history") . '</a>
                                                            </div>
                                                            <p>' . $medical_history->description . '</p>
                                                        </div>
                                                    </div>';
        }

        foreach ($data['patient_materials'] as $patient_material) {
            $timeline[$patient_material->date + 5] = '<div class="activity">
                                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                                            <i class="fas fa-file"></i>
                                                        </div>
                                                        <div class="activity-detail">
                                                            <div class="mb-2">
                                                                <span class="text-job text-primary">' . date("d-m-Y", $patient_material->date) . '</span>
                                                                <span class="bullet"></span>
                                                                <a class="text-job">' . lang("documents") . '</a>
                                                            </div>
                                                            <p>' . $patient_material->title . ' <a href="' . $patient_material->url . '" download=""><i class="fa fa-floppy-disk"></i></a></p>
                                                        </div>
                                                    </div>';
        }

        if (!empty($timeline)) {
            $data['timeline'] = $timeline;
        }

        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('medical_history', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function editMedicalHistoryByJason()
    {
        $id = $this->input->get('id');
        $data['medical_history'] = $this->patient_model->getMedicalHistoryById($id);
        $data['patient'] = $this->patient_model->getPatientById($data['medical_history']->patient_id);
        echo json_encode($data);
    }

    function getCaseDetailsByJason()
    {
        $id = $this->input->get('id');
        $data['case'] = $this->patient_model->getMedicalHistoryById($id);
        $patient = $data['case']->patient_id;
        $data['patient'] = $this->patient_model->getPatientById($patient);
        echo json_encode($data);
    }

    function getPatientByAppointmentByDctorId($doctor_id)
    {
        $data = array();
        $appointments = $this->appointment_model->getAppointmentByDoctor($doctor_id);
        foreach ($appointments as $appointment) {
            $patient_exists = $this->patient_model->getPatientById($appointment->patient);
            if (!empty($patient_exists)) {
                $patients[] = $appointment->patient;
            }
        }

        if (!empty($patients)) {
            $patients = array_unique($patients);
        } else {
            $patients = '';
        }

        return $patients;
    }

    function patientMaterial()
    {
        $data = array();
        $id = $this->input->get('patient');
        $data['settings'] = $this->settings_model->getSettings();
        $data['patient'] = $this->patient_model->getPatientById($id);
        $data['patient_materials'] = $this->patient_model->getPatientMaterialByPatientId($id);
        $this->load->view('home/dashboard', $data); // just the header file
        $this->load->view('patient_material', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function addPatientMaterial()
    {
        $title = $this->input->post('title');
        $patient_id = $this->input->post('patient');
        $img_url = $this->input->post('img_url');
        $date = time();
        $redirect = $this->input->post('redirect');

        if ($this->ion_auth->in_group(array('Patient'))) {
            if (empty($patient_id)) {
                $current_patient = $this->ion_auth->get_user_id();
                $patient_id = $this->patient_model->getPatientByIonUserId($current_patient)->id;
            }
        }


        if (empty($redirect)) {
            $redirect = "patient/medicalHistory?id=" . $patient_id;
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        // Validating Patient Field
        $this->form_validation->set_rules('patient', 'Patient', 'trim|min_length[1]|max_length[100]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('feedback', lang('validation_error'));
            redirect($redirect);
        } else {

            if (!empty($patient_id)) {
                $patient_details = $this->patient_model->getPatientById($patient_id);
                $patient_name = $patient_details->name;
                $patient_phone = $patient_details->phone;
                $patient_address = $patient_details->address;
            } else {
                $patient_name = 0;
                $patient_phone = 0;
                $patient_address = 0;
            }






            $file_name = $_FILES['img_url']['name'];
            $file_name_pieces = explode('_', $file_name);
            $new_file_name = '';
            $count = 1;
            foreach ($file_name_pieces as $piece) {
                if ($count !== 1) {
                    $piece = ucfirst($piece);
                }

                $new_file_name .= $piece;
                $count++;
            }
            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf|docx|doc|odt",
                'overwrite' => False,
                'max_size' => "48000000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "10000",
                'max_width' => "10000"
            );

            $this->load->library('Upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('img_url')) {
                $path = $this->upload->data();
                $img_url = "uploads/" . $path['file_name'];
                $data = array();
                $data = array(
                    'date' => $date,
                    'title' => $title,
                    'url' => $img_url,
                    'patient' => $patient_id,
                    'patient_name' => $patient_name,
                    'patient_address' => $patient_address,
                    'patient_phone' => $patient_phone,
                    'date_string' => date('d-m-y', $date),
                );
            } else {
                $data = array();
                $data = array(
                    'date' => $date,
                    'title' => $title,
                    'patient' => $patient_id,
                    'patient_name' => $patient_name,
                    'patient_address' => $patient_address,
                    'patient_phone' => $patient_phone,
                    'date_string' => date('d-m-y', $date),
                );
                $this->session->set_flashdata('feedback', lang('upload_error'));
            }

            $this->patient_model->insertPatientMaterial($data);
            $this->session->set_flashdata('feedback', lang('added'));


            redirect($redirect);
        }
    }

    function deleteCaseHistory()
    {
        $id = $this->input->get('id');
        $redirect = $this->input->get('redirect');
        $case_history = $this->patient_model->getMedicalHistoryById($id);
        $this->patient_model->deleteMedicalHistory($id);
        $this->session->set_flashdata('feedback', lang('deleted'));
        if ($redirect == 'case') {
            redirect('patient/caseList');
        } else {
            redirect("patient/MedicalHistory?id=" . $case_history->patient_id);
        }
    }

    function deletePatientMaterial()
    {
        $id = $this->input->get('id');
        $redirect = $this->input->get('redirect');
        $patient_material = $this->patient_model->getPatientMaterialById($id);
        $path = $patient_material->url;
        if (!empty($path)) {
            unlink($path);
        }
        $this->patient_model->deletePatientMaterial($id);
        $this->session->set_flashdata('feedback', lang('deleted'));
        if ($redirect == 'documents') {
            redirect('patient/documents');
        } else {
            redirect("patient/MedicalHistory?id=" . $patient_material->patient);
        }
    }

    function delete()
    {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('patient', array('id' => $id))->row();
        $path = $user_data->img_url;

        if (!empty($path)) {
            unlink($path);
        }
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->patient_model->delete($id);
        $this->session->set_flashdata('feedback', lang('deleted'));
        redirect('patient');
    }

    function getPatient()
    {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        $order = $this->input->post("order");
        $columns_valid = array(
            "0" => "id",
            "1" => "name",
            "2" => "phone",
        );
        $values = $this->settings_model->getColumnOrder($order, $columns_valid);
        $dir = $values[0];
        $order = $values[1];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['patients'] = $this->patient_model->getPatientBysearch($search, $order, $dir);
            } else {
                $data['patients'] = $this->patient_model->getPatientWithoutSearch($order, $dir);
            }
        } else {
            if (!empty($search)) {
                $data['patients'] = $this->patient_model->getPatientByLimitBySearch($limit, $start, $search, $order, $dir);
            } else {
                $data['patients'] = $this->patient_model->getPatientByLimit($limit, $start, $order, $dir);
            }
        }
        foreach ($data['patients'] as $patient) {

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor'))) {
                $options1 = '<button class="btn btn-icon icon-left btn-light editbutton" data-toggle="modal" data-id="' . $patient->id . '" data-target="' . $patient->id . '"><i class="fas fa-edit"></i> ' . lang('edit') . '</button>';
            }

            $options3 = '<a href="patient/medicalHistory?id=' . $patient->id . '"><button class="btn btn-icon icon-left btn-primary"><i class="fa fa-stethoscope"></i> ' . lang('history') . '</button></a>';

            $options4 = '<a href="finance/patientPaymentHistory?patient=' . $patient->id . '"><button class="btn btn-icon icon-left btn-success invoicebutton"><i class="fa fa-money-bill-alt"></i> ' . lang('payment') . '</button></a>';

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor'))) {
                $options5 = '<a href="patient/delete?id=' . $patient->id . '"><button class="btn btn-icon icon-left btn-danger delete_button" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i> ' . lang('delete') . '</button></a>';
            }

            $options6 = '<button class="btn btn-icon icon-left btn-info detailsbutton inffo" title="' . lang('info') . '"data-toggle="modal" data-id="' . $patient->id . '" data-target="' . $patient->id . '"><i class="fas fa-info"></i> ' . lang('info') . '</button>';


            if ($this->ion_auth->in_group('Doctor')) {
                $options7 = '<a href="meeting/instantLive?id=' . $patient->id . '"><button class="btn btn-icon icon-left btn-success detailsbutton" onclick="return confirm(\'Are you sure you want to start a live meeting with this patient? SMS and Email will be sent to the Patient.\');"><i class="fa fa-headphones"></i> ' . lang('start_live') . '</button></a>';
            } else {
                $options7 = '';
            }


            if ($this->ion_auth->in_group(array('admin'))) {
                $info[] = array(
                    $patient->id,
                    $patient->name,
                    $patient->phone,
                    $this->settings_model->getSettings()->currency . $this->patient_model->getDueBalanceByPatientId($patient->id),
                    $options1 . ' ' . $options6 . ' ' . $options3 . ' ' . $options4 . ' ' . $options5,
                    //  $options2
                );
            }

            if ($this->ion_auth->in_group(array('Accountant', 'Receptionist'))) {
                $info[] = array(
                    $patient->id,
                    $patient->name,
                    $patient->phone,
                    $this->settings_model->getSettings()->currency . $this->patient_model->getDueBalanceByPatientId($patient->id),
                    $options1 . ' ' . $options6 . ' ' . $options4,
                    //  $options2
                );
            }

            if ($this->ion_auth->in_group(array('Laboratorist', 'Nurse', 'Doctor'))) {
                $info[] = array(
                    $patient->id,
                    $patient->name,
                    $patient->phone,
                    $options1 . ' ' . $options6 . ' ' . $options3,
                    //  $options2
                );
            }
        }

        if (!empty($data['patients'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('patient')->num_rows(),
                "recordsFiltered" => $this->db->get('patient')->num_rows(),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

    function getPatientPayments()
    {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        $order = $this->input->post("order");
        $columns_valid = array(
            "0" => "id",
            "1" => "name",
            "2" => "phone",
        );
        $values = $this->settings_model->getColumnOrder($order, $columns_valid);
        $dir = $values[0];
        $order = $values[1];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['patients'] = $this->patient_model->getPatientBysearch($search, $order, $dir);
            } else {
                $data['patients'] = $this->patient_model->getPatientWithoutSearch($order, $dir);
            }
        } else {
            if (!empty($search)) {
                $data['patients'] = $this->patient_model->getPatientByLimitBySearch($limit, $start, $search, $order, $dir);
            } else {
                $data['patients'] = $this->patient_model->getPatientByLimit($limit, $start, $order, $dir);
            }
        }
        //  $data['patients'] = $this->patient_model->getPatient();

        foreach ($data['patients'] as $patient) {
            $options4 = '<a href="finance/patientPaymentHistory?patient=' . $patient->id . '"><button class="btn btn-icon icon-left btn-success"><i class="fa fa-money-bill-alt"></i> ' . lang('history') . ' '  . lang('payment') . '</button></a>';

            $due = $this->settings_model->getSettings()->currency . $this->patient_model->getDueBalanceByPatientId($patient->id);

            $info[] = array(
                $patient->id,
                $patient->name,
                $patient->phone,
                $due,
                $options4
            );
        }

        if (!empty($data['patients'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('patient')->num_rows(),
                "recordsFiltered" => $this->db->get('patient')->num_rows(),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

    function getCaseList()
    {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];


        $order = $this->input->post("order");
        $columns_valid = array(
            "0" => "date",
            "1" => "patient",
            "2" => "title",
        );
        $values = $this->settings_model->getColumnOrder($order, $columns_valid);
        $dir = $values[0];
        $order = $values[1];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['cases'] = $this->patient_model->getMedicalHistoryBySearch($search, $order, $dir);
            } else {
                $data['cases'] = $this->patient_model->getMedicalHistoryWithoutSearch($order, $dir);
            }
        } else {
            if (!empty($search)) {
                $data['cases'] = $this->patient_model->getMedicalHistoryByLimitBySearch($limit, $start, $search, $order, $dir);
            } else {
                $data['cases'] = $this->patient_model->getMedicalHistoryByLimit($limit, $start, $order, $dir);
            }
        }
        //  $data['patients'] = $this->patient_model->getPatient();

        foreach ($data['cases'] as $case) {

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor'))) {
                $options1 = '<button class="btn btn-icon icon-left btn-light btn_width editbutton" data-toggle="modal" data-id="' . $case->id . '" data-target="myModal2"><i class="fas fa-edit"></i></button>';
            }
            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor'))) {
                $options2 = '<a href="patient/deleteCaseHistory?id=' . $case->id . '&redirect=case"><button class="btn btn-icon icon-left btn-danger btn_width delete_button" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fas fa-trash"></i></button></a>';
                $options3 = '<button class="btn btn-icon icon-left btn-success btn_width detailsbutton case" data-toggle="modal" data-id="' . $case->id . '" data-target="caseModal"><i class="fas fa-file"></i></button>';
            }
            if (!empty($case->patient_id)) {
                $patient_info = $this->patient_model->getPatientById($case->patient_id);
                if (!empty($patient_info)) {
                    $patient_details = $patient_info->name . '</br>' . $patient_info->address . '</br>' . $patient_info->phone . '</br>';
                } else {
                    $patient_details = $case->patient_name . '</br>' . $case->patient_address . '</br>' . $case->patient_phone . '</br>';
                }
            } else {
                $patient_details = '';
            }

            $info[] = array(
                date('d-m-Y', $case->date),
                $patient_details,
                $case->title,
                $options3 . ' ' . $options1 . ' ' . $options2
            );
        }

        if (!empty($data['cases'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('medical_history')->num_rows(),
                "recordsFiltered" => $this->db->get('medical_history')->num_rows(),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

    function getDocuments()
    {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        $order = $this->input->post("order");
        $columns_valid = array(
            "0" => "date",
            "1" => "patient",
        );
        $values = $this->settings_model->getColumnOrder($order, $columns_valid);
        $dir = $values[0];
        $order = $values[1];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['documents'] = $this->patient_model->getDocumentBySearch($search, $order, $dir);
            } else {
                $data['documents'] = $this->patient_model->getPatientMaterialWithoutSearch($order, $dir);
            }
        } else {
            if (!empty($search)) {
                $data['documents'] = $this->patient_model->getDocumentByLimitBySearch($limit, $start, $search, $order, $dir);
            } else {
                $data['documents'] = $this->patient_model->getDocumentByLimit($limit, $start, $order, $dir);
            }
        }
        //  $data['patients'] = $this->patient_model->getPatient();

        foreach ($data['documents'] as $document) {

            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor'))) {
                //   $options1 = '<a type="button" class="btn editbutton" title="Edit" data-toggle="modal" data-id="463"><i class="fa fa-edit"> </i> Edit</a>';
                $options1 = '<a class="btn btn-info btn-xs" href="' . $document->url . '" download> ' . lang('download') . ' </a>';
            }
            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist', 'Laboratorist', 'Nurse', 'Doctor'))) {
                $options2 = '<a class="btn btn-info btn-xs delete_button" href="patient/deletePatientMaterial?id=' . $document->id . '&redirect=documents"onclick="return confirm(\'You want to delete the item??\');"> X </a>';
            }

            if (!empty($document->patient)) {
                $patient_info = $this->patient_model->getPatientById($document->patient);
                if (!empty($patient_info)) {
                    $patient_details = $patient_info->name . '</br>' . $patient_info->address . '</br>' . $patient_info->phone . '</br>';
                } else {
                    $patient_details = $document->patient_name . '</br>' . $document->patient_address . '</br>' . $document->patient_phone . '</br>';
                }
            } else {
                $patient_details = '';
            }
            $extension_url = explode(".", $document->url);

            $length = count($extension_url);
            $extension = $extension_url[$length - 1];

            if (strtolower($extension) == 'pdf') {
                $files = '<a class="example-image-link" href="' . $document->url . '" data-title="' . $document->title . '" target="_blank">' . '<img class="example-image" src="uploads/image/pdf.png" width="100px" height="100px"alt="image-1">' . '</a>';
            } elseif (strtolower($extension) == 'docx') {
                $files = '<a class="example-image-link" href="' . $document->url . '" data-title="' . $document->title . '">' . '<img class="example-image" src="uploads/image/docx.png" width="100px" height="100px"alt="image-1">' . '</a>';
            } elseif (strtolower($extension) == 'doc') {
                $files = '<a class="example-image-link" href="' . $document->url . '" data-title="' . $document->title . '">' . '<img class="example-image" src="uploads/image/doc.png" width="100px" height="100px"alt="image-1">' . '</a>';
            } elseif (strtolower($extension) == 'odt') {
                $files = '<a class="example-image-link" href="' . $document->url . '" data-title="' . $document->title . '">' . '<img class="example-image" src="uploads/image/odt.png" width="100px" height="100px"alt="image-1">' . '</a>';
            } else {
                $files = '<a class="example-image-link" href="' . $document->url . '" data-lightbox="example-1" data-title="' . $document->title . '">' . '<img class="example-image" src="' . $document->url . '" width="100px" height="100px"alt="image-1">' . '</a>';
            }
            $info[] = array(
                date('d-m-y', $document->date),
                $patient_details,
                $document->title,
                $files,
                $options1 . ' ' . $options2
                // $options4
            );
        }

        if (!empty($data['documents'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => $this->db->get('patient_material')->num_rows(),
                "recordsFiltered" => $this->db->get('patient_material')->num_rows(),
                "data" => $info
            );
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

    function getMedicalHistoryByJason()
    {
        $data = array();

        $from_where = $this->input->get('from_where');
        $id = $this->input->get('id');

        if (!empty($from_where)) {
            $this->db->where('id', $id);
            $id = $this->db->get('appointment')->row()->patient;
        }


        if ($this->ion_auth->in_group(array('Patient'))) {
            $patient_ion_id = $this->ion_auth->get_user_id();
            $id = $this->patient_model->getPatientByIonUserId($patient_ion_id)->id;
        }

        $patient = $this->patient_model->getPatientById($id);
        $appointments = $this->appointment_model->getAppointmentByPatient($patient->id);
        $patients = $this->patient_model->getPatient();
        $doctors = $this->doctor_model->getDoctor();
        $prescriptions = $this->prescription_model->getPrescriptionByPatientId($id);
        $labs = $this->lab_model->getLabByPatientId($id);
        $medical_histories = $this->patient_model->getMedicalHistoryByPatientId($id);
        $patient_materials = $this->patient_model->getPatientMaterialByPatientId($id);

        foreach ($appointments as $appointment) {
            $doctor_details = $this->doctor_model->getDoctorById($appointment->doctor);
            if (!empty($doctor_details)) {
                $doctor_name = $doctor_details->name;
            } else {
                $doctor_name = '';
            }
            $timeline[$appointment->date + 1] = '<div class="activity">
                                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                                            <i class="fas fa-stethoscope"></i>
                                                        </div>
                                                        <div class="activity-detail">
                                                            <div class="mb-2">
                                                                <span class="text-job text-primary">' . date("d-m-Y", $appointment->date) . '</span>
                                                                <span class="bullet"></span>
                                                                <a class="text-job">' . lang("appointment") . '</a>
                                                            </div>
                                                            <p>' . $doctor_name . '</p>
                                                            <p class="text-primary">' . $appointment->s_time . ' - ' . $appointment->e_time . '</p>
                                                        </div>
                                                    </div>';
        }

        foreach ($prescriptions as $prescription) {
            $doctor_details = $this->doctor_model->getDoctorById($prescription->doctor);
            if (!empty($doctor_details)) {
                $doctor_name = $doctor_details->name;
            } else {
                $doctor_name = '';
            }
            $timeline[$prescription->date + 2] = '<div class="activity">
                                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                                            <i class="fas fa-medkit"></i>
                                                        </div>
                                                        <div class="activity-detail">
                                                            <div class="mb-2">
                                                                <span class="text-job text-primary">' . date("d-m-Y", $prescription->date) . '</span>
                                                                <span class="bullet"></span>
                                                                <a class="text-job">' . lang("prescription") . '</a>
                                                            </div>
                                                            <p>' . $doctor_name . '</p>
                                                            <a href="prescription/viewPrescription?id=' . $prescription->id . '"><button class="btn btn-primary btn_width detailsbutton"><i class="fa fa-eye"></i> View</button></a>
                                                        </div>
                                                    </div>';
        }

        foreach ($labs as $lab) {

            $doctor_details = $this->doctor_model->getDoctorById($lab->doctor);
            if (!empty($doctor_details)) {
                $lab_doctor = $doctor_details->name;
            } else {
                $lab_doctor = '';
            }

            $timeline[$lab->date + 3] = ' <div class="activity">
                                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                                            <i class="fas fa-flask"></i>
                                                        </div>
                                                        <div class="activity-detail">
                                                            <div class="mb-2">
                                                                <span class="text-job text-primary">' . date("d-m-Y", $lab->date) . '</span>
                                                                <span class="bullet"></span>
                                                                <a class="text-job">' . lang("lab") . '</a>
                                                            </div>
                                                            <p>' . $lab_doctor . '</p>
                                                            <a href="lab/invoice?id=' . $lab->id . '"><button class="btn btn-primary invoicebutton"><i class="fa fa-file"></i> ' . lang('report') . '</button></a>
                                                        </div>
                                                    </div>';
        }

        foreach ($medical_histories as $medical_history) {
            $timeline[$medical_history->date + 4] = '<div class="activity">
                                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                                            <i class="fas fa-notes-medical"></i>
                                                        </div>
                                                        <div class="activity-detail">
                                                            <div class="mb-2">
                                                                <span class="text-job text-primary">' . date("d-m-Y", $medical_history->date) . '</span>
                                                                <span class="bullet"></span>
                                                                <a class="text-job">' . lang("case_history") . '</a>
                                                            </div>
                                                            <p>' . $medical_history->description . '</p>
                                                        </div>
                                                    </div>';
        }

        foreach ($patient_materials as $patient_material) {
            $timeline[$patient_material->date + 5] = '<div class="activity">
                                                        <div class="activity-icon bg-primary text-white shadow-primary">
                                                            <i class="fas fa-file"></i>
                                                        </div>
                                                        <div class="activity-detail">
                                                            <div class="mb-2">
                                                                <span class="text-job text-primary">' . date("d-m-Y", $patient_material->date) . '</span>
                                                                <span class="bullet"></span>
                                                                <a class="text-job">' . lang("documents") . '</a>
                                                            </div>
                                                            <p>' . $patient_material->title . ' <a href="' . $patient_material->url . '" download=""><i class="fa fa-floppy-disk"></i></a></p>
                                                        </div>
                                                    </div>';
        }


        $all_appointments = '';
        foreach ($appointments as $appointment) {

            $doctor_details = $this->doctor_model->getDoctorById($appointment->doctor);
            if (!empty($doctor_details)) {
                $appointment_doctor = $doctor_details->name;
            } else {
                $appointment_doctor = "";
            }

            $patient_appointments = '<tr><td>' . date("d-m-Y", $appointment->date) . '</td>
                                                                <td>' . $appointment->time_slot . '</td>
                                                                <td>' . $appointment_doctor . '</td>
                                                                <td>' . $appointment->status . '</td>
                                                                    <td class="no-print">
                                                                        <a href="appointment/editAppointment?id=' . $appointment->id . '"><button type="button" class="btn btn-info btn-xs btn_width" title="' . lang("edit") . ' data-id="' . $appointment->id . '"><i class="fa fa-edit"></i></button></a>
                                                                    </td></tr>';
            $all_appointments .= $patient_appointments;
        }




        if (empty($all_appointments)) {
            $all_appointments = '';
        }



        $all_case = '';

        foreach ($medical_histories as $medical_history) {
            $patient_case = '<tr class="">
                                                                <td>' . date("d-m-Y", $medical_history->date) . '</td>
                                                                <td>' . $medical_history->title . '</td>
                                                                <td>' . $medical_history->description . '</td>
                                                            </tr>';

            $all_case .= $patient_case;
        }


        if (empty($all_case)) {
            $all_case = '';
        }

        $all_prescription = '';

        foreach ($prescriptions as $prescription) {
            $doctor_details = $this->doctor_model->getDoctorById($prescription->doctor);
            if (!empty($doctor_details)) {
                $prescription_doctor = $doctor_details->name;
            } else {
                $prescription_doctor = '';
            }
            $medicinelist = '';
            if (!empty($prescription->medicine)) {
                $medicine = explode('###', $prescription->medicine);

                foreach ($medicine as $key => $value) {
                    $medicine_id = explode('***', $value);
                    $medicine_details = $this->medicine_model->getMedicineById($medicine_id[0]);
                    if (!empty($medicine_details)) {
                        $medicine_name_with_dosage = $medicine_details->name . ' -' . $medicine_id[1];
                        $medicine_name_with_dosage = $medicine_name_with_dosage . ' | ' . $medicine_id[3] . '<br>';
                        rtrim($medicine_name_with_dosage, ',');
                        $medicinelist .= '<p>' . $medicine_name_with_dosage . '</p>';
                    }
                }
            } else {
                $medicinelist = '';
            }

            $option1 = '<a href="prescription/viewPrescription?id=' . $prescription->id . '"><button class="btn btn-icon icon-left btn-info btn_width"><i class="fas fa-eye"></i>' . lang('view') . '</button></a>';
            $prescription_case = ' <tr class="">
                                                    <td>' . date('m/d/Y', $prescription->date) . '</td>
                                                    <td>' . $prescription_doctor . '</td>
                                                    <td>' . $medicinelist . '</td>
                                                         <td>' . $option1 . '</td>
                                                </tr>';

            $all_prescription .= $prescription_case;
        }


        if (empty($all_prescription)) {
            $all_prescription = '';
        }


        $all_lab = '';

        foreach ($labs as $lab) {
            $doctor_details = $this->doctor_model->getDoctorById($lab->doctor);
            if (!empty($doctor_details)) {
                $lab_doctor = $doctor_details->name;
            } else {
                $lab_doctor = "";
            }
            $option1 = '<a href="lab/invoice?id=' . $lab->id . '"><button class="btn btn-icon icon-left btn-info btn_width"><i class="fas fa-eye"></i>' . lang('report') . '</button></a>';
            $lab_class = ' <tr class="">
                                                    <td>' . $lab->id . '</td>
                                                    <td>' . date("m/d/Y", $lab->date) . '</td>
                                                    <td>' . $lab_doctor . '</td>
                                                         <td>' . $option1 . '</td>
                                                </tr>';

            $all_lab .= $lab_class;
        }


        if (empty($all_lab)) {
            $all_lab = '';
        }



        $all_material = '';
        foreach ($patient_materials as $material) {
            $extension_url = explode(".", $material->url);
            $length = count($extension_url);
            $extension = $extension_url[$length - 1];
            if (strtolower($extension) == 'pdf') {
                $image = '<div class="article-image" data-background="uploads/image/pdf.png"></div>';
            } elseif (strtolower($extension) == 'docx') {
                $image = '<div class="article-image" data-background="uploads/image/docx.png"></div>';
            } elseif (strtolower($extension) == 'doc') {
                $image = '<div class="article-image" data-background="uploads/image/doc.png"></div>';
            } elseif (strtolower($extension) == 'odt') {
                $image = '<div class="article-image" data-background="uploads/image/odt.png"></div>';
            } else {
                $image = '<div class="article-image" data-background="' . $material->url . '"></div>';
            }
            $all_material .= '<div class="col-md-3">';
            $all_material .= '<article class="article">';
            $all_material .= '<div class="article-header">';
            $all_material .= '<a href="' . $material->url . '" target="_blank">';
            $all_material .= $image;
            $all_material .= '</a>';
            $all_material .= '</div>';
            $all_material .= '<div class="article-details">';
            if (!empty($material->title)) {
                $material->title;
            }
            $all_material .= '<p>' . $material->title . '</p>';
            $all_material .= '<div class="article-cta">';
            $all_material .= '<a href="' . $material->url . '" download class="btn btn-success"><i class="fas fa-file"></i></a>';
            $all_material .= '<a href="patient/deletePatientMaterial?id=' . $material->id . '" onclick="return confirm(`Are you sure you want to delete this item?`);" class="btn btn-danger ml-2"><i class="fas fa-trash"></i></a>';
            $all_material .= '</div>';
            $all_material .= '</div>';
            $all_material .= '</article>';
            $all_material .= '</div>';
        }

        if (empty($all_material)) {
            $all_material = ' ';
        }

        $data['view'] = '';
        $data['view'] .= '<div class="row">';
        $data['view'] .= '<div class="col-md-3">';
        $data['view'] .= '<div class="card">';
        $data['view'] .= '<div class="card-body">';
        $data['view'] .= '<div class="user-item">';
        $data['view'] .= '<img alt="image" src="' . ((!empty($patient->img_url)) ? $patient->img_url : base_url() . '/template/assets/img/avatar/avatar-1.png') . '" width="70%">';
        $data['view'] .= '<div class="user-details">';
        $data['view'] .= '<div class="user-name">' . $patient->name . '</div>';
        $data['view'] .= '<div class="text-job text-muted">' . $patient->email . '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '<div class="form-group mt-4">';
        $data['view'] .= '<label for="">' . lang('patient_id') . '</label>';
        $data['view'] .= '<input type="text" class="form-control" value="' . $patient->id . '" readonly>';
        $data['view'] .= '</div>';
        $data['view'] .= '<div class="form-group">';
        $data['view'] .= '<label for="">' . lang('gender') . '</label>';
        $data['view'] .= '<input type="text" class="form-control" value="' . $patient->sex . '" readonly>';
        $data['view'] .= '</div>';
        $data['view'] .= '<div class="form-group">';
        $data['view'] .= '<label for="">' . lang('gender') . '</label>';
        $data['view'] .= '<input type="text" class="form-control" value="' . $patient->sex . '" readonly>';
        $data['view'] .= '</div>';
        $data['view'] .= '<div class="form-group">';
        $data['view'] .= '<label for="">' . lang('birth_date') . '</label>';
        $data['view'] .= '<input type="text" class="form-control" value="' . $patient->birthdate . '" readonly>';
        $data['view'] .= '</div>';
        $data['view'] .= '<div class="form-group">';
        $data['view'] .= '<label for="">' . lang('phone') . '</label>';
        $data['view'] .= '<input type="text" class="form-control" value="' . $patient->phone . '" readonly>';
        $data['view'] .= '</div>';
        $data['view'] .= '<div class="form-group">';
        $data['view'] .= '<label for="">' . lang('email') . '</label>';
        $data['view'] .= '<input type="text" class="form-control" value="' . $patient->email . '" readonly>';
        $data['view'] .= '</div>';
        $data['view'] .= '<div class="form-group">';
        $data['view'] .= '<label for="">' . lang('address') . '</label>';
        $data['view'] .= '<input type="text" class="form-control" value="' . $patient->address . '" readonly>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '<div class="col-md-9">';
        $data['view'] .= '<div class="card">';
        $data['view'] .= '<div class="card-body">';
        $data['view'] .= '<ul class="nav nav-tabs" id="myTab" role="tablist">';
        $data['view'] .= '<li class="nav-item">';
        $data['view'] .= '<a class="nav-link active" id="appointments-tab" data-toggle="tab" href="#appointments" role="tab" aria-controls="appointments" aria-selected="true">' . lang('appointments') . '</a>';
        $data['view'] .= '</li>';
        $data['view'] .= '<li class="nav-item">';
        $data['view'] .= '<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">' . lang('case_history') . '</a>';
        $data['view'] .= '</li>';
        $data['view'] .= '<li class="nav-item">';
        $data['view'] .= '<a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">' . lang('prescription') . '</a>';
        $data['view'] .= '</li>';
        $data['view'] .= '<li class="nav-item">';
        $data['view'] .= '<a class="nav-link" id="lab-tab" data-toggle="tab" href="#lab" role="tab" aria-controls="lab" aria-selected="false">' . lang('lab') . '</a>';
        $data['view'] .= '</li>';
        $data['view'] .= '<li class="nav-item">';
        $data['view'] .= '<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">' . lang('documents') . '</a>';
        $data['view'] .= '</li>';
        $data['view'] .= '<li class="nav-item">';
        $data['view'] .= '<a class="nav-link" id="timeline-tab" data-toggle="tab" href="#timeline" role="tab" aria-controls="timeline" aria-selected="false">' . lang('timeline') . '</a>';
        $data['view'] .= '</li>';
        $data['view'] .= '</ul>';
        $data['view'] .= '<div class="tab-content" id="myTabContent">';
        $data['view'] .= '<div class="tab-pane fade show active" id="appointments" role="tabpanel" aria-labelledby="appointments-tab">';
        $data['view'] .= '<div class="card">';
        $data['view'] .= '<div class="card-body">';
        $data['view'] .= '<div class="table-responsive">';
        $data['view'] .= '<div class="space15"></div>';
        $data['view'] .= '<table class="table table-striped table-bordered" id="editable-sample">';
        $data['view'] .= '<thead>';
        $data['view'] .= '<tr>';
        $data['view'] .= '<th>' . lang('date') . '</th>';
        $data['view'] .= '<th>' . lang('time_slot') . '</th>';
        $data['view'] .= '<th>' . lang('doctor') . '</th>';
        $data['view'] .= '<th>' . lang('status') . '</th>';
        $data['view'] .= '<th class="no-print">' . lang('options') . '</th>';
        $data['view'] .= '</tr>';
        $data['view'] .= '</thead>';
        $data['view'] .= '<tbody>';
        $data['view'] .= $all_appointments;
        $data['view'] .= '</tbody>';
        $data['view'] .= '</table>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">';
        $data['view'] .= '<div class="card">';
        $data['view'] .= '<div class="card-body">';
        $data['view'] .= '<div class="table-responsive">';
        $data['view'] .= '<div class="space15"></div>';
        $data['view'] .= '<table class="table table-striped table-bordered" id="editable-sample">';
        $data['view'] .= '<thead>';
        $data['view'] .= '<tr>';
        $data['view'] .= '<th>' . lang('date') . '</th>';
        $data['view'] .= '<th>' . lang('title') . '</th>';
        $data['view'] .= '<th>' . lang('description') . '</th>';
        $data['view'] .= '</tr>';
        $data['view'] .= '</thead>';
        $data['view'] .= '<tbody>';
        $data['view'] .= $all_case;
        $data['view'] .= '</tbody>';
        $data['view'] .= '</table>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '<div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">';
        $data['view'] .= '<div class="card">';
        $data['view'] .= '<div class="card-body">';
        $data['view'] .= '<div class="table-responsive">';
        $data['view'] .= '<div class="space15"></div>';
        $data['view'] .= '<table class="table table-striped table-bordered" id="editable-sample">';
        $data['view'] .= '<thead>';
        $data['view'] .= '<tr>';
        $data['view'] .= '<th>' . lang('date') . '</th>';
        $data['view'] .= '<th>' . lang('doctor') . '</th>';
        $data['view'] .= '<th>' . lang('medicine') . '</th>';
        $data['view'] .= '<th class="no-print" width="20%">' . lang('options') . '</th>';
        $data['view'] .= '</tr>';
        $data['view'] .= '</thead>';
        $data['view'] .= '<tbody>';
        $data['view'] .= $all_prescription;
        $data['view'] .= '</tbody>';
        $data['view'] .= '</table>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '<div class="tab-pane fade" id="lab" role="tabpanel" aria-labelledby="lab-tab">';
        $data['view'] .= '<div class="card">';
        $data['view'] .= '<div class="card-body">';
        $data['view'] .= '<div class="table-responsive">';
        $data['view'] .= '<div class="space15"></div>';
        $data['view'] .= '<table class="table table-striped table-bordered" id="editable-sample">';
        $data['view'] .= '<thead>';
        $data['view'] .= '<tr>';
        $data['view'] .= '<th>' . lang('id') . '</th>';
        $data['view'] .= '<th>' . lang('date') . '</th>';
        $data['view'] .= '<th>' . lang('doctor') . '</th>';
        $data['view'] .= '<th class="no-print">' . lang('options') . '</th>';
        $data['view'] .= '</tr>';
        $data['view'] .= '</thead>';
        $data['view'] .= '<tbody>';
        $data['view'] .= $all_lab;
        $data['view'] .= '</tbody>';
        $data['view'] .= '</table>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">';
        $data['view'] .= '<div class="card">';
        $data['view'] .= '<div class="card-body">';
        $data['view'] .= '<div class="">';
        $data['view'] .= $all_material;
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '<div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">';
        $data['view'] .= '<div class="card">';
        $data['view'] .= '<div class="card-body">';
        $data['view'] .= '<div class="activities">';
        if (!empty($timeline)) {
            krsort($timeline);
            foreach ($timeline as $key => $value) {
                $data['view'] .= $value;
            }
        }
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';
        $data['view'] .= '</div>';


        echo json_encode($data);
    }

    public function getPatientinfo()
    {
        // Search term
        $searchTerm = $this->input->post('searchTerm');

        // Get users
        $response = $this->patient_model->getPatientInfo($searchTerm);

        echo json_encode($response);
    }

    public function getPatientinfoWithAddNewOption()
    {
        // Search term
        $searchTerm = $this->input->post('searchTerm');

        // Get users
        $response = $this->patient_model->getPatientinfoWithAddNewOption($searchTerm);

        echo json_encode($response);
    }
}

/* End of file patient.php */
    /* Location: ./application/modules/patient/controllers/patient.php */
