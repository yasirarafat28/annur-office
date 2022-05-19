<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class fee_payment extends CI_Controller {

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

        $this->db->select('*,student.name_bangla as student_name,class.name as class_name');
        $this->db->from('fee_payment');
        $this->db->join('student','student.student_id=fee_payment.student_id');
        $this->db->join('class','student.class_id=class.class_id');

        $payments = $this->db->get()->result_array();

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Fee Payment',

            'classes'        =>     $this->db->get('class')->result_array(),
            'payments'        =>     $payments,
        ];

        $this->load->view('admin/fee_payment/index',$data);
    }


    public function create()
    {
        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'New Fee Payment',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
        ];


        $this->load->view('admin/fee_payment/create',$data);

    }


    public function store() {
        if ($this->input->post()) 
        {   
            $this->form_validation->set_rules('student_id', 'Student', 'required');      

            $data   =   $this->input->post();
            $data['status']   =  1;
            $data['session_id']   = $this->setting->current_session_id();

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/fee_payment');
            }
            else
            {
                if($this->db->insert('fee_payment',$data))
                {
                    $this->session->set_flashdata('success', 'Payment Created Successfully');

                    redirect('admin/fee_payment');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                    redirect('admin/fee_payment');
                }

            }
        }
    }


    public function edit($id='') {


    }



    public function update($id='') {

        if ($id!='') {

            $data   =   $this->input->post();
            $data['updated_at']   =  date("Y-m-d h:i:s");
            if ($this->db->update('fee_payment',$data,array('fee_payment_id'=>$id))) {
                $this->session->set_flashdata('warning', 'Expense Updated Successfully');
                redirect('admin/fee_payment');
            }
            else{
                $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admin/fee_payment');
            }
        }
        else{

            $this->session->set_flashdata('warning', 'No Payment ID Selected');
            redirect('admin/fee_payment');
        }
    }


    public function delete($id= '')
    {
        if($this->db->delete('fee_payment', array('fee_payment_id' => $id)))
        {
            $this->session->set_flashdata('success', 'Payment Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Could Not Delete');
        }
        redirect('admin/fee_payment');
    }


    public function invoice($id='')
    {

        if ($id!='') 
        {

            $this->db->select('*,student.name_bangla as student_name,class.name as class_name');
            $this->db->from('fee_payment');
            $this->db->join('student','student.student_id=fee_payment.student_id');
            $this->db->join('class','student.class_id=class.class_id');
            $this->db->where('fee_payment_id',$id);
            $payments = $this->db->get()->result_array();

            $data=  [
                'panel_name'      =>  'Admin',
                'page_name'       =>    'Payment Invoice',

                'payments'        =>    $payments,
            ];


            $this->load->view('admin/fee_payment/fee_invoice',$data);


        }
    }


}
