<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class tabulation extends CI_Controller {

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
        if ($this->input->get('class_id')   &&  $this->input->get('exam_id')   &&  $this->input->get('session_id')  ) {
            $students   =   $this->db->get_where('student',array('class_id'=>$this->input->get('class_id'),'status'=>1,'session_id'=>$this->setting->current_session_id()))->result_array();
            $subjects   =   $this->db->get_where('subject',array('status'=>1,'class_id'=>$this->input->get('class_id')))->result_array();

            $marks  =   
            $this->db->get_where('mark',array('session_id'=>$this->input->get('session_id')  ,   'class_id'=>$this->input->get('class_id')   ,   'exam_id'=>$this->input->get('exam_id')))->result_array();
        }
        else
        {
            $students   =   array();
            $subjects   =   array();
            $marks   =   array();
        }

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Tabulation Sheet',

            'classes'        =>     $this->db->get_where('class',array('status'=>1))->result_array(),
            'students'        =>     $students,
            'subjects'        =>     $subjects,
            'marks'        =>     $marks,
        ];

        $this->load->view('admin/tabulation',$data);
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
            $this->form_validation->set_rules('student_id', 'Student_id', 'required'); 


            $all_student_id=$this->input->post('student_id');
            $all_status=$this->input->post('status');

            for ($i=0; $i < count($all_student_id); $i++) {

                $data['student_id']= $all_student_id[$i];
                $data['status']= $all_status[$i];
                $data['class_id']=$this->input->post('class');
                $data['date']=date("Y-m-d");
                $data['session_id']   = $this->setting->current_session_id();

                $record_id= $this->db->insert('attendance',$data);
            }


            redirect('admin/student_attendence/?class_id='.$this->input->post('class_id'));

     
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

            $this->db->update('equipment_supplies',$data,array('equipment_id'=>$id));
            $page_message    =   'Entry Updated Successfully!';
        }

        redirect('admin/equipment','page_message');
    }


    public function delete($id= '')
    {
        $this->db->delete('equipment_supplies', array('equipment_id' => $id));
        $page_message    =   'Entry Updated Successfully!'; 

        redirect('admin/equipment','page_message');
    }


}
