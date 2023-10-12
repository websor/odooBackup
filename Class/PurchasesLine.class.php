<?php

class PurchasesLine{

    //Variables inizialitation 
    public $sku = "";
    public $product = "";
    public $quantity = "";
    public $unit_cost = "";
    public $taxes = "";
    public $subtotal = "";
    public $purchase_number = "";
    public $vendor = "";
    public $total = "";
    public $receive_qty = "";
    public $created_on = "";

    //Constuctor
    //

    //group of set method
    function setSku(string $sk)  {
        $this->sku = $sk;
    }
    function setProduct(string $pro){
        $this->product = $pro;
    }
     function setQuantity(string $quant){
        $this->quantity = $quant;
    }
     function setUnit_cost(string $uni){
        $this->unit_cost = $uni;
    }
     function setTaxes(string $ta){
        $this->taxes = $ta;
    }
     function setSubtotal(string $su){
        $this->subtotal = $su;
    }
     function setPurchase_number(string $pur){
        $this->purchase_number = $pur;
    }
     function setVendor(string $ve){
        $this->vendor = $ve;
    }
     function setTotal(string $totall){
        $this->total = $totall;
    }
     function setReceive_qty(string $re){
        $this->receive_qty = $re;
    }
     function setCreated_on(string $crea){
        $this->created_on = $crea;
    }
   

    //group of get method
    public function getSku(){
        return $this->sku;
    }
    public function getProduct(){
        return $this->product;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function getUnit_cost(){
        return $this->unit_cost;
    }
    public function getTaxes(){
        return $this->taxes;
    }
    public function getSubtotal(){
        return $this->subtotal;
    }
    public function getPurchase_number(){
        return $this->purchase_number;
    }
    public function getVendor(){
        return $this->vendor;
    }
    public function getTotal(){
        return $this->total;
    }
    public function getReceive_qty(){
        return $this->receive_qty;
    }
    public function getCreated_on(){
        return $this->created_on;
    }
}

?>