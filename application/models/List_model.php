<?php

class List_model extends CI_Model {

    public function fetch($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function singleinsert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    public function get_ep_info($where = NULL) {
        $table = "rating";
        $join = "event_planner";
        $on = "rating.event_planner_id = event_planner.event_planner_id";
        $join2 = "client";
        $on2 = "rating.client_id = client.client_id";
        $this->db->join($join, $on, "left outer");
        $this->db->join($join2, $on2, "left outer");
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function get_ep_comment($where = NULL) {
        $table = "rating";
        $join = "client";
        $on = "rating.client_id = client.client_id";
        $this->db->join($join, $on, "left outer");
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function get_ep_specialty($where = NULL) {
        $table = "event_specialty";
        $join = "event_planner";
        $on = "event_specialty.event_planner_id = event_planner.event_planner_id";
        $this->db->join($join, $on, "left outer");
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    function get_ratings($where = NULL) {
        $table = "rating";
        $this->db->select_avg('rating_percentage');
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

}
