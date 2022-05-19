<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Model {

    function __construct() {

        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session');
    }
    
    function is_admin_logged() {
          if ($this->session->userdata('login_type')=='admin_login' &&  $this->session->userdata('login_status')  ==TRUE) {

              return TRUE;
            }

          return FALSE;
      }

    function not_logged_redirect() {
          if ($this->session->userdata('login_type')!='admin_login' &&  $this->session->userdata('login_status')  !=TRUE) {
            $data['message']  = 'You must login first';
            
              redirect('admin/login', $data);
            }
      }


    public function logged_user()
    {
      $admin_id = $this->session->userdata('admin_id');

      $this->db->select('*');
      $this->db->from('admin');
      $this->db->where('admin_id',$admin_id);
      $query = $this->db->get();
      return $query->row();
    }


}
