<?php

class ClientProfile extends CI_Controller {

    function __construct() {
        parent::__construct();
        //---> MODELS HERE!
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
        $this->load->view("client/profile/main");
        $this->load->view("client/includes/footer");
    }

    public function edit_profile() {
        $current_client = $this->Client_model->get_client(array("client_id" => $this->session->userdata("userid")))[0];
//        echo $this->db->last_query();
//        echo "<pre>";
//        print_r($current_client);
//        echo "</pre>";
//        die;
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
        $this->load->view("client/profile/edit_profile");
        $this->load->view("client/includes/footer");
    }

    public function edit_picture_submit() {
        $current_client = $this->Client_model->get_client(array("client_id" => $this->session->userdata("userid")))[0];
        $config['upload_path'] = './images/user/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_ext_tolower'] = true;
        $config['max_size'] = 5120;
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!empty($_FILES["client_picture"]["name"])) {
            if ($this->upload->do_upload('client_picture')) {
                $imagePath = "images/user/" . $this->upload->data("file_name");
                if ($current_client->client_picture == "images/user/male.png" || $current_client->client_picture == "images/user/female.png") {
                    
                } else {
                    unlink($current_client->client_picture);
                }
            } else {
                echo $this->upload->display_errors();
                $this->session->set_flashdata("uploading_error", "Please make sure that the max size is 5MB the types may only be .jpg, .jpeg, .gif, .png");
            }
        } else {
            //DO METHOD WITHOUT PICTURE PROVIDED
            if ($current_client->client_picture == "images/user/male.png" || $current_client->client_picture == "images/user/female.png") {
                if ($this->input->post('client_sex') == "Male") {
                    $imagePath = "images/user/male.png";
                } else {
                    $imagePath = "images/user/female.png";
                }
            } else {
                $imagePath = $current_client->client_picture;
            }
        }
        $data = array(
            'client_picture' => $imagePath,
            'client_updated_at' => time()
        );

        if ($this->Profile_model->update_client_record($data, array("client_id" => $current_client->client_id))) {
            $current_client = $this->Client_model->get_client(array("client_id" => $this->session->userdata("userid")))[0];

            $this->session->set_flashdata("uploading_success", "Successfully update the image");
            redirect(base_url() . "ClientProfile/edit_profile");
        } else {
            
        }
        redirect(base_url() . "ClientProfile/");
    }

    public function edit_profile_submit() {
        $current_client = $this->Client_model->get_client(array("client_id" => $this->session->userdata("userid")))[0];
        $this->form_validation->set_rules('client_firstname', "Firstname", "required|callback__alpha_dash_space|min_length[2]");
        $this->form_validation->set_rules('client_lastname', "Lastname", "required|callback__alpha_dash_space|min_length[2]");
        $this->form_validation->set_rules('client_address', "Address", "required");
        $this->form_validation->set_rules("client_email", "Email", "required|valid_email");
        $this->form_validation->set_rules("client_contact_no", "Mobile Phone No.", "required|numeric|regex_match[^(09|\+639)\d{9}$^]");
        if ($this->form_validation->run() == FALSE) {
            //ERROR IN FORM
            $this->edit_profile();
        } else {
            $data = array(
                'client_firstname' => $this->input->post("client_firstname"),
                'client_lastname' => $this->input->post("client_lastname"),
                'client_sex' => $this->input->post("client_sex"),
                'client_bday' => strtotime($this->input->post('client_bday')),
                'client_address' => $this->input->post("client_address"),
                'client_contact_no' => $this->input->post("client_contact_no"),
                'client_email' => $this->input->post("client_email"),
                'client_updated_at' => time()
            );

            if ($this->Profile_model->update_client_record($data, array("client_id" => $current_client->client_id))) {
                $current_client = $this->Client_model->get_client(array("client_id" => $this->session->userdata("userid")))[0];

                $this->session->set_flashdata("uploading_success", "You have successfully changed your account information");

                redirect(base_url() . "ClientProfile/edit_profile");
            } else {
                $this->session->set_flashdata("uploading_fail", $current_client->client_lastname . " seems to not exist in the database.");
            }
            redirect(base_url() . "ClientProfile/");
        }
    }

}
