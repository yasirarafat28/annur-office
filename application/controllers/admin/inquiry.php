<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class inquiry extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('setting');
        session_start();
        $this->load->model('login');
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
            'page_name'       =>    'Inquiries',
            'inquiries'         =>     $this->db->get('inquiry')->result_array(),
        ];

        $this->load->view('admin/inquiry/index',$data);
    }

    public function delete($id= '')
    {
         
        if($this->db->delete('inquiry', array('id' => $id)))
        {
            $this->session->set_flashdata('success', 'Inquiry Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Could Not Delete');
        }
        redirect('admin/inquiry');
    }


}
