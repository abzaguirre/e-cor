<?php

class Eventplanner_model extends CI_Model {

    public function fetch($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function get_ep($where = NULL) {
        $table = "event_planner";
        if (!empty($where)) {
            $this->db->where($where);
        }

        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function count_packages($ep_id) {
        $table = "packages";
        $this->db->count_all_results($table);
        $this->db->where(array("event_planner_id" => $ep_id));
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    public function singleinsert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    public function count_transactions($where = NULL) {
        $table = "transaction";

        $this->db->count_all_results($table);
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->from($table);
        return $this->db->count_all_results();
    }

}
