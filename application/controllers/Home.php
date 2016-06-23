<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function index()
    {
        $this->load->model('user');
        $this->require_min_level(1);
        $user = User::find($this->auth_user_id);

        $this->load->view('header');
        $this->load->view('pages/home');
        $this->load->view('footer');
    }

}
