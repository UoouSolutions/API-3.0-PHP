<?php
namespace Cielo\API30\Ecommerce;

class ReplyData implements \JsonSerializable
{
    
    private $addAddressInfoCode;
    
    private $factorCode;
    
    private $score;
    
    private $binCountry;
    
    private $cardIssuer;
    
    private $cardScheme;
    
    private $hostSeverity;
    
    private $internetInfoCode;
    
    private $ipRoutingMethod;
    
    private $scoreModelUsed;
    
    private $casePriority;
    
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function populate(\stdClass $data)
    {
        $this->addAddressInfoCode = isset($data->AddAddressInfoCode) ? $data->AddAddressInfoCode : null;
        $this->factorCode = isset($data->FactorCode) ? $data->FactorCode : null;
        $this->score = isset($data->Score) ? $data->Score : null;
        $this->binCountry = isset($data->BinCountry) ? $data->BinCountry : null;
        $this->cardIssuer = isset($data->CardIssuer) ? $data->CardIssuer : null;
        $this->cardScheme = isset($data->CardScheme) ? $data->CardScheme : null;
        $this->hostSeverity = isset($data->HostSeverity) ? $data->HostSeverity : null;
        $this->internetInfoCode = isset($data->InternetInfoCode) ? $data->InternetInfoCode : null;
        $this->ipRoutingMethod = isset($data->IpRoutingMethod) ? $data->IpRoutingMethod : null;
        $this->scoreModelUsed = isset($data->ScoreModelUsed) ? $data->ScoreModelUsed : null;
        $this->casePriority = isset($data->CasePriority) ? $data->CasePriority : null;

    }
    
    public static function fromJson($json)
    {
        $replyData = new ReplyData();
        $replyData->populate(json_decode($json));

        return $replyData;
    }
    
    function getCookiesAccepted()
    {
        return $this->cookiesAccepted;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getHostName() 
    {
        return $this->hostName;
    }

    function getIpAddress() 
    {
        return $this->ipAddress;
    }

    function getType() 
    {
        return $this->addAddressInfoCode;
    }

    function setCookiesAccepted($cookiesAccepted) 
    {
        $this->cookiesAccepted = $cookiesAccepted;
        return $this;
    }

    function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    function setHostName($hostName) 
    {
        $this->hostName = $hostName;
        return $this;
    }

    function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    function setType($type)
    {
        $this->addAddressInfoCode = $type;
        return $this;
    }

    function getAddAddressInfoCode() 
    {
        return $this->addAddressInfoCode;
    }

    function getFactorCode()
    {
        return $this->factorCode;
    }

    function getScore() 
    {
        return $this->score;
    }

    function getBinCountry() 
    {
        return $this->binCountry;
    }

    function getCardIssuer()
    {
        return $this->cardIssuer;
    }

    function getCardScheme() {
        return $this->cardScheme;
    }

    function getHostSeverity() 
    {
        return $this->hostSeverity;
    }

    function getInternetInfoCode() 
    {
        return $this->internetInfoCode;
    }

    function getIpRoutingMethod() 
    {
        return $this->ipRoutingMethod;
    }

    function getScoreModelUsed()
    {
        return $this->scoreModelUsed;
    }

    function getCasePriority() 
    {
        return $this->casePriority;
    }

    function setAddAddressInfoCode($addAddressInfoCode) 
    {
        $this->addAddressInfoCode = $addAddressInfoCode;
        return $this;
    }

    function setFactorCode($factorCode) 
    {
        $this->factorCode = $factorCode;
        return $this;
    }

    function setScore($score) {
        $this->score = $score;
        return $this;
    }

    function setBinCountry($binCountry) 
    {
        $this->binCountry = $binCountry;
        return $this;
    }

    function setCardIssuer($cardIssuer)
    {
        $this->cardIssuer = $cardIssuer;
        return $this;
    }

    function setCardScheme($cardScheme) 
    {
        $this->cardScheme = $cardScheme;
        return $this;
    }

    function setHostSeverity($hostSeverity)
    {
        $this->hostSeverity = $hostSeverity;
        return $this;
    }

    function setInternetInfoCode($internetInfoCode)
    {
        $this->internetInfoCode = $internetInfoCode;
        return $this;
    }

    function setIpRoutingMethod($ipRoutingMethod)
    {
        $this->ipRoutingMethod = $ipRoutingMethod;
        return $this;
    }

    function setScoreModelUsed($scoreModelUsed) 
    {
        $this->scoreModelUsed = $scoreModelUsed;
        return $this;
    }

    function setCasePriority($casePriority) 
    {
        $this->casePriority = $casePriority;
        return $this;
    }

}