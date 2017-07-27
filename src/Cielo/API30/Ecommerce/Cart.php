<?php
namespace Cielo\API30\Ecommerce;

class Cart implements \JsonSerializable
{
    
    private $isGift;

    private $returnsAccepted;
    
    private $items;
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->isGift = isset($data->IsGift) ? $data->IsGift : null;
        $this->returnsAccepted = isset($data->ReturnsAccepted) ? $data->ReturnsAccepted : null;
                
        if (isset($data->Items)) {
            $this->items = new Items();
            $this->items->populate($data->Items);
        }
    }
    
    public static function fromJson($json)
    {
        $cart = new Cart();
        $cart->populate(json_decode($json));

        return $cart;
    }
    
    function getIsGift() 
    {
        return $this->isGift;
    }

    function getReturnsAccepted() 
    {
        return $this->returnsAccepted;
    }

    function setIsGift($isGift) 
    {
        $this->isGift = $isGift;
        return $this;
    }

    function setReturnsAccepted($returnsAccepted) 
    {
        $this->returnsAccepted = $returnsAccepted;
        return $this;
    }
    
    function getItems()
    {
        return $this->items;
    }
    
    
    function setItems(Items $items) 
    {
        $this->items = $items;
        return $this;
    }
    
}