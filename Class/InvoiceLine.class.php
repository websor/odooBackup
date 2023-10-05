<?php

class InvoiceLine{

    //Variables inizialitation 
    public $created_on = "";
    public $invoice_number = "";
    public $salers_order = "";
    public $sku = "";
    public $product = "";
    public $vendor = "";
    public $customer = "";
    public $qty_delivered = "";
    public $quantity = "";
    public $untaxed_amount = "";
    public $unit_price = "";
    public $unit_price_after = "";
    public $cost = "";
    public $taxes = "";
    public $notes = "";
    public $rma_notes = "";
    public $quantity_bo = "";
    public $serial_numbers = "";


    //group of set method
    public function setCreatedOn(string $created){
        $this->created_on = $created;
    }
    public function setInvoiceNumber(string $invoice){
        $this->invoice_number = $invoice;
    }
    public function setSalesOrder(string $salersOrder){
        $this->sales_order = $salersOrder;
    }
    public function setSku(string $setSku){
        $this->sku = $setSku;
    }
    public function setProduct(string $pro){
        $this->product = $pro;
    }
    public function setVendor(string $vendorr){
        $this->vendor = $vendorr;
    }
    public function setCustomer(string $setCustomer){
        $this->customer = $setCustomer;
    }
    public function setQty_delivered(string $qty_del){
        $this->qty_delivered = $qty_del;
    }
    public function setQuantity(string $quant){
        $this->quantity = $quant;
    }
    public function setUntaxed_amount(string $untaxedAmount){
        $this->untaxed_amount = $untaxedAmount;
    }
    public function setUnit_price(string $unitPrice){
        $this->unit_price = $unitPrice;
    }
    public function setUnit_price_after(string $unitPrice_after){
        $this->unit_price_after = $unitPrice_after;
    }
    public function setCost(string $costt){
        $this->cost = $costt;
    }
    public function setTaxes(string $taxese){
        $this->taxes = $taxese;
    }
    public function setNotes(string $notess){
        $this->notes = $notess;
    }
    public function setRma(string $rmaa){
        $this->rma_notes = $rmaa;
    }
    public function setQuantity_bo(string $quantityBo){
        $this->quantity_bo = $quantityBo;
    }
    public function setSerial(string $seriall){
        $this->serial_numbers = $seriall;
    }

    //group of get method
    public function getCreatedOn(){
        return $this->created_on;
    }
    public function getInvoice_number(){
        return $this->invoice_number;
    }
    public function getSales_order(){
        return $this->sales_order;
    }
    public function getSku(){
        return $this->sku;
    }
    public function getProduct(){
        return $this->product;
    }
    public function getVendor(){
        return $this->vendor;
    }
    public function getCustomer(){
        return $this->customer;
    }
    public function getQty_delivered(){
        return $this->qty_delivered;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function getUntaxed_amount(){
        return $this->untaxed_amount;
    }
    public function getUnit_price(){
        return $this->unit_price;
    }
    public function getUnit_price_after(){
        return $this->unit_price_after;
    }
    public function getCost(){
        return $this->cost;
    }
    public function getTaxes(){
        return $this->taxes;
    }
    public function getNotes(){
        return $this->notes;
    }
    public function getRma(){
        return $this->rma_notes;
    }
    public function getQuantity_bo(){
        return $this->quantity_bo;
    }
    public function getSerial(){
        return $this->serial_numbers;
    }
    
}

?>