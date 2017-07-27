<?php
namespace Cielo\API30\Ecommerce;

class Shipping implements \JsonSerializable
{
    
    const METHOD_NONE = 'None';
    
    const METHOD_SAME_DAY = 'SameDay';
    
    const METHOD_ONE_DAY = 'OneDay';
    
    const METHOD_TWO_DAY = 'TwoDay';
    
    const METHOD_THREE_DAY = 'ThreeDay';
    
    const METHOD_LOW_COST = 'LowCost';
    
    const METHOD_PICKUP = 'Pickup';
    
    const METHOD_OTHER = 'Other';
    
    
    private $addressee;

    private $method;
    
    private $phone;
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->addressee = isset($data->Addressee) ? $data->Addressee : null;
        $this->method = isset($data->Method) ? $data->Method : null;
        $this->phone = isset($data->Phone) ? $data->Phone : null;
    }
    
    public static function fromJson($json)
    {
        $shipping = new Shipping();
        $shipping->populate(json_decode($json));

        return $shipping;
    }
    
    function getAddressee()
    {
        return $this->addressee;
    }

    function getMethod()
    {
        return $this->method;
    }

    function getPhone()
    {
        return $this->phone;
    }

    function setAddressee($addressee)
    {
        $this->addressee = $addressee;
        return $this;
    }

    function setMethod($method) 
    {
        $this->method = $method;
        return $this;
    }

    function setPhone($phone) 
    {
        $this->phone = $phone;
        return $this;
    }


    
}