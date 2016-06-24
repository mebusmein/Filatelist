<?php
get_instance()->load->library('Recommender');

class ProductRecommender extends Recommender
{
    const USER_ID = '__USER__';
    protected $data;
    protected $identifier = 'name';

    /**
     * @var Product[]
     */
    protected $objects;

    public function __construct($data)
    {
        $this->data[self::USER_ID] = $this->processUser($data['user']);
        $this->data = array_merge($this->data, $this->processObjects($data['objects']));
    }

    public function getRecommendation()
    {
        foreach ($this->data as $k => $v) {
            if ($k !== self::USER_ID) {
                $this->objects[$k]->setScore($this->similarityDistance($this->data, self::USER_ID, $k));
            }
        }

        usort($this->objects, function ($a, $b) {
            if ($a->score == $b->score) {
                return 0;
            }

            return $a->score < $b->score ? 1 : -1;
        });

        return $this->objects;
    }

    protected function processUser(HasPreferences $user)
    {
        $result = [];

        foreach ($user->getPreferences() as $tag => $value) {
            $result[$tag] = $value[HasPreferences::WEIGHT];
        }

        return $result;
    }

    protected function processObjects(array $objects)
    {
        $result = [];

        foreach ($objects as $object) {
            foreach ($object->getPreferences() as $tag => $value) {
                $result[$object->{$this->identifier}][$tag] = $value[HasPreferences::WEIGHT];
                $this->objects[$object->{$this->identifier}] = $object;
            }
        }

        return $result;
    }

    /**
     * @param string $identifier
     * @return ProductRecommender
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
        return $this;
    }
}