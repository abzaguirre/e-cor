<?php

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->has_userdata('isloggedin') == FALSE) {
            //user is not yet logged in
            $this->session->set_flashdata("err_4", "Login First!");
            redirect(base_url() . 'login/');
        }else {
            $current_user = $this->session->userdata("current_user");
            if ($this->session->userdata("user_access") == "Client") {
                //CLIENT
                $this->session->set_flashdata("err_5", "You are currently logged in as " . $current_user->client_firstname . " " . $current_user->client_lastname);
                redirect(base_url() . "Client");
            }else if($this->session->userdata("user_access") == "Admin"){
                //ADMIN
            }else if ($this->session->userdata("user_access") == "Event Planner") {
                //EVENT PLANNER
                $this->session->set_flashdata("err_5", "You are currently logged in as " . $current_user->event_planner . " " . $current_user->event_planner_lastname);
                redirect(base_url() . "EventPlanner");
            }
        }
    }

    public function index() {
        $current_admin = $this->Admin_model->get_admin(array("admin_id" => $this->session->userdata("userid")))[0];
        $data = array(
            //-- DUMMY DATA --
            //-- NAV INFO --
            "title" => "E-Cor | $current_admin->admin_username",
            "current_ep" => $current_admin,
            "admin_username" => "$current_admin->admin_username",
            "admin_picture" => "$current_admin->admin_picture"
        );

        $this->load->view("admin/includes/header", $data);
        $this->load->view("admin/navigation/nav_header");
        $this->load->view("admin/navigation/nav_side");
        $this->load->view("admin/dashboard/main");
        $this->load->view("admin/includes/footer");
    }

}
