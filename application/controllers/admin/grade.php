<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class grade extends CI_Controller {

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
            'page_name'       =>    'Grades',
            'grades'         =>     $this->db->get('grade')->result_array(),
        ];

        $this->load->view('admin/grade/index',$data);
    }


    public function create()
    {


    }


    public function store($id=  '') {
        if ($this->input->post()) {

            $this->form_validation->set_rules('name', 'Student', 'required'); 
            $this->form_validation->set_rules('grade_point', 'Point', 'required|is_unique[grade.grade_point]'); 
            $this->form_validation->set_rules('mark_from', 'Mark From', 'required'); 
            $this->form_validation->set_rules('mark_upto', 'Mark Upto', 'required'); 



            $data   =   $this->input->post();
            $data['status']   =  1;
            $data['session_id']   = $this->setting->current_session_id();;

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/grade');
            }
            else
            {
                if($this->db->insert('grade',$data))
                {
                    $this->session->set_flashdata('success', 'Grade Created Successfully');
                    redirect('admin/grade');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                    redirect('admin/grade');
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

            if ($this->db->update('grade',$data,array('grade_id'=>$id))) 
            {
                $this->session->set_flashdata('success', 'Grade Updated Successfully');
                # code...
            }
            else
            {
                $this->session->set_flashdata('error', 'Something Went Wrong.');

            }
        }

        redirect('admin/grade','page_message');
    }

    public function delete($id= '')
    {
         
        if($this->db->delete('grade', array('grade_id' => $id)))
        {
            $this->session->set_flashdata('success', 'Grade Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Could Not Delete');
        }
        redirect('admin/grade');
    }


}
