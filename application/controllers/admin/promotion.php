<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class promotion extends CI_Controller {

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
        $this->load->model('mark_model');
        $this->load->model('class_model');

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
    public function all_by_one()
    {

    }
    public function one_by_one()
    {
        if ($this->input->post()) {
            
            $session_id=$this->input->post('session_id');

            $all_student_id=$this->input->post('student_id');
            $all_promote=$this->input->post('promote');
            $all_class_id = $this->input->post('class_id');

            for ($i=0; $i < count($all_student_id); $i++) {

                if ($all_promote[$i] != 1) {
                    continue;
                }

                //Fetch Student Data
                $this->db->select('*');
                $this->db->from('student');
                $this->db->where('student_id', $all_student_id[$i]);
                $query = $this->db->get();
                $student_data =    $query->row();

                //Insert New Student
                $data=  [
                    'name_english'          => $student_data->name_english,
                    'birthday'              => $student_data->birthday,
                    'gender'                => $student_data->gender,
                    'religion'              => $student_data->religion,
                    'blood'                 => $student_data->blood,
                    'present_address'       => $student_data->present_address,
                    'phone'                 => $student_data->phone,
                    'email'                 => $student_data->email,
                    'password'              => $student_data->password,
                    'father_name'           => $student_data->father_name,
                    'mother_name'           => $student_data->mother_name,
                    'section_id'            => $student_data->section_id,
                    'parent_id'             => $student_data->parent_id,
                    'roll'                  => $student_data->roll,
                    'transport_id'          => $student_data->transport_id,
                    'dormitory_id'          => $student_data->dormitory_id,
                    'dormitory_room_number' => $student_data->dormitory_room_number,
                    'photo'                 => $student_data->photo,
                    'addmission_date'       => $student_data->addmission_date,
                    'responsible_teacher'   => $student_data->responsible_teacher,
                    'name_bangla'           => $student_data->name_bangla,
                    'nid'                   => $student_data->nid,
                    'permanent_address'     => $student_data->permanent_address,
                    'birth_registration'    => $student_data->birth_registration,

                    'session_id' => $session_id,
                    'promote' => 0,                    
                    'class_id' => $all_class_id[$i],
                ];
                $this->db->insert('student',$data);


                //Set Previous as Promoted
                $update_prv['promote']   = 1;
                $this->db->update('student',$update_prv,array('student_id'=>$all_student_id[$i]));


            }
            $this->session->set_flashdata('success', 'Promoted Successfully');
            redirect('admin/promotion/one_by_one');
        }
        else
        {

            if ($this->input->get('class_id')   &&  $this->input->get('exam_id')   &&  $this->input->get('session_id')  ) {
                $students   =   $this->db->get_where('student',array('class_id'=>$this->input->get('class_id'),'status'=>1,'session_id'=>$this->setting->current_session_id(),'promote' => 0))->result_array();
            }
            else
            {
                $students   =   array();
            }

            $data=  [
                'panel_name'      =>  'Admin',
                'page_name'       =>    'One by One Promotion',

                'classes'        =>     $this->db->get_where('class',array('status'=>1))->result_array(),
                'students'        =>     $students,
            ];

            $this->load->view('admin/promotion/one-by-one',$data);

        }

    }

    public function bulk_promotion()
    {
        if ($this->input->post()) {
            
            $session_id=$this->input->post('session_id');
            $dest_class_id=$this->input->post('dest_class_id');

            $all_student_id=$this->input->post('student_id');
            $all_promote=$this->input->post('promote');

            for ($i=0; $i < count($all_student_id); $i++) {

                if ($all_promote[$i] != 1) {
                    continue;
                }

                //Fetch Student Data
                $this->db->select('*');
                $this->db->from('student');
                $this->db->where('student_id', $all_student_id[$i]);
                $query = $this->db->get();
                $student_data =    $query->row();

                //Insert New Student
                $data=  [
                    'name_english'          => $student_data->name_english,
                    'birthday'              => $student_data->birthday,
                    'gender'                => $student_data->gender,
                    'religion'              => $student_data->religion,
                    'blood'                 => $student_data->blood,
                    'present_address'       => $student_data->present_address,
                    'phone'                 => $student_data->phone,
                    'email'                 => $student_data->email,
                    'password'              => $student_data->password,
                    'father_name'           => $student_data->father_name,
                    'mother_name'           => $student_data->mother_name,
                    'section_id'            => $student_data->section_id,
                    'parent_id'             => $student_data->parent_id,
                    'roll'                  => $student_data->roll,
                    'transport_id'          => $student_data->transport_id,
                    'dormitory_id'          => $student_data->dormitory_id,
                    'dormitory_room_number' => $student_data->dormitory_room_number,
                    'photo'                 => $student_data->photo,
                    'addmission_date'       => $student_data->addmission_date,
                    'responsible_teacher'   => $student_data->responsible_teacher,
                    'name_bangla'           => $student_data->name_bangla,
                    'nid'                   => $student_data->nid,
                    'permanent_address'     => $student_data->permanent_address,
                    'birth_registration'    => $student_data->birth_registration,

                    'session_id' => $session_id,
                    'promote' => 0,                    
                    'class_id' => $dest_class_id,
                ];
                $this->db->insert('student',$data);


                //Set Previous as Promoted
                $update_prv['promote']   = 1;
                $this->db->update('student',$update_prv,array('student_id'=>$all_student_id[$i]));


            }
            
            $this->session->set_flashdata('success', 'Promoted Successfully');

            redirect('admin/promotion/bulk_promotion');
        }
        else
        {


            if ($this->input->get('class_id')   &&  $this->input->get('exam_id')   &&  $this->input->get('session_id')  ) {
                $students   =   $this->db->get_where('student',array('class_id'=>$this->input->get('class_id'),'status'=>1,'session_id'=>$this->setting->current_session_id(),'promote' => 0))->result_array();
            }
            else
            {
                $students   =   array();
            }

            $data=  [
                'panel_name'      =>  'Admin',
                'page_name'       =>    'Bulk Promotion',

                'classes'        =>     $this->db->get_where('class',array('status'=>1))->result_array(),
                'students'        =>     $students,
            ];

            $this->load->view('admin/promotion/bulk-promotion',$data);

        }

    }
    
    public function index() {

        redirect('admin/promotion/bulk_promotion');
    }

}
