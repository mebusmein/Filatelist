<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Bid extends Eloquent{

    protected $table = 'bids';

    protected $primaryKey = 'ID';
    
}