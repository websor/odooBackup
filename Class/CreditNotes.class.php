<?php

class CreditNotes{

    //Variables inizialitation 
    public $creditnote_number = "";
    public $customer = "";
    public $address = "";
    public $invoice_date = "";
    public $sales_person = "";
    public $due_date = "";
    public $source_document = "";
    public $untaxed_amount = "";
    public $tax = "";
    public $total = "";
    public $amount_due = "";
    public $status = "";
    public $payment_terms = "";
    public $global_comments = "";
    public $invoices_notes = "";
    public $customer_po ="";
    public $warehouse_note = "";
    public $customer_notes = "";


    //Constuctor
    //


    //group of set method
    function setCreditnote_number(string $number)  {
        $this->creditnote_number = $number;
    }
    function setCustomer(string $cus){
        $this->customer = $cus;
    }
     function setAddress(string $add){
        $this->address = $add;
    }
     function setInvoice_date(string $date){
        $this->invoice_date = $date;
    }
     function setSales_person(string $salesPerson){
        $this->sales_person = $salesPerson;
    }
     function setDue_date(string $due){
        $this->due_date = $due;
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
     function setAmount_due(string $amount_due){
        $this->amount_due = $amount_due;
    }
     function setStatus(string $status){
        $this->status = $status;
    }
     function setPayment_terms(string $payments){
        $this->payment_terms = $payments;
    }
     function setGlobal_comments(string $global){
        $this->global_comments = $global;
    }
     function setInvoices_notes(string $inv_notes){
        $this->invoices_notes = $inv_notes;
    }
     function setCustomer_po(string $cust_po){
        $this->customer_po = $cust_po;
    }
     function setWarehouse_note(string $warehouse){
        $this->warehouse_note = $warehouse;
    }
     function setCustomerNotes(string $cus){
        $this->customerNotes = $cus;
    }
   

    //group of get method
    public function getCreditnote_number(){
        return $this->creditnote_number;
    }
    public function getCustomer(){
        return $this->customer;
    }
    public function getAddress(){
        return $this->address;
    }
    public function getInvoice_date(){
        return $this->invoice_date;
    }
    public function getSales_person(){
        return $this->sales_person;
    }
    public function getDue_date(){
        return $this->due_date;
    }
    public function getSource_document(){
        return $this->source_document;
    }
    public function getUntaxed_amount(){
        return $this->untaxed_amount;
    }
    public function getTax(){
        return $this->tax;
    }
    public function getTotal(){
        return $this->total;
    }
    public function getAmount_due(){
        return $this->amount_due;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getPayment_terms(){
        return $this->payment_terms;
    }

    public function getGlobal_comments(){
        return $this->global_comments;
    }
    public function getInvoices_notes(){
        return $this->invoices_notes;
    }
    public function getCustomer_po(){
        return $this->customer_po;
    }
    public function getWarehouse_note(){
        return $this->warehouse_note;
    }
    public function getCustomer_notes(){
        return $this->customer_notes;
    }
}

?>