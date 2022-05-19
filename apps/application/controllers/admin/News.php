<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url','text'));
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
        $this->db->from('news');
        $this->db->order_by('created_at','DESC');
        $news = $this->db->get()->result_array();

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'News',

            'news'        =>     $news,
        ];

        $this->load->view('admin/news/index',$data);
    }


    public function create()
    {
        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'New News',

            
        ];


        $this->load->view('admin/news/create',$data);

    }


    public function store() {
        if ($this->input->post()) 
        {   
            $this->form_validation->set_rules('title', 'Title', 'required');      
            $this->form_validation->set_rules('description', 'Description ', 'required'); 

            //Code for Uploading Image
            $image_index = 'photo';

            $file_name = $_FILES[$image_index]['name'];
            $file_size =$_FILES[$image_index]['size'];
            $file_tmp =$_FILES[$image_index]['tmp_name'];
            $file_type=$_FILES[$image_index]['type'];
            $file_ext=strtolower(end(explode('.',$_FILES[$image_index]['name'])));

            $photo_name="news_".uniqid().".".$file_ext;
            $photo_destination="images/news/".$photo_name;
            move_uploaded_file($file_tmp,$photo_destination);

            $data   =   $this->input->post();
            $data['photo']   =  $photo_destination;
            $data['status']   =  1;
            $data['session_id']   = $this->setting->current_session_id();

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/news');
            }
            else
            {
                if($this->db->insert('news',$data))
                {
                    $this->session->set_flashdata('success', ' News Created Successfully');

                    redirect('admin/news');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                    redirect('admin/news');
                }

            }
        }

    }


    public function edit($id='') {

        if ($id!='') {
            $news         =     $this->db->get_where('news',array('news_id' => $id))->result_array();
        }
        else
        {
            $news=  '';
        }


        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Edit News',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
            'news'         =>      $news
        ];


        $this->load->view('admin/news/edit',$data);

    }



    public function update($id='') {

        if ($id!='') {

            $data   =   $this->input->post();
            $data['updated_at']   =  date("Y-m-d h:i:s");

            $this->form_validation->set_rules('title', 'Title', 'required');      
            $this->form_validation->set_rules('description', 'Description ', 'required'); 

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/news');
            }

            if ($this->db->update('news',$data,array('news_id'=>$id))) {
                $this->session->set_flashdata('success', 'News Updated Successfully');
                redirect('admin/news');
            }
            else{
                $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admin/news');
            }
        }
        else{

            $this->session->set_flashdata('warning', 'No News ID Selected');
            redirect('admin/news');
        }
    }


    public function delete($id= '')
    {

        if($this->db->delete('news', array('news_id' => $id)))
        {
            $this->session->set_flashdata('success', 'News Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Could Not Delete');
        }
        redirect('admin/news');
    }


}
