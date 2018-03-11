<?php

class ClientTransactions extends CI_Controller {

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
                //Do nothing!
            } else if ($this->session->userdata("user_access") == "admin") {
                //ADMIN!
                $this->session->set_flashdata("err_5", "You are currently logged in as " . $current_user->event_planner_firstname . " " . $current_user->event_planner_lastname);
                redirect(base_url() . "Eventplanner");
            }
        }
    }

    public function index() {
        $current_client = $this->Client_model->get_client(array("client_id" => $this->session->userdata("userid")))[0];
        $data = array(
            //-- DUMMY DATA --
            //-- NAV INFO --
            "title" => "E-Cor | $current_client->client_username",
            "current_ep" => $current_client,
            "client_username" => "$current_client->client_username",
            "client_picture" => "$current_client->client_picture"
        );

        $this->load->view("client/includes/header", $data);
        $this->load->view("client/navigation/nav_header");
        $this->load->view("client/navigation/nav_side");
        $this->load->view("client/transactions/main");
        $this->load->view("client/includes/footer");
    }

}
