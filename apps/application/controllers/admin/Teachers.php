<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teachers extends CI_Controller {

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

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Teachers',

            'teachers'         =>     $this->db->get('teacher')->result_array(),
        ];

        $this->load->view('admin/teacher/index',$data);
    }


    public function create()
    {
        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'New teacher',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
        ];


        $this->load->view('admin/teacher/create',$data);

    }


    public function store($id=  '') {
        if ($this->input->post()) {


                $edu_qualification_1=$_POST['e_qualification'][0]."=>".$_POST['e_year'][0]."=>".$_POST['e_institute'][0]."=>".$_POST['e_board'][0]."=>".$_POST['e_result'][0];
                $edu_qualification_2=$_POST['e_qualification'][1]."=>".$_POST['e_year'][1]."=>".$_POST['e_institute'][1]."=>".$_POST['e_board'][1]."=>".$_POST['e_result'][1];
                $edu_qualification_3=$_POST['e_qualification'][2]."=>".$_POST['e_year'][2]."=>".$_POST['e_institute'][2]."=>".$_POST['e_board'][2]."=>".$_POST['e_result'][2];
                $edu_qualification_4=$_POST['e_qualification'][3]."=>".$_POST['e_year'][3]."=>".$_POST['e_institute'][3]."=>".$_POST['e_board'][3]."=>".$_POST['e_result'][3];
                $edu_qualification_5=$_POST['e_qualification'][4]."=>".$_POST['e_year'][4]."=>".$_POST['e_institute'][4]."=>".$_POST['e_board'][4]."=>".$_POST['e_result'][4];
                
                
                $experience_1=$_POST['exp_designation'][0]."=>".$_POST['exp_institute'][0]."=>".$_POST['exp_duration'][0];
                $experience_2=$_POST['exp_designation'][1]."=>".$_POST['exp_institute'][1]."=>".$_POST['exp_duration'][1];
                $experience_3=$_POST['exp_designation'][2]."=>".$_POST['exp_institute'][2]."=>".$_POST['exp_duration'][2];
                $experience_4=$_POST['exp_designation'][3]."=>".$_POST['exp_institute'][3]."=>".$_POST['exp_duration'][3];
                $experience_5=$_POST['exp_designation'][4]."=>".$_POST['exp_institute'][4]."=>".$_POST['exp_duration'][4];

            $data=[
                'name' => $this->input->post('name'),
                'designation' => $this->input->post('designation'),
                'birthday' => $this->input->post('birthday'),
                'gender' => $this->input->post('gender'),
                'blood_group' => $this->input->post('blood_group'),
                'phone' => $this->input->post('phone'),
                'present_address' => $this->input->post('present_address'),
                'email' => $this->input->post('email'),
                'father' => $this->input->post('father'),
                'mother' => $this->input->post('mother'),
                'permanent_address' => $this->input->post('permanent_address'),
                'nid' => $this->input->post('nid'),
                'marital_status' => $this->input->post('marital_status'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'photo' => $this->input->post('photo'),

                'edu_qualification_1' => $edu_qualification_1,
                'edu_qualification_2' => $edu_qualification_2,
                'edu_qualification_3' => $edu_qualification_3,
                'edu_qualification_4' => $edu_qualification_4,
                'edu_qualification_5' => $edu_qualification_5,
                
                'experience_1' => $experience_1,
                'experience_2' => $experience_2,
                'experience_3' => $experience_3,
                'experience_4' => $experience_4,
                'experience_5' => $experience_5,
                
                

            ];
            

            


            if  ($this->db->insert('teacher',$data))
            {

                $this->session->set_flashdata('success', 'Teacher Created Successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Something Went Wrong.');

            }

            redirect('admin/teachers');
        }

    }


    public function edit($id='') {

        if ($id!='') {
            $teacher         =     $this->db->get_where('teacher',array('teacher_id' => $id))->result_array();
        }
        else
        {
            $teacher=  '';
        }


        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Edit Teacher',

            'teacher'         =>      $teacher
        ];


        $this->load->view('admin/teacher/edit',$data);

    }


