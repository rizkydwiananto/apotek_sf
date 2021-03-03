<?php
class m_pembelian extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
    //-------------------------------------------------- PEMBELIAN -----------------------------------------//
    public function get_pembelian($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $this->db->join("supplier","supplier.id_supplier = pembelian.id_supplier","left");
            $this->db->order_by('nomor_po','DESC');
            $query = $this->db->get('pembelian');
            return $query->result_array();
        }
        $this->db->join("supplier","supplier.id_supplier = pembelian.id_supplier","left");
        $this->db->order_by('nomor_po','DESC');
        $query = $this->db->get_where('pembelian', array('nomor_po' => $id));
        return $query->row_array();
    }

    public function get_pembelian_sementara($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $this->db->join("supplier","supplier.id_supplier = pembelian_sementara.id_supplier","left");
            $this->db->order_by('nomor_po','DESC');
            $query = $this->db->get('pembelian_sementara');
            return $query->result_array();
        }
        $this->db->join("supplier","supplier.id_supplier = pembelian_sementara.id_supplier","left");
        $this->db->order_by('nomor_po','DESC');
        $query = $this->db->get_where('pembelian_sementara', array('nomor_po' => $id));
        return $query->row_array();
    }

    public function get_pembelian_detail($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $query = $this->db->get('pembelian_detail');
            return $query->result_array();
        }
        $query = $this->db->get_where('pembelian_detail', array('nomor_po_beli' => $id));
        return $query->result_array();
    }

    public function get_add_to_terima($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $query = $this->db->get('add_to_terima');
            return $query->result_array();
        }
        $query = $this->db->get_where('add_to_terima', array('nomor_po_beli' => $id));
        return $query->result_array();
    }

    function nomorpo(){
        $this->db->select('RIGHT(pembelian.nomor_po,2)as nomor_po', FALSE);
        $this->db->order_by('nomor_po','DESC');
        $this->db->limit(1);
        $query = $this->db->get('Pembelian');
        if ($query->num_rows() <> 0){
            $data = $query->row();
            $nomorpo = intval($data->nomor_po) + 1;
        } else {
            $nomorpo = 1;
        }
        date_default_timezone_set('Asia/Jakarta');
        $batas = str_pad($nomorpo,3,"0", STR_PAD_LEFT);
        $kodetampil = "PO".date('dmy').$batas;
        return $kodetampil;
    }

    function get_barang($kode_brg){
            $hsl=$this->db->query("SELECT * FROM barang where id_barang='$kode_brg'");
            return $hsl;
    }

    public function get_databarang($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $this->db->join("jenis_brg","jenis_brg.id_jenis_brg = barang.id_jenis_brg","left");
            $this->db->join("satuan_brg","satuan_brg.id_satuan_brg = barang.id_satuan_brg","left");
            $query = $this->db->get('Barang');
            return $query->result_array();
        }
        $this->db->join("jenis_brg","jenis_brg.id_jenis_brg = barang.id_jenis_brg","left");
        $this->db->join("satuan_brg","satuan_brg.id_satuan_brg = barang.id_satuan_brg","left");
        $query = $this->db->get_where('Barang', array('id_barang' => $id));
        return $query->row_array();
    }


    public function get_add_to_cart($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $query = $this->db->get('add_to_cart');
            return $query->result_array();
        }
        $query = $this->db->get_where('add_to_cart', array('id_add' => $id));
        return $query->row_array();
    }

    function jumlahtotal()
    {
        $this->db->select('SUM(beli_total) as total');
        $this->db->from('add_to_cart');
        return $this->db->get()->row()->total;
    }

    public function simpan_pembelian_detail($data2){
            return $this->db->insert_batch('pembelian_detail',$data2);
    }

    public function simpan_terima_barang_detail($data2){
        return $this->db->insert_batch('terima_barang_detail',$data2);
    }

    public function simpan_add_to_terima($data3){
        return $this->db->insert_batch('add_to_terima',$data3);
    }


    //--------------------------------------------- END OF PEMBELIAN -----------------------------------------//

    //-------------------------------------------------- SUPPLIER -----------------------------------------//
    public function get_supplier($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $query = $this->db->get('supplier');
            return $query->result_array();
        }
        $query = $this->db->get_where('Supplier', array('id_supplier' => $id));
        return $query->row_array();
    }

    function kode_supp(){
        $this->db->select('RIGHT(supplier.kode_supplier,2)as kode_supplier', FALSE);
        $this->db->order_by('kode_supplier','DESC');
        $this->db->limit(1);
        $query = $this->db->get('Supplier');
        if ($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode_supplier) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode,4,"0", STR_PAD_LEFT);
        $kodetampil = "S".$batas;
        return $kodetampil;
    }
    //---------------------------------------------- END OF SUPPLIER -----------------------------------------//


    //------------------------------------------- TERIMA BARANG ----------------------------------------------//
    public function get_terima_barang($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $this->db->order_by('nomor_rcv','DESC');
            $query = $this->db->get('terima_barang');
            return $query->result_array();
        }
        $this->db->order_by('nomor_rcv','DESC');
        $query = $this->db->get_where('terima_barang', array('nomor_rcv' => $id));
        return $query->row_array();
    }

    public function get_terima_barang_detail($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $query = $this->db->get('terima_barang_detail');
            return $query->result_array();
        }
        $query = $this->db->get_where('terima_barang_detail', array('nomor_rcv_terima' => $id));
        return $query->result_array();
    }

    function nomorrcv(){
        $this->db->select('RIGHT(terima_barang.nomor_rcv,2)as nomor_rcv', FALSE);
        $this->db->order_by('nomor_rcv','DESC');
        $this->db->limit(1);
        $query = $this->db->get('terima_barang');
        if ($query->num_rows() <> 0){
            $data = $query->row();
            $nomorrcv = intval($data->nomor_rcv) + 1;
        } else {
            $nomorrcv = 1;
        }
        date_default_timezone_set('Asia/Jakarta');
        $batas = str_pad($nomorrcv,3,"0", STR_PAD_LEFT);
        $kodetampil = "RCV".date('dmy').$batas;
        return $kodetampil;
    }

    public function get_edit_terima_barang($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $query = $this->db->get('add_to_terima');
            return $query->result_array();
        }
        $query = $this->db->get_where('add_to_terima', array('id_add_terima' => $id));
        return $query->row_array();
    }

    //---------------------------------------- END OF TERIMA BARANG ----------------------------------------------//

}
