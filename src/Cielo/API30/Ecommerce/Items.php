<?php
namespace Cielo\API30\Ecommerce;

class Items implements \JsonSerializable
{
    const TYPE_PRIVATE_BUYER = 'CN';
    
    const TYPE_BUSINESS_BUYER = 'CP';
    
    const YES = 'Yes';
    
    const NO = 'No';
    
    const OFF = 'Off';
    
    const LOW = 'Low';
    
    const NORMAL = 'Normal';
    
    const HIGH = 'High';
    
    private $giftCategory;

    private $hostHedge;
    
    private $nonSensicalHedge;
    
    private $obscenitiesHedge;
    
    private $phoneHedge;
    
    private $name;
    
    private $quantity;
    
    private $sku;
    
    private $unitPrice;
    
    private $risk;
    
    private $timeHedge;
    
    private $type;
    
    private $velocityHedge;
    
    private $passenger;
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->giftCategory = isset($data->GiftCategory) ? $data->GiftCategory : null;
        $this->hostHedge = isset($data->HostHedge) ? $data->HostHedge : null;
        $this->nonSensicalHedge = isset($data->NonSensicalHedge) ? $data->NonSensicalHedge : null;
        $this->obscenitiesHedge = isset($data->ObscenitiesHedge) ? $data->ObscenitiesHedge : null;
        $this->phoneHedge = isset($data->PhoneHedge) ? $data->PhoneHedge : null;
        $this->name = isset($data->Name) ? $data->Name : null;
        $this->quantity = isset($data->Quantity) ? $data->Quantity : null;
        $this->sku = isset($data->Sku) ? $data->Sku : null;
        $this->unitPrice = isset($data->UnitPrice) ? $data->UnitPrice : null;
        $this->risk = isset($data->Risk) ? $data->Risk : null;
        $this->timeHedge = isset($data->TimeHedge) ? $data->TimeHedge : null;
        $this->type = isset($data->Type) ? $data->Type : null;
        $this->velocityHedge = isset($data->VelocityHedge) ? $data->VelocityHedge : null;  
        
        if (isset($data->Passenger)) {
            $this->passenger = new Passenger();
            $this->passenger->populate($data->Passenger);
        }
    }
    
    public static function fromJson($json)
    {
        $items = new Items();
        $items->populate(json_decode($json));

        return $items;
    }
    
    function getGiftCategory() 
    {
        return $this->giftCategory;
    }

    function getHostHedge()
    {
        return $this->hostHedge;
    }

    function getNonSensicalHedge() 
    {
        return $this->nonSensicalHedge;
    }

    function getObscenitiesHedge() 
    {
        return $this->obscenitiesHedge;
    }

    function getPhoneHedge()
    {
        return $this->phoneHedge;
    }

    function getName() 
    {
        return $this->name;
    }

    function getQuantity() 
    {
        return $this->quantity;
    }

    function getSku() 
    {
        return $this->sku;
    }

    function getUnitPrice()
    {
        return $this->unitPrice;
    }

    function getRisk()
    {
        return $this->risk;
    }

    function getTimeHedge() 
    {
        return $this->timeHedge;
    }

    function getType()
    {
        return $this->type;
    }

    function getVelocityHedge()
    {
        return $this->velocityHedge;
    }

    function setGiftCategory($giftCategory) 
    {
        $this->giftCategory = $giftCategory;
        return $this;
    }

    function setHostHedge($hostHedge)
    {
        $this->hostHedge = $hostHedge;
        return $this;
    }

    function setNonSensicalHedge($nonSensicalHedge) 
    {
        $this->nonSensicalHedge = $nonSensicalHedge;
        return $this;
    }

    function setObscenitiesHedge($obscenitiesHedge) 
    {
        $this->obscenitiesHedge = $obscenitiesHedge;
        return $this;
    }

    function setPhoneHedge($phoneHedge) 
    {
        $this->phoneHedge = $phoneHedge;
        return $this;
    }

    function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    function setQuantity($quantity) 
    {
        $this->quantity = $quantity;
        return $this;
    }

    function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    function setUnitPrice($unitPrice) 
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    function setRisk($risk) 
    {
        $this->risk = $risk;
        return $this;
    }

    function setTimeHedge($timeHedge) 
    {
        $this->timeHedge = $timeHedge;
        return $this;
    }

    function setType($type) 
    {
        $this->type = $type;
        return $this;
    }

    function setVelocityHedge($velocityHedge) 
    {
        $this->velocityHedge = $velocityHedge;
        return $this;
    }
    
    function getPassenger() 
    {
        return $this->passenger;
    }

    function setPassenger(Passenger $passenger) 
    {
        $this->passenger = $passenger;
        return $this;
    }

}