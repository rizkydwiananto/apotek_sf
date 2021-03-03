<?php

class Barang extends CI_Controller{
    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('m_barang');
        if ($this->session->userdata('logged')<>1 && $this->session->userdata('akses') != 'administrator') {
            redirect(site_url('login'));
        }
    }

    //------------------------------------------- BARANG ----------------------------------------------//
    public function index() {
        $data['barang'] = $this->m_barang->get_barang();
        $data['title'] = "Data Barang";
        $data['view'] = "barang";
        $this->load->view('header',$data);
    }

    public function tambah_barang() {
        $data['jenis_brg'] = $this->m_barang->get_jenis_brg();
        $data['satuan_brg'] = $this->m_barang->get_satuan_brg();
        $data['kode'] = $this->m_barang->kode();
        $data['title'] = "Tambah Barang";
        $data['view'] = "tambah_barang";
        $this->load->view('header',$data);
    }

    public function tambahbarangproses()
    {
        $data = array(
            'kode_brg' => $this->input->post('kode_brg'),
            'nama_barang' => $this->input->post('nama_barang'),
            'id_jenis_brg' => $this->input->post('id_jenis_brg'),
            'stock' => $this->input->post('stock'),
            'id_satuan_brg' => $this->input->post('id_satuan_brg'),
            'hrg_beli' => $this->input->post('hrg_beli'),
            'hrg_jual' => round($this->input->post('hrg_jual')),
            'expired' => $this->input->post('expired'),
            'expired_first' => date('Y-m-d', strtotime('-31 days', strtotime($this->input->post('expired')))),
            'expired_second' => date('Y-m-d', strtotime('-62 days', strtotime($this->input->post('expired')))),
            'expired_third' => date('Y-m-d', strtotime('-93 days', strtotime($this->input->post('expired')))),
            'margin' => $this->input->post('margin')
        );

        $insert = $this->db->insert('barang',$data);

        redirect('barang');
    }

    public function edit_barang($id) {
        $data['barang'] = $this->m_barang->get_barang($id);
        $data['jenis_brg'] = $this->m_barang->get_jenis_brg();
        $data['satuan_brg'] = $this->m_barang->get_satuan_brg();
        $data['title'] = "Edit Barang";
        $data['view'] = "edit_barang";
        $this->load->view('header',$data);
    }

    public function editbarangproses($id)
    {
        $data = array(
            'kode_brg' => $this->input->post('kode_brg'),
            'nama_barang' => $this->input->post('nama_barang'),
            'id_jenis_brg' => $this->input->post('id_jenis_brg'),
            'stock' => $this->input->post('stock'),
            'id_satuan_brg' => $this->input->post('id_satuan_brg'),
            'hrg_beli' => $this->input->post('hrg_beli'),
            'hrg_jual' => $this->input->post('hrg_jual'),
            'expired' => $this->input->post('expired'),
            'expired_first' => date('Y-m-d', strtotime('-31 days', strtotime($this->input->post('expired')))),
            'expired_second' => date('Y-m-d', strtotime('-62 days', strtotime($this->input->post('expired')))),
            'expired_third' => date('Y-m-d', strtotime('-93 days', strtotime($this->input->post('expired')))),
            'margin' => round($this->input->post('margin'))
        );

        $update = $this->db->update('barang',$data,array('id_barang' => $id));

        redirect('barang');
    }

    public function hapus_barang($id)
    {
        $delete = $this->db->delete('barang',array('id_barang' => $id));
        redirect('barang');
    }
    //-------------------------------------- END OF BARANG ----------------------------------------------//

    //-------------------------------- JENIS BARANG --------------------------------------//
    public function jenis_brg() {
        $data['jenis_brg'] = $this->m_barang->get_jenis_brg();
        $data['title'] = "Data Jenis Barang";
        $data['view'] = "jenis_brg";
        $this->load->view('header',$data);
    }

    public function edit_jenis_brg($id) {
        $data['jenis_brg'] = $this->m_barang->get_jenis_brg($id);
        $data['title'] = "Edit Jenis Barang";
        $data['view'] = "edit_jenis_brg";
        $this->load->view('header',$data);
    }

    public function editjenisbrgproses($id)
    {
        $data = array(
            'nama_jenis_brg' => $this->input->post('nama_jenis_brg')
        );

        $update = $this->db->update('jenis_brg',$data,array('id_jenis_brg' => $id));

        redirect('barang/jenis_brg');
    }

    public function tambah_jenis_brg() {
        $data['jenis_brg'] = $this->m_barang->get_jenis_brg();
        $data['title'] = "Tambah Jenis Barang";
        $data['view'] = "tambah_jenis_brg";
        $this->load->view('header',$data);
    }

    public function tambahjnsbrgproses()
    {
        $data = array(
            'nama_jenis_brg' => $this->input->post('nama_jenis_brg'),
        );

        $insert = $this->db->insert('jenis_brg',$data);

        redirect('barang/jenis_brg');
    }

    public function hapus_jenis_brg($id)
    {
        $delete = $this->db->delete('jenis_brg',array('id_jenis_brg' => $id));
        redirect('barang/jenis_brg');
    }
    //-------------------------------- END OF JENIS BARANG --------------------------------------//

    //------------------------------------- SATUAN BARANG --------------------------------------//
    public function satuan_brg() {
        $data['satuan_brg'] = $this->m_barang->get_satuan_brg();
        $data['title'] = "Data Satuan Barang";
        $data['view'] = "satuan_brg";
        $this->load->view('header',$data);
    }

    public function tambah_satuan_brg() {
        $data['satuan_brg'] = $this->m_barang->get_satuan_brg();
        $data['title'] = "Tambah Satuan Barang";
        $data['view'] = "tambah_satuan_brg";
        $this->load->view('header',$data);
    }

    public function tambahsatbrgproses()
    {
        $data = array(
            'nama_satuan_brg' => $this->input->post('nama_satuan_brg'),
        );

        $insert = $this->db->insert('satuan_brg',$data);

        redirect('barang/satuan_brg');
    }

    public function edit_satuan_brg($id) {
        $data['satuan_brg'] = $this->m_barang->get_satuan_brg($id);
        $data['title'] = "Edit Satuan Barang";
        $data['view'] = "edit_satuan_brg";
        $this->load->view('header',$data);
    }

    public function editsatuanbrgproses($id)
    {
        $data = array(
            'nama_satuan_brg' => $this->input->post('nama_satuan_brg')
        );

        $update = $this->db->update('satuan_brg',$data,array('id_satuan_brg' => $id));

        redirect('barang/satuan_brg');
    }

    public function hapus_satuan_brg($id)
    {
        $delete = $this->db->delete('satuan_brg',array('id_satuan_brg' => $id));
        redirect('barang/satuan_brg');
    }
    //------------------------------------- END OF SATUAN BARANG --------------------------------------//

}
