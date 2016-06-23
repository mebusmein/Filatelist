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

    public function create(){
        $this->load->model('user');
        $this->require_min_level(1);
        $user = User::find($this->auth_user_id);

        $this->load->view('header');
        $this->load->view('product/edit');
        $this->load->view('footer');
    }

    public function createPost(){
        $this->load->model('user');
        $this->load->model('product');
        $this->require_min_level(1);
        $user = User::find($this->auth_user_id);

        $product = new Product();

        $product->productName   = $this->input->post('name');
        $product->description   = $this->input->post('description');
        $product->startValue    = $this->input->post('start');
        $product->userID        = $user->user_id;
        $product->startDate   = time();
        $product->endDate   = time() + (7 * 24 * 60 * 60);

        $tags = [];

        foreach($this->input->post('tag') as $key => $value){
            $tags[] = ['name' => $key, 'value' => 1];
        }

        $product->tags = $tags;

        $product->save();

        redirect('app/product/'.$product->id);
    }

}
