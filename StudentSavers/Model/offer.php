<?php
class Offer{

    private $ID;
    private $Name;
    private $Description;
    private $Location;
    private $Discount;
    private $DiscountCode;
    private $OfferImagePath;

    function __get($name){
    return $this->$name;
    }

    function __set($name,$value){
    $this->$name = $value;
    }
}
?>