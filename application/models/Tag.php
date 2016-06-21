<?php defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Tag extends Eloquent{

    protected $table = 'tags';
    
    protected $primaryKey = 'tag_id';

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $dates = ['deleted_at'];

    public $timestamps = true;
}