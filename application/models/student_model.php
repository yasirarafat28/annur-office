<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class student_model extends CI_Model {

    function __construct() {

        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session');
    }
    
    
    public function get_student_name_by_id( $id='')
    {
      $this->db->select('*');
      $this->db->from('student');
      $this->db->where('student_id',$id);
      $query = $this->db->get();
      return $query->row()->name_bangla;
    }
}
