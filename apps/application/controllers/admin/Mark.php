<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mark extends CI_Controller {

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


        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Setup Mark',

            'classes'         =>     $this->db->get_where('class',array('status'=>1))->result_array(),
        ];


        $this->load->view('admin/mark/create',$data);
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
            $all_student_id=$this->input->post('student_id');
            $all_mark_obtained=$this->input->post('mark_obtained');
            $all_comment=$this->input->post('comment');

            for ($i=0; $i < count($all_student_id); $i++) {

                $data['class_id']    =   $this->input->post('class_id');
                $data['exam_id']    =   $this->input->post('exam_id');
                $data['subject_id']    =   $this->input->post('subject_id');
                $data['mark_total']    =   $this->mark_model->get_exam_full_mark_by_subject_id_exam_id($this->input->post('subject_id'), $this->input->post('exam_id'));

                $data['student_id']    =   $all_student_id[$i];
                $data['mark_obtained']    =   $all_mark_obtained[$i];
                $data['comment']    =   $all_comment[$i];

                $data['status']= 1;
                $data['session_id']   = $this->setting->current_session_id();

                if (empty($all_mark_obtained[$i])) {
                    continue;
                }

                //Checking Duplicate..
                $this->db->select('*');
                $this->db->from('mark');
                $this->db->where('student_id', $all_student_id[$i]);
                $this->db->where('exam_id', $this->input->post('exam_id'));
                $this->db->where('subject_id', $this->input->post('subject_id'));
                $row_num = $this->db->get()->num_rows(); 

                if ($row_num>0) {
                    continue;
                    $this->session->set_flashdata('warning', 'Duplicate Mark Entry Found');
                }
                //checking duplicate end


                $this->db->insert('mark',$data);
            }

            $this->session->set_flashdata('success', 'Marks Inserted Successfully');

            redirect('admin/tabulation?class_id='.$this->input->post('class_id').'&session_id='. $this->setting->current_session_id().'&exam_id='.$this->input->post('exam_id'));
        }

        redirect('admin/dashboard');

    }


    public function edit() {


        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Edit Mark',

            'classes'         =>     $this->db->get_where('class',array('status'=>1))->result_array(),
        ];


        $this->load->view('admin/mark/edit',$data);

    }



    public function update($id='') {
        if ($this->input->post()) 
        {   
            $all_mark_id        =   $this->input->post('mark_id');
            $all_mark_obtained  =   $this->input->post('mark_obtained');
            $all_comment        =   $this->input->post('comment');

            for ($i=0; $i < count($all_mark_id); $i++) {

                $data['mark_obtained']    =   $all_mark_obtained[$i];
                $data['comment']    =   $all_comment[$i];

                $data['updated_at']   = date("Y-m-d h:i:s");

                if (empty($all_mark_obtained[$i])) {
                    continue;
                }

                $this->db->update('mark',$data, array('mark_id'=>$all_mark_id[$i]));
            }

            redirect('admin/tabulation?class_id='.$this->input->post('class_id').'&session_id='. $this->setting->current_session_id().'&exam_id='.$this->input->post('exam_id'));
        }

        redirect('admin/dashboard');
    }


    public function delete($id= '')
    {
        $this->db->delete('transaction', array('transaction_id' => $id));
        $page_message    =   'Entry Updated Successfully!'; 

        redirect('admin/income','page_message');
    }


}
