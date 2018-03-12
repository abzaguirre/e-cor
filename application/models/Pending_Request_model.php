<?php

class Pending_Request_model extends CI_Model {
    
    public function reject_pending_request($transaction_id){
        $data = array(
            "transaction_isAccept" => 1
        );
        $table = "transaction";
        
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
}