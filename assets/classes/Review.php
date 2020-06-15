<?php

class Review
{
    protected $id;
    protected $message;
    protected $author;
    protected $operator_id;
    protected $ip_address;

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

    public function getMessage() 
    {
        return ucfirst($this->message);
    }

    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    public function getAuthor() 
    {
        return $this->author;
    }

    public function setAuthor(string $author)
    {
        $this->author = $author;
    }

    public function getTourId() 
    {
        return $this->operator_id;
    }

    public function setTourId(int $operator_id)
    {
        $this->operator_id = $operator_id;
    }

    public function getIpAddress() 
    {
        return $this->ip_address;
    }

    public function setIpAddress(string $ip_address)
    {
        $this->ip_address = $ip_address;
    }
}
?>