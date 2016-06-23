<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor/fzaninotto/faker/src/autoload.php';

class Welcome extends MY_Controller {

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
    $this->load->model('Product');
    $this->load->model('user');

    /*$test = $this->mongo_db->get_where('dbProject',array('userID'=>3));
    $test = $this->mongo_db->where(array('userID'=>2))->get('dbProject');
    $product = Product::createFromJson($test[0]);
    var_dump($product);
    echo "<br>";

    $product->userID = 3;
    $product->createdBy = "Johannes koenrades klene";
    $product->productName = "Drop";
    $product->description = "oud maar goud";
    $product->startValue = 75;
    $product->startDate = "12-01-2015";
    $product->endDate = "20-20-2020";
    $product->tags = array('name' => 'tag1', 'value' => 1);
    $product->images = array('id' => 1, 'name' => 'foto', 'description'=>'foto van boven');
    $product->bids = array('bidder'=>'Bas','bid'=>115,'date'=>'24-06-2016');
    var_dump($product);
    $product->save();
    */

    $protoTags = [
      'Retro',
      'Zeldzaam',
      'Statussymbool',
      'Nieuw',
      'Klein',
      'Groot',
      'Normaal',
      'Automobiel',
      '70\'s',
      '90\''
    ];

    $faker = Faker\Factory::create('nl_NL');
    for($i=1; $i < 251; $i++){

      $tags = [];
      for($i = 0;$i<rand(2,5);$i++){
        $tags[] = [ 'name' => $protoTags[rand(0,9)], 'value' => 1];
      }

      $this->mongo_db->insert('dbProject',
          $data = array('userID'=>$i,
              'createdBy'=>$faker->name,
              'productName'=>$faker->text($maxNbChars = 20),
              'description'=>$faker->text($maxNbChars = 250),
              'startValue'=>$faker->numberBetween($min=100,$max=150000),
              'startDate'=>$faker->date($format = 'd-m-Y', $max = 'now'),
              'endDate'=>'24-06-2016',
              'tags'=> $tags,
              'images'=>[
                  ['id'=>1,'name'=>'foto1','description'=>$faker->text($maxNbChars=150)]
              ],
              'bids'=>[
                  ['bidder'=>$faker->name,'bid'=>$faker->numberBetween($min=500,$max=200000),'date'=>'24-06-2016']
              ]
    ));
    }
  }

}
