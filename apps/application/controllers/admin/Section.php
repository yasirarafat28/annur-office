<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Section extends CI_Controller {

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



            $this->db->select('*,class.name as class_name,teacher.name as teacher_name,section.name as section_name');
            $this->db->from('section');
            $this->db->join('teacher','section.teacher_id=teacher.teacher_id');
            $this->db->join('class','class.class_id=section.class_id');
            $sections = $this->db->get()->result_array();

        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Sections',

            'sections'         =>     $sections,
            'classes'         =>     $this->db->get_where('class',array('status'=> 1))->result_array(),
            'teachers'         =>     $this->db->get_where('teacher',array('status'=> 1))->result_array(),
        ];

        $this->load->view('admin/section/index',$data);
    }


    public function create()
    {
        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'New Section',

            'classes'         =>     $this->db->get('class')->result_array(),
            'teachers'         =>     $this->db->get('teacher')->result_array(),
        ];


        $this->load->view('admin/section/create',$data);

    }


    public function store($id=  '') {

        if ($this->input->post()) 
        {   
            $this->form_validation->set_rules('name', 'Section Name', 'required');       
            $this->form_validation->set_rules('class_id', 'Class Name', 'required');       
            $this->form_validation->set_rules('symbol', 'Symbol', 'required|is_unique[section.symbol]');       

            $data   =   $this->input->post();
            $data['status']   =  1;
            $data['session_id']   = $this->setting->current_session_id();

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/section');
            }
            else
            {
                if($this->db->insert('section',$data))
                {
                    $this->session->set_flashdata('success', 'Section Created Successfully');

                    redirect('admin/section');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                    redirect('admin/section');
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

            $this->form_validation->set_rules('name', 'Section Name', 'required');       
            $this->form_validation->set_rules('class_id', 'Class Name', 'required');       
            $this->form_validation->set_rules('symbol', 'Symbol', 'required|is_unique[section.symbol]'); 

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/section');
            }

            if ($this->db->update('section',$data,array('section_id'=>$id))) {
                $this->session->set_flashdata('warning', 'Section Updated Successfully');
                redirect('admin/section');
            }
            else{
                $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admin/section');
            }
        }
        else{

            $this->session->set_flashdata('warning', 'No Section ID Selected');
            redirect('admin/section');
        }
    }



    public function delete($id= '')
    {

        if($this->db->delete('section', array('section_id' => $id)))
        {
            $this->session->set_flashdata('success', 'Section Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Could Not Delete');
        }
        redirect('admin/section');
    }


    public function get_section_list_by_class()
    {

        if ($this->input->post()) 
        {
            $class_id   =   $this->input->post('class_id');

            $sections=  $this->db->get_where('section',array('class_id',$class_id))->result_array();
            foreach ($sections as $row) {
            ?>
            <option value=" <?php echo $row['section_id']; ?>"> <?php echo $row['name']; ?></option>

<?php
            }

        }
        else
        {
            echo '';
        }

    }


}
