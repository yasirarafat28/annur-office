<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class students extends CI_Controller {

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

        $session_id=     $this->setting->current_session_id();

        if ($this->input->get('class_id')) {


            $this->db->select('*,class.name as class_name');
            $this->db->from('student');
            $this->db->join('class','class.class_id=student.class_id');
            $this->db->where('student.session_id',$session_id);
            $this->db->where('student.class_id',$this->input->get('class_id'));
            $students = $this->db->get()->result_array();
        }
        else
        {
            //$students       =     $this->db->get('student')->result_array();

            $this->db->select('*,class.name as class_name');
            $this->db->from('student');
            $this->db->join('class','class.class_id=student.class_id');
            $this->db->where('student.session_id',$session_id);
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
            'students'         =>     $this->db->get('student')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
        ];


        $this->load->view('admin/student/create',$data);

    }


    public function store() 
    {
        if ($this->input->post()) {

            $data=$this->input->post();
            $data['session_id']=$this->setting->current_session_id();

            if($this->db->insert('student',$data))
                {

                    $this->session->set_flashdata('success', 'Student Created Successfully');
                }
            else
                {
                    $this->session->set_flashdata('error', 'Something Went Wrong.');

                }

            {

                redirect('admin/students');
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

            
        }

        if ($this->db->update('student',$data,array('student_id'=>$id))) 
            {
                $this->session->set_flashdata('success', 'Student Updated Successfully');
                # code...
            }
        else
            {
                $this->session->set_flashdata('error', 'Something Went Wrong.');

            }

        redirect('admin/students','page_message');


}

public function show($id='') {

        if ($id!='') {
            $student         =     $this->db->get_where('student',array('student_id' => $id))->result_array();
        }
        else
        {
            $student=  '';
        }


        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'view Student',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
            'student'         =>      $student
        ];


        $this->load->view('admin/student/show',$data);

    }
    public function delete($id= '')
    {
        $this->db->delete('student', array('student_id' => $id)); 
        $this->session->set_flashdata('success', 'Student Deleted Successfully');   


            redirect('admin/students');
   
    }


    public function get_student_list_by_class()
    {

        if ($this->input->post()) 
        {
            $class_id   =   $this->input->post('class_id');

            $students=  $this->db->get_where('student',array('class_id'=>$class_id))->result_array();
            foreach ($students as $row) {
            ?>
            <option value=" <?php echo $row['student_id']; ?>"> <?php echo $row['name_bangla']; ?></option>

<?php
            }

        }
        else
        {
            echo '';
        }

    }


}
