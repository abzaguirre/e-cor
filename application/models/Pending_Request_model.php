<?php

class Pending_Request_model extends CI_Model {
    
    public function reject_pending_request($transaction_id){
        $data = array(
            "transaction_isAccept" => 0,
            "transaction_isActive" => 1,
            "transaction_isPaid" => 0,
            "transaction_isRejected" => 1,
            "transaction_isDone" => 0
        );
        $table = "transaction";
        $this->db->where(array("transaction_id" => $transaction_id));
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
    
    public function accept_pending_request($transaction_id){
        $data = array(
            "transaction_isAccept" => 1,
            "transaction_isActive" => 1,
            "transaction_isPaid" => 0,
            "transaction_isRejected" => 0,
            "transaction_isDone" => 0
        );
        
        $table = "transaction";
        $this->db->where(array("transaction_id" => $transaction_id));
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
    
    public function get_pending_request($transaction_id) {
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

        $this->db->where(array("transaction_id" => $transaction_id));

        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }
}