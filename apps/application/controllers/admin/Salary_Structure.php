<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Salary_Structure extends CI_Controller {

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

        $this->db->select('*,teacher.name as teacher_name');
        $this->db->from('staff_salary_structure');
        $this->db->join('teacher','teacher.teacher_id=staff_salary_structure.staff_id');
        
        $stuctures = $this->db->get()->result_array();

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Salary Structure',


            'teachers'         =>     $this->db->get('teacher')->result_array(),

            'stuctures'        =>     $stuctures,
        ];

        $this->load->view('admin/salary_structure/index',$data);
    }


    public function create()
    {


    }


    public function store() {
        if ($this->input->post()) 
        {   
            $this->form_validation->set_rules('basic_allowance', 'teacher', 'required');      

            $data   =   $this->input->post();
            $data['status']   =  1;
            $data['session_id']   = $this->setting->current_session_id();

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/salary_structure');
            }
            else
            {
                if($this->db->insert('staff_salary_structure',$data))
                {
                    $this->session->set_flashdata('success', 'Salary Structure Created Successfully');

                    redirect('admin/salary_structure');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                    redirect('admin/salary_structure');
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

            $this->form_validation->set_rules('basic_allowance', 'teacher', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/salary_structure');
            }

            if ($this->db->update('staff_salary_structure',$data,array('salary_structure_id'=>$id))) {
                $this->session->set_flashdata('success', 'Salary Structure Updated Successfully');
                redirect('admin/salary_structure');
            }
            else{
                $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admin/salary_structure');
            }
        }
        else{

            $this->session->set_flashdata('warning', 'No Salary Structure ID Selected');
            redirect('admin/salary_structure');
        }
    }


    public function delete($id= '')
    {
        if($this->db->delete('staff_salary_structure', array('salary_structure_id' => $id)))
        {
            $this->session->set_flashdata('success', 'Salary Structure Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Could Not Delete');
        }
        redirect('admin/salary_structure');
    }


}
