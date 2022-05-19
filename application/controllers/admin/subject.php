<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class subject extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session');
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

        if ($this->input->get('class_id')) {

            $this->db->select('*,class.name as class_name,teacher.name as teacher_name,subject.name as subject_name');
            $this->db->from('subject');
            $this->db->join('teacher','subject.teacher_id=teacher.teacher_id');
            $this->db->join('class','class.class_id=subject.class_id');
            $this->db->where('subject.class_id',$this->input->get('class_id'));
            $subjects = $this->db->get()->result_array();
        }
        else
        {
            
            $this->db->select('*,class.name as class_name,teacher.name as teacher_name,subject.name as subject_name');
            $this->db->from('subject');
            $this->db->join('teacher','subject.teacher_id=teacher.teacher_id');
            $this->db->join('class','class.class_id=subject.class_id');
            $subjects = $this->db->get()->result_array();
        }

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Subjects',

            'subjects'         =>     $subjects,
            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
        ];

        $this->load->view('admin/subject/index',$data);
    }


    public function create()
    {
        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Add New Subject',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
        ];


        $this->load->view('admin/subject/create',$data);

    }


    public function store() {
        if ($this->input->post()) {
            
            
            if($this->db->insert('subject',$this->input->post()))
                {

                    $this->session->set_flashdata('success', 'Subject Created Successfully');
                }
            else
                {
                    $this->session->set_flashdata('error', 'Something Went Wrong.');

                }

                redirect('admin/subject');
        }

      


    }



public function update($id='') {

        if ($id!='') {

            $data   =   $this->input->post();
            $data['updated_at']   =  date("Y-m-d h:i:s");

            
        }

        if ($this->db->update('subject',$data,array('subject_id'=>$id))) 
            {
                $this->session->set_flashdata('success', 'Subject Updated Successfully');
                # code...
            }
        else
            {
                $this->session->set_flashdata('error', 'Something Went Wrong.');

            }

        redirect('admin/subject','page_message');


}


    public function delete($id= '')
    {
        $this->db->delete('subject', array('subject_id' => $id));
        $this->session->set_flashdata('success', 'Subject Deleted Successfully');


        redirect('admin/subject','page_message'); 
    }


}
