<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class setting extends CI_Model {

    function __construct() {

        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session');
    }
    
    function current_session_id() {
      $setting  =   $this->db->get_where('setting')->result_array();
      $session_id =  false;
      foreach ($setting as $item) {
        $session_id   = $item['session_id'];
      }
        return $session_id;        
    }

    function current_setting_name() {
      $setting  =   $this->db->get_where('setting')->result_array();
      $session_id =  false;
      foreach ($setting as $item) {
        $session_id   = $item['system_name'];
      }
        return $session_id;        
    }
    function current_setting_title() {
      $setting  =   $this->db->get_where('setting')->result_array();
      $title =  false;
      foreach ($setting as $item) {
        $title   = $item['system_title'];
      }
        return $title;        
    }
    function current_setting_email() {
      $setting  =   $this->db->get_where('setting')->result_array();
      $email =  false;
      foreach ($setting as $item) {
        $email   = $item['email'];
      }
        return $email;        
    }
    function current_setting_phone() {
      $setting  =   $this->db->get_where('setting')->result_array();
      $phone =  false;
      foreach ($setting as $item) {
        $phone   = $item['phone'];
      }
        return $phone;        
    }
    function current_setting_address() {
      $setting  =   $this->db->get_where('setting')->result_array();
      $address =  false;
      foreach ($setting as $item) {
        $address   = $item['address'];
      }
        return $address;        
    }
    function current_setting_logo() {
      $setting  =   $this->db->get_where('setting')->result_array();
      $logo =  false;
      foreach ($setting as $item) {
        $logo   = $item['logo'];
      }
        return $logo;        
    }
}
