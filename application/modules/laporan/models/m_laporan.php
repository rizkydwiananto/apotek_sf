<?php
class m_laporan extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_pembelian($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $this->db->join("supplier","supplier.id_supplier = pembelian.id_supplier","left");
            $this->db->order_by('tgl_beli','DESC');
            $query = $this->db->get('pembelian');
            return $query->result_array();
        }
        $this->db->join("supplier","supplier.id_supplier = pembelian.id_supplier","left");
        $this->db->order_by('tgl_beli','DESC');
        $query = $this->db->get_where('pembelian', array('nomor_po' => $id));
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

    public function get_penjualan($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            //$this->db->join("supplier","supplier.id_supplier = pembelian.id_supplier","left");
            $this->db->order_by('tgl_jual','DESC');
            $query = $this->db->get('penjualan');
            return $query->result_array();
        }
        //$this->db->join("supplier","supplier.id_supplier = pembelian.id_supplier","left");
        $this->db->order_by('tgl_jual','DESC');
        $query = $this->db->get_where('penjualan', array('nomor_struk' => $id));
        return $query->row_array();
    }

    public function get_penjualan_detail($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $query = $this->db->get('penjualan_detail');
            return $query->result_array();
        }
        $query = $this->db->get_where('penjualan_detail', array('nomor_struk_jual' => $id));
        return $query->result_array();
    }

    public function get_cari_rekap_pembelian()
    {
        $tgl_awal = $this->input->post ('tgl_awal');
        $tgl_akhir = $this->input->post ('tgl_akhir');

        $this->db->where('tgl_beli >=',$tgl_awal);
        $this->db->where('tgl_beli <=',$tgl_akhir);
        $this->db->join("supplier","supplier.id_supplier = pembelian.id_supplier","left");
        $this->db->order_by('nomor_po','ASC');
        $query = $this->db->get ('pembelian');

        return $query->result_array();
    }
}