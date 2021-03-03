<?php
class m_barang extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

    //------------------------------------------- BARANG ----------------------------------------------//
    public function get_barang($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $this->db->join("jenis_brg","jenis_brg.id_jenis_brg = barang.id_jenis_brg","left");
            $this->db->join("satuan_brg","satuan_brg.id_satuan_brg = barang.id_satuan_brg","left");
            $this->db->order_by('kode_brg','DESC');
            $query = $this->db->get('Barang');
            return $query->result_array();
        }
        $this->db->join("jenis_brg","jenis_brg.id_jenis_brg = barang.id_jenis_brg","left");
        $this->db->join("satuan_brg","satuan_brg.id_satuan_brg = barang.id_satuan_brg","left");
        $this->db->order_by('kode_brg','DESC');
        $query = $this->db->get_where('Barang', array('id_barang' => $id));
        return $query->row_array();
    }

    function kode(){
        $this->db->select('RIGHT(barang.kode_brg,4)as kode_brg', FALSE);
        $this->db->order_by('kode_brg','DESC');
        $this->db->limit(1);
        $query = $this->db->get('Barang');
        if ($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode_brg) + 1;
        } else {
            $kode = 1;
        }
            $batas = str_pad($kode,4,"0", STR_PAD_LEFT);
            $kodetampil = "B".$batas;
            return $kodetampil;
    }
    //------------------------------------------ END OF BARANG ---------------------------------------//

    //--------------------------------------- JENIS BARANG ---------------------------------------//
    public function get_jenis_brg($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $this->db->order_by('nama_jenis_brg','ASC');
            $query = $this->db->get('jenis_brg');
            return $query->result_array();
        }
        $this->db->order_by('nama_jenis_brg','ASC');
        $query = $this->db->get_where('jenis_brg', array('id_jenis_brg' => $id));
        return $query->row_array();
    }
    //---------------------------------- END OF JENIS BARANG ---------------------------------------//

    //--------------------------------------- SATUAN BARANG ---------------------------------------//
    public function get_satuan_brg($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $this->db->order_by('nama_satuan_brg','ASC');
            $query = $this->db->get('satuan_brg');
            return $query->result_array();
        }
        $this->db->order_by('nama_satuan_brg','ASC');
        $query = $this->db->get_where('satuan_brg', array('id_satuan_brg' => $id));
        return $query->row_array();
    }
    //---------------------------------- END OF SATUAN BARANG ---------------------------------------//

}
