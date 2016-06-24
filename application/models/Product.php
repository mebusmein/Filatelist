<?php

get_instance()->load->iface('HasPreferences');
class Product extends CI_Model implements HasPreferences
{

    public $name;
    /**
     * @var string Name of the object
     */
    public $id = null;
    public $userID;
    public $createdBy;
    public $productName;
    public $description;
    public $startValue;
    public $startDate;
    public $endDate;
    public $tags = [];
    public $images = [];
    public $bids = [];

    /**
     * @var double Preference score
     */
    public $score = 0;

    protected $preferences = [];

    /**
     * Product constructor.
     * @param $name
     */

    public static function createFromJsonBatch($json){
        $products = [];
        foreach($json as $value){
            $products[] = self::createFromJson($value);
        }
        return $products;
    }

    public static function createFromJson($string){
        $product = new Product();
        $product->id = $string['_id']->__toString();
        $product->userID = $string['userID'];
        $product->productName = $string['productName'];
        $product->description = $string['description'];
        $product->startValue = $string['startValue'];
        $product->startDate = $string['startDate'];
        $product->endDate = $string['endDate'];
        $product->tags = $string['tags'];
        $product->images = $string['images'];
        $product->bids = $string['bids'];
        $product->setPreferences();
        $product->name = $product->productName;
        return $product;
    }

    public function getHighestBid(){
        $top = ['bid' => 0];
        foreach($this->bids as $bid){
            if($top['bid'] < $bid['bid'])
                $top = $bid;
        }
        return $top;
    }

    public function save(){
        if($this->id !== NULL){
            $this->mongo_db->where(array('_id'=>$this->id))->update('dbProject',array('userID'=>$this->userID,'createdBy'=>$this->createdBy,'productName'=>$this->productName,'description'=>$this->description,'startValue'=>$this->startValue,'startDate'=>$this->startDate,'endDate'=>$this->endDate,'tags'=>$this->tags,'images'=>$this->images,'bids'=>$this->bids));
        }else{
            $this->id = $this->mongo_db->insert('dbProject', $data = array('userID'=>$this->userID,'createdBy'=>$this->createdBy,'productName'=>$this->productName,'description'=>$this->description,'startValue'=>$this->startValue,'startDate'=>$this->startDate,'endDate'=>$this->endDate,'tags'=>$this->tags,'images'=>$this->images,'bids'=>$this->bids))->__tostring();
        }
    }

    public static function init($name, $preferences = [])
    {
        $product = new self;
        $product->name = $name;
        $product->processPreferences($preferences);
        return $product;
    }

    public function setPreferences(){
        foreach($this->tags as $tag){
            $this->setPreference($tag['name'],$tag['value']);
        }
    }

    protected function processPreferences($preferences)
    {

        foreach ($preferences as $preference => $value) {
            if (is_numeric($preference)) {
                $preference = $value;
                $value = 1.0;
            }

            if ($value == 0) {
                $this->preferences[$preference] = $value;
            }

            $this->preferences[$preference][self::WEIGHT] = $value < 0 ? max($value, -1.0) : min($value, 1.0);
        }
    }


    /**
     * @return array
     */
    public function getPreferences()
    {
        return $this->preferences;
    }

    /**
     * Set an attribute
     *
     * @param $tag
     * @param $weight
     * @param $count
     */
    public function setPreference($tag, $weight)
    {
        if ($weight < -1.0 || $weight > 1.0) {
            throw new Exception('Invalid weight');
        }

        $this->preferences[$tag] = [
            self::WEIGHT => $weight,
        ];

        return $this;
    }

    /**
     * @param float $score
     * @return Product
     */
    public function setScore($score)
    {
        $this->score = $score;
        return $this;
    }
}