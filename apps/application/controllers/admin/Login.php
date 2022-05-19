<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_common');
        //$this->load->model('login');
        $this->load->library('session');
        session_start();
        $this->load->database();
        

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


        if ($this->input->post()) {
            $username=$this->input->post('username');
            $password=$this->input->post('password');

            $login_data = $this->db->get_where('admin', array(
                'username' => $username,
                'password' => $password
            ));


            if ($login_data->num_rows() > 0) 
            {
                foreach ($login_data->result_array() as $user) 
                {
                    $this->session->set_userdata(array(
                        'admin_id'  => $user['admin_id'],
                        'time'  => date("y-m-d h:i:s"),
                        'login_type'  => 'admin_login',
                        'login_status'   => TRUE
                    ));
                    redirect(base_url('admin/dashboard'));
                }
            }

            else 
            {
                $data['errmsg'] = "Invalid username or password";
                $_SESSION['errmsg'] = "Invalid username or password";
                $this->load->view('admin/account/login', $data);
            }
        } 
        else
            $this->load->view('admin/account/login');
    }

    public function logout() {

        $this->session->sess_destroy();
        $_SESSION['errmsg'] = "You have successfully logout";
        redirect('admin/login');
    }

}
