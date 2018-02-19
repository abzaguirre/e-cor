<?php

class Transactions extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    public function index(){
        $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => 1))[0];
        $data = array(
            
            //-- DUMMY DATA --
            
            //-- NAV INFO --
            "current_ep" => $current_ep,
            "ep_username" => "$current_ep->event_planner_username",
            "ep_picture" => "$current_ep->event_planner_picture"
        );
        
        $this->load->view("event_planner/includes/header", $data);
        $this->load->view("event_planner/navigation/nav_header");
        $this->load->view("event_planner/navigation/nav_side");
        $this->load->view("event_planner/transactions/main");
        $this->load->view("event_planner/includes/footer");
    }
}