<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class salary_payment extends CI_Controller {

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

        $this->db->select('*,teacher.name as teacher_name');
        $this->db->from('staff_payment');
        $this->db->join('teacher','teacher.teacher_id=staff_payment.staff_id');
        
        $payments = $this->db->get()->result_array();

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Salary Payment',


            'teachers'         =>     $this->db->get('teacher')->result_array(),

            'payments'        =>     $payments,
        ];

        $this->load->view('admin/salary_payment/index',$data);
    }


    public function create()
    {
        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'New Fee Stucture',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
        ];


        $this->load->view('admin/fee_structure/create',$data);

    }


    public function store() {
        if ($this->input->post()) 
        {   
            $this->form_validation->set_rules('basic', 'Basic', 'required');      

            $data   =   $this->input->post();
            $data['status']   =  1;
            $data['session_id']   = $this->setting->current_session_id();

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/salary_payment');
            }
            else
            {
                if($this->db->insert('staff_payment',$data))
                {
                    $this->session->set_flashdata('success', 'Notice Created Successfully');

                    redirect('admin/salary_payment');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                    redirect('admin/salary_payment');
                }

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
            'page_name'       =>    'Edit Fee Stucture',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
            'student'         =>      $student
        ];


        $this->load->view('admin/fee_structure/edit',$data);

    }



    public function update($id='') {

        if ($id!='') {

            $data   =   $this->input->post();
            $data['updated_at']   =  date("Y-m-d h:i:s");

            $this->form_validation->set_rules('basic', 'Basic', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/salary_payment');
            }

            if ($this->db->update('staff_payment',$data,array('payment_id'=>$id))) {
                $this->session->set_flashdata('success', 'Payment Updated Successfully');
                redirect('admin/salary_payment');
            }
            else{
                $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admin/salary_payment');
            }
        }
        else{

            $this->session->set_flashdata('warning', 'No Payment ID Selected');
            redirect('admin/salary_payment');
        }
    }


    public function delete($id= '')
    {

        if($this->db->delete('staff_payment', array('payment_id' => $id)))
        {
            $this->session->set_flashdata('success', 'Payment Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Could Not Delete');
        }
        redirect('admin/salary_payment');
    }


}
