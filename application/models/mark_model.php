<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mark_model extends CI_Model {

    function __construct() {

        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session');
    }
    
    
    public function get_total_obtain_mark_by_student_id_exam_id( $student_id ='', $exam_id='')
    {
      $this->db->select_sum('mark_obtained');
      $this->db->from('mark');
      $this->db->where('student_id',$student_id);
      $this->db->where('exam_id',$exam_id);
      $query = $this->db->get();
      return $query->row()->mark_obtained;
    }
    public function get_total_full_mark_by_student_id_exam_id( $student_id ='', $exam_id='')
    {
      $this->db->select_sum('mark_total');
      $this->db->from('mark');
      $this->db->where('student_id',$student_id);
      $this->db->where('exam_id',$exam_id);
      $query = $this->db->get();
      return $query->row()->mark_total;
    }
    public function get_exam_full_mark_by_subject_id_exam_id( $subject_id ='', $exam_id='')
    {
      $this->db->select('*');
      $this->db->from('exam_details');
      $this->db->where('subject_id',$subject_id);
      $this->db->where('exam_id',$exam_id);
      $query = $this->db->get();
      return $query->row()->total_marks;
    }
}
