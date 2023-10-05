<?php

class Invoice{

    //Variables inizialitation 
    public $invoice_number = "";
    public $sales_order = "";
    public $customer = "";
    public $delivery_address = "";
    public $payment_terms = "";
    public $invoice_date = "";
    public $due_date = "";
    public $sales_person = "";
    public $sales_team = "";
    public $global_Comments = "";
    public $invoice_notes = "";
    public $customer_po = "";
    public $currancy = "";
    public $untaxed_amount = "";
    public $tax = "";
    public $total = "";
    public $amount_due = "";
    public $warehouseNotes = "";
    public $customerNotes = "";

    //Constuctor



    //group of set method
    function setInvoiceNumber(string $invoice)  {
        $this->invoice_number = $invoice;
    }
    function setSalesOrder(string $order){
        $this->sales_order = $order;
    }
     function setCustomer(string $setCustomer){
        $this->customer = $setCustomer;
    }
     function setDeliveryAddress(string $delivery){
        $this->delivery_address = $delivery;
    }
     function setPaymentTerms(string $payment){
        $this->payment_terms = $payment;
    }
     function setInvoiceDate(string $date){
        $this->invoice_date = $date;
    }
     function setDueDate(string $due){
        $this->due_date = $due;
    }
     function setSalesPerson(string $person){
        $this->sales_person = $person;
    }
     function setSalesTeam(string $team){
        $this->sales_team = $team;
    }
     function setGlobalComments(string $global){
        $this->global_Comments = $global;
    }
     function setInvoiceNotes(string $notes){
        $this->invoice_notes = $notes;
    }
     function setCustomerPo(string $po){
        $this->customer_po = $po;
    }
     function setCurrancy(string $curran){
        $this->currancy = $curran;
    }
     function setUntaxedAmount(string $untaxed){
        $this->untaxed_amount = $untaxed;
    }
     function setTax(string $taxes){
        $this->tax = $taxes;
    }
     function setTotal(string $tot){
        $this->total = $tot;
    }
     function setAmountDue(string $amountDue){
        $this->amount_due = $amountDue;
    }
     function setWarehouseNotes(string $warehouse){
        $this->warehouseNotes = $warehouse;
    }
     function setCustomerNotes(string $cus){
        $this->customerNotes = $cus;
    }
   

    //group of get method
    public function getInvoiceNumber(){
        return $this->invoice_number;
    }
    public function getSalesOrder(){
        return $this->sales_order;
    }
    public function getCustomer(){
        return $this->customer;
    }
    public function getDeliveryAddress(){
        return $this->delivery_address;
    }
    public function getPaymentTerm(){
        return $this->payment_terms;
    }
    public function getInvoiceDate(){
        return $this->invoice_date;
    }
    public function getDueDate(){
        return $this->due_date;
    }
    public function getSalesPerson(){
        return $this->sales_person;
    }
    public function getSalesTeam(){
        return $this->sales_team;
    }
    public function getGlobalComments(){
        return $this->global_Comments;
    }
    public function getInvoiceNotes(){
        return $this->invoice_notes;
    }
    public function getCustomerPo(){
        return $this->customer_po;
    }
    public function getCurrancy(){
        return $this->currancy;
    }

    public function getUntaxedAmount(){
        return $this->untaxed_amount;
    }
    public function getTax(){
        return $this->tax;
    }
    public function getTotal(){
        return $this->total;
    }
    public function getAmountDue(){
        return $this->amount_due;
    }
    public function getWarehouseNotes(){
        return $this->warehouseNotes;
    }
    public function getCustomerNotes(){
        return $this->customerNotes;
    }
   
}

?>