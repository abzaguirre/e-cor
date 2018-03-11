<?php

class Main extends CI_Controller {

    function __construct() {
        parent::__construct();
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

}
