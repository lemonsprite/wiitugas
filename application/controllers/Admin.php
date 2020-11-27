<?php

class Admin extends CI_Controller
{
    public function __construct()
    {        
        parent::__construct();
        if(!$this->session->stat)
        {
            redirect('autentikasi');
        }
    }
    public function viewTemplate($url, $data = null, $mode = null)
    {
        switch($mode)
        {
            case 'light':
                $this->load->view('admin/template/adm_head_light', $data);
                $this->load->view($url);
                break;
            case 'static':
                $this->load->view('admin/template/adm_head_static', $data);
                $this->load->view($url);
                break;
            default:
                $this->load->view('admin/template/adm_head', $data);
                $this->load->view($url);
                break;
        }
    }

    public function viewAuth($url, $data = null)
    {
        $this->load->view('admin/template/auth_head', $data);
        $this->load->view($url);
    }


    //Layout
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->viewTemplate('admin/index', $data);
    }

    public function light()
    {
        $data['title'] = 'Sidenav Light';
        $this->viewTemplate('admin/layout-sidenav-light', $data, 'light');
    }
    public function layoutstatic()
    {
        $data['title'] = 'Static Navigation';
        $this->viewTemplate('admin/layout-static', $data, 'static');
    }


    //Auth Pages
    public function login()
    {
        $data['title'] = 'Login';
        $this->viewAuth('admin/login', $data);
    }

    public function register()
    {
        $data['title'] = 'Register';
        $this->viewAuth('admin/register', $data);
    }

    public function password()
    {
        $data['title'] = 'Password';
        $this->viewAuth('admin/password', $data);
    }


    //Error Pages
    public function error($kode = null)
    {
        switch($kode)
        {
            case 401:
                $data['title'] = "Error 401";
                $this->viewAuth('admin/401', $data);
                break;
            case 500:
                $data['title'] = "Error 500";
                $this->viewAuth('admin/500', $data);
                break;
            default:
                $data['title'] = "Error 404";
                $this->viewAuth('admin/404', $data);
                break;
        }
    }

    public function charts()
    {
        $data['title'] = 'Charts';
        $this->viewTemplate('admin/charts', $data);
    }

    public function tables()
    {
        $data['title'] = 'Tables';
        $this->viewTemplate('admin/tables', $data);
    }
    
}
