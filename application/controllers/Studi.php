<?php

class Studi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Studi');
    }

    public function viewTemplate($url, $data = null)
    {
        /// Metode untuk memangil template si view studi
        $this->load->view('studi/template/head', $data);
        $this->load->view($url, $data);
        $this->load->view('studi/template/foot');
    }

    public function index() { $this->viewTemplate('studi/index', array('title' => 'Form', 'produk' => $this->Model_Studi->getProduk())); }
    public function hasil() 
    {
        $data =   array(
            'title' => 'Hasil',
            'nama'  => $this->input->post('nama'),
            'nomortelp'  => $this->input->post('nomortelp'),
            'produk'  => $this->input->post('produk'),
            'ukuran'  => $this->input->post('ukuran'),
            'harga'  => $this->input->post('harga'),
            'pcs'  => $this->input->post('pcs'),
            'total'  => $this->input->post('total')
        );
        $this->viewTemplate('studi/hasil', $data); 
    }

    public function harga()
    {
        $produk = $this->input->post('namaproduk');
        $data = $this->Model_Studi->getHarga($produk);
        echo json_encode($data);
    }
}