<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class welcome extends CI_Controller {

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

    }

    public function service() {
        $this->load->view('public/head');
        $this->load->view('public/service');
        $this->load->view('public/footer');
    }

    public function about() {
        $this->load->view('public/head');
        $this->load->view('public/about');
        $this->load->view('public/footer');
    }

    public function contact() {
        $this->load->view('public/head');
        $this->load->view('public/contact');
        $this->load->view('public/footer');
    }

    function contact_action() {
        $this->load->model('m_common');
        $insertData = array();
        $insertData['name'] = $this->input->post('InputName');
        $insertData['email'] = $this->input->post('InputEmail');
        $insertData['msg'] = $this->input->post('InputMessage');
        $insert_id = $this->m_common->insert_row('contact', $insertData);
        if ($insert_id) {
            $this->load->library('email');

            $this->email->from($insertData['email'], $insertData['name']);
            $this->email->to('infobsc04@gmail.com');
            $this->email->subject('Email from Bright Smile Clinic contact section');
            $this->email->message($insertData['msg']);
            $this->email->send();
            echo "Email Sent Successfully";
        }
    }

}
