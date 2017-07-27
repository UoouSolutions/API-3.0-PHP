<?php
namespace Cielo\API30\Ecommerce;

class Legs implements \JsonSerializable
{
    
    private $destination;

    private $origin;
        
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->destination = isset($data->destination) ? $data->destination : null;
        $this->origin = isset($data->origin) ? $data->origin : null;
    }
    
    public static function fromJson($json)
    {
        $legs = new Legs();
        $legs->populate(json_decode($json));

        return $legs;
    }

    function getDestination() 
    {
        return $this->destination;
    }

    function getOrigin() 
    {
        return $this->origin;
    }

    function setDestination($destination) 
    {
        $this->destination = $destination;
        return $this;
    }

    function setOrigin($origin)
    {
        $this->origin = $origin;
        return $this;
    }

}