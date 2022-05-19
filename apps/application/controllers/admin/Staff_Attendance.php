<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff_Attendance extends CI_Controller {

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

        $staffs   =   $this->db->get_where('teacher',array('status'=>1))->result_array();

        $classes       =     $this->db->get_where('class',array('status'=>1))->result_array();

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Teacher Attendance',

            'classes'        =>     $classes,
            'staffs'        =>     $staffs,
        ];

        $this->load->view('admin/staff_attendance/index',$data);
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

            $this->form_validation->set_rules('teacher_id', 'Student_id', 'required');

            $data= $this->input->post();
            $data['login_time']   =  date("Y-m-d H:i:s");
            $data['status']   =  1;
            $data['session_id']   = $this->setting->current_session_id();
            if ($this->db->insert('staff_attendance',$data)) {
                $this->session->set_flashdata('success', 'Teacher Attendance Successfully');
                redirect('admin/staff_attendance/');
            }
        }

        redirect('admin/dashboard');

    }


    public function edit($id='') {


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
