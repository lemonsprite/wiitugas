<?php 

class Web extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }

	public function index()
	{
        $data = [
            'judul' => 'Beranda'
        ];
        
        $this->load->view('template/v_header', $data);
        $this->load->view('v_index', $data);
        $this->load->view('template/v_footer', $data);
    }
    
    public function about()
	{
        $data = [
            'judul'     => 'About',
            'nama_d'    => 'Noor',
            'nama_b'    => 'Alfath',
            'alamat'    => 'Imbanagara, Ciamis',
            't_lahir'   => 'Ciamis',
        ];
        
        $this->load->view('template/v_header', $data);
        $this->load->view('v_about', $data);
        $this->load->view('template/v_footer', $data);
    }
}
