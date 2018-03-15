<?php

class Profile_model extends CI_Model {

    public function fetch($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function count_dogs($where = NULL) {
        $table = "adoption";
        $join = "pet";
        $on = "adoption.pet_id = pet.pet_id";
        $join2 = "user";
        $on2 = "adoption.user_id = user.user_id";
        $this->db->join($join, $on, "left outer");
        $this->db->join($join2, $on2, "left outer");
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function fetchJoinThreeAdoptedDesc($table, $join = NULL, $on = NULL, $join2 = NULL, $on2 = NULL, $where = NULL) {
        //$on must be array('pet.user_id = user.user_id');
        if (!empty($where)) {
            $this->db->where($where);
        }
        if (!(empty($join) || empty($on))) {
            $this->db->join($join, $on, "left outer");
        }
        if (!(empty($join2) || empty($on2))) {
            $this->db->join($join2, $on2, "left outer");
        }
        $this->db->order_by('adoption_adopted_at', 'desc');
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function fetch_all_transactions($where = NULL) {
        $table = "transaction";
        $join = "user";
        $on = "transaction.user_id = user.user_id";
        $join2 = "pet";
        $on2 = "transaction.pet_id = pet.pet_id";
        $this->db->where(array("transaction.user_id" => $this->session->userdata("userid")));
        $this->db->where(array("transaction_isFinished" => 0));
        $this->db->where(array("transaction_isActivated" => 1));
        $this->db->join($join, $on, "left outer");
        $this->db->join($join2, $on2, "left outer");
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function update_client_record($user_record, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->update("client", $user_record);
        return $this->db->affected_rows();
    }

    public function update_event_planner_record($user_record, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->update("event_planner", $user_record);
        return $this->db->affected_rows();
    }

}
