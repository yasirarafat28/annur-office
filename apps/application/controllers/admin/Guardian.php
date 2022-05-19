<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guardian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session'); 
        $this->load->library('form_validation');
        session_start();
        $this->load->model('login');
        $this->login->not_logged_redirect();
        $this->load->model('setting');
        $this->load->model('student_model');

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

        $guardians       =     $this->db->get('parent')->result_array();

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Guardian',

            'guardians'        =>     $guardians,
        ];

        $this->load->view('admin/guardian/index',$data);
    }


    public function create()
    {
        

    }


    public function store() {
        if ($this->input->post()) 
        {   
            $this->form_validation->set_rules('name', 'Name', 'required');      
            $this->form_validation->set_rules('phone', 'Phone', 'required');      

            $data   =   $this->input->post();
            $data['status']   =  1;
            $data['session_id']   = $this->setting->current_session_id();

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/guardian');
            }
            else
            {
                if($this->db->insert('parent',$data))
                {
                    $this->session->set_flashdata('success', 'Guardian Created Successfully');

                    redirect('admin/guardian');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                    redirect('admin/guardian');
                }

            }
        }

        redirect('admin/dashboard');

    }


    public function edit($id='') {


    }



    public function update($id='') {

        if ($id!='') {

            $data   =   $this->input->post();
            $data['updated_at']   =  date("Y-m-d h:i:s");



            $this->form_validation->set_rules('name', ' Name', 'required');              
            $this->form_validation->set_rules('phone', 'Phone', 'required'); 

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/guardian');
            }

            if ($this->db->update('parent',$data,array('parent_id'=>$id))) {
                $this->session->set_flashdata('success', 'Guardian Updated Successfully');
                redirect('admin/guardian');
            }
            else{
                $this->session->set_flashdata('error', 'Guardian Went Wrong');
                redirect('admin/guardian');
            }
        }
        else{

            $this->session->set_flashdata('warning', 'No Class ID Selected');
            redirect('admin/classes');
        }
    }


    public function delete($id= '')
    {
        if($this->db->delete('parent', array('parent_id' => $id)))
        {
            $this->session->set_flashdata('success', 'Guardian Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Could Not Delete');
        }
        redirect('admin/guardian');
    }


}
