<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class inquiry extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('text');
        $this->load->library('session'); 
        $this->load->library('form_validation');
        session_start();
        $this->load->model('login');
        $this->load->model('setting');        
        $this->load->model('mark_model');
        $this->load->model('notice_model');

    }
    public function store() {
        if ($this->input->post()) {

            $this->form_validation->set_rules('name', 'Name', 'required'); 
            $this->form_validation->set_rules('phone', 'Phone Number', 'required'); 
            $this->form_validation->set_rules('message', 'Message', 'required'); 



            $data   =   $this->input->post();

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('home/contactus');
            }
            else
            {
                if($this->db->insert('inquiry',$data))
                {
                    $this->session->set_flashdata('success', 'Inquiry submitted Successfully');
                    redirect('home/contactus');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                    redirect('home/contactus');
                }
            }
        }
    }

}
