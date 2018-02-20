<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array(
            'title' => 'E-Cor | Event Coordinator',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("login/includes/header", $data);
        $this->load->view("login/main");
        $this->load->view("login/includes/footer");
    }

}
