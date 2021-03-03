<?php
class m_user extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
    public function get_user($id = false)
    {
        if($id === false)
        {
            //$this->db->where('id_user = 1');
            $query = $this->db->get('User');
            return $query->result_array();
        }
        $query = $this->db->get_where('User', array('id_user' => $id));
        return $query->row_array();
    }
}