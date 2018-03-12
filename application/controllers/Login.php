<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->has_userdata('isloggedin') == TRUE) {
            $currentUserId = $this->session->userdata('userid');
            $currentUser = $this->Login_model->fetch("client", array("client_id" => $currentUserId))[0];
        }
    }

    public function index() {
        $data = array(
            'title' => 'E-Cor | Login',
            'wholeUrl' => base_url(uri_string()),
        );
        $this->load->view("login/includes/header", $data);
        $this->load->view("login/main");
        $this->load->view("login/includes/footer");
    }

    public function login_exec() {

        $dataEventPlanner = array(
            'event_planner_username' => $this->input->post('username'),
            'event_planner_password' => sha1($this->input->post('password')),
        );

        $accountDetailsEventPlanner = $this->Login_model->getinfo("event_planner", $dataEventPlanner);

        $dataClient = array(
            'client_username' => $this->input->post('username'),
            'client_password' => sha1($this->input->post('password')),
        );

        $accountDetailsClient = $this->Login_model->getinfo("client", $dataClient);

        if (!$accountDetailsClient && !$accountDetailsEventPlanner) {
            //OOPS no accounts like that!
            $this->session->set_flashdata("err_1", "Invalid Account");
            redirect(base_url() . "login");
        } else {
            $accountDetailsEventPlanner = $accountDetailsEventPlanner[0];
            $accountDetailsClient = $accountDetailsClient[0];
            if ($accountDetailsEventPlanner->event_planner_username == $this->input->post('username')) {
               
                if ($accountDetailsEventPlanner->event_planner_status == 0) {
                    //OOPS user is blocked by the admin. Please contact the admin.
                    $this->session->set_flashdata("err_2", "Account is blocked. Please contact the administrator to reactivate your account.");
                    redirect(base_url() . "login");
                } else {
                    if ($accountDetailsEventPlanner->event_planner_isVerified == 0) {
                        //OOPS user is not verified yet.
                        $this->session->set_flashdata("err_3", "Account is not yet verified. Please verify your account through your email.");
                        redirect(base_url() . "login");
                    } else {
                        $this->session->set_userdata('isloggedin', true);
                        $this->session->set_userdata('userid', $accountDetailsEventPlanner->event_planner_id);
                        $this->session->set_userdata('current_user', $accountDetailsEventPlanner);
                        $this->session->set_userdata('user_access', "Event Planner");
                        redirect(base_url() . 'Eventplanner/');
                    }
                }
            } else {
                if ($accountDetailsClient->client_status == 0) {
                    //OOPS user is blocked by the admin. Please contact the admin.
                    $this->session->set_flashdata("err_2", "Account is blocked. Please contact the administrator to reactivate your account.");
                    redirect(base_url() . "login");
                } else {
                    if ($accountDetailsClient->client_isVerified == 0) {
                        //OOPS user is not verified yet.
                        $this->session->set_flashdata("err_3", "Account is not yet verified. Please verify your account through your email.");
                        redirect(base_url() . "login");
                    } else {
                        $this->session->set_userdata('isloggedin', true);
                        $this->session->set_userdata('userid', $accountDetailsClient->client_id);
                        $this->session->set_userdata('current_user', $accountDetailsClient);
                        $this->session->set_userdata('user_access', "Client");
                        redirect(base_url() . 'Client/');
                    }
                }
            }
        }
    }

}
