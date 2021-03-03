<?php

class User extends CI_Controller{
    //put your code here
   
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('m_user');
        if ($this->session->userdata('logged')<>1 && $this->session->userdata('akses') != 'administrator') {
            redirect(site_url('login'));
        }
    }

    //------------------------------------------------ USER ----------------------------------------------------------//
    public function index() {
        $data['user'] = $this->m_user->get_user();
        $data['title'] = "Data User";
        $data['view'] = "user";
        $this->load->view('header',$data);
    }

    public function tambah() {
        $data['user'] = $this->m_user->get_user();
        $data['title'] = "Tambah User";
        $data['view'] = "tambah_user";
        $this->load->view('header',$data);
    }

    public function tambahproses()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'nama_user' => $this->input->post('nama_user'),
            'akses' => $this->input->post('akses'),
            'password' => md5($this->input->post('password'))
        );

        $insert = $this->db->insert('user',$data);

        redirect('user');
    }

    public function hapus($id)
    {
        $delete = $this->db->delete('user',array('id_user' => $id));
        redirect('user');
    }

    public function edituser($id) {
        $data['usr'] = $this->m_user->get_user($id);
        $data['title'] = "Edit User";
        $data['view'] = "edit_user";
        $this->load->view('header',$data);
    }

    public function edituserproses($id)
    {
        $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username'),
            'akses' => $this->input->post('akses'),
            'password' => md5($this->input->post('password'))
        );

        $update = $this->db->update('user',$data,array('id_user' => $id));

        redirect('user');
    }
    //------------------------------------------------ END OF USER ---------------------------------------------------//

    //------------------------------------------------ PROFIL --------------------------------------------------------//
    public function profil() {
        $data['usr'] = $this->m_user->get_user();
        $data['title'] = "Profil";
        $data['view'] = "profil";
        $this->load->view('header',$data);
    }

    public function editprofilproses($id)
    {
        $data = array(
            'nama_user' => $this->input->post('nama_user'),
            'username' => $this->input->post('username')
        );

        $update = $this->db->update('user',$data,array('id_user' => $id));

        redirect('login');
    }

    public function editpassprofproses($id)
    {
        $data = array(
            'password' => md5($this->input->post('password'))
        );

        $update = $this->db->update('user',$data,array('id_user' => $id));

        redirect('login');
    }
    //------------------------------------------------ END OF PROFIL -------------------------------------------------//
   
}