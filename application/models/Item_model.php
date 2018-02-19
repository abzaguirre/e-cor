<?php

class Item_model extends CI_Model {
    public function delete_item($where = NULL){
        $table = "item";
        if(!empty($where)){
            $this->db->where($where);
        }
        $this->db->delete($table);
        return $this->db->affected_rows();
    }
}
