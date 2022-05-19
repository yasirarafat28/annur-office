<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends CI_Controller {

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
    public function index() {


        $this->db->select('*');
        $this->db->from('news');
        $this->db->order_by('created_at','desc');
        $this->db->limit(3);
        $news = $this->db->get()->result_array();

        $data=  [
            'news'         =>     $news,
        ];

        $this->load->view('public/home',$data);
    }


    public function news()
    {

        $this->db->select('*');
        $this->db->from('news');
        $this->db->order_by('created_at','desc');
        $news = $this->db->get()->result_array();

        $data=  [
            'news'         =>     $news,
        ];
        $this->load->view('public/news',$data);
    }
    public function news_details($id='')
    {

        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('news_id',$id);
        $this->db->order_by('created_at','desc');
        $news = $this->db->get()->result_array();

        $data=  [
            'news'         =>     $news,
        ];
        $this->load->view('public/news-details',$data);
    }

    public function notice()
    {

        $data=  [
            'all_notice'         =>     $this->db->get('noticeboard')->result_array(),
        ];
        $this->load->view('public/notice',$data);
    }

    public function service() {
        $this->load->view('public/service');
    }

    public function aboutus() {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('page_type','about_us');
        $content = $this->db->get()->result_array();

        $data=  [
            'content'         =>     $content,
        ];
        $this->load->view('public/about',$data);
    }

    public function academic() {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('page_type','academic');
        $content = $this->db->get()->result_array();

        $data=  [
            'content'         =>     $content,
        ];
        $this->load->view('public/academic',$data);
    }

    public function addmission() {
        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('page_type','addmission');
        $content = $this->db->get()->result_array();

        $data=  [
            'content'         =>     $content,
        ];
        $this->load->view('public/addmission',$data);
    }

    public function contactus() {

        $this->db->select('*');
        $this->db->from('content');
        $this->db->where('page_type','contact');
        $content = $this->db->get()->result_array();

        $data=  [
            'content'         =>     $content,
        ];
        $this->load->view('public/contact',$data);
    }

}
