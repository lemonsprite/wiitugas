<?php

class Murid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Murid');
    }


    public function index()
    {
        $data = array(
            'murid'     => $this->Model_Murid->GetMurid(),
            'title'     => 'Beranda'
        );

        $this->load->view('murid_template/v_murid_head', $data);
        $this->load->view('v_murid', $data);
        $this->load->view('murid_template/v_murid_foot');
    }

    public function detail($nim)
    {
        $data = array(
            'murid'     => $this->Model_Murid->GetMurid($nim),
            'title'     => 'Detail'
        );

        $this->load->view('murid_template/v_murid_head', $data);
        $this->load->view('v_murid_detail', $data);
        $this->load->view('murid_template/v_murid_foot');
    }

    public function update()
    {
        $data = array(
            'nim'       => $this->input->post('nim'),
            'nama'      => $this->input->post('nama'),
            'alamat'    => $this->input->post('alamat')
        );

        $this->Model_Murid->UpdateMurid($data, $this->input->post('id'));

        header('Location:'. base_url('murid/'));
    }

    public function delete($id)
    {
        $this->Model_Murid->DeleteMurid( $id);

        header('Location:'. base_url('murid/'));
    }

    public function tambah()
    {
        $data = array(
            'title'     => 'Tambah Murid'
        );

        $this->load->view('murid_template/v_murid_head', $data);
        $this->load->view('v_murid_tambah');
        $this->load->view('murid_template/v_murid_foot');
    }

    public function simpan()
    {
        $this->form_validation->set_rules(
            'nim',
            'nim',
            'required|max_length[8]', [
                'required' => 'Kode NIM Harus diisi',
                'max_length' => 'Kode NIM terlalu panjang'
        ]);

        if ($this->form_validation->run() != true) {
            // gak jalan
            $this->tambah();
        } else {
            // jalan
            $dataForm = array(
                'nim'       => $this->input->post('nim'),
                'nama'      => $this->input->post('nama'),
                'alamat'    => $this->input->post('alamat')
            );
    
            $this->Model_Murid->SaveMurid($dataForm);
    
            header('Location:'. base_url('murid/'));
        }
    }   
}