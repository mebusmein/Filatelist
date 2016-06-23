<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends MY_Controller {
    
//    Feed pagina
    public function index()
    {
        $this->load->model('user');
        $this->require_min_level(1);
        $user = User::find($this->auth_user_id);

        $this->load->view('header');
        $this->load->view('pages/feed');
        $this->load->view('footer');
    }
    
    public function product($id){
        echo "dit is de productpagina " . $id;
    }
}
