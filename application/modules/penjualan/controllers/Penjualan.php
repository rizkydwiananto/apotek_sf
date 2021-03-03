<?php

class Penjualan extends CI_Controller{
    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('m_penjualan');
        if ($this->session->userdata('logged')<>1 && $this->session->userdata('akses') != 'administrator') {
            redirect(site_url('login'));
        }
    }

    //-------------------------------------------------- PEMBELIAN -----------------------------------------//
    public function index() {
        $data['penjualan'] = $this->m_penjualan->get_penjualan();
        $data['title'] = "Data Penjualan";
        $data['view'] = "penjualan";
        $this->load->view('header',$data);
    }

    public function lihat_penjualan($id) {
        $data['penjualan'] = $this->m_penjualan->get_penjualan($id);
        $data['penjualan_detail'] =$this->m_penjualan->get_penjualan_detail($id);
        $data['title'] = "Detail Penjualan";
        $data['view'] = "lihat_penjualan";
        $this->load->view('header',$data);
    }

    public function kasir() {
        $data['nomor_struk'] = $this->m_penjualan->nomorstruk();
        $data['barang'] = $this->m_penjualan->get_databarang();
        $data['add_to_jual'] = $this->m_penjualan->get_add_to_jual();
        $data['jumlah_total'] = $this->m_penjualan->jumlahtotal();
        $data['title'] = "Kasir";
        $data['view'] = "kasir";
        $this->load->view('header',$data);
    }

    public function tambah_penjualan_proses() {
        //menambahkan ke tabel penjualan
        $data = array(
            'tgl_jual' => $this->input->post('tgl_jual'),
            'nomor_struk' => $this->input->post('nomor_struk'),
            'customer' => $this->input->post('customer'),
            'alamat' => $this->input->post('alamat'),
            'telpon' => $this->input->post('telpon'),
            'nama_user' => $this->input->post('nama_user'),
            'jumlah_total' => $this->input->post('jumlah_total'),
            'pembulatan' => $this->input->post('pembulatan'),
            'total_jual' => $this->input->post('total_jual'),
            'bayarcash' => $this->input->post('bayarcash'),
            'kembali' => $this->input->post('kembali')
        );
        $insert = $this->db->insert('penjualan',$data);
        //end menambahkan ke tabel pembelian


        //menambahkan ke tabel penjualan_detail
        $nomor_struk_jual = $_POST['nomor_struk_jual'];
        $kode_brg = $_POST['kode_brg'];
        $nama_barang = $_POST['nama_barang'];
        $satuan_brg = $_POST['satuan_brg'];
        $hrg_jual = $_POST['hrg_jual'];
        $jual_qty = $_POST['jual_qty'];
        $jual_total = $_POST['jual_total'];
        $data2 = array();

        $index = 0;
        foreach ($nomor_struk_jual as $data_nomor_struk_jual){
            array_push($data2, array(
                'nomor_struk_jual' => $data_nomor_struk_jual,
                'kode_brg' => $kode_brg[$index],
                'nama_barang' => $nama_barang[$index],
                'satuan_brg' => $satuan_brg[$index],
                'hrg_jual' => $hrg_jual[$index],
                'jual_qty' => $jual_qty[$index],
                'jual_total' => $jual_total[$index],
            ));

            //kurang stok
            $this->db->query("update barang set stock=stock-'$jual_qty[$index]' where kode_brg='$kode_brg[$index]'"); //Tambah Add Stock
            $index++;

        }

        $insert_detail = $this->m_penjualan->simpan_penjualan_detail($data2);
        //end menambahkan ke tabel pembelian_detail

        if ($insert_detail){
            $nomor_struk = $_POST['nomor_struk'];
            $this->db->delete('add_to_jual',array('nomor_struk' => $nomor_struk));
        } else {
            redirect('penjualan');
        }

        redirect('penjualan');
    }

    public function pilih_barang($id){
        $data['barang'] = $this->m_pembelian->get_databarang($id);
        $data['view'] = "pilih_barang";
        $this->load->view($data);
    }

    public function add_to_jual_proses(){
        $data = array(
            'nomor_struk' => $this->input->post('nomor_struk'),
            'kode_brg' => $this->input->post('kode_brg'),
            'nama_barang' => $this->input->post('nama_barang'),
            'satuan_brg' => $this->input->post('satuan_brg'),
            'hrg_jual' => $this->input->post('hrg_jual'),
            'jual_qty' => $this->input->post('jual_qty'),
            'jual_total' => $this->input->post('jual_total')
        );

        $insert = $this->db->insert('add_to_jual',$data);

        redirect('penjualan/kasir');
    }

    public function hapus_penjualan($id)
    {
        $delete = $this->db->delete('penjualan',array('nomor_struk' => $id));
        if ($delete){
            $this->db->delete('penjualan_detail',array('nomor_struk_jual' => $id));
        } else {
            redirect('penjualan');
        }

        redirect('penjualan');

    }

    public function hapus_add_to_jual($id)
    {
        $delete = $this->db->delete('add_to_jual',array('id_add_jual' => $id));
        redirect('penjualan/kasir');
    }

    public function batal_penjualan()
    {
        $delete = $this->db->delete('add_to_jual',array('nomor_struk'));
        redirect('penjualan');
    }


    //-------------------------------------------------- END OF PENJUALAN -----------------------------------------//


}
