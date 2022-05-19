<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Session extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session');        
        $this->load->library('form_validation');
        session_start();
        $this->load->model('login');
        $this->load->model('setting');
        //$this->setting->current_session_id();
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

        $sessions       =     $this->db->get('session')->result_array();

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Session',

            'sessions'        =>     $sessions,
        ];

        $this->load->view('admin/session/index',$data);
    }


    public function create()
    {


    }


    public function store() {
        if ($this->input->post()) 
        {            

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('session_from', 'Session From', 'required');
            $this->form_validation->set_rules('session_to', 'Session To', 'required');

            $data   =   $this->input->post();
            $data['status']   =  1;

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/session');
            }
            else
            {
                if($this->db->insert('session',$data))
                {
                    $this->session->set_flashdata('success', 'Session Created Successfully');

                    redirect('admin/session');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                    redirect('admin/session');
                }

            }
        }
    }


    public function edit($id='') {


    }


    public function update($id='') {

        if ($id!='') {

            $data   =   $this->input->post();
            $data['updated_at']   =  date("Y-m-d h:i:s");


            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('session_from', 'Session From', 'required');
            $this->form_validation->set_rules('session_to', 'Session To', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/session');
            }

            if ($this->db->update('session',$data,array('session_id'=>$id))) {
                $this->session->set_flashdata('warning', 'Session Updated Successfully');
                redirect('admin/session');
            }
            else{
                $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admin/session');
            }
        }
        else{

            $this->session->set_flashdata('warning', 'No Session ID Selected');
            redirect('admin/session');
        }
    }

    public function delete($id= '')
    {
        if($this->db->delete('session', array('session_id' => $id)))
        {
            $this->session->set_flashdata('success', 'Session Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Could Not Delete');
        }
        redirect('admin/session');
    }


}
