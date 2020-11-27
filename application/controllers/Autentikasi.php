<?php

class Autentikasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Autentikasi');
        
        if($this->session->stat)
        {
            redirect('admin');
        }
    }
   
    public function index() { $this->load->view('autentikasi/login', array('title' => 'Login')); }

    public function masuk()
    {   

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
            //ambil data dari database
            $data = $this->Model_Autentikasi->getUser($this->input->post('email'));

            // var_dump($data);

            if($this->input->post('email') == $data[0]['email'])
            {
                // Email bener
                if (md5($this->input->post('password')) == $data[0]['password']) 
                {
                    $_SESSION['email'] = $data[0]['email'];
                    $_SESSION['stat'] = 1;
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

    public function register() { $this->load->view('autentikasi/register', array('title' => 'Register')); }

    public function simpan() 
    {
        $this->form_validation->set_rules(
            'namadep',
            'Namadep',
            'trim|required', [
                'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|valid_email|required|is_unique[user.email]', [
                'required' => 'Email harus diisi',
                'valid_email' => 'Email tidak valid',
                'is_unique' => 'Email sudah terdaftar'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'Password1',
            'trim|min_length[8]|required|matches[password2]', [
                'required' => 'Password harus diisi',
                'min_length' => 'Password terlalu pendek',
                'matches' => 'Password tidak sama'
        ]);
        $this->form_validation->set_rules(
            'password2',
            'Password2',
            'trim|min_length[8]|required|matches[password1]', [
                'required' => 'Password harus diisi',
                'min_length' => 'Password terlalu pendek'
        ]);
        

        if($this->form_validation->run())
        {
            $data = array(
                'namadep'   => htmlspecialchars($this->input->post('namadep')),
                'namabel'   => htmlspecialchars($this->input->post('namabel')),
                'email'   => $this->input->post('email'),
                'password'   => md5($this->input->post('password1'))
            );

            $this->Model_Autentikasi->addUser($data);
            header('Location: '. base_url('autentikasi/masuk'));
        } else {
            $this->register();
        }
    }

    public function keluar()
    {
        unset(
            $_SESSION['email'],
            $_SESSION['stat']
        );
    }
}