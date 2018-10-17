<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function insertData($table, $data) {
        $this->db->insert($table, $data);
        $last_insertid = $this->db->insert_id();
        return $last_insertid;
    }
    public function listData($table, $where = [])
    {
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->result_array();
    }
    public function updateData($table, $data, $where = [])
    {
        $this->db->where($where);
        $query = $this->db->update($table, $data);
        return $query;
    }
    public function deleteData($table, $where = [])
    {
        $this->db->where($where);
        $query = $this->db->delete($table);
        return $query;
    }

}
