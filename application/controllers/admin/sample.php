<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class sample extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session');
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

        if ($this->input->get('class_id')) {

            //$students       =     $this->db->get_where('student',array('class_id' => $this->input->get('class_id')))->result_array();


            $this->db->select('*,class.name as class_name');
            $this->db->from('student');
            $this->db->join('class','class.class_id=student.class_id');
            $this->db->where('student.class_id',$this->input->get('class_id'));
            $students = $this->db->get()->result_array();
        }
        else
        {
            //$students       =     $this->db->get('student')->result_array();

            $this->db->select('*,class.name as class_name');
            $this->db->from('student');
            $this->db->join('class','class.class_id=student.class_id');
            $students = $this->db->get()->result_array();
        }

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Students',

            'students'        =>     $students,
            'classes'         =>     $this->db->get('class')->result_array(),
        ];

        $this->load->view('admin/student/index',$data);
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


    public function store($id=  '') {
        if ($this->input->post()) {
            

            if($this->db->insert('student',$this->input->post()))
            {

                redirect('admin/manage_rooms');
            }
        }

        redirect('admin/manage_rooms');


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

    public function delete($id= '')
    {
        $this->db->delete('table', array('id' => $id)); 
    }


}
