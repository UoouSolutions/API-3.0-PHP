<?php
namespace Cielo\API30\Ecommerce;

class Travel implements \JsonSerializable
{
    
    private $departureTime;

    private $journeyType;
    
    private $route;
    
    private $legs;
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->departureTime = isset($data->DepartureTime) ? $data->DepartureTime : null;
        $this->journeyType = isset($data->JourneyType) ? $data->JourneyType : null;
        $this->route = isset($data->Route) ? $data->Route : null;
        
        if (isset($data->Legs)) {
            $this->legs = new Legs();
            $this->legs->populate($data->Legs);
        }
    }
    
    public static function fromJson($json)
    {
        $travel = new Travel();
        $travel->populate(json_decode($json));

        return $travel;
    }

    function getDepartureTime() 
    {
        return $this->departureTime;
    }

    function getJourneyType()
    {
        return $this->journeyType;
    }

    function getRoute() 
    {
        return $this->route;
    }

    function getLegs() 
    {
        return $this->legs;
    }

    function setDepartureTime($departureTime) 
    {
        $this->departureTime = $departureTime;
        return $this;
    }

    function setJourneyType($journeyType) 
    {
        $this->journeyType = $journeyType;
        return $this;
    }

    function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }

    function setLegs(Legs $legs) 
    {
        $this->legs = $legs;
        return $this;
    }

}