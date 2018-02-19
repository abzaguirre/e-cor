<?php

class Eventplanner_model extends CI_Model {
    
    public function get_ep($where = NULL) {
        $table = "event_planner";
        if (!empty($where)) {
            $this->db->where($where);
        }
        
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }
    
}
