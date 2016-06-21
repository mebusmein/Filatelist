<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
//    $this->load->model('tag');
    $this->load->model('bid');
//
    $users = User::find(506508006);
//
//    $tags = $users->tags;
    $bids = $users->bids;
//

//    foreach ($tags as $tag){
//      echo $tag->name;
//    }
    foreach ($bids as $bid){
      echo $bid->lot_id;
    }
  }

}
