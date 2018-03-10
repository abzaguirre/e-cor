<?php

class Transaction_model extends CI_Model {
    public function get_transactions_active($event_planner_id){
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
        
        $this->db->where(array("transaction.event_planner_id" => $event_planner_id));
        $this->db->where(array("transaction_isActive" => 1));
        $this->db->where(array("transaction_isAccept" => 1));
        $this->db->where(array("transaction_isDone" => 0));
        
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }
    public function get_transactions_inactive($event_planner_id){
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
        
        $this->db->where(array("transaction.event_planner_id" => $event_planner_id));
        $this->db->where(array("transaction_isActive" => 0));
        $this->db->where(array("transaction_isAccept" => 1));
        $this->db->where(array("transaction_isDone" => 1));
        
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }
    
    public function get_pending_transactions($event_planner_id){
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
        
        $this->db->where(array("transaction.event_planner_id" => $event_planner_id));
        $this->db->where(array("transaction_isActive" => 0));
        $this->db->where(array("transaction_isAccept" => 0));
        $this->db->where(array("transaction_isDone" => 0));
        
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }
    
    public function edit_transaction($data, $where = NULL){
        $table = "transaction";
        if(!empty($where)){
            $this->db->where($where);
        }
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
}

