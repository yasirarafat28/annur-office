<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class routine_model extends CI_Model {

    function __construct() {

        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session');
    }
    
    
    public function get_routine_time_start_by_class_day_subject( $class_id='', $day='', $subject_id='')
    {
      $this->db->select('*');
      $this->db->from('class_routine');
      $this->db->where('class_id',$class_id);
      $this->db->where('day',$day);
      $this->db->where('subject_id',$subject_id);
      $query = $this->db->get();
      if (isset($query->row()->time_start)) {
        return $query->row()->time_start;
      }
      else
      return '';
    }

    public function get_routine_time_end_by_class_day_subject( $class_id='', $day='', $subject_id='')
    {
      $this->db->select('*');
      $this->db->from('class_routine');
      $this->db->where('class_id',$class_id);
      $this->db->where('day',$day);
      $this->db->where('subject_id',$subject_id);
      $query = $this->db->get();
      if (isset($query->row()->time_end)) {
        return $query->row()->time_end;
      }
      else
      return '';
    }
}
