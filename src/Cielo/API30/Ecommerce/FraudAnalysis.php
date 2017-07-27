<?php
namespace Cielo\API30\Ecommerce;

class FraudAnalysis implements \JsonSerializable
{

    const SEQUENCE_AUTHORIZE_FIRST = 'AuthorizeFirst';
    
    const SEQUENCE_CRITERIA_ONSUCESS = 'OnSuccess';
    
    const SEQUENCE_CRITERIA_ALWAYS = 'Always';
    
    private $sequence;

    private $sequenceCriteria;
    
    private $fingerPrintId;
    
    private $browser;
    
    private $cart;
    
    private $merchantDefinedFields;
    
    private $shipping;
    
    private $travel;
    
    private $id;
    
    private $status;
    
    private $replyData;

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->sequence = isset($data->Sequence) ? $data->Sequence : null;
        $this->sequenceCriteria = isset($data->SequenceCriteria) ? $data->SequenceCriteria : null;
        $this->fingerPrintId = isset($data->FingerPrintId) ? $data->FingerPrintId : null;
    
        if (isset($data->Browser)) {
            $this->browser = new Browser();
            $this->browser->populate($data->Browser);
        }
    
        if (isset($data->Cart)) {
            $this->cart = new Cart();
            $this->cart->populate($data->Cart);
        }
        
        if (isset($data->MerchantDefinedFields)) {
            $this->merchantDefinedFields = new MerchantDefinedFields();
            $this->merchantDefinedFields->populate($data->MerchantDefinedFields);
        }
        
        if (isset($data->Shipping)) {
            $this->shipping = new Shipping();
            $this->shipping->populate($data->Shipping);
        }
        
        if (isset($data->Travel)) {
            $this->travel = new Travel();
            $this->travel->populate($data->Travel);
        }
        
        if (isset($data->ReplyData)) {
            $this->replyData = new ReplyData();
            $this->replyData->populate($data->ReplyData);
        }
    }
    
    public static function fromJson($json)
    {
        $fraudAnalysis = new FraudAnalysis();
        $fraudAnalysis->populate(json_decode($json));

        return $fraudAnalysis;
    }

    function getSequence()
    {
        return $this->sequence;
    }

    function getSequenceCriteria() 
    {
        return $this->sequenceCriteria;
    }

    function getFingerPrintId()
    {
        return $this->fingerPrintId;
    }

    function getBrowser() 
    {
        return $this->browser;
    }

    function getCart() 
    {
        return $this->cart;
    }

    function getMerchantDefinedFields() 
    {
        return $this->merchantDefinedFields;
    }

    function getShipping()
    {
        return $this->shipping;
    }

    function getTravel() 
    {
        return $this->travel;
    }

    function setSequence($sequence)
    {
        $this->sequence = $sequence;
        return $this;
    }

    function setSequenceCriteria($sequenceCriteria) 
    {
        $this->sequenceCriteria = $sequenceCriteria;
        return $this;
    }

    function setFingerPrintId($fingerPrintId) 
    {
        $this->fingerPrintId = $fingerPrintId;
        return $this;
    }

    function setBrowser(Browser $browser)
    {
        $this->browser = $browser;
        return $this;
    }

    function setCart(Cart $cart) 
    {
        $this->cart = $cart;
        return $this;
    }

    function setMerchantDefinedFields(MerchantDefinedFields $merchantDefinedFields) 
    {
        $this->merchantDefinedFields = $merchantDefinedFields;
        return $this;
    }

    function setShipping(Shipping $shipping) 
    {
        $this->shipping = $shipping;
        return $this;
    }

    function setTravel(Travel $travel) 
    {
        $this->travel = $travel;
        return $this;
    }
    
    function getId() 
    {
        return $this->id;
    }

    function getStatus() 
    {
        return $this->status;
    }

    function getReplyData() 
    {
        return $this->replyData;
    }

    function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    function setStatus($status) 
    {
        $this->status = $status;
        return $this;
    }

    function setReplyData(ReplyData $replyData) 
    {
        $this->replyData = $replyData;
        return $this;
    }

}