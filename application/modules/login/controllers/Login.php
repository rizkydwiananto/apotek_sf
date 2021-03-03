<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
    
    public function index($error = NULL) {
        $this->load->helper('url');
        $this->load->helper('form');
        //if ($this->session->userdata('logged')==1 && $this->session->userdata('os_level') == 'administrator') {
      //          redirect(site_url('dashboard'));
      //  }
        $this->load->view('login');
    }
 
    public function auth() {
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('m_login');
        $login = $this->m_login->login($this->input->post('username'), md5($this->input->post('password')));
 
        if ($login == 1) {
//          ambil detail data
            $row = $this->m_login->data_login($this->input->post('username'), md5($this->input->post('password')));

//          daftarkan session
            $data = array(
                'logged' => TRUE,
                'id_user' => $row->id_user,
                'username' => $row->username,
                'nama_user' => $row->nama_user,
                'akses' => $row->akses,
                'password' => $row->password
            );
            $this->session->set_userdata($data);

//            redirect ke halaman sukses
            redirect('dashboard','refresh');
        } else {
//           tampilkan pesan error
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-remove"></i>
                    Username / Password anda salah.
                  </div>');
            redirect('login/');
        }
    }
 
    function out() {
        $this->load->helper('url');
//        destroy session
        $this->session->sess_destroy();
        
//        redirect ke halaman login
        redirect(site_url('login/'));
    }
 
}