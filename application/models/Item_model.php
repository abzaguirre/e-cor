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
    public function add_item($item){
        $table = "item";
        $this->db->insert($table, $item);
        return $this->db->affected_rows();
    }
    public function edit_item($item, $where = NULL){
        $table = "item";
        if(!empty($where)){
            $this->db->where($where);
        }
        $this->db->update($table, $item);
        return $this->db->affected_rows();
    }
    public function get_item($where = NULL) {
        $table = "item";
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }
}
