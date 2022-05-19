<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class class_model extends CI_Model {

    function __construct() {

        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session');
    }
    
    
    public function get_class_name_by_id( $id='')
    {
      $this->db->select('*');
      $this->db->from('class');
      $this->db->where('class_id',$id);
      $query = $this->db->get();
      return $query->row()->name;
    }
}
