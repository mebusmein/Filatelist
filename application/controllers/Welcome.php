<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

    $test = $this->mongo_db->get_where('dbProject',array('userID'=>3));
    $product = Product::createFromJsonBatch($test);

    $product = $this->mongo_db->where(array('userID'=>3))->get('dbProject');
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
    $product->save();
  }

}
