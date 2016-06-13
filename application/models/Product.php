<?php

get_instance()->load->iface('HasPreferences');

class Product extends CI_Model implements HasPreferences
{
    /**
     * @var string Name of the object
     */
    public $name;

    /**
     * @var double Preference score
     */
    public $score = 0;

    protected $preferences = [];

    /**
     * Product constructor.
     * @param $name
     */

    public static function init($name, $preferences = [])
    {
        $product = new self;
        $product->name = $name;
        $product->processPreferences($preferences);
        return $product;
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