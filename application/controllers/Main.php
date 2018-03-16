<?php

class Main extends CI_Controller {

    function __construct() {
        parent::__construct();
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
            //
            'title' => 'E-Cor | Event Coordinator',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("main/includes/header", $data);
        $this->load->view("main/main");
        $this->load->view("main/includes/footer");
    }

    public function contact() {
        $this->form_validation->set_rules("name", "Firstname", "required|min_length[2]|callback__alpha_dash_space");
        $this->form_validation->set_rules("email", "Email", "required|valid_email");
        $this->form_validation->set_rules("subject", "Subject", "required");
        $this->form_validation->set_rules("message", "Message", "required");
        if ($this->form_validation->run() == FALSE) {
            $this->index();
            ;
        } else {
            $data = array(
                'name' => $this->input->post("name"),
                'email' => $this->input->post("email"),
                'subject' => $this->input->post("subject"),
                'message' => $this->input->post("message"),
            );
            $this->sendMessage($data);
        }
    }

    public function sendMessage($user) {
        $this->email->from("fit.creative.solutions@gmail.com", 'Creative Solutions');
        $this->email->to("fit.creative.solutions@gmail.com");
        $this->email->subject($user['subject']);
        $data = array('name' => $user['name'], 'email' => $user['email'], 'message' => $user['message'],);
        $this->email->message($this->load->view('main/sendMessage', $data, true));

        if (!$this->email->send()) {
            echo $this->email->print_debugger();
        } else {

            redirect(base_url() . "main");
        }
    }

}
