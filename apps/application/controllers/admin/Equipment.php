<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Equipment extends CI_Controller {

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
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    
    public function index() {

        $equipments       =     $this->db->get('equipment_supplies')->result_array();

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Equipment',

            'equipments'        =>     $equipments,
        ];

        $this->load->view('admin/equipment/index',$data);
    }


    public function create()
    {
        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'New Student',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
        ];


        $this->load->view('admin/student/create',$data);

    }


    public function store() {
        if ($this->input->post()) 
        {   
            $this->form_validation->set_rules('name', 'Name', 'required');      

            $data   =   $this->input->post();
            $data['status']   =  1;
            $data['session_id']   = $this->setting->current_session_id();;

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/equipment');
            }
            else
            {
                if($this->db->insert('equipment_supplies',$data))
                {
                    $this->session->set_flashdata('success', 'Equipment Created Successfully');
                    redirect('admin/equipment');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                }

            }
        }

        redirect('admin/dashboard');

    }


    public function edit($id='') {

        if ($id!='') {
            $student         =     $this->db->get_where('student',array('student_id' => $id))->result_array();
        }
        else
        {
            $student=  '';
        }


        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Edit Student',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
            'student'         =>      $student
        ];


        $this->load->view('admin/student/edit',$data);

    }



    public function update($id='') {

        if ($id!='') {

            $data   =   $this->input->post();
            $data['updated_at']   =  date("Y-m-d h:i:s");

            if($this->db->update('equipment_supplies',$data,array('equipment_id'=>$id)))
            {
                $this->session->set_flashdata('success', 'Equipment Updated Successfully');
                redirect('admin/equipment');
            }
            else{
                $this->session->set_flashdata('error', 'Something Went Wrong');
            }
        }
        else{

            $this->session->set_flashdata('warning', 'No Equipment ID Selected');
            redirect('admin/equipment');
        }
    }


    public function delete($id= '')
    {
        if($this->db->delete('equipment_supplies', array('equipment_id' => $id)))
        {
            $this->session->set_flashdata('success', 'Equipment Deleted Successfully');

            redirect('admin/equipment');
        }
        else{
            $this->session->set_flashdata('error', 'Something Went Wrong');

            redirect('admin/equipment');
        }
    }


}
