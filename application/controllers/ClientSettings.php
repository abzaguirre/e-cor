<?php

class ClientSettings extends CI_Controller {

    function __construct() {
        parent::__construct();
        //---> HELPERS HERE!
        //---> LIBRARIES HERE!
        //---> SESSIONS HERE!
        if ($this->session->has_userdata('isloggedin') == FALSE) {
            //user is not yet logged in
            $this->session->set_flashdata("err_4", "Login First!");
            redirect(base_url() . 'login/');
        } else {
            $current_user = $this->session->userdata("current_user");
            if ($this->session->userdata("user_access") == "Client") {
                //CLIENT
            } else if ($this->session->userdata("user_access") == "Admin") {
                //ADMIN
                $this->session->set_flashdata("err_5", "You are currently logged in as " . $current_user->admin_firstname . " " . $current_user->admin_lastname);
                redirect(base_url() . "Admin");
            } else if ($this->session->userdata("user_access") == "Event Planner") {
                //EVENT PLANNER
                $this->session->set_flashdata("err_5", "You are currently logged in as " . $current_user->event_planner_firstname . " " . $current_user->event_planner_lastname);
                redirect(base_url() . "EventPlanner");
            }
        }
    }

    function _alpha_dash_space($str = '') {
        if (!preg_match("/^([-a-z_ ])+$/i", $str)) {
            $this->form_validation->set_message('_alpha_dash_space', 'The {field} is not correct.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function index() {

        $current_client = $this->Client_model->get_client(array("client_id" => $this->session->userdata("userid")))[0];

        $data = array(
            //-- DUMMY DATA --
            //-- NAV INFO --
            "title" => "E-Cor | $current_client->client_username",
            "current_client" => $current_client,
            "client_username" => "$current_client->client_username",
            "client_picture" => "$current_client->client_picture"
        );

        $this->load->view("client/includes/header", $data);
        $this->load->view("client/navigation/nav_header");
        $this->load->view("client/navigation/nav_side");
        $this->load->view("client/settings/main");
        $this->load->view("client/includes/footer");
    }

    public function username_submit() {
        $current_client = $this->Client_model->get_client(array("client_id" => $this->session->userdata("userid")))[0];
        $this->form_validation->set_rules("client_username", "Username", "required|min_length[5]|is_unique[client.client_username]");
        if ($this->form_validation->run() == FALSE) {
            //ERROR IN FORM
            $this->index();
        } else {
            $data = array(
                'client_username' => $this->input->post("client_username"),
                'client_updated_at' => time()
            );

            if ($this->Profile_model->update_client_record($data, array("client_id" => $current_client->client_id))) {
                $this->session->set_flashdata("uploading_success", "You have successfully changed your username");
                redirect(base_url() . "ClientSettings/");
            } else {
                $this->session->set_flashdata("uploading_fail", $current_client->client_lastname . " seems to not exist in the database.");
            }
            redirect(base_url() . "ClientSettings/");
        }
    }

    public function password_submit() {
        $current_client = $this->Client_model->get_client(array("client_id" => $this->session->userdata("userid")))[0];

        $this->form_validation->set_rules("client_password", "Password", "required|matches[client_conpassword]|min_length[8]");
        $this->form_validation->set_rules("client_conpassword", "Confirm Password", "required|matches[client_password]|min_length[8]");
        if ($this->form_validation->run() == FALSE) {
            //ERROR IN FORM
            $this->index();
        } else {
            $data = array(
                'client_password' => sha1($this->input->post("client_password")),
                'client_updated_at' => time()
            );

            if ($this->Profile_model->update_client_record($data, array("client_id" => $current_client->client_id))) {
                //SUCCESS
                $this->session->set_flashdata("uploading_success", "You have successfully changed your password");
                redirect(base_url() . "ClientSettings/");
            } else {
                $this->session->set_flashdata("uploading_fail", $current_client->client_lastname . " seems to not exist in the database.");
            }
            redirect(base_url() . "ClientSettings/");
        }
    }

}
