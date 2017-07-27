<?php
namespace Cielo\API30\Ecommerce;

class Passenger implements \JsonSerializable
{
    
    const RATING_ADULT = 'Adult';
    
    const RATING_CHILD = 'Child';
    
    const RATING_INFANT = 'Infant';
    
    const RATING_YOUTH = 'Youth';
    
    const RATING_STUDENT = 'Student';
    
    const RATING_SENIOR_CITIZEN = 'SeniorCitizen';
    
    const RATING_MILITARY = 'Military';
    
    private $email;
    
    private $identity;
    
    private $name;
    
    private $rating;
    
    private $phone;
    
    private $status;
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->email = isset($data->Email) ? $data->Email : null;
        $this->identity = isset($data->Identity) ? $data->Identity : null;
        $this->name = isset($data->Name) ? $data->Name : null;
        $this->rating = isset($data->Rating) ? $data->Rating : null;
        $this->phone = isset($data->Phone) ? $data->Phone : null;
        $this->status = isset($data->Status) ? $data->Status : null;
    }
    
    public static function fromJson($json)
    {
        $passenger = new Passenger();
        $passenger->populate(json_decode($json));

        return $passenger;
    }
    
    function getEmail() 
    {
        return $this->email;
    }

    function getIdentity() 
    {
        return $this->identity;
    }

    function getName() 
    {
        return $this->name;
    }

    function getRating() 
    {
        return $this->rating;
    }

    function getPhone()
    {
        return $this->phone;
    }

    function getStatus()
    {
        return $this->status;
    }

    function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    function setIdentity($identity) 
    {
        $this->identity = $identity;
        return $this;
    }

    function setName($name) 
    {
        $this->name = $name;
        return $this;
    }

    function setRating($rating) 
    {
        $this->rating = $rating;
        return $this;
    }

    function setPhone($phone) 
    {
        $this->phone = $phone;
        return $this;
    }

    function setStatus($status) 
    {
        $this->status = $status;
        return $this;
    }

}