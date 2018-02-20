<?php

class Eventplanner extends CI_Controller {
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
    
    //-------- CALLBACK ------------
    public function decimal_check($val){
        if (!is_int($val) || !is_float($val) ) {
            $this->form_validation->set_message('weight_check', 'The {field} field must be number or decimal.');
            return FALSE;
        } else {
            return TRUE;
        }
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
        
        $packages = $this->Packages_model->get_packages_id(array("event_planner_id" => $ep_id));
        
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
    
    public function package_edit_name(){
        $this->form_validation->set_rules("packages_name", "Package Name", "required");
        if($this->form_validation->run() == FALSE){
            
        }else{
            $package_id = $this->uri->segment(3);

            $data = array(
                "packages_name" => $this->input->post("packages_name"),
                "packages_updated_at" => time()
            );
            
            $this->Packages_model->package_edit($data, array("packages_id" => $package_id));
            $this->session->set_flashdata("show_flash_success", "Successfully updated the package.");
        }
        redirect(base_url()."eventplanner/packages");
    }
    
    public function package_delete(){
        $package_id = $this->uri->segment(3);
        $this->Packages_model->package_delete(array("packages_id" => $package_id));
        $this->Packages_model->package_remove(array("packages_id" => $package_id));
        $this->session->set_flashdata("show_flash_success", "Successfully removed the package.");
        redirect(base_url()."eventplanner/packages");
    }
    
    public function package_add(){
        $this->form_validation->set_rules("package_name", "Package Name", "required");
        if ($this->form_validation->run() == FALSE){
            //ERROR
            //print_r(validation_errors());
            //die;
            $this->session->set_flashdata("show_flash_failed", "Invalid value/s detected.");
        }else{
            $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => 1))[0];
            $data = array(
                "event_planner_id" => $current_ep->event_planner_id,
                "packages_name" => $this->input->post("package_name"),
                "packages_updated_at" => time(),
                "packages_added_at" => time(),
                
            );
            if($this->Packages_model->package_add($data)){
                $this->session->set_flashdata("show_flash_success", "Successfully added package.");
            }else{
                $this->session->set_flashdata("show_flash_success", "Something went wrong while adding package.");
            }
        }
        redirect(base_url()."eventplanner/packages");
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
    
    public function item_add(){
        $this->form_validation->set_rules("item_name", "Item Name", "required");
        $this->form_validation->set_rules("item_price", "Item Price", "required|numerical");
        $this->form_validation->set_rules("item_desc", "Item Description", "required");
        if ($this->form_validation->run() == FALSE){
            //ERROR
            //print_r(validation_errors());
            //die;
            $this->session->set_flashdata("show_flash_failed", "Invalid values detected.");
        }else{
            $package_id = $this->uri->segment(3);
            $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => 1))[0];
            $data = array(
                "event_planner_id"  => $current_ep->event_planner_id,
                "packages_id"       => $package_id,
                "item_name"         => $this->input->post("item_name"),
                "item_price"        => $this->input->post("item_price"),
                "item_desc"         => $this->input->post("item_desc"),
                "item_updated_at"   => time(),
                "item_added_at"     => time()
                
            );
            if($this->Item_model->add_item($data)){
                $this->session->set_flashdata("show_flash_success", "Successfully added an item.");
            }else{
                $this->session->set_flashdata("show_flash_failed", "Something went wrong while adding an item.");
            }
        }
        redirect(base_url()."eventplanner/package_edit");
    }

    public function item_edit(){
        $this->form_validation->set_rules("item_name", "Item Name", "required");
        $this->form_validation->set_rules("item_price", "Item Price", "required");
        $this->form_validation->set_rules("item_desc", "Item Description", "required");
        if($this->form_validation->run() == FALSE){
            //ERROR
//            echo "<pre>";
//            print_r(validation_errors());
//            echo "</pre>";
//            die;
            $this->session->set_flashdata("show_flash_failed", "Invalid values detected.");
        }else{
            //SUCCESS
            $item_id = $this->uri->segment(3);
            $data = array(
                "item_name" => $this->input->post("item_name"),
                "item_price" => $this->input->post("item_price"),
                "item_desc" => $this->input->post("item_desc"),
                "item_updated_at" => time()
            );
            $this->Item_model->edit_item($data, array("item_id" => $item_id));
            $this->session->set_flashdata("show_flash_success", "Successfully updated an item");
        }
    }
    
}