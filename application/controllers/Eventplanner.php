<?php

class Eventplanner extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
        
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
        $this->load->view("event_planner/dashboard/main");
        $this->load->view("event_planner/includes/footer");
    }
    
    public function packages_exec(){
        $ep_id = $this->uri->segment(3);
        $this->session->set_userdata("ep_id", $ep_id);
        redirect(base_url()."eventplanner/packages");
    }
    
    public function packages(){
        $ep_id = $this->session->userdata("ep_id");
        
        $packages = $this->Packages_model->get_packages_id(array("item.event_planner_id" => $ep_id));
        
        $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => 1))[0];
        $data = array(
            
            //-- DUMMY DATA --
            "packages_id" => $packages,
            //-- NAV INFO --
            "current_ep" => $current_ep,
            "ep_username" => "ralph_adrian",
            "ep_picture" => "images/user/ralph.jpg"
        );
        $this->load->view("event_planner/includes/header", $data);
        $this->load->view("event_planner/navigation/nav_header");
        $this->load->view("event_planner/navigation/nav_side");
        $this->load->view("event_planner/packages/main");
        $this->load->view("event_planner/includes/footer");
    }
    
    public function package_edit_exec(){
        $this->session->set_userdata("package_id", $this->uri->segment(3));
        redirect(base_url()."eventplanner/package_edit");
    }
    
    public function package_edit(){
        $package_id = $this->session->userdata("package_id");
        
        $package = $this->Packages_model->get_package_info(array("packages_id" => $package_id))[0];
        $items = $this->Packages_model->get_item_in_packages(array("item.packages_id" => $package_id));
        
        $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => 1))[0];
        $data = array(
            
            "package" => $package,
            "items" => $items,
            //-- DUMMY DATA --
            
            //-- NAV INFO --
            "current_ep" => $current_ep,
            "ep_username" => "ralph_adrian",
            "ep_picture" => "images/user/ralph.jpg"
        );
        
        $this->load->view("event_planner/includes/header", $data);
        $this->load->view("event_planner/navigation/nav_header");
        $this->load->view("event_planner/navigation/nav_side");
        $this->load->view("event_planner/packages/package_edit");
        $this->load->view("event_planner/includes/footer");
    }
    
    public function transactions_exec(){
        $ep_id = $this->uri->segment(3);
        $this->session->set_userdata("ep_id", $ep_id);
        redirect(base_url()."transactions");
    }
    
    public function item_delete(){
        $item_id = $this->uri->segment(3);
        if($this->Item_model->delete_item(array("item_id" => $item_id))){
            //SUCCESS
            $this->session->set_flashdata("show_flash_success", "Successfully deleted.");
        }else{
            $this->session->set_flashdata("show_flash_failed", "Something went wrong while deleting item.");
        }
        redirect(base_url()."eventplanner/package_edit");
    }
    
    public function add_item(){
        $this->form_validation->set_rules("item_name", "Item Name", "required|min_length[3]");
        if ($this->form_validation->run() == FALSE){
            //ERROR
        }else{
            //SUCCESS
        }
    }
    
}