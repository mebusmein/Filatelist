<?php
class Recommend extends CI_Controller {

    public function index()
    {
        $this->load->model('User');
        $this->load->model('Product');
       // $this->load->library('ProductRecommender');

        $objects = [
            Product::init('The Matrix', ['Action' => 1.0, 'Sci-Fi' => 1.0]),
            Product::init('Lord of The Rings', ['Adventure' => 1.0, 'Drama' => 1.0, 'Fantasy' => 1.0]),
            Product::init('Batman', ['Action' => 1.0, 'Drama' => 1.0, 'Crime' => 1.0]),
            Product::init('Fight Club', ['Drama' => 1.0]),
            Product::init('Pulp Fiction', ['Drama' => 1.0, 'Crime' => 1.0]),
            Product::init('Django', ['Drama' => 1.0, 'Western' => 1.0])
        ];




        $field = $this->input->post('field');
        if($field){
            $user = new User();
            foreach($field as $key=>$value){
                $user->setPreference($key,$value,1);
            }
            $this->load->library('ProductRecommender',['user'=>$user,'objects'=>$objects]);
            $data['tags'] = $field;
            $data['objects'] = $this->productrecommender->getRecommendation();
        }else{
            $data['tags'] = ["Action"=>0,"Sci-Fi"=>0,"Adventure"=>0,"Drama"=>0,"Fantasy"=>0,"Crime"=>0,"Western"=>0];
            $data['objects'] = $objects;
        }

        $this->load->view('recommender',$data);
    }
}