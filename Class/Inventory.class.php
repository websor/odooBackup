<?php

class Inventory{

    //Variables inizialitation 
    public $sku = "";
    public $product = "";
    public $vendor = "";
    public $barcode = "";
    public $sales_price = "";
    public $cost = "";
    public $category = "";
    public $type = "";
    public $qty_onhand = "";
    public $created_by = "";
    public $created_on = "";
    public $qty_sold = "";
    public $customer_tax = "";
    public $web_description = "";



    //group of set method
    public function setSku(string $sk){
        $this->sku = $sk;
    }
    public function setProduct(string $pro){
        $this->product = $pro;
    }
    public function setVendor(string $ven){
        $this->vendor = $ven;
    }
    public function setBarcode(string $bar){
        $this->barcode = $bar;
    }
    public function setSales_price(string $sales){
        $this->sales_price = $sales;
    }
    public function setCost(string $cos){
        $this->cost = $cos;
    }
    public function setCategory(string $cat){
        $this->category = $cat;
    }
    public function setType(string $ty){
        $this->type = $ty;
    }
    public function setQty_onhand(string $qty_on){
        $this->qty_onhand = $qty_on;
    }
    public function setCreated_on(string $cre){
        $this->created_on = $cre;
    }
    public function setCreated_by(string $crea){
        $this->created_by = $crea;
    }
    public function setQty_sold(string $sold){
        $this->qty_sold = $sold;
    }
    public function setCustomer_tax(string $cust_tax){
        $this->customer_tax = $cust_tax;
    }
    public function setWeb_description(string $web){
        $this->web_description = $web;
    }



    //group of get method
    public function getSku(){
        return $this->sku;
    }
    public function getProduct(){
        return $this->product;
    }
    public function getVendor(){
        return $this->vendor;
    }    
    public function getBarcode(){
        return $this->barcode;
    }
    public function getSales_price(){
        return $this->sales_price;
    }
    public function getCost(){
        return $this->cost;
    }
    public function getCategory(){
        return $this->category;
    }
    public function getType(){
        return $this->type;
    }
    public function getQty_onhand(){
        return $this->qty_onhand;
    }
    public function getCreated_on(){
        return $this->created_on;
    }
    public function getCreated_by(){
        return $this->created_by;
    }
    public function getQty_sold(){
        return $this->qty_sold;
    }
    public function getCustomer_tax(){
        return $this->customer_tax;
    }
    public function getWeb_description(){
        return $this->web_description;
    }

    
}

?>