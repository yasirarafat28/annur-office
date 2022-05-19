<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class album extends CI_Controller {

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
        $this->db->from('album');
        $this->db->order_by('created_at','DESC');
        $album = $this->db->get()->result_array();

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>  'Album',
            'album'           =>   $album,
        ];

        $this->load->view('admin/album/index',$data);
    }


    public function create()
    {
        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>  'New Album',

            
        ];


        $this->load->view('admin/album/create',$data);

    }


    public function store() {
        if ($this->input->post()) 
        {   
            $this->form_validation->set_rules('title', 'Title', 'required');      
            //$this->form_validation->set_rules('description', 'Description ', 'required');      

            $data               =   $this->input->post();
            $data['status']     =  1;
            //$data['session_id'] = $this->setting->current_session_id();

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/album');
            }
            else
            {
                if($this->db->insert('album',$data))
                {
                    $this->session->set_flashdata('success', ' Album Created Successfully');

                    redirect('admin/album');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                    redirect('admin/album');
                }

            }
        }

    }


    public function edit($id='') {

        if ($id!='') {
            $album         =     $this->db->get_where('album',array('album_id' => $id))->result_array();
        }
        else
        {
            $Album  =  '';
        }


        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>  'Edit News',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'        =>     $this->db->get('teacher')->result_array(),
            'album'         =>      $album
        ];


        $this->load->view('admin/album/edit',$data);

    }



    public function update($id='') {

        if ($id!='') {

            $data                   =   $this->input->post();
            $data['updated_at']     =   date("Y-m-d h:i:s");

            $this->form_validation->set_rules('title', 'Title', 'required');      
            //$this->form_validation->set_rules('description', 'Description ', 'required'); 

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/album');
            }

            if ($this->db->update('album',$data,array('album_id'=>$id))) {
                $this->session->set_flashdata('success', 'Album Updated Successfully');
                redirect('admin/album');
            }
            else{
                $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admin/album');
            }
        }
        else{

            $this->session->set_flashdata('warning', 'No Album ID Selected');
            redirect('admin/album');
        }
    }


    public function delete($id= '')
    {

        if($this->db->delete('album', array('album_id' => $id)))
        {
            $this->session->set_flashdata('success', 'Album Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Could Not Delete');
        }
        redirect('admin/album');
    }


}
