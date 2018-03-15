<?php

class Pending_request extends CI_Controller {
    function __construct() {
        parent::__construct();
        if ($this->session->has_userdata('isloggedin') == FALSE) {
            //user is not yet logged in
            $this->session->set_flashdata("err_4", "Login First!");
            redirect(base_url() . 'login/');
        } else {
            $current_user = $this->session->userdata("current_user");
            if ($this->session->userdata("user_access") == "Client") {
                //CLIENT
                $this->session->set_flashdata("err_5", "You are currently logged in as " . $current_user->client_firstname . " " . $current_user->client_lastname);
                redirect(base_url() . "Client");
            }else if($this->session->userdata("user_access") == "Admin"){
                //ADMIN
                $this->session->set_flashdata("err_5", "You are currently logged in as " . $current_user->admin_firstname . " " . $current_user->admin_lastname);
                redirect(base_url() . "Admin");
            }else if ($this->session->userdata("user_access") == "Event Planner") {
                //EVENT PLANNER
            }
        }
    }
    public function index(){
        $pending_request = $this->Transaction_model->get_pending_transactions($this->session->userdata("userid"));

        $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => $this->session->userdata("userid")))[0];
        $data = array(
            "pending_request" => $pending_request,
            //-- NAV INFO --
            "title" => $current_ep->event_planner_username,
            "current_ep" => $current_ep,
            "ep_username" => "$current_ep->event_planner_username",
            "ep_picture" => "$current_ep->event_planner_picture"
        );
        $this->load->view("event_planner/includes/header", $data);
        $this->load->view("event_planner/navigation/nav_header");
        $this->load->view("event_planner/navigation/nav_side");
        $this->load->view("event_planner/pending_request/main");
        $this->load->view("event_planner/includes/footer");
    }
    
    public function reject_pending_transaction(){
        $transaction_id = $this->uri->segment(3);
        
        $this->Pending_Request_model->reject_pending_request($transaction_id);
        $this->session->set_flashdata("show_flash_success", "Successfully rejected the request.");
        redirect(base_url()."pending_request");
    }
    
    public function show_pending_transaction_exec(){
        $transaction_id = $this->uri->segment(3);
        $this->session->set_userdata("transaction_id",$transaction_id);
        redirect(base_url()."pending_request/show_pending_transaction");
        
    }
    
    public function show_pending_transaction(){
        $transaction_id = $this->session->userdata("transaction_id");
        $transaction = $this->Pending_Request_model->get_pending_request($transaction_id);
        
        $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => $this->session->userdata("userid")))[0];
        $data = array(
            "pending_request" => $transaction,
            //-- NAV INFO --
            "title" => $current_ep->event_planner_username,
            "current_ep" => $current_ep,
            "ep_username" => "$current_ep->event_planner_username",
            "ep_picture" => "$current_ep->event_planner_picture"
            );
        $this->load->view("event_planner/includes/header", $data);
        $this->load->view("event_planner/navigation/nav_header");
        $this->load->view("event_planner/navigation/nav_side");
        $this->load->view("event_planner/pending_request/show_transaction_detail");
        $this->load->view("event_planner/includes/footer");
    }
    
    public function accept_pending_transaction(){
        $transaction_id = $this->uri->segment(3);
        
        $this->Pending_Request_model->accept_pending_request($transaction_id);
        $this->session->set_flashdata("show_flash_success", "Successfully accepted the request.");
        redirect(base_url()."transactions");
    }
}
