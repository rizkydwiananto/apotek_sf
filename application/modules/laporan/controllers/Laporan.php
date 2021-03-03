<?php

class Laporan extends CI_Controller{
    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('Pdf');
        $this->load->model('m_laporan');
        if ($this->session->userdata('logged')<>1 && $this->session->userdata('akses') != 'administrator') {
            redirect(site_url('login'));
        }
    }

    //------------------------------------------------ DASHBOARD ----------------------------------------------------------//
    public function cetak_pembelian($id) {
        //$data['user'] = $this->m_user->get_user();
        $data['pembelian'] = $this->m_laporan->get_pembelian($id);
        $data['pembelian_detail'] =$this->m_laporan->get_pembelian_detail($id);
        $data['title'] = "Cetak";
        $data['view'] = "cetak_pembelian";
        $this->load->view('cetak',$data);
    }

    public function cetak_terima_barang($id) {
        $data['terima_barang'] = $this->m_laporan->get_terima_barang($id);
        $data['terima_barang_detail'] =$this->m_laporan->get_terima_barang_detail($id);
        $data['title'] = "Cetak Terima Barang";
        $data['view'] = "cetak_terima_barang";
        $this->load->view('cetak',$data);
    }

    public function struk($id) {
        $data['penjualan'] = $this->m_laporan->get_penjualan($id);
        $data['penjualan_detail'] =$this->m_laporan->get_penjualan_detail($id);
        $data['title'] = "Struk";
        $data['view'] = "struk";
        $this->load->view('cetak',$data);
    }

    public function rekap_pembelian() {
        $data['title'] = "Rekap Pembelian";
        $data['view'] = "rekap_pembelian";
        $this->load->view('header',$data);
    }

    public function rekap_pembelian_cari() {
        $data['pembelian'] = $this->m_laporan->get_cari_rekap_pembelian();
        $data['title'] = "Rekap Pembelian";
        $data['view'] = "rekap_pembelian_cari";
        $this->load->view('header',$data);
    }
    //------------------------------------------------ END OF DASHBOARD -------------------------------------------------//

}