<?php 

class Model_Latihan1 extends CI_Model
{
    public $nilai1, $nilai2, $hasil;
 
    public function jumlah($n1 = 0, $n2 = 0)
    {
        $this->nilai1 = $n1;
        $this->nilai2 = $n2;
        $this->hasil = $this->nilai1 + $this->nilai2;

        return $this->hasil;
    }
}