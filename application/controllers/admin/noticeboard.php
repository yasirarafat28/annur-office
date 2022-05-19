<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class noticeboard extends CI_Controller {

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

        $this->db->select('*');
        $this->db->from('noticeboard');
        $this->db->order_by('created_at','DESC');
        $notices = $this->db->get()->result_array();

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Notice Board',

            'notices'        =>     $notices,
        ];

        $this->load->view('admin/noticeboard/index',$data);
    }


    public function create()
    {
        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'New noticeboard',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
        ];


        $this->load->view('admin/noticeboard/create',$data);

    }


    public function store() {
        if ($this->input->post()) 
        {   
            $this->form_validation->set_rules('notice_title', 'Notice Title', 'required');      
            $this->form_validation->set_rules('notice', 'Notice ', 'required');      

            $data   =   $this->input->post();
            $data['status']   =  1;
            $data['session_id']   = $this->setting->current_session_id();

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/noticeboard');
            }
            else
            {
                if($this->db->insert('noticeboard',$data))
                {
                    $this->session->set_flashdata('success', 'Notice Created Successfully');

                    redirect('admin/noticeboard');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                    redirect('admin/noticeboard');
                }

            }
        }

    }


    public function edit($id='') {

        if ($id!='') {
            $noticeboard         =     $this->db->get_where('noticeboard',array('noticeboard_id' => $id))->result_array();
        }
        else
        {
            $noticeboard=  '';
        }


        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Edit noticeboard',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
            'noticeboard'         =>      $noticeboard
        ];


        $this->load->view('admin/noticeboard/edit',$data);

    }



    public function update($id='') {

        if ($id!='') {

            $data   =   $this->input->post();
            $data['updated_at']   =  date("Y-m-d h:i:s");

            $this->form_validation->set_rules('notice_title', 'Notice Title', 'required');      
            $this->form_validation->set_rules('notice', 'Notice ', 'required'); 

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/noticeboard');
            }

            if ($this->db->update('noticeboard',$data,array('notice_id'=>$id))) {
                $this->session->set_flashdata('success', 'Notice Updated Successfully');
                redirect('admin/noticeboard');
            }
            else{
                $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admin/noticeboard');
            }
        }
        else{

            $this->session->set_flashdata('warning', 'No Notice ID Selected');
            redirect('admin/noticeboard');
        }
    }


    public function delete($id= '')
    {

        if($this->db->delete('noticeboard', array('notice_id' => $id)))
        {
            $this->session->set_flashdata('success', 'Notice Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Could Not Delete');
        }
        redirect('admin/noticeboard');
    }


}
