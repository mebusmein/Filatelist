<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends MY_Controller {
    
//    Feed pagina
    public function index()
    {
        $this->load->model('user');
        $this->load->model('Product');
        if($this->require_min_level(1)) {

            $user = User::find($this->auth_user_id);
            $user->setPreferences($user->tags);

            $productsJson = $this->mongo_db->select()->limit($x = 200)->get('dbProject');

            $products = Product::createFromJsonBatch($productsJson);

            $this->load->library('ProductRecommender', ['user' => $user, 'objects' => $products]);
            $objects = $this->productrecommender->getRecommendation();

            $parts = array_chunk($objects, 50);

            $data['products'] = $parts[0];

            $this->load->view('header');
            $this->load->view('pages/feed', $data);
            $this->load->view('footer');
        }
    }
    
    public function product(){
        $this->load->model('user');
        $this->require_min_level(1);
        $productJson = $this->mongo_db->get_where('dbProject', array('userID'=>2));
        $product = Product::createFromJson($productJson[0]);
        $data = [
            "product" => $product
        ];
        $user = User::find($this->auth_user_id);

        $this->load->view('header');
        $this->load->view('pages/product', $data);
        $this->load->view('footer');
    }

    public function bid(){
        $this->load->model('user');
        $this->require_min_level(1);
        $user = User::find($this->auth_user_id);
        $bid = $this->input->post('bid');
        $date = date("L m Y");

        $this->mongo_db->where(array('_id'=>$_POST['id']))->addtoset('bids',(array($user,$bid,$date)))->update('dbProject');

        header('Location: ' . $_SERVER['HTTP_REFERER']);
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
