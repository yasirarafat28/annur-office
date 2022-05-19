<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user extends CI_Controller {

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

        $users       =     $this->db->get('admin')->result_array();

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Users',

            'users'        =>     $users,
        ];

        $this->load->view('admin/user/index',$data);
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
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admin.email]');      
            $this->form_validation->set_rules('username', 'UserName', 'required||is_unique[admin.username]');      
            $this->form_validation->set_rules('password', 'Password', 'required|min[6]');      

            $data   =   $this->input->post();
            $data['status']   =  1;
            $data['session_id']   = $this->setting->current_session_id();

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/user');
            }
            else
            {
                if($this->db->insert('admin',$data))
                {

                    $this->session->set_flashdata('success', 'User Created Successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Something Went Wrong.');

                }

                redirect('admin/user');

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

            if ($this->db->update('admin',$data,array('admin_id'=>$id))) {
                $this->session->set_flashdata('success', 'User Updated Successfully');
                # code...
            }
            else
            {
                $this->session->set_flashdata('error', 'Something Went Wrong.');

            }
        }

        redirect('admin/user','page_message');
    }


    public function delete($id= '')
    {
        $this->db->delete('admin', array('admin_id' => $id));
        $this->session->set_flashdata('success', 'User Deleted Successfully');

        redirect('admin/user');
    }


}
