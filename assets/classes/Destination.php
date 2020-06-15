<?php

class Destination
{
    protected $id;
    protected $location;
    protected $price;
    protected $operator_id;

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

    public function getLocation() 
    {
        return ucfirst($this->location);
    }

    public function setLocation(string $location)
    {
        $this->location = $location;
    }

    public function getPrice() 
    {
        return $this->price;
    }

    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    public function getTourId() 
    {
        return $this->operator_id;
    }

    public function setTourId(int $operator_id)
    {
        $this->operator_id = $operator_id;
    }
}
?>