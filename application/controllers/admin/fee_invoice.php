<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class fee_invoice extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session');
        session_start();
        $this->load->model('login');
        $this->login->not_logged_redirect();

    }



    public function index($id='')
    {

        if ($id!='') 
        {

            $this->db->select('*,student.name_bangla as student_name,class.name as class_name');
            $this->db->from('fee_payment');
            $this->db->join('student','student.student_id=fee_payment.student_id');
            $this->db->join('class','student.class_id=class.class_id');
            $this->db->where('fee_payment.fee_payment_id',$id);
            $payment = $this->db->get()->result_array();

            $data=  [
                'panel_name'      =>  'Admin',
                'page_name'       =>    'Payment Invoice',

                'payment'        =>    $payment,
            ];


            $this->load->view('admin/fee_payment/fee_invoice',$data);


        }
    }




}
