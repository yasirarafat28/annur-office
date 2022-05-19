<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Classes extends CI_Controller {

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



            $this->db->select('*,class.name as class_name,teacher.name as teacher_name');
            $this->db->from('class');
            $this->db->join('teacher','class.teacher_id=teacher.teacher_id');
            $classes = $this->db->get()->result_array();


        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Class',

            'classes'       =>     $classes,
            'teachers'       =>     $this->db->get_where('teacher',array('status'=>1))->result_array(),
        ];

        $this->load->view('admin/class/index',$data);
    }


    public function create()
    {
        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'New Class',
        ];


        $this->load->view('admin/class/create',$data);

    }


    public function store() {
        if ($this->input->post()) 
        {   
            $this->form_validation->set_rules('name', 'Class Name', 'required');       
            $this->form_validation->set_rules('symbol', 'Symbol', 'required');         

            $data   =   $this->input->post();
            $data['status']   =  1;
            $data['session_id']   = $this->setting->current_session_id();

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/classes');
            }
            else
            {
                if($this->db->insert('class',$data))
                {
                    $this->session->set_flashdata('success', 'Class Created Successfully');

                    redirect('admin/classes');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                    redirect('admin/classes');
                }

            }
        }


    }


    public function edit($id) {

    }


    public function update($id='') {

        if ($id!='') {

            $this->form_validation->set_rules('name', 'Class Name', 'required');            
            $this->form_validation->set_rules('symbol', 'Symbol', 'required'); 

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/classes');
            }

            $data   =   $this->input->post();
            $data['updated_at']   =  date("Y-m-d h:i:s");

            if ($this->db->update('class',$data,array('class_id'=>$id))) {
                $this->session->set_flashdata('success', 'Class Updated Successfully');
                redirect('admin/classes');
            }
            else{
                $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admin/classes');
            }

        }
        else{

            $this->session->set_flashdata('warning', 'No Class ID Selected');
            redirect('admin/classes');
        }
    }





    public function delete($id= '')
    {
        if($this->db->delete('class', array('class_id' => $id)))
        {
            $this->session->set_flashdata('success', 'Class Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Could Not Delete');
        }
        redirect('admin/classes');
    }

}
