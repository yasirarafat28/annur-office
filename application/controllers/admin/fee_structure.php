<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class fee_structure extends CI_Controller {

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

        $this->db->select('*,student.name_bangla as student_name,class.name as class_name');
        $this->db->from('fee_structure');
        $this->db->join('student','student.student_id=fee_structure.student_id');
        $this->db->join('class','student.class_id=class.class_id');
        $stuctures = $this->db->get()->result_array();

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Fee Stucture',

            'classes'        =>     $this->db->get('class')->result_array(),
            'stuctures'        =>     $stuctures,
        ];

        $this->load->view('admin/fee_structure/index',$data);
    }


    public function create()
    {
        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'New Fee Stucture',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
        ];


        $this->load->view('admin/fee_structure/create',$data);

    }


    public function store() {
        if ($this->input->post()) 
        {   
            $this->form_validation->set_rules('student_id', 'Student', 'required'); 

            //check duplicate

            $this->db->select('*');
            $this->db->from('fee_structure');
            $this->db->where('student_id', $this->input->post('student_id'));
            $row_num = $this->db->get()->num_rows(); 

            if ($row_num>0) {
                $this->session->set_flashdata('warning', 'Duplicate Entry Found');
                redirect('admin/fee_structure');
            }

            $data   =   $this->input->post();
            $data['status']   =  1;
            $data['session_id']   = $this->setting->current_session_id();;

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/fee_structure');
            }
            else
            {
                if($this->db->insert('fee_structure',$data))
                {
                    $this->session->set_flashdata('success', 'Fee Structure Created Successfully');

                    redirect('admin/fee_structure');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                    redirect('admin/fee_structure');
                }

            }
        }

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
            'page_name'       =>    'Edit Fee Stucture',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
            'student'         =>      $student
        ];


        $this->load->view('admin/fee_structure/edit',$data);

    }



    public function update($id='') {

        if ($id!='') {
            $this->form_validation->set_rules('student_id', 'Student', 'required'); 



            $data   =   $this->input->post();
            $data['updated_at']   =  date("Y-m-d h:i:s");


            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/fee_structure');
            }

            if ($this->db->update('fee_structure',$data,array('fee_structure_id'=>$id))) {
                $this->session->set_flashdata('success', 'Fee Structure Updated Successfully');
                redirect('admin/fee_structure');
            }
            else{
                $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admin/fee_structure');
            }
        }
        else{

            $this->session->set_flashdata('warning', 'No Structure ID Selected');
            redirect('admin/fee_structure');
        }
    }


    public function delete($id= '')
    {
        if($this->db->delete('fee_structure', array('fee_structure_id' => $id)))
        {
            $this->session->set_flashdata('success', 'Fee Structure Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Could Not Delete');
        }
        redirect('admin/fee_structure');
    }


}
