<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content extends CI_Controller {

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
        //$content          = $this->db->get_where('content', array('page_type' =>  'about_us'  ))->result_array();
        $contents          = $this->db->get('content')->result_array();
           


        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>  'Content Management',
            'content'         =>  $contents,

            
        ];


        $this->load->view('admin/content/index',$data);


    }


    public function store() {
        if ($this->input->post()) 
        {   
            $this->form_validation->set_rules('title', 'Title', 'required');      
            $this->form_validation->set_rules('page_type', 'Page Type', 'required|is_unique[content.page_type]');      
            $this->form_validation->set_rules('description', 'Description ', 'required');      

            $data                  = $this->input->post();
            $data['status']        =  1;

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/content');
            }
            else
            {
                if($this->db->insert('content',$data))
                {
                    $this->session->set_flashdata('success', ' Content Created Successfully');

                    redirect('admin/content');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                    redirect('admin/content');
                }

            }
        }

    }


public function update($id='') {

        if ($id!='') {

            $data   =   $this->input->post();
            $data['updated_at']   =  date("Y-m-d h:i:s");

            if ($this->db->update('content',$data,array('content_id'=>$id))) {
                $this->session->set_flashdata('success', 'Content Updated Successfully');
                # code...
            }
            else
            {
                $this->session->set_flashdata('error', 'Something Went Wrong.');

            }
        }

        redirect('admin/content','page_message');
    }


    public function delete($id= '')
    {
        $this->db->delete('content', array('content_id' => $id));
        $this->session->set_flashdata('success', 'Content Deleted Successfully');

        redirect('admin/content');
    }







}
