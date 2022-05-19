<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Routine extends CI_Controller {

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
        $this->load->model('routine_model');

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
        if ($this->input->get('class_id')  ) {
            $subjects   =   $this->db->get_where('subject',array('status'=>1,'class_id'=>$this->input->get('class_id')))->result_array();

        }
        else
        {
            $subjects   =   array();
        }

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Class Routine',

            'classes'        =>     $this->db->get_where('class',array('status'=>1))->result_array(),
            'subjects'        =>     $subjects,
        ];

        $this->load->view('admin/routine/index',$data);
    }


    public function create()
    {
        if ($this->input->get('class_id')  ) {
            $subjects   =   $this->db->get_where('subject',array('status'=>1,'class_id'=>$this->input->get('class_id')))->result_array();

        }
        else
        {
            $subjects   =   array();
        }

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Class Routine Setup',

            'classes'        =>     $this->db->get_where('class',array('status'=>1))->result_array(),
            'subjects'        =>     $subjects,
        ];

        $this->load->view('admin/routine/create',$data);

    }


    public function store() {
        if ($this->input->post()) 
        {   
            $class_id=$this->input->post('class_id');
            $all_subject_id=$this->input->post('subject_id');
            $all_day=$this->input->post('day');
            $all_fromtime=$this->input->post('fromtime');
            $all_totime=$this->input->post('totime');

            for ($i=0; $i < 7; $i++) {

                for ($j=0; $j < count($all_subject_id); $j++) {

                    if (!$all_fromtime[$i][$j] || !$all_totime[$i][$j]) {
                        continue;
                    }

                    $data['subject_id'] = $all_subject_id[$i][$j];
                    $data['time_start'] = $all_fromtime[$i][$j];
                    $data['time_end'] = $all_totime[$i][$j];
                    $data['day'] = $all_day[$i];
                    $data['class_id'] = $class_id;
                    $data['session_id']   = $this->setting->current_session_id();

                    $record_id= $this->db->insert('class_routine',$data);
                }

                
            }


            $this->session->set_flashdata('success', 'Routine Created Successfully');
            redirect('admin/routine/?class_id='.$class_id);

     
        }

        redirect('admin/dashboard');

    }


    public function edit($id='') {



    }



    public function update($id='') {


    }


    public function delete($id= '')
    {
        
    }


}
