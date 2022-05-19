<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class notice_model extends CI_Model {

    function __construct() {

        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session');
    }
    
    
    public function get_all_notice()
    {
      $this->db->select('*');
      $this->db->from('noticeboard');
      $this->db->where('status',1);
      $this->db->limit(1);
      $this->db->order_by("notice_id", "DESC");
      $notice = $this->db->get()->result_array();

      return $notice;
    }
}
