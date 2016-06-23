<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

    public function index()
    {
        $this->load->view('header');
        $this->load->view('pages/login');
        $this->load->view('footer');
    }

    public function register()
    {
        $this->load->view('header');
        $this->load->view('pages/login');
        $this->load->view('footer');
        echo "register";
    }

    public function registerPost()
    {
        echo "handle post";
    }

}
