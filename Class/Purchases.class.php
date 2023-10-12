<?php

class Purchases{

    //Variables inizialitation 
    public $purchase_number = "";
    public $order_date = "";
    public $vendor = "";
    public $schedule_date = "";
    public $sales_person = "";
    public $source_document = "";
    public $untaxed_amount = "";
    public $total = "";
    public $status = "";
    public $stellar_status = "";
    public $currancy = "";
    public $vendor_reference = "";
    public $deliver_to = "";
    public $broker = "";
    public $invoice_number = "";
    public $sales_number ="";
    public $bill_reference = "";
    public $comments = "";
    public $terms = "";
    public $tax = "";


    //Constuctor
    //


    //group of set method
    function setPurchase_number(string $number)  {
        $this->purchase_number = $number;
    }
    function setOrder_date(string $cus){
        $this->order_date = $cus;
    }
     function setVendor(string $add){
        $this->vendor = $add;
    }
     function setSchedule_date(string $date){
        $this->schedule_date = $date;
    }
     function setSales_person(string $salesPerson){
        $this->sales_person = $salesPerson;
    }
     function setSource_document(string $source){
        $this->source_document = $source;
    }
     function setUntaxed_amount(string $untaxed){
        $this->untaxed_amount = $untaxed;
    }
     function setTax(string $taxess){
        $this->tax = $taxess;
    }
     function setTotal(string $totall){
        $this->total = $totall;
    }
     function setStellar_status(string $ste){
        $this->stellar_status = $ste;
    }
     function setStatus(string $status){
        $this->status = $status;
    }
     function setCurrancy(string $cur){
        $this->currancy = $cur;
    }
     function setVendor_reference(string $ven){
        $this->global_comments = $ven;
    }
     function setDeliver_to(string $der){
        $this->deliver_to = $der;
    }
     function setBroker(string $bro){
        $this->broker = $bro;
    }
     function setInvoice_number(string $in){
        $this->invoice_number = $in;
    }
     function setSales_number(string $sal){
        $this->sales_number = $sal;
    }
    function setBill_reference(string $bil){
        $this->bill_reference = $bil;
    }
     function setComments(string $com){
        $this->comments = $com;
    }
     function setTerms(string $ter){
        $this->terms = $ter;
    }
   

    //group of get method
    public function getPurchase_number(){
        return $this->purchase_number;
    }
    public function getOrder_date(){
        return $this->order_date;
    }
    public function getVendor(){
        return $this->vendor;
    }
    public function getSchedule_date(){
        return $this->schedule_date;
    }
    public function getSales_person(){
        return $this->sales_person;
    }
    public function getSource_document(){
        return $this->source_document;
    }
    public function getUntaxed_amount(){
        return $this->untaxed_amount;
    }
    public function getTotal(){
        return $this->total;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getStellar_status(){
        return $this->stellar_status;
    }
    public function getCurrancy(){
        return $this->currancy;
    }
    public function getVendor_reference(){
        return $this->vendor_reference;
    }
    public function getDeliver_to(){
        return $this->deliver_to;
    }

    public function getBroker(){
        return $this->broker;
    }
    public function getInvoice_number(){
        return $this->invoice_number;
    }
    public function getSales_number(){
        return $this->sales_number;
    }
    public function getBill_reference(){
        return $this->bill_reference;
    }
    public function getComments(){
        return $this->comments;
    }
    public function getTerms(){
        return $this->terms;
    }
    public function getTax(){
        return $this->tax;
    }
}

?>