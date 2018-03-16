<?php

class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function check_recaptcha($response) {
        if (!empty($response)) {
            //this function gets the response from the google's api
            $response = $this->recaptcha->verifyResponse($response);
            if ($response['success'] === TRUE) {
                return true;
            } else {
                return false;
            }
        }
    }

    function _accept_terms() {
        //if (isset($_POST['accept_terms_checkbox']))
        if ($this->input->post('accept') == 1) {
            return TRUE;
        } else {
            $error = 'Please read and accept our terms and conditions.';
            $this->form_validation->set_message('_accept_terms', $error);
            return FALSE;
        }
    }

    public function generate() {
        $this->load->helper('string');
        return random_string('alnum', rand(5, 15));
    }

    function _alpha_dash_space($str = '') {
        if (!preg_match("/^([-a-z_ ])+$/i", $str)) {
            $this->form_validation->set_message('_alpha_dash_space', 'The {field} may only contain alphabet characters, spaces, underscores, and dashes.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function index() {
        $data = array(
            'title' => 'E-Cor | Register',
            'wholeUrl' => base_url(uri_string()),
            'script' => $this->recaptcha->getScriptTag(),
            'widget' => $this->recaptcha->getWidget(),
        );
        $this->load->view("register/includes/header", $data);
        $this->load->view("register/main");
        $this->load->view("register/includes/footer");
    }

    public function terms() {
        $data = array(
            'title' => 'E-Cor | Terms & Conditions',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("register/includes/header", $data);
        $this->load->view("register/terms");
        $this->load->view("register/includes/footer");
    }

    public function register_submit() {
        $this->form_validation->set_rules("username", "Username", "required|min_length[5]|is_unique[client.client_username]");
        $this->form_validation->set_rules("password", "Password", "required|matches[conpassword]|min_length[8]");
        $this->form_validation->set_rules("conpassword", "Confirm Password", "required|matches[password]|min_length[8]");
        $this->form_validation->set_rules("email", "Email", "required|valid_email");
        $this->form_validation->set_rules("phone", "Phone Number ", "required|numeric|regex_match[^(09|\+639)\d{9}$^]");
        $this->form_validation->set_rules("lastname", "Lastname", "required|min_length[2]|callback__alpha_dash_space");
        $this->form_validation->set_rules("firstname", "Firstname", "required|min_length[2]|callback__alpha_dash_space");
        $this->form_validation->set_rules("bday", "Birthday", "required");
        $this->form_validation->set_rules("address", "Address", "required");
        $this->form_validation->set_rules('g-recaptcha-response', "CAPTCHA", "required|callback_check_recaptcha");
        $this->form_validation->set_rules('accept', 'Accept', 'callback__accept_terms');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'E-Cor | Register',
                'script' => $this->recaptcha->getScriptTag(),
                'widget' => $this->recaptcha->getWidget(),
            );
            $this->load->view("register/includes/header", $data);
            $this->load->view("register/main");
            $this->load->view("register/includes/footer");
        } else {
            //Do Some Registering
            if ($this->input->post('gender') == "Male") {
                $imagePath = "images/user/male.png";
            } else {
                $imagePath = "images/user/female.png";
            }

            $data = array(
                'client_username' => $this->input->post('username'),
                'client_password' => sha1($this->input->post('password')),
                'client_contact_no' => $this->input->post('phone'),
                'client_email' => $this->input->post('email'),
                'client_lastname' => $this->input->post('lastname'),
                'client_firstname' => $this->input->post('firstname'),
                'client_bday' => strtotime($this->input->post('bday')),
                'client_status' => 1,
                'client_sex' => $this->input->post('gender'),
                'client_picture' => $imagePath,
                'client_address' => $this->input->post('address'),
                'client_verification_code' => $this->generate(),
                'client_added_at' => time(),
                'client_updated_at' => time()
            );

            if ($this->Register_model->insert("client", $data)) {
                $data += ["title" => "Verify your Email"];
                $data += ["status" => "success"];
                $this->sendemail($data);

                $this->load->view("register/includes/header", $data);
                $this->load->view("register/verify_page");
                $this->load->view("register/includes/footerVerify");
            } else {
                $data = array(
                    "title" => "Verify your Email",
                    "status" => "failed"
                );
                $this->load->view("register/includes/header", $data);
                $this->load->view("register/verify_page");
                $this->load->view("register/includes/footerVerify");
            }
        }
    }

    public function sendemail($user) {
        $this->email->from("fit.creative.solutions@gmail.com", 'Creative Solutions Team');
        $this->email->to($user['client_email']);
        $this->email->subject('Email Verification');
        $data = array('name' => $user['client_firstname'], 'code' => $user['client_verification_code']);
        $this->email->message($this->load->view('register/verifyMessage', $data, true));

        if (!$this->email->send()) {
            echo $this->email->print_debugger();
        } else {
            //VERIFY YOUR EMAIL
            //echo $this->email->print_debugger();
        }
    }

    public function verifyCode() {
        $code = $this->uri->segment(3);
        $this->Register_model->update('client', array('client_isVerified' => '1'), array('client_verification_code' => $code));
        $data = array(
            "title" => "Welcome to new user!"
        );
        $this->load->view("register/includes/header", $data);
        $this->load->view("register/is_verified");
        $this->load->view("register/includes/footerVerify");
    }

    public function registerEventPlanner() {
        $data = array(
            'title' => 'E-Cor | Register',
            'wholeUrl' => base_url(uri_string()),
            'script' => $this->recaptcha->getScriptTag(),
            'widget' => $this->recaptcha->getWidget(),
        );
        $this->load->view("register/includes/header", $data);
        $this->load->view("register/mainEventPlanner");
        $this->load->view("register/includes/footer");
    }

    public function registerEventPlanner_submit() {
        $this->form_validation->set_rules("username", "Username", "required|min_length[5]|is_unique[client.client_username]|is_unique[event_planner.event_planner_username]");
        $this->form_validation->set_rules("password", "Password", "required|matches[conpassword]|alpha_numeric|min_length[8]");
        $this->form_validation->set_rules("conpassword", "Confirm Password", "required|matches[password]|alpha_numeric|min_length[8]");
        $this->form_validation->set_rules("email", "Email", "required|valid_email");
        $this->form_validation->set_rules("phone", "Phone Number ", "required|numeric|regex_match[^(09|\+639)\d{9}$^]");
        $this->form_validation->set_rules("lastname", "Lastname", "required|min_length[2]|callback__alpha_dash_space");
        $this->form_validation->set_rules("firstname", "Firstname", "required|min_length[2]|callback__alpha_dash_space");
        $this->form_validation->set_rules("bday", "Birthday", "required");
        $this->form_validation->set_rules("address", "Address", "required");
        $this->form_validation->set_rules("intro", "Introduction", "required");
        $this->form_validation->set_rules("tin", "Tin Number", "required|regex_match[^(?:\d{3}-\d{3}-\d{3}-\d{3})$^]");
        $this->form_validation->set_rules('g-recaptcha-response', "CAPTCHA", "required|callback_check_recaptcha");
        $this->form_validation->set_rules('accept', 'Accept', 'callback__accept_terms');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'E-Cor | Register',
                'script' => $this->recaptcha->getScriptTag(),
                'widget' => $this->recaptcha->getWidget(),
            );
            $this->load->view("register/includes/header", $data);
            $this->load->view("register/mainEventPlanner");
            $this->load->view("register/includes/footer");
        } else {
            //Do Some Registering
            if ($this->input->post('gender') == "Male") {
                $imagePath = "images/user/male.png";
            } else {
                $imagePath = "images/user/female.png";
            }

            $data = array(
                'event_planner_username' => $this->input->post('username'),
                'event_planner_password' => sha1($this->input->post('password')),
                'event_planner_contact_no' => $this->input->post('phone'),
                'event_planner_email' => $this->input->post('email'),
                'event_planner_lastname' => $this->input->post('lastname'),
                'event_planner_firstname' => $this->input->post('firstname'),
                'event_planner_bday' => strtotime($this->input->post('bday')),
                'event_planner_status' => 1,
                'event_planner_isPaid' => 0,
                'event_planner_sex' => $this->input->post('gender'),
                'event_planner_picture' => $imagePath,
                'event_planner_address' => $this->input->post('address'),
                'event_planner_intro' => $this->input->post('intro'),
                'event_planner_tin' => $this->input->post('tin'),
                'event_planner_verification_code' => $this->generate(),
                'event_planner_added_at' => time(),
                'event_planner_updated_at' => time()
            );

            if ($this->Register_model->insert("event_planner", $data)) {
                $data += ["title" => "Verify your Email"];
                $data += ["status" => "success"];
                $this->sendemailEventPlanner($data);

                $this->load->view("register/includes/header", $data);
                $this->load->view("register/verify_page");
                $this->load->view("register/includes/footerVerify");
            } else {
                $data = array(
                    "title" => "Verify your Email",
                    "status" => "failed"
                );
                $this->load->view("register/includes/header", $data);
                $this->load->view("register/verify_page");
                $this->load->view("register/includes/footerVerify");
            }
        }
    }

    public function sendemailEventPlanner($user) {
        $this->email->from("fit.creative.solutions@gmail.com", 'Creative Solutions Team');
        $this->email->to($user['event_planner_email']);
        $this->email->subject('Email Verification');
        $data = array('name' => $user['event_planner_firstname'], 'code' => $user['event_planner_verification_code']);
        $this->email->message($this->load->view('register/verifyMessageEventPlanner', $data, true));

        if (!$this->email->send()) {
            echo $this->email->print_debugger();
        } else {
            //VERIFY YOUR EMAIL
            //echo $this->email->print_debugger();
        }
    }

    public function verifyCodeEventPlanner() {
        $code = $this->uri->segment(3);
        $this->Register_model->update('event_planner', array('event_planner_isVerified' => '1'), array('event_planner_verification_code' => $code));
        $data = array(
            "title" => "Welcome to new user!"
        );
        $this->load->view("register/includes/header", $data);
        $this->load->view("register/Eventplanner_isverified");
        $this->load->view("register/includes/footerVerify");
    }

    public function success() {
        $this->session->set_flashdata("err_6", "You are successfully registered.");
        redirect(base_url() . "login");
    }

    public function successEp() {
        $this->session->set_flashdata("err_6", "Your account successfully verified.");
        redirect(base_url() . "login");
    }

}
