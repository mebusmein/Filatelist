<?php
get_instance()->load->iface('HasPreferences');

class User extends CI_Model implements HasPreferences
{
    public $name;

    protected $preferences = [];

    /**
     * Product constructor.
     * @param $name
     */
    public function __construct()
    {
        parent::__construct();
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
    public function setPreference($tag, $weight, $count)
    {
        if ($weight < -1.0 || $weight > 1.0) {
            throw new Exception('Invalid weight');
        }

        if ($count <= 0) {
            throw new Exception('Invalid count');
        }

        $this->preferences[$tag] = [
            self::WEIGHT => $weight,
            self::COUNT => $count
        ];

        return $this;
    }

    /**
     * @param $tag
     */
    public function likePreference($tag)
    {
        if (!isset($this->preferences[$tag])) {
            $this->preferences[$tag] = [
                self::WEIGHT => self::ALPHA,
                self::COUNT => 1
            ];
        } else {
            $step = (1 / $this->preferences[$tag][self::COUNT]) * self::ALPHA;
            $weight = $this->preferences[$tag][self::WEIGHT] + $step;
            $this->preferences[$tag][self::WEIGHT] = min($weight, 1.0);
        }

        return $this;
    }

    /**
     * @param $tag
     */
    public function dislikePreference($tag)
    {
        if (!isset($this->preferences[$tag])) {
            $this->preferences[$tag] = [
                self::WEIGHT => -self::ALPHA,
                self::COUNT => 1
            ];
        } else {
            $step = (1 / $this->preferences[$tag][self::COUNT]) * -self::ALPHA;
            $weight = $this->preferences[$tag][self::WEIGHT] + $step;
            $this->preferences[$tag][self::WEIGHT] = max($weight, -1.0);
        }

        return $this;
    }
}