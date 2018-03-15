<?php

class EventplannerSettings extends CI_Controller {

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
                $this->session->set_flashdata("err_5", "You are currently logged in as " . $current_user->event_planner_firstname . " " . $current_user->event_planner_lastname);
                redirect(base_url() . "Client");
            } else if ($this->session->userdata("user_access") == "Admin") {
                //ADMIN
                $this->session->set_flashdata("err_5", "You are currently logged in as " . $current_user->admin_firstname . " " . $current_user->admin_lastname);
                redirect(base_url() . "Admin");
            } else if ($this->session->userdata("user_access") == "Event Planner") {
                //EVENT PLANNER
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
        $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => $this->session->userdata("userid")))[0];
        $data = array(
            //-- NAV INFO --
            "title" => $current_ep->event_planner_username,
            "current_ep" => $current_ep,
            "ep_username" => "$current_ep->event_planner_username",
            "ep_picture" => "$current_ep->event_planner_picture"
        );
        $this->load->view("event_planner/includes/header", $data);
        $this->load->view("event_planner/navigation/nav_header");
        $this->load->view("event_planner/navigation/nav_side");
        $this->load->view("event_planner/settings/main");
        $this->load->view("event_planner/includes/footer");
    }

    public function username_submit() {
        $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => $this->session->userdata("userid")))[0];
        $this->form_validation->set_rules("event_planner_username", "Username", "required|min_length[5]|is_unique[event_planner.event_planner_username]");
        if ($this->form_validation->run() == FALSE) {
            //ERROR IN FORM
            $this->index();
        } else {
            $data = array(
                'event_planner_username' => $this->input->post("event_planner_username"),
                'event_planner_updated_at' => time()
            );

            if ($this->Profile_model->update_event_planner_record($data, array("event_planner_id" => $current_ep->event_planner_id))) {
                $this->session->set_flashdata("uploading_success", "You have successfully changed your username");
                redirect(base_url() . "EventplannerSettings/");
            } else {
                $this->session->set_flashdata("uploading_fail", $current_ep->event_planner_lastname . " seems to not exist in the database.");
            }
            redirect(base_url() . "EventplannerSettings/");
        }
    }

    public function password_submit() {
        $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => $this->session->userdata("userid")))[0];

        $this->form_validation->set_rules("event_planner_password", "Password", "required|matches[event_planner_conpassword]|min_length[8]");
        $this->form_validation->set_rules("event_planner_conpassword", "Confirm Password", "required|matches[event_planner_password]|min_length[8]");
        if ($this->form_validation->run() == FALSE) {
            //ERROR IN FORM
            $this->index();
        } else {
            $data = array(
                'event_planner_password' => sha1($this->input->post("event_planner_password")),
                'event_planner_updated_at' => time()
            );

            if ($this->Profile_model->update_event_planner_record($data, array("event_planner_id" => $current_ep->event_planner_id))) {
                //SUCCESS
                $this->session->set_flashdata("uploading_success", "You have successfully changed your password");
                redirect(base_url() . "EventplannerSettings/");
            } else {
                $this->session->set_flashdata("uploading_fail", $current_ep->event_planner_lastname . " seems to not exist in the database.");
            }
            redirect(base_url() . "EventplannerSettings/");
        }
    }

}
