<?php

class Pembelian extends CI_Controller{
    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('m_pembelian');
        if ($this->session->userdata('logged')<>1 && $this->session->userdata('akses') != 'administrator') {
            redirect(site_url('login'));
        }
    }

    //-------------------------------------------------- PEMBELIAN -----------------------------------------//
    public function index() {
        $data['pembelian'] = $this->m_pembelian->get_pembelian();
        $data['title'] = "Data Pembelian";
        $data['view'] = "pembelian";
        $this->load->view('header',$data);
    }

    public function lihat_pembelian($id) {
        $data['pembelian'] = $this->m_pembelian->get_pembelian($id);
        $data['pembelian_detail'] =$this->m_pembelian->get_pembelian_detail($id);
        $data['title'] = "Detail Pembelian";
        $data['view'] = "lihat_pembelian";
        $this->load->view('header',$data);
    }

    public function tambah_pembelian() {
        $data['supplier'] = $this->m_pembelian->get_supplier();
        $data['nomor_po'] = $this->m_pembelian->nomorpo();
        $data['barang'] = $this->m_pembelian->get_databarang();
        $data['add_to_cart'] = $this->m_pembelian->get_add_to_cart();
        $data['jumlah_total'] = $this->m_pembelian->jumlahtotal();
        $data['title'] = "Tambah Pembelian";
        $data['view'] = "tambah_pembelian";
        $this->load->view('header',$data);
    }

    public function tambah_pembelian_proses() {
        //menambahkan ke tabel pembelian
        $data = array(
            'tgl_beli' => $this->input->post('tgl_beli'),
            'waktu' => $this->input->post('waktu'),
            'nomor_po' => $this->input->post('nomor_po'),
            'id_supplier' => $this->input->post('id_supplier'),
            'nama_user' => $this->input->post('nama_user'),
            'total_beli' => $this->input->post('total_beli')
        );
        $insert = $this->db->insert('pembelian',$data);
        //end menambahkan ke tabel pembelian

        //menambahkan ke tabel pembelian_sementara
        $data4 = array(
            'tgl_beli' => $this->input->post('tgl_beli'),
            'waktu' => $this->input->post('waktu'),
            'nomor_po' => $this->input->post('nomor_po'),
            'id_supplier' => $this->input->post('id_supplier'),
            'nama_user' => $this->input->post('nama_user'),
            'total_beli' => $this->input->post('total_beli')
        );
        $insert = $this->db->insert('pembelian_sementara',$data4);
        //end menambahkan ke tabel pembelian_sementara

        //menambahkan ke tabel pembelian_detail
        $nomor_po_beli = $_POST['nomor_po_beli'];
        $kode_brg = $_POST['kode_brg'];
        $nama_barang = $_POST['nama_barang'];
        $satuan_brg_beli = $_POST['satuan_brg_beli'];
        $hrg_beli = $_POST['hrg_beli'];
        $beli_qty = $_POST['beli_qty'];
        $beli_total = $_POST['beli_total'];
        $data2 = array();

        $index = 0;
        foreach ($nomor_po_beli as $data_nomor_po_beli){
            array_push($data2, array(
                'nomor_po_beli' => $data_nomor_po_beli,
                'kode_brg' => $kode_brg[$index],
                'nama_barang' => $nama_barang[$index],
                'satuan_brg_beli' => $satuan_brg_beli[$index],
                'hrg_beli' => $hrg_beli[$index],
                'beli_qty' => $beli_qty[$index],
                'beli_total' => $beli_total[$index]
            ));

            //tambah stok
            //$this->db->query("update barang set stock=stock+'$beli_qty[$index]' where kode_brg='$kode_brg[$index]'"); //Tambah Add Stock
            $index++;

        }

        $insert_detail = $this->m_pembelian->simpan_pembelian_detail($data2);
        //end menambahkan ke tabel pembelian_detail

        //menambahkan ke tabel add_to_terima
        $nomor_po_beli = $_POST['nomor_po_beli'];
        $kode_brg = $_POST['kode_brg'];
        $nama_barang = $_POST['nama_barang'];
        $satuan_brg_beli = $_POST['satuan_brg_beli'];
        $hrg_beli = $_POST['hrg_beli'];
        $beli_qty = $_POST['beli_qty'];
        $beli_total = $_POST['beli_total'];
        $data3 = array();

        $index = 0;
        foreach ($nomor_po_beli as $data_nomor_po_beli){
            array_push($data3, array(
                'nomor_po_beli' => $data_nomor_po_beli,
                'kode_brg' => $kode_brg[$index],
                'nama_barang' => $nama_barang[$index],
                'satuan_brg_beli' => $satuan_brg_beli[$index],
                'hrg_beli' => $hrg_beli[$index],
                'beli_qty' => $beli_qty[$index],
                'beli_total' => $beli_total[$index]
            ));

            //tambah stok
            //$this->db->query("update barang set stock=stock+'$beli_qty[$index]' where kode_brg='$kode_brg[$index]'"); //Tambah Add Stock
            $index++;

        }
        $insert_terima = $this->m_pembelian->simpan_add_to_terima($data3);
        //$insert_terima = $this->db->insert('add_to_terima',$data3,array('id_add_terima' => $id));
        //end menambahkan ke tabel add_to_terima

        if ($insert_detail){
            $nomor_po = $_POST['nomor_po'];
            $this->db->delete('add_to_cart',array('nomor_po' => $nomor_po));
        } else {
            redirect('pembelian');
        }

        redirect('pembelian');
    }

    public function hapus_pembelian($id)
    {
        $delete = $this->db->delete('pembelian',array('nomor_po' => $id));
        if ($delete){
            $this->db->delete('pembelian_detail',array('nomor_po_beli' => $id));
        } else {
            redirect('pembelian');
        }

        redirect('pembelian');

    }

    public function hapus_pembelian_sementara($id)
    {
        $delete = $this->db->delete('pembelian_sementara',array('nomor_po' => $id));
        if ($delete){
            $this->db->delete('add_to_terima',array('nomor_po_beli' => $id));
        } else {
            redirect('pembelian/terima_barang');
        }

        redirect('pembelian/terima_barang');

    }

    public function pilih_barang($id){
        $data['barang'] = $this->m_pembelian->get_databarang($id);
        $data['view'] = "pilih_barang";
        $this->load->view($data);
    }

    public function add_to_cart_proses(){
        $data = array(
            'nomor_po' => $this->input->post('nomor_po'),
            'kode_brg' => $this->input->post('kode_brg'),
            'nama_barang' => $this->input->post('nama_barang'),
            'satuan_brg_beli' => $this->input->post('satuan_brg_beli'),
            'hrg_beli' => $this->input->post('hrg_beli'),
            'beli_qty' => $this->input->post('beli_qty'),
            'beli_total' => $this->input->post('beli_total')
        );

        $insert = $this->db->insert('add_to_cart',$data);

        redirect('pembelian/tambah_pembelian');
    }

    public function hapus_add_to_cart($id)
    {
        $delete = $this->db->delete('add_to_cart',array('id_add' => $id));
        redirect('pembelian/tambah_pembelian');
    }

    public function batal_pembelian()
    {
        $delete = $this->db->delete('add_to_cart',array('nomor_po'));
        redirect('pembelian');
    }



    //-------------------------------------------------- END OF PEMBELIAN -----------------------------------------//

    //------------------------------------------------ SUPPLIER ----------------------------------------------------//
    public function supplier() {
        $data['supplier'] = $this->m_pembelian->get_supplier();
        $data['title'] = "Data Supplier";
        $data['view'] = "supplier";
        $this->load->view('header',$data);
    }

    public function tambah_supplier() {
        $data['supplier'] = $this->m_pembelian->get_supplier();
        $data['kode_supp'] = $this->m_pembelian->kode_supp();
        $data['title'] = "Tambah Supplier";
        $data['view'] = "tambah_supplier";
        $this->load->view('header',$data);
    }

    public function tambahsupplierproses($id)
    {
        $data = array(
            'kode_supplier' => $this->input->post('kode_supplier'),
            'nama_supplier' => $this->input->post('nama_supplier'),
            'alamat_supplier' => $this->input->post('alamat_supplier'),
            'telpon_supplier' => $this->input->post('telpon_supplier')
        );

        $insert = $this->db->insert('supplier',$data,array('id_supplier' => $id));

        redirect('pembelian/supplier');
    }

    public function edit_supplier($id) {
        $data['supplier'] = $this->m_pembelian->get_supplier($id);
        $data['title'] = "Edit Supplier";
        $data['view'] = "edit_supplier";
        $this->load->view('header',$data);
    }

    public function editsupplierproses($id)
    {
        $data = array(
            'kode_supplier' => $this->input->post('kode_supplier'),
            'nama_supplier' => $this->input->post('nama_supplier'),
            'alamat_supplier' => $this->input->post('alamat_supplier'),
            'telpon_supplier' => $this->input->post('telpon_supplier')
        );

        $update = $this->db->update('supplier',$data,array('id_supplier' => $id));

        redirect('pembelian/supplier');
    }

    public function hapus_supplier($id)
    {
        $delete = $this->db->delete('supplier',array('id_supplier' => $id));
        redirect('pembelian/supplier');
    }
    //---------------------------------------------- END OF SUPPLIER ------------------------------------------------//



    //--------------------------------------------------- RECEIVING -------------------------------------------------//
    public function terima_barang() {
        $data['terima_barang'] = $this->m_pembelian->get_terima_barang();
        $data['pembelian_sementara'] = $this->m_pembelian->get_pembelian_sementara();
        $data['title'] = "Data Terima Barang";
        $data['view'] = "terima_barang";
        $this->load->view('header',$data);
    }

    public function tambah_terima_barang($id) {
        $data['supplier'] = $this->m_pembelian->get_supplier();
        $data['nomorrcv'] = $this->m_pembelian->nomorrcv();
        $data['pembelian'] = $this->m_pembelian->get_pembelian($id);
        $data['add_to_terima'] =$this->m_pembelian->get_add_to_terima($id);
        $data['barang'] = $this->m_pembelian->get_databarang();
        $data['title'] = "Tambah Terima Barang";
        $data['view'] = "tambah_terima_barang";
        $this->load->view('header',$data);
    }

    public function tambah_terima_barang_proses() {
        //menambahkan ke tabel terima_barang
        $data = array(
            'nomor_rcv' => $this->input->post('nomor_rcv'),
            'tgl_input' => $this->input->post('tgl_input'),
            'waktu' => $this->input->post('waktu'),
            'nomor_po_beli' => $this->input->post('nomor_po_beli'),
            'nomor_faktur' => $this->input->post('nomor_faktur'),
            'nama_supplier' => $this->input->post('nama_supplier'),
            'grand_total' => $this->input->post('grand_total'),
            'nama_user' => $this->input->post('nama_user'),
        );
        $insert = $this->db->insert('terima_barang',$data);
        //end menambahkan ke tabel pembelian

        if ($insert){
        $nomor_po = $_POST['nomor_po_beli'];
        $this->db->delete('pembelian_sementara',array('nomor_po' => $nomor_po));
    }

        //menambahkan ke tabel terima_barang_detail
        $nomor_rcv_terima = $_POST['nomor_rcv_terima'];
        $kode_brg = $_POST['kode_brg'];
        $nama_barang = $_POST['nama_barang'];
        $satuan_brg_beli = $_POST['satuan_brg_beli'];
        $hrg_beli = $_POST['hrg_beli'];
        $beli_qty = $_POST['beli_qty'];
        $beli_total = $_POST['beli_total'];
        $data2 = array();

        $index = 0;
        foreach ($nomor_rcv_terima as $data_nomor_rcv_terima){
            array_push($data2, array(
                'nomor_rcv_terima' => $data_nomor_rcv_terima,
                'kode_brg' => $kode_brg[$index],
                'nama_barang' => $nama_barang[$index],
                'satuan_brg_beli' => $satuan_brg_beli[$index],
                'hrg_beli' => $hrg_beli[$index],
                'beli_qty' => $beli_qty[$index],
                'beli_total' => $beli_total[$index]
            ));

            //tambah stok
            $this->db->query("update barang set stock=stock+'$beli_qty[$index]' where kode_brg='$kode_brg[$index]'"); //Tambah Add Stock
            $index++;

        }

        $insert_detail = $this->m_pembelian->simpan_terima_barang_detail($data2);
        //end menambahkan ke tabel terima_barang_detail

        if ($insert_detail){
            $nomor_po_beli = $_POST['nomor_po_beli'];
            $this->db->delete('add_to_terima',array('nomor_po_beli' => $nomor_po_beli));
        } else {
            redirect('pembelian/terima_barang');
        }

        redirect('pembelian/terima_barang');
    }

    public function edit_terima_barang($id) {
        $data['add_to_terima'] = $this->m_pembelian->get_edit_terima_barang($id);
        $data['title'] = "Edit Terima Barang";
        $data['view'] = "edit_terima_barang";
        $this->load->view('header',$data);
    }

    public function edit_terima_barang_proses($id)
    {
        $data = array(
            'kode_brg' => $this->input->post('kode_brg'),
            'nama_barang' => $this->input->post('nama_barang'),
            'satuan_brg_beli' => $this->input->post('satuan_brg_beli'),
            'hrg_beli' => $this->input->post('hrg_beli'),
            'beli_qty' => $this->input->post('beli_qty'),
            'beli_total' => $this->input->post('beli_total'),
        );

        $update = $this->db->update('add_to_terima',$data,array('id_add_terima' => $id));

        $nomor = $this->input->post('nomor_po_beli');
        redirect('pembelian/tambah_terima_barang/'.$nomor);
    }

    public function hapus_terima_barang($id)
    {

        $delete = $this->db->delete('terima_barang',array('nomor_rcv' => $id));
        if ($delete){
            $this->db->delete('terima_barang_detail',array('nomor_rcv_terima' => $id));
        } else {
            redirect('pembelian');
        }

        redirect('pembelian/terima_barang');
    }

    public function lihat_terima_barang($id) {
        $data['terima_barang'] = $this->m_pembelian->get_terima_barang($id);
        $data['terima_barang_detail'] =$this->m_pembelian->get_terima_barang_detail($id);
        $data['title'] = "Detail Terima Barang";
        $data['view'] = "lihat_terima_barang";
        $this->load->view('header',$data);
    }


    //----------------------------------------------- END OF RECEIVING -----------------------------------------------//


}
