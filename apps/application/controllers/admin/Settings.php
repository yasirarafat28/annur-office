<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session');        
        $this->load->library('form_validation');
        session_start();
        $this->load->model('login');
        $this->load->model('setting');
        $this->setting->current_session_id();
        $this->login->not_logged_redirect();

    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    
    public function index() {
        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>  'Application Setting',

            'sessions'        => $this->db->get_where('session',array('status'=>1))->result_array(),
            'settings'        => $this->db->get_where('setting',array('status'=>1))->result_array(),
        ];

        $this->load->view('admin/setting',$data);
    }


    public function update($id='') {

        if ($id!='') {

            $data   =   $this->input->post();
            $data['updated_at']   =  date("Y-m-d h:i:s");

            if ($this->db->update('setting',$data,array('system_id'=>$id))) {
                $this->session->set_flashdata('success', 'Setting Updated Successfully');
                redirect('admin/dashboard');
            }
            else{
                $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admin/dashboard');
            }
        }
    }

    public function delete($id= '')
    {
        //$this->db->delete('session', array('session_id' => $id)); 
    }


}
