<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class m_common extends CI_Model {

    function __construct() {

        parent::__construct();
    }
    function insert_row($table_name, $data) {
          $this->db->insert($table_name, $data);
          return $this->db->insert_id();
      }

      function delete_row($table_name, $where_param) {
          $this->db->where($where_param);
          $this->db->delete($table_name);
          return $this->db->affected_rows();
      }

      function update_row($table_name, $where_param, $data) {
        $this->db->where($where_param);
        $this->db->update($table_name, $data);
        return $this->db->affected_rows();
    }


      function get_row($table_name, $where_param, $select_param, $group = "", $limit = "") {
          if (!empty($select_param))
              $this->db->select($select_param);
          if (!empty($where_param))
              $this->db->where($where_param);
          $this->db->group_by($group);
          if (!empty($limit))
              $this->db->limit($limit);
          $result = $this->db->get($table_name);
          return $result->result();
      }

      function get_row_array($table_name, $where_param, $select_param, $group = "", $limit = "", $order_by = false, $order_value = false) {
          if (!empty($select_param))
              $this->db->select($select_param);
          if (!empty($where_param))
              $this->db->where($where_param);
          if (!empty($group))
              $this->db->group_by($group);
          if (!empty($order_by))
              $this->db->order_by($order_by, $order_value);
          if (!empty($limit))
              $this->db->limit($limit);
          $result = $this->db->get($table_name);
          return $result->result_array();
      }

    function query($sql) {
        $this->db->query($sql);
        return true;
    }
}
