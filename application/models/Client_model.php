<?php

class Client_model extends CI_Model {

    public function fetch($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function count_packages() {
        $table = "packages";
        $this->db->count_all_results($table);
        $this->db->from($table);
        return $this->db->count_all_results();
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

    public function count_ep() {
        $table = "event_planner";
        $this->db->count_all_results($table);
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    public function get_client($where = NULL) {
        $table = "client";
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

}
