<?php

class EventplannerProfile extends CI_Controller {

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
        $this->load->view("event_planner/profile/main");
        $this->load->view("event_planner/includes/footer");
    }

    public function edit_profile() {
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
        $this->load->view("event_planner/profile/edit_profile");
        $this->load->view("event_planner/includes/footer");
    }

    public function edit_picture_submit() {
        $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => $this->session->userdata("userid")))[0];
        $config['upload_path'] = './images/user/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_ext_tolower'] = true;
        $config['max_size'] = 5120;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!empty($_FILES["event_planner_picture"]["name"])) {
            if ($this->upload->do_upload('event_planner_picture')) {
                $imagePath = "images/user/" . $this->upload->data("file_name");
                if ($current_ep->event_planner_picture == "images/user/male.png" || $current_ep->event_planner_picture == "images/user/female.png") {
                    
                } else {
                    unlink($current_ep->event_planner_picture);
                }
            } else {
                echo $this->upload->display_errors();
                $this->session->set_flashdata("uploading_error", "Please make sure that the max size is 5MB the types may only be .jpg, .jpeg, .gif, .png");
            }
        } else {
            //DO METHOD WITHOUT PICTURE PROVIDED
            if ($current_ep->event_planner_picture == "images/user/male.png" || $current_ep->event_planner_picture == "images/user/female.png") {
                if ($this->input->post('event_planner_sex') == "Male") {
                    $imagePath = "images/user/male.png";
                } else {
                    $imagePath = "images/user/female.png";
                }
            } else {
                $imagePath = $current_ep->event_planner_picture;
            }
        }
        $data = array(
            'event_planner_picture' => $imagePath,
            'event_planner_updated_at' => time()
        );

        if ($this->Profile_model->update_event_planner_record($data, array("event_planner_id" => $current_ep->event_planner_id))) {
            $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => $this->session->userdata("userid")))[0];

            $this->session->set_flashdata("uploading_success", "Successfully update the image");
            redirect(base_url() . "EventplannerProfile/edit_profile");
        } else {
            
        }
        redirect(base_url() . "EventplannerProfile/");
    }

    public function edit_profile_submit() {
        $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => $this->session->userdata("userid")))[0];
        $this->form_validation->set_rules('event_planner_firstname', "Firstname", "required|callback__alpha_dash_space|min_length[2]");
        $this->form_validation->set_rules('event_planner_lastname', "Lastname", "required|callback__alpha_dash_space|min_length[2]");
        $this->form_validation->set_rules('event_planner_address', "Address", "required");
        $this->form_validation->set_rules("event_planner_email", "Email", "required|valid_email");
        $this->form_validation->set_rules("event_planner_contact_no", "Mobile Phone No.", "required|numeric|regex_match[^(09|\+639)\d{9}$^]");
        if ($this->form_validation->run() == FALSE) {
            //ERROR IN FORM
            $this->edit_profile();
        } else {
            $data = array(
                'event_planner_firstname' => $this->input->post("event_planner_firstname"),
                'event_planner_lastname' => $this->input->post("event_planner_lastname"),
                'event_planner_sex' => $this->input->post("event_planner_sex"),
                'event_planner_bday' => strtotime($this->input->post('event_planner_bday')),
                'event_planner_address' => $this->input->post("event_planner_address"),
                'event_planner_contact_no' => $this->input->post("event_planner_contact_no"),
                'event_planner_email' => $this->input->post("event_planner_email"),
                'event_planner_updated_at' => time()
            );

            if ($this->Profile_model->update_event_planner_record($data, array("event_planner_id" => $current_ep->event_planner_id))) {
                $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => $this->session->userdata("userid")))[0];

                $this->session->set_flashdata("uploading_success", "You have successfully changed your account information");

                redirect(base_url() . "EventplannerProfile/edit_profile");
            } else {
                $this->session->set_flashdata("uploading_fail", $current_ep->event_planner_lastname . " seems to not exist in the database.");
            }
            redirect(base_url() . "EventplannerProfile/");
        }
    }

}
