<?php

class Admin_model extends CI_Model {

    public function fetch($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function get_admin($where = NULL) {
        $table = "admin";
        if (!empty($where)) {
            $this->db->where($where);
        }

        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }
    
    public function payment($transaction_id){
        $table = "transaction";
        $data = array("transaction_isPaid" => 1);
        $this->db->where(array("transaction_id" => $transaction_id));
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
    
    public function get_unpaid_ep(){
        $table = "transaction";
        $join = "event_planner";
        $on = "transaction.event_planner_id = event_planner.event_planner_id";
        $join2 = "client";
        $on2 = "transaction.client_id = client.client_id";
        $join3 = "schedule";
        $on3 = "transaction.schedule_id = schedule.schedule_id";
        $join4 = "packages";
        $on4 = "transaction.packages_id = packages.packages_id";

        $this->db->join($join, $on, "left outer");
        $this->db->join($join2, $on2, "left outer");
        $this->db->join($join3, $on3, "left outer");
        $this->db->join($join4, $on4, "left outer");

        $this->db->where(array("transaction_isActive" => 0));
        $this->db->where(array("transaction_isAccept" => 1));
        $this->db->where(array("transaction_isPaid" => 1));
        $this->db->where(array("transaction_isDone" => 1));
        $this->db->where(array("transaction_isPaidByAdmin" => 0));
        $this->db->where(array("transaction_isRejected" => 0));

        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }
    
    public function singleinsert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

}
