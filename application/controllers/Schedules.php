<?php

class Schedules extends CI_Controller {
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
                $this->session->set_flashdata("err_5", "You are currently logged in as " . $current_user->client_firstname . " " . $current_user->client_lastname);
                redirect(base_url() . "Client");
            } else if ($this->session->userdata("user_access") == "admin") {
                //ADMIN!
                //Do nothing!
            }
        }
    }
    

    
    
    
    public function index(){
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
        $this->load->view("event_planner/schedules/main");
        $this->load->view("event_planner/includes/footer");
    }
    
    public function getscheds() {
        $query = $this->db->query("SELECT * FROM schedule");
        $result = $query->result_array();
        $res = array();
        foreach ($result as $key => $arr) {
            $res[$key]["schedule_id"] = $arr['schedule_id'];
            $res[$key]["title"] = $arr['schedule_title'];
            $res[$key]["color"] = $arr['schedule_color'];
            $res[$key]["start"] = date("Y-m-d H:i:s", $arr['schedule_startdate']);
            $res[$key]["end"] = date("Y-m-d H:i:s", $arr['schedule_enddate']);
            $res[$key]["description"] = $arr['schedule_desc'];
        }

        echo json_encode($res);
    }

    public function getsched() {
        $query = $this->db->query("SELECT * FROM schedule WHERE schedule_id = " . $this->input->post("id"));
        $result = $query->result_array();
        $res = array();
        foreach ($result as $key => $arr) {
            $res[$key]['id'] = $arr['schedule_id'];
            $res[$key]['title'] = $arr['schedule_title'];
            $res[$key]['color'] = $arr['schedule_color'];
            $res[$key]['startdate'] = date("F d, Y", $arr['schedule_startdate']);
            $res[$key]['starttime'] = date("h:i A", $arr['schedule_startdate']);
            $res[$key]['enddate'] = date("F d, Y", $arr['schedule_enddate']);
            $res[$key]['endtime'] = date("h:i A", $arr['schedule_enddate']);
            $res[$key]['description'] = $arr['schedule_desc'];
        }
        echo json_encode($res);
    }

    public function setreserve() {
        $this->form_validation->set_rules('schedule_startdate', "Start Date", "required");
        $this->form_validation->set_rules('schedule_starttime', "Start Time", "required");
        $this->form_validation->set_rules('schedule_enddate', "End Date", "required");
        $this->form_validation->set_rules('schedule_endtime', "End Time", "required");
        $this->form_validation->set_rules('schedule_title', "Title", "required");

        if ($this->form_validation->run() == FALSE) {
            //IF THERE ARE ERRORS IN FORMS
            echo json_encode(array(
                'success' => false,
                'result' => "There are errors in your form. Please check the fields.",
                "title" => form_error("schedule_title"),
                "startdate" => form_error("schedule_startdate"),
                "starttime" => form_error("schedule_starttime"),
                "enddate" => form_error("schedule_enddate"),
                "endtime" => form_error("schedule_endtime"),
            ));
        } else {
            //IF FORMS ARE VALID
            $startdate = strtotime($this->input->post('schedule_startdate') . " " . $this->input->post('schedule_starttime'));
            $enddate = strtotime($this->input->post('schedule_enddate') . " " . $this->input->post('schedule_endtime'));

            if ($this->Schedules_model->fetchSched(array("schedule_startdate" => $startdate))) {
                //IF STARTDATE IS ALREADY EXISTING
                echo json_encode(array(
                    'success' => false,
                    'result' => 'There is an existing schedule already!',
                    'title' => "",
                    'startdate' => "<p>There is an existing schedule for this date/time</p>",
                    'starttime' => "<p>There is an existing schedule for this date/time</p>",
                    'enddate' => "",
                    'endtime' => "",
                    'comment' => ""
                ));
            } else {
                //IF STARTDATE IS UNIQUE
                if ($startdate > $enddate) {
                    echo json_encode(array(
                        'success' => false,
                        'result' => 'Start Date/Time is ahead of End Date/Time',
                        'title' => "",
                        'startdate' => "",
                        'starttime' => "",
                        'enddate' => "<p>End Date/Time must be ahead of Start Date/Time</p>",
                        'endtime' => "<p>End Date/Time must be ahead of Start Date/Time</p>",
                        'comment' => ""
                    ));
                } else {
                    $data = array(
                        "schedule_title" => $this->input->post('schedule_title'),
                        "schedule_desc" => $this->input->post('schedule_desc'),
                        "schedule_color" => $this->input->post('schedule_color'),
                        "schedule_startdate" => $startdate,
                        "schedule_enddate" => $enddate
                    );
                    $this->Schedules_model->add_schedule($data);
                    echo json_encode(array('success' => true, 'result' => 'Success'));
                }
            }
        }
    }

    public function updatereserve() {
        $this->form_validation->set_rules('schedule_title', "Title", "required");
        if ($this->form_validation->run() == FALSE) {
            //IF THERE ARE ERRORS IN FORMS
            echo json_encode(array(
                'success' => false,
                'result' => "There are errors in your form. Please check the fields.",
                "title" => form_error("schedule_title"),
                "startdate" => form_error("schedule_startdate"),
                "starttime" => form_error("schedule_starttime"),
                "enddate" => form_error("schedule_enddate"),
                "endtime" => form_error("schedule_endtime"),
            ));
        } else {
            $startdate = strtotime($this->input->post('schedule_startdate') . " " . $this->input->post('schedule_starttime'));
            $enddate = strtotime($this->input->post('schedule_enddate') . " " . $this->input->post('schedule_endtime'));
            //IF STARTDATE IS UNIQUE
            if ($startdate > $enddate) {
                echo json_encode(array(
                    'success' => false,
                    'result' => 'Start Date/Time is ahead of End Date/Time',
                    'title' => "",
                    'startdate' => "",
                    'starttime' => "",
                    'enddate' => "<p>End Date/Time must be ahead of Start Date/Time</p>",
                    'endtime' => "<p>End Date/Time must be ahead of Start Date/Time</p>",
                    'comment' => ""
                ));
            } else {
                $data = array(
                    "schedule_title" => $this->input->post('schedule_title'),
                    "schedule_desc" => $this->input->post('schedule_desc'),
                    "schedule_color" => $this->input->post('schedule_color'),
                    "schedule_startdate" => $startdate,
                    "schedule_enddate" => $enddate
                );
                $this->Schedules_model->update_sched($data, array("schedule_id" => $this->input->post("schedule_id")));
                echo json_encode(array("data" => $data, 'id' => $this->input->post("schedule_id"), 'success' => true, 'result' => "Successfully updated."));
            }
        }
    }

    public function deletereserve() {
        $this->Schedules_model->delete_sched($this->input->post("schedule_id"));
        echo json_encode(array('success' => true, 'result' => "Success"));
    }
    
}