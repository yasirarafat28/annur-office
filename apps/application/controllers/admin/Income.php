<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Income extends CI_Controller {

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
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    
    public function index() {


        if ($this->input->get('division')) {
           if (!empty($this->input->get('date_from')) && !empty($this->input->get('date_to'))) {


                $this->db->select('*');
                $this->db->from('transaction');
                $this->db->where('type','income');
                $this->db->where('division',$this->input->get('division'));
                $this->db->where('created_at','>=',$this->input->get('date_from'));
                $this->db->where('created_at','<=',$this->input->get('date_to'));
                $incomes = $this->db->get()->result_array();
           }

           $incomes       =     $this->db->get_where('transaction',array('type'=>'income','division'=>$this->input->get('division')))->result_array();
        }
        else
        {
            $incomes       =     $this->db->get_where('transaction',array('type'=>'income'))->result_array();
        }


        $data=  [
            'panel_name'      =>  'Admin',
            'page_name'       =>    'Income',

            'incomes'        =>     $incomes,
        ];

        $this->load->view('admin/income/index',$data);
    }


    public function create()
    {


    }


    public function store() {
        if ($this->input->post()) 
        {

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('incoming', 'Income', 'required');

            $data   =   $this->input->post();
            $data['txid']   =  uniqid();
            $data['type']   =  'income';
            $data['status']   =  1;
            $data['session_id']   = $this->setting->current_session_id();

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/income');
            }
            else
            {
                if($this->db->insert('transaction',$data))
                {
                    $this->session->set_flashdata('success', 'Income Created Successfully');

                    redirect('admin/income');
                }
                else{
                    $this->session->set_flashdata('error', 'Something Went Wrong');
                    redirect('admin/income');
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

            $this->form_validation->set_rules('title', ' Name', 'required');              
            $this->form_validation->set_rules('incoming', 'Phone', 'required'); 

            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('warning', validation_errors());
                redirect('admin/income');
            }

            if ($this->db->update('transaction',$data,array('transaction_id'=>$id))) {
                $this->session->set_flashdata('success', 'Income Updated Successfully');
                redirect('admin/income');
            }
            else{
                $this->session->set_flashdata('error', 'Something Went Wrong');
                redirect('admin/income');
            }
        }
        else{

            $this->session->set_flashdata('warning', 'No Income ID Selected');
            redirect('admin/income');
        }
    }


    public function delete($id= '')
    {
        if($this->db->delete('transaction', array('transaction_id' => $id)))
        {
            $this->session->set_flashdata('success', 'Income Deleted Successfully');
        }
        else{
            $this->session->set_flashdata('error', 'Could Not Delete');
        }
        redirect('admin/income');
    }


}
