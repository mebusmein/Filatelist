<?php
get_instance()->load->iface('HasPreferences');
get_instance()->load->model('tag');

use \Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent implements HasPreferences
{
    public $name;

    protected $table = 'users';

    protected $primaryKey = 'user_id';

    protected $guarded = ['passwd', 'passwd_recovery_code', 'passwd_recovery_date'];

    protected $preferences = [];

    public $timestamps = false;

    /**
     * Product constructor.
     * @param $name
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function tags(){
        return $this->belongsToMany('Tag','user_tag')->withPivot('value', 'count');
    }

    public function bids(){
        return $this->hasMany('Bid');
    }

    /**
     * @return array
     */
    public function getPreferences()
    {
        return $this->preferences;
    }


    public function setPreferences($tags)
    {
        foreach($tags as $tag){
            $this->setPreference($tag->name,$tag->pivot->value,$tag->pivot->count);
        }
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