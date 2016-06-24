<?php
class Recommend extends MY_Controller {

    public function index()
    {
        $this->load->model('User');
        $this->load->model('Product');

       // $this->load->library('ProductRecommender');

        $productsJson = $this->mongo_db->select()->limit($x = 200)->get('dbProject');

        $products = Product::createFromJsonBatch($productsJson);

        $field = $this->input->post('field');
        if($field){
            $user = new User();
            foreach($field as $key=>$value){
                $user->setPreference($key,$value,1);
            }
            $this->load->library('ProductRecommender',['user'=>$user,'objects'=>$products]);

            $data['tags'] = $field;
            $objects = $this->productrecommender->getRecommendation();
            $parts = array_chunk($objects, 50)[0];
            $data['objects'] = $parts;
        }else{
            $tags = Tag::all();
            $tagArray = [];
            foreach($tags as $tag){
                $tagArray[$tag->name] = $tag->value;
            }
            $data['tags'] = $tagArray;
            $data['objects'] = $products;
        }

        $this->load->view('recommender',$data);
    }
}