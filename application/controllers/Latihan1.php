<?php 

class Latihan1 extends CI_Controller
{
	public function index()
	{
		echo "Selamat Datang.. selamat belajar Web Programming";
    }

    public function penjumlahan($n1, $n2)
    {
        $this->load->model('Model_Latihan1');
        $hasil = $this->Model_Latihan1->jumlah($n1, $n2);
        
        // echo "Hasil Penjumlahan dari ". $n1 ." + ". $n2 ." = " .$hasil;

        $data['a'] = $n1;
        $data['b'] = $n2;
        $data['hasil'] = $hasil;
        
        $this->load->view('View_Latihan', $data);
    }
}
