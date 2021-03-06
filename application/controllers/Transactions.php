<?php

class Transactions extends CI_Controller {

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
                $this->session->set_flashdata("err_5", "You are currently logged in as " . $current_user->client_firstname . " " . $current_user->client_lastname);
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

    public function index() {
        $transactionsActive = $this->Transaction_model->get_accepted_transaction($this->session->userdata("userid"));

//        echo $this->db->last_query();
        $transactionsInactive = $this->Transaction_model->get_transactions_inactive($this->session->userdata("userid"));

//        echo "<pre>";
//        print_r($transactionsActive);
//        echo "</pre>";
//        die;
        $ep_id = $this->session->userdata("userid");
        $packages = $this->Packages_model->get_package_info(array("event_planner_id" => $ep_id));

        $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => $this->session->userdata("userid")))[0];
        $data = array(
            "acceptedTransaction" => $transactionsActive,
            "transactionsInactive" => $transactionsInactive,
            "packages" => $packages,
            //-- NAV INFO --
            "title" => $current_ep->event_planner_username,
            "current_ep" => $current_ep,
            "ep_username" => "$current_ep->event_planner_username",
            "ep_picture" => "$current_ep->event_planner_picture"
        );

        $this->load->view("event_planner/includes/header", $data);
        $this->load->view("event_planner/navigation/nav_header");
        $this->load->view("event_planner/navigation/nav_side");
        $this->load->view("event_planner/transactions/main");
        $this->load->view("event_planner/includes/footer");
    }

    public function cancel_transaction() {
        //transaction dropped
        $transaction_id = $this->uri->segment(3);
        $data = array("transaction_isActive" => 0);
        $this->Transaction_model->edit_transaction($data, array("transaction_id" => $transaction_id));
        $this->session->set_flashdata("show_flash_success", "Successfully cancelled the transaction");
        redirect(base_url() . "transactions");
    }

    public function show_transaction_exec() {
        $this->session->set_userdata("transaction_id", $this->uri->segment(3));
        redirect(base_url() . "transactions/show_transaction");
    }

    public function show_transaction() {
        $transaction_id = $this->session->userdata("transaction_id");
        $transaction = $this->Transaction_model->get_transaction($transaction_id);

        $current_ep = $this->Eventplanner_model->get_ep(array("event_planner_id" => $this->session->userdata("userid")))[0];
        $data = array(
            "fetched_transaction" => $transaction,
            //-- NAV INFO --
            "title" => $current_ep->event_planner_username,
            "current_ep" => $current_ep,
            "ep_username" => "$current_ep->event_planner_username",
            "ep_picture" => "$current_ep->event_planner_picture"
        );
        $this->load->view("event_planner/includes/header", $data);
        $this->load->view("event_planner/navigation/nav_header");
        $this->load->view("event_planner/navigation/nav_side");
        $this->load->view("event_planner/transactions/show_transaction_detail");
        $this->load->view("event_planner/includes/footer");
    }

}
