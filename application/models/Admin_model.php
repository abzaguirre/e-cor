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
    
    public function singleinsert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

}
