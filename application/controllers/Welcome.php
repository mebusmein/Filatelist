<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor/fzaninotto/faker/src/autoload.php';

class Welcome extends MY_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *    http://example.com/index.php/welcome
     *  - or -
     *    http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {

        $this->load->model('user');
        $this->load->model('Product');
        $this->require_min_level(1);
        $user = User::find($this->auth_user_id);
        echo $user;
        $user->setPreferences($user->tags);

        $productsJson = $this->mongo_db->select()->limit($x = 200)->get('dbProject');

        $products = Product::createFromJsonBatch($productsJson);

        $this->load->library('ProductRecommender', ['user' => $user, 'objects' => $products]);
        $data['objects'] = $this->productrecommender->getRecommendation();

        var_dump($data['objects']);

    }
}
