<?php

class Packages_model extends CI_Model {

    public function get_packages_id($where = NULL) {
        $table = "packages";
        $this->db->select('packages_id');
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function get_package_info($where = NULL) {
        $table = "packages";
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function get_item_in_packages($where = NULL) {
        $table = "item";
        $this->db->join("packages", "item.packages_id = packages.packages_id", "left outer");
        $this->db->join("event_planner", "item.event_planner_id = event_planner.event_planner_id", "left outer");
        if (!empty($where)) {
            $this->db->where($where);
        }

        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function package_delete($where = NULL) {
        $table = "item";
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

    public function package_remove($where = NULL) {
        $table = "packages";
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

    public function package_add($data) {
        $table = "packages";
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    public function package_edit($data, $where = NULL) {
        $table = "packages";
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

}
