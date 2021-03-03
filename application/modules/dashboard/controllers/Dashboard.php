<?php

class Dashboard extends CI_Controller{
    //put your code here
   
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('m_dashboard');
        if ($this->session->userdata('logged')<>1 && $this->session->userdata('akses') != 'administrator') {
            redirect(site_url('login'));
        }
    }

    //------------------------------------------------ DASHBOARD ----------------------------------------------------------//
    public function index() {
        //$data['user'] = $this->m_user->get_user();
        $data['title'] = "Main Menu";
        $data['view'] = "mainmenu";
        $this->load->view('header',$data);
    }

    //------------------------------------------------ END OF DASHBOARD -------------------------------------------------//
   
}