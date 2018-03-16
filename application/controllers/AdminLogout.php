<?php

class AdminLogout extends CI_Controller {

    function __construct() {
        parent::__construct();
        //---> MODELS HERE!
        //---> LIBRARIES HERE!
        //---> SESSIONS HERE!
    }

    public function index() {
        $this->session->sess_destroy();
        redirect(base_url() . 'main/');
    }

}
