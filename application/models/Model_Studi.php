<?php

class Model_Studi extends CI_Model
{
    public function __construct() { $this->load->database(); }
    
    public function getProduk() { return $this->db->get('sepatu')->result_array(); }
    public function getHarga($param) { return $this->db->get_where('sepatu', array('produk' => $param))->result(); }
}