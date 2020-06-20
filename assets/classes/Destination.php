<?php

class Destination
{
    protected $id;
    protected $location;
    protected $price;
    protected $operator_id;
    protected $img;
    protected $description;

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
        return (int)$this->id;
    }

    public function setId($id)
    {
        $id = (int) $id;
        $this->id = $id;
    }

    public function getLocation() 
    {
        return ucwords($this->location);
    }

    public function setLocation(string $location)
    {
        $this->location = $location;
    }

    public function getPrice() 
    {
        return (int)$this->price;
    }

    public function setPrice($price)
    {
        $price = (int) $price;
        $this->price = $price;
    }

    public function getOperatorId() 
    {
        return $this->operator_id;
    }

    public function setOperatorId($operatorId)
    {
        $operator_id = $operatorId;
        $this->operator_id = $operator_id;
    }

    public function getImg() 
    {
        return $this->img;
    }

    public function setImg(string $img)
    {
        $this->img = $img;
    }

    public function getDescription() 
    {
        return ucfirst($this->description);
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }
}
?>