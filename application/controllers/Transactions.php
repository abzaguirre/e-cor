<?php

class Transactions extends CI_Controller {
    function __construct() {
        parent::__construct();
        if ($this->session->has_userdata('isloggedin') == FALSE) {
            //user is not yet logged in
            $this->session->set_flashdata("err_4", "Login First!");
            redirect(base_url() . 'login/');
        } else {
            $current_user = $this->session->userdata("current_user");
            if ($this->session->userdata("user_access") == "Client") {
                //USER!
                $this->session->set_flashdata("err_5", "You are currently logged in as " . $current_user->client_firstname . " " . $current_user->client_lastname);
                redirect(base_url() . "Client");
            } else if ($this->session->userdata("user_access") == "admin") {
                //ADMIN!
                //Do nothing!
            }
        }
    }
    public function index(){
        $transactionsActive = $this->Transaction_model->get_transactions_active($this->session->userdata("userid"));
        $transactionsInactive = $this->Transaction_model->get_transactions_inactive($this->session->userdata("userid"));
        
        $ep_id = $this->session->userdata("userid");
        $packages = $this->Packages_model->get_package_info(array("event_planner_id" => $ep_id));
        
        $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => $this->session->userdata("userid")))[0];
        $data = array(
            
            "transactionsActive" => $transactionsActive,
            "transactionsInactive" => $transactionsInactive,
            "packages" => $packages,
            
            //-- NAV INFO --
            "title" => "E-Cor | $current_ep->event_planner_username",
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