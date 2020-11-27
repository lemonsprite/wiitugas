<?php

class Model_Autentikasi extends CI_Model
{
    public function __construct() { $this->load->database('autentikasi'); }
    
    public function getUser($email) { return $this->db->get_where('user', array('email' => $email))->result_array(); }
    public function addUser($data) { $this->db->insert('user', $data); }
}