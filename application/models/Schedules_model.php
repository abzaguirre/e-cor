<?php

class Schedules_model extends CI_Model {

    public function add_schedule($schedule) {
        $table = "schedule";
        $this->db->insert($table, $schedule);
        return $this->db->affected_rows();
    }

    public function fetchSched($where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get("schedule");
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function update_sched($data, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->update("schedule", $data);
        return $this->db->affected_rows();
    }

    public function delete_sched($id) {
        $this->db->where(array("schedule_id" => $id));
        $this->db->delete("schedule");
        return $this->db->affected_rows();
    }

    public function get_schedule_id($where = NULL) {
        $table = "schedule";
        $this->db->select('schedule_id');
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows() > 0 ) ? $query->result() : FALSE;
    }

    public function schedule_add($data) {
        $table = "schedule";
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

}
