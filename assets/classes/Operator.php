<?php

class Operator
{
    protected $id;
    protected $name;
    protected $rate;
    protected $link;
    protected $is_premium;
    protected $logo;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' .ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId() 
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getName() 
    {
        return ucfirst($this->name);
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getRate() 
    {
        return $this->rate;
    }

    public function setRate(float $rate)
    {
        $this->rate = $rate;
    }

    public function getLink() 
    {
        return $this->link;
    }

    public function setLink(string $link)
    {
        $this->link = $link;
    }

    public function getIsPremium() 
    {
        return $this->is_premium;
    }

    public function setIsPremium(int $is_premium)
    {
        $this->is_premium = $is_premium;
    }

    public function getLogo() 
    {
        return $this->logo;
    }

    public function setLogo(string $logo)
    {
        $this->logo = $logo;
    }
}
?>