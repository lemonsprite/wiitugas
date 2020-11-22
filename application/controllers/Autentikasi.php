<?php

class Autentikasi extends CI_Controller
{
   
    public function index()
    {
        $this->load->view('autentikasi/login', array('title' => 'Login'));
    }

    public function masuk()
    {   
        $email = 'alfath.noor17@gmail.com';
        $password = md5('Admin12345');

        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email', [
                'required' => 'Email gak boleh kosong...',
                'valid_email' => 'Email yang anda masukan tidak valid...'
        ]);
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required', [
                'required' => 'Password harus diisi, oke...'
        ]);


        // cek form data bener gak
        if($this->form_validation->run())
        {
            //jalan
            $inputPass = md5($this->input->post('password'));

            if($this->input->post('email') == $email)
            {
                // Email bener
                if (md5($this->input->post('password')) == $password) {
                    echo "Password MD5 :  {$password} <br>";
                    echo "Email : $email";

                    redirect('admin');
                }
                else
                {
                    //email salah
                    // set notifikasi
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password anda salah</div>');
                    $this->index();
                }
            } else {
                //email salah
                // set notifikasi
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email anda salah...</div>');
                // header('Location: '. base_url('autentikasi/index'));
                $this->index();
            }
        } else
        {
            //gk jalan
            $this->index();
        }
    }
}