public function update($id='') {

        if ($id!='') {

                $edu_qualification_1=$_POST['e_qualification'][0]."=>".$_POST['e_year'][0]."=>".$_POST['e_institute'][0]."=>".$_POST['e_board'][0]."=>".$_POST['e_result'][0];
                $edu_qualification_2=$_POST['e_qualification'][1]."=>".$_POST['e_year'][1]."=>".$_POST['e_institute'][1]."=>".$_POST['e_board'][1]."=>".$_POST['e_result'][1];
                $edu_qualification_3=$_POST['e_qualification'][2]."=>".$_POST['e_year'][2]."=>".$_POST['e_institute'][2]."=>".$_POST['e_board'][2]."=>".$_POST['e_result'][2];
                $edu_qualification_4=$_POST['e_qualification'][3]."=>".$_POST['e_year'][3]."=>".$_POST['e_institute'][3]."=>".$_POST['e_board'][3]."=>".$_POST['e_result'][3];
                $edu_qualification_5=$_POST['e_qualification'][4]."=>".$_POST['e_year'][4]."=>".$_POST['e_institute'][4]."=>".$_POST['e_board'][4]."=>".$_POST['e_result'][4];
                
                
                $experience_1=$_POST['exp_designation'][0]."=>".$_POST['exp_institute'][0]."=>".$_POST['exp_duration'][0];
                $experience_2=$_POST['exp_designation'][1]."=>".$_POST['exp_institute'][1]."=>".$_POST['exp_duration'][1];
                $experience_3=$_POST['exp_designation'][2]."=>".$_POST['exp_institute'][2]."=>".$_POST['exp_duration'][2];
                $experience_4=$_POST['exp_designation'][3]."=>".$_POST['exp_institute'][3]."=>".$_POST['exp_duration'][3];
                $experience_5=$_POST['exp_designation'][4]."=>".$_POST['exp_institute'][4]."=>".$_POST['exp_duration'][4];

            $data=[
                'name' => $this->input->post('name'),
                'designation' => $this->input->post('designation'),
                'birthday' => $this->input->post('birthday'),
                'gender' => $this->input->post('gender'),
                'blood_group' => $this->input->post('blood_group'),
                'phone' => $this->input->post('phone'),
                'present_address' => $this->input->post('present_address'),
                'email' => $this->input->post('email'),
                'father' => $this->input->post('father'),
                'mother' => $this->input->post('mother'),
                'permanent_address' => $this->input->post('permanent_address'),
                'nid' => $this->input->post('nid'),
                'marital_status' => $this->input->post('marital_status'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'photo' => $this->input->post('photo'),

                'edu_qualification_1' => $edu_qualification_1,
                'edu_qualification_2' => $edu_qualification_2,
                'edu_qualification_3' => $edu_qualification_3,
                'edu_qualification_4' => $edu_qualification_4,
                'edu_qualification_5' => $edu_qualification_5,
                
                'experience_1' => $experience_1,
                'experience_2' => $experience_2,
                'experience_3' => $experience_3,
                'experience_4' => $experience_4,
                'experience_5' => $experience_5,
                'updated_at' => date("Y-m-d h:i:s"),
            ];

            
        }


            if ($this->db->update('teacher',$data,array('teacher_id'=>$id))) {
                $this->session->set_flashdata('success', 'Teacher Updated Successfully');
                # code...
            }
            else
            {
                $this->session->set_flashdata('error', 'Something Went Wrong.');

            }
        
        redirect('admin/teachers','page_message');


}


public function show($id='') {

        if ($id!='') {
            $teacher         =     $this->db->get_where('teacher',array('teacher_id' => $id))->result_array();
        }
        else
        {
            $teacher=  '';
        }


        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'view Teacher',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
            'teacher'         =>      $teacher
        ];


        $this->load->view('admin/teacher/show',$data);

    }




    public function delete($id= '')
    {
        $this->db->delete('teacher', array('teacher_id' => $id)); 
        $this->session->set_flashdata('success', 'Teacher Deleted Successfully');
            redirect('admin/teachers');
   
    }


}
