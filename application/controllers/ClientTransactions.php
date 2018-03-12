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
        $pending = $this->Transaction_model->get_pending_transactions_client($this->session->userdata("userid"));
        $transactionsActive = $this->Transaction_model->get_transactions_active_client($this->session->userdata("userid"));
        $rejected = $this->Transaction_model->get_rejected_transactions_client($this->session->userdata("userid"));
//        echo $this->db->last_query();
//        echo "<pre>";
//        print_r($transactionsActive);
//        echo "</pre>";
//        die;
        $current_client = $this->Client_model->get_client(array("client_id" => $this->session->userdata("userid")))[0];
        $data = array(
//-- DUMMY DATA --
            'pending' => $pending,
            'rejected' => $rejected,
            'transactionsActive' => $transactionsActive,
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

    public function resched() {
        $trans_id = $this->uri->segment(3);
        $this->form_validation->set_rules('start', "Start Date", "required");
        $this->form_validation->set_rules('end', "End Date", "required");
        $transactionsActive = $this->Transaction_model->get_transactions_active_client($this->session->userdata("userid"));
        if ($this->form_validation->run() == FALSE) {
            //ERROR IN FORM
            $this->index();
        } else {
            $data = array(
                'schedule_startdate' => strtotime($this->input->post('start')),
                'schedule_enddate' => strtotime($this->input->post('end')),
            );
            if ($this->Schedules_model->update_sched($data, array('schedule_id' => $transactionsActive[0]->schedule_id))) {
                $this->session->set_flashdata("resched", "The schedule has been updated.");
                redirect(base_url() . "ClientTransactions/index");
            }
        }
    }

    public function cancel() {
        $trans_id = $this->uri->segment(3);
        $transactionsActive = $this->Transaction_model->get_transactions_active_client($this->session->userdata("userid"));
        $data = array(
            'transaction_isActive' => 0,
        );
        if ($this->Transaction_model->edit_transaction($data, array('transaction_id' => $trans_id))) {
            if (date("F d, Y", strtotime("+1 week", $transactionsActive[0]->transaction_added_at)) >= date("F d, Y")) {
                $this->session->set_flashdata("cancel", "The schedule has been canceled. We will send you update for your refund.");
                redirect(base_url() . "ClientTransactions/index");
            } else {
                $this->session->set_flashdata("cancel", "The schedule has been canceled.");
                redirect(base_url() . "ClientTransactions/index");
            }
        }
    }

    public function done() {
        $trans_id = $this->uri->segment(3);
        $transactionsActive = $this->Transaction_model->get_transactions_active_client($this->session->userdata("userid"));
        $data = array(
            'transaction_isDone' => 1,
            'transaction_finished_at' => time(),
        );
        if ($this->Transaction_model->edit_transaction($data, array('transaction_id' => $trans_id))) {
            $this->session->set_flashdata("cancel", "The schedule has been done.");
            redirect(base_url() . "ClientTransactions/index");
        }
    }

}
