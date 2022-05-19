<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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


        $session_id=     $this->setting->current_session_id();


        $this->db->select('*');
        $this->db->from('student');
        $this->db->where('session_id',$session_id);
        $total_student = $this->db->get()->num_rows();

        $this->db->select('*');
        $this->db->from('teacher');
        $total_teacher = $this->db->get()->num_rows();

        $this->db->select('*');
        $this->db->from('parent');
        $total_parent = $this->db->get()->num_rows();

        $data=  [
            'page_name'       =>    'Dashboard',
            'panel_name'      =>  'Admin',


            'total_student'  =>   $total_student,
            'total_teacher'   =>  $total_teacher,
            'total_parent'    =>   $total_parent,
        ];

        $this->load->view('admin/dashboard',$data);
    }

    public function appointment_history() {
        if (strlen($_SESSION['alogin']) == 0) {
            redirect('admin');
        }

        $this->db->select('*,d.doctorName as docname,u.fullName as pname');
        $this->db->from('appointment a');
        $this->db->join('doctors d','d.id=a.doctorId');
        $this->db->join('users u','u.id=a.userId');
        $query = $this->db->get();
        $data['appoinments']  = $query->result_array(); 


        $this->load->view('admin/appointment-history',$data);
    }

    public function manage_users() {
        if (strlen($_SESSION['alogin']) == 0) {
            redirect('admin');
        }

        if($this->input->get('id') && $this->input->get('del')){
            $id=$this->input->get('id');
            $this->db->delete('users',array('id'=>$id));
            
        }


        $data['users'] =   $this->db->get('users')->result_array();

        $this->load->view('admin/manage-users',$data);
    }

    public function manage_doctors() {
        if (strlen($_SESSION['alogin']) == 0) {
            redirect('admin');
        }

        $data['doctors'] =   $this->db->get('doctors')->result_array();

        $this->load->view('admin/manage-doctors',$data);
    }

    public function manage_rooms() {
        if (strlen($_SESSION['alogin']) == 0) {
            redirect('admin');
        }

        if($this->input->get('id') && $this->input->get('del')){
            $id=$this->input->get('id');
            $this->db->delete('room',array('id'=>$id));
        }

        $data['rooms'] =   $this->db->get('room')->result_array();

        $this->load->view('admin/manage-room',$data);
    }

    public function add_room() {
        if (strlen($_SESSION['alogin']) == 0) {
            redirect('admin');
        }

        if ($this->input->post()) {
            $data['room_code']      =   $this->input->post('room_code');
            $data['room_name']      =   $this->input->post('room_name');
            $data['total_bed']      =   $this->input->post('total_bed');
            $data['available_bed']  =   $this->input->post('total_bed');
            $data['room_details']   =   $this->input->post('room_details');
            $data['creationDate']   =   date("Y-m-d");
            $data['room_code']      =   '1';
            if($this->db->insert('room',$data))
            {
                redirect('admin/manage_rooms');
            }
        }


        $this->load->view('admin/add-room');
    }


    public function edit_room($id) {
        if (strlen($_SESSION['alogin']) == 0) {
            redirect('admin');
        }

        if ($this->input->post()) {
            $data['room_code']      =   $this->input->post('room_code');
            $data['room_name']      =   $this->input->post('room_name');
            $data['total_bed']      =   $this->input->post('total_bed');
            $data['available_bed']  =   $this->input->post('total_bed');
            $data['room_details']   =   $this->input->post('room_details');
            $data['creationDate']   =   date("Y-m-d");
            $data['room_code']      =   '1';
            if($this->db->insert('room',$data))
            {
                redirect('admin/manage_rooms');
            }
        }
        else{
            $data['rooms']=$this->db->get_where('room',array('id' => $id))->result_array();
            $this->load->view('admin/edit-room',$data);
        }

    }

    public function add_doctor() {
        if (strlen($_SESSION['alogin']) == 0) {
            redirect('admin');
        }

        $data['doctors']= $this->db->get('doctorspecilization')->result_array();

        $this->load->view('admin/add-doctor',$data);
    }

    public function edit_doctor($id) {
        if (strlen($_SESSION['alogin']) == 0) {
            redirect('admin');
        }

        if ($this->input->post()) {
            $indata['updationDate'] =date( 'd-m-Y h:i:s A', time () );
            $indata['specilization'] =$this->input->post('doctorspecilization');
            $this->db->where('id', $id);
            $this->db->update('doctorSpecilization', $indata); 
            redirect('admin/dashboard');
        }

        $data['doctors']=$this->db->get_where('doctors',array('id' => $id))->result_array();
        $data['specilizations']= $this->db->get('doctorspecilization')->result_array();

        $this->load->view('admin/edit-doctor',$data);
    }


    public function doctor_specilization() {
        if (strlen($_SESSION['alogin']) == 0) {
            redirect('admin');
        }

        if ($this->input->post()) {
           $indata['specilization']  =   $this->input->post('doctorspecilization');
           $this->db->insert('doctorSpecilization',$indata);
        }
        elseif($this->input->get('id') && $this->input->get('del')){
            $id=$this->input->get('id');
            $this->db->delete('doctorSpecilization',array('id'=>$id));
            
        }


        $data['specilizations'] =   $this->db->get('doctorspecilization')->result_array();
        $this->load->view('admin/doctor-specilization',$data);
    }

    public function edit_doctor_specialization($id) {
        if (strlen($_SESSION['alogin']) == 0) {
            redirect('admin');
        }

        if ($this->input->post()) {
            $indata['updationDate'] =date( 'd-m-Y h:i:s A', time () );
            $indata['specilization'] =$this->input->post('doctorspecilization');
            $this->db->where('id', $id);
            $this->db->update('doctorSpecilization', $indata); 
            redirect('admin/dashboard');
        }

        $data['specializations']=$this->db->get_where('doctorspecilization',array('id' => $id))->result_array();

        $this->load->view('admin/edit-doctor-specialization',$data);
    }


    public function message() {
        if (strlen($_SESSION['alogin']) == 0) {
            redirect('admin');
        }
        $data['messages']   =   $this->db->get('contact')->result_array();
        $this->load->view('admin/message',$data);
    }

    function delete_message() {
        $id = $this->input->post('id');
        if($this->db->delete('contact', array('id' => $id))){
            echo 'Delete Successfull';
        }else{
            echo 'Delete Failed';
        }
    }

    public function logout() {
        $_SESSION['alogin'] == "";
        $_SESSION['login'] == "";
        session_unset();
        session_destroy();
        $_SESSION['errmsg'] = "You have successfully logout";
        redirect('welcome');
    }

    function add_action() {
        $data['specilization'] = $_POST['Doctorspecialization'];
        $data['doctorName'] = $_POST['docname'];
        $data['address'] = $_POST['clinicaddress'];
        $data['docFees'] = $_POST['docfees'];
        $data['contactno'] = $_POST['doccontact'];
        $data['docEmail'] = $_POST['docemail'];
        $data['password'] = md5($_POST['npass']);
        if ($this->db->insert('doctors',$data)) {
            echo "Doctor info added Successfully";
        } else {
            echo "Insert Failed";
        }
    }

    function edit_action($did) {

        $data['specilization'] = $_POST['Doctorspecialization'];
        $data['doctorName'] = $_POST['docname'];
        $data['address'] = $_POST['clinicaddress'];
        $data['docFees'] = $_POST['docfees'];
        $data['contactno'] = $_POST['doccontact'];
        $data['docEmail'] = $_POST['docemail'];

        $this->db->where('id',$did);
        $this->db->update('doctors',$data);

        redirect('admin/manage_doctors');
    }

}
