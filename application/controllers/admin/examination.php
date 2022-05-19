<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class examination extends CI_Controller {

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



        $this->db->select('*,class.name as class_name');
        $this->db->from('exam');
        $this->db->join('class','exam.class_id=class.class_id');
       // $this->db->where('exam.session_id', $this->setting->current_session_id() );
        $this->db->where('exam.status', 1);
        $examinations = $this->db->get()->result_array();


        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Examination',

            'examinations'        =>     $examinations,
        ];

        $this->load->view('admin/examination/index',$data);
    }


    public function create()
    {
        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'New Examination',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
        ];


        $this->load->view('admin/examination/create',$data);

    }


    public function store() {
        if ($this->input->post()) 
        {   
            $this->form_validation->set_rules('title', 'Title', 'required'); 
            
            $exam['title']  =   $this->input->post('title');
            $exam['description']  =   $this->input->post('description');
            $exam['class_id']  =   $this->input->post('class_id');
            $exam['status']   =  1;
            $exam['session_id']   = $this->setting->current_session_id();

            if ($this->db->insert('exam',$exam)) {
                $exam_id    =   $this->db->insert_id();

                $all_subject_id=$this->input->post('subject_id');
                $all_exam_date=$this->input->post('exam_date');
                $all_exam_duration=$this->input->post('exam_duration');
                $all_total_mark=$this->input->post('total_mark');
                $all_pass_mark=$this->input->post('pass_mark');

                for ($i=0; $i < count($all_subject_id); $i++) {

                    $data['exam_id']    =   $exam_id;
                    $data['subject_id']    =   $all_subject_id[$i];
                    $data['exam_date']    =   $all_exam_date[$i];
                    $data['exam_duration']    =   $all_exam_duration[$i];
                    $data['total_marks']    =   $all_total_mark[$i];
                    $data['pass_marks']    =   $all_pass_mark[$i];

                    $data['status']= 1;
                    $data['session_id']   = $this->setting->current_session_id();

                    if (empty($all_exam_date[$i]) && empty($all_total_mark[$i])) {
                        continue;
                    }

                    $record_id= $this->db->insert('exam_details',$data);
                }

                $this->session->set_flashdata('success', 'Examination Created Successfully');

                redirect('admin/examination');
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
            'page_name'       =>    'Edit Examination',

            'classes'         =>     $this->db->get('class')->result_array(),
            'student'         =>     $student,
        ];


        $this->load->view('admin/examination/edit',$data);



    }



    public function update($id='') {


    }

    public function show($id='')
    {

        if ($id!='') {

            $this->db->select('*,class.name as class_name');
            $this->db->from('exam');
            $this->db->join('class','exam.class_id=class.class_id');
            $this->db->where('exam.exam_id', $id);
            $examination = $this->db->get()->result_array();

            $this->db->select('*,subject.name as subject_name');
            $this->db->from('exam_details');
            $this->db->join('subject','exam_details.subject_id=subject.subject_id');
            $this->db->where('exam_details.exam_id', $id);
            $examination_details = $this->db->get()->result_array();

            //$examination_details         =     $this->db->get_where('exam_details',array('exam_id' => $id))->result_array();
        }
        else
        {
            $examination=  '';
            $examination_details=  '';
        }

        $data=  [
            'panel_name'            =>  'Admin',
            'page_name'             =>    'View Examination',

            'examination'           =>     $examination,
            'examination_details'   =>     $examination_details,
        ];


        $this->load->view('admin/examination/show',$data);
    }


    public function delete($id= '')
    {
        if($this->db->delete('exam', array('exam_id' => $id)))
        {
            $this->session->set_flashdata('success', 'Class Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Could Not Delete');
        }
        redirect('admin/classes');
    }


}
