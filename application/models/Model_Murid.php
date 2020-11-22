<?php 

class Model_Murid extends CI_Model
{
    public function __construct() { $this->load->database(); }

    public function GetMurid($nim = false)
    {
        if($nim === false)
            return $this->db->get('tb_murid')->result_array();

        return $this->db->get_where('tb_murid',array('nim' => $nim))->result_array();
    }
    
    public function UpdateMurid($dataForm, $id)
    {
        $this->db->update('tb_murid', $dataForm,  array('id' => $id));
    }

    public function DeleteMurid($id)
    {
        $this->db->delete('tb_murid', array('id' => $id));
    }

    public function SaveMurid($dataForm)
    {
        $this->db->insert('tb_murid', $dataForm);
    }
    
}