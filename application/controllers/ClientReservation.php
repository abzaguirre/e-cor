<?php

class ClientReservation extends CI_Controller {

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
            } else if ($this->session->userdata("user_access") == "Admin") {
                //ADMIN
                $this->session->set_flashdata("err_5", "You are currently logged in as " . $current_user->admin_firstname . " " . $current_user->admin_lastname);
                redirect(base_url() . "Admin");
            } else if ($this->session->userdata("user_access") == "Event Planner") {
                //EVENT PLANNER
                $this->session->set_flashdata("err_5", "You are currently logged in as " . $current_user->event_planner_firstname . " " . $current_user->event_planner_lastname);
                redirect(base_url() . "Eventplanner");
            }
        }
    }

    public function index() {
        $pending = $this->Transaction_model->get_pending_transactions_client($this->session->userdata("userid"));

        $transactionsActive = $this->Transaction_model->get_transactions_active_client($this->session->userdata("userid"));
//        echo "<pre>";
//        print_r($transactionsActive);
//        echo "</pre>";
//        die;
        $ep = $this->List_model->fetch("event_planner");
        $current_client = $this->Client_model->get_client(array("client_id" => $this->session->userdata("userid")))[0];
        $data = array(
            //-- DATAS
            "ep" => $ep,
            "pending" => $pending,
            "transactionsActive" => $transactionsActive,
            //-- NAV INFO --
            "title" => "E-Cor | $current_client->client_username",
            "current_ep" => $current_client,
            "client_username" => "$current_client->client_username",
            "client_picture" => "$current_client->client_picture"
        );

        $this->load->view("client/includes/header", $data);
        $this->load->view("client/navigation/nav_header");
        $this->load->view("client/navigation/nav_side");
        $this->load->view("client/list/main");
        $this->load->view("client/includes/footer");
    }

    public function schedule_add() {
        $this->form_validation->set_rules('start', "Start Date", "required");
        $this->form_validation->set_rules('end', "End Date", "required");
        $this->form_validation->set_rules('title', "Event Title", "required");
        $this->form_validation->set_rules('description', "Description", "required");
        $this->form_validation->set_rules('address', "Address", "required");
        if ($this->form_validation->run() == FALSE) {
            //ERROR IN FORM
            $this->index();
        } else {
            $data = array(
                'schedule_startdate' => strtotime($this->input->post('start')),
                'schedule_enddate' => strtotime($this->input->post('end')),
                'schedule_title' => $this->input->post('title'),
                'schedule_desc' => $this->input->post('description'),
                'schedule_isFinished' => 0,
                'schedule_color' => '#3a87ad',
                'schedule_added_at' => time(),
            );
            if ($this->Schedules_model->schedule_add($data)) {
                $schedule = $this->Schedules_model->get_schedule_id(array("schedule_added_at" => time()))[0];

                $dataTrans = array(
                    'event_planner_id' => 1,
                    'client_id' => $this->session->userdata("userid"),
                    'schedule_id' => $schedule->schedule_id,
                    'packages_id' => 1,
                    'transaction_isActive' => 0,
                    'transaction_isDone' => 0,
                    'transaction_isAccept' => 0,
                    'transaction_address' => $this->input->post('address'),
                    'transaction_added_at' => time(),
                );
                if ($this->Transaction_model->transaction_add($dataTrans)) {
                    redirect(base_url() . "ClientReservation/ep_list_exec/" . $this->input->post('title') . "/" . $schedule->schedule_id);
                }
            }
        }
    }

    public function ep_list_exec() {
        $this->session->set_userdata("event", $this->uri->segment(3));
        $this->session->set_userdata("schedule_id", $this->uri->segment(4));

        redirect(base_url() . "ClientReservation/ep_list");
    }

    public function ep_list() {
        $event = $this->session->userdata("event");
        $schedule_id = $this->session->userdata("schedule_id");
        $ep = $this->List_model->get_ep_specialty(array('event_specialty_name' => $event));
//        echo $schedule_id;
//        die;
//        echo "<pre>";
//        print_r($ep);
//        echo "</pre>";
//        die;
        $current_client = $this->Client_model->get_client(array("client_id" => $this->session->userdata("userid")))[0];
        $data = array(
            //-- DATAS
            "ep" => $ep,
            "schedule_id" => $schedule_id,
            //-- NAV INFO --
            "title" => "E-Cor | $current_client->client_username",
            "current_ep" => $current_client,
            "client_username" => "$current_client->client_username",
            "client_picture" => "$current_client->client_picture"
        );

        $this->load->view("client/includes/header", $data);
        $this->load->view("client/navigation/nav_header");
        $this->load->view("client/navigation/nav_side");
        $this->load->view("client/list/list");
        $this->load->view("client/includes/footer");
    }

    public function packages_exec() {
        $this->session->set_userdata("ep_id", $this->uri->segment(3));
        $this->session->set_userdata("schedule_id", $this->uri->segment(4));
        $ep = $this->List_model->fetch("transaction", array('client_id' => $this->session->userdata("userid"), 'schedule_id' => $this->uri->segment(4)))[0];
//        echo "<pre>";
//        print_r($ep);
//        echo "</pre>";
//        die;
        $data = array(
            'event_planner_id' => $this->uri->segment(3),
        );
        if ($ep->event_planner_id == 1) {
            redirect(base_url() . "ClientReservation/packages");
        } else {
            if ($this->List_model->update_transaction($data, array("client_id" => $this->session->userdata("userid"), "schedule_id" => $this->uri->segment(4)))) {
                redirect(base_url() . "ClientReservation/packages");
            }
        }
    }

    public function packages() {
        $ep_id = $this->session->userdata("ep_id");
        $schedule_id = $this->session->userdata("schedule_id");
        $ep = $this->List_model->fetch("event_planner", array('event_planner_id' => $ep_id))[0];
        $ep_specialty = $this->List_model->get_ep_specialty(array('event_specialty.event_planner_id' => $ep_id))[0];

        $packages = $this->Packages_model->get_packages_id("packages_name LIKE '%" . $ep_specialty->event_specialty_name . "%'");
//        echo $this->db->last_query();
//        echo "<pre>";
//        print_r($packages);
//        echo "</pre>";s
//        die;
        // $packages = $this->Packages_model->get_packages_id(array("event_planner_id" => $ep_id));
        $current_client = $this->Client_model->get_client(array("client_id" => $this->session->userdata("userid")))[0];
        $data = array(
            //-- DATAS
            'ep_specialty' => $ep_specialty,
            'ep_id' => $ep_id,
            'schedule_id' => $schedule_id,
            'ep' => $ep,
            'packages_id' => $packages,
            //-- NAV INFO --
            "title" => "E-Cor | $current_client->client_username",
            "current_ep" => $current_client,
            "client_username" => "$current_client->client_username",
            "client_picture" => "$current_client->client_picture"
        );

        $this->load->view("client/includes/header", $data);
        $this->load->view("client/navigation/nav_header");
        $this->load->view("client/navigation/nav_side");
        $this->load->view("client/list/packages");
        $this->load->view("client/includes/footer");
    }

    public function choose_package_exec() {
        $this->session->set_userdata("package_id", $this->uri->segment(3));
        $this->session->set_userdata("schedule_id", $this->uri->segment(4));
        $this->session->set_userdata("ep_id", $this->uri->segment(5));
        redirect(base_url() . "ClientReservation/choose_package");
    }

    public function choose_package() {
        $package_id = $this->session->userdata("package_id");
        $schedule_id = $this->session->userdata("schedule_id");
        $ep_id = $this->session->userdata("ep_id");
        $ep = $this->List_model->fetch("event_planner", array("event_planner_id" => $ep_id))[0];
        $trans = $this->List_model->fetch("transaction", array('client_id' => $this->session->userdata("userid"), 'schedule_id' => $schedule_id))[0];

//        echo "<pre>";
//        print_r($trans);
//        echo "</pre>";
//        die;
        $data = array(
            'packages_id' => $package_id,
            'transaction_notes' => $this->input->post('note'),
        );
//        $this->List_model->update_transaction($data, array("client_id" => $this->session->userdata("userid"), "schedule_id" => $schedule_id));
//        echo $this->db->last_query();
//        die;
        $this->List_model->update_transaction($data, array("client_id" => $this->session->userdata("userid"), "schedule_id" => $schedule_id));

        if ($trans->packages_id == 1) {
            redirect(base_url() . "ClientTransactions");
        } else {
            if ($this->List_model->update_transaction($data, array("client_id" => $this->session->userdata("userid"), "schedule_id" => $schedule_id))) {
                $this->session->set_flashdata("reserve", "Your request has been send to " . $ep->event_planner_firstname . " " . $ep->event_planner_lastname . ". Wait for the event planner to accept your request.");
                redirect(base_url() . "ClientTransactions");
            }
        }
    }

}
