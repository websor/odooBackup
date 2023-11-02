<?php

class Journal_Item{

    //Variables inizialitation 
    public $created_on = "";
    public $number = "";
    public $account = "";
    public $customer = "";
    public $label = "";
    public $reference = "";
    public $debit = "";
    public $credit = "";
    public $due_date = "";


    //group of get method
    public function getCreated_on(){
        return $this->created_on;
    }
    public function getNumber(){
        return $this->number;
    }
    public function getAccount(){
        return $this->account;
    }    
    public function getCustomer(){
        return $this->customer;
    }
    public function getLabel(){
        return $this->label;
    }
    public function getReference(){
        return $this->reference;
    }
    public function getDebit(){
        return $this->debit;
    }
    public function getCredit(){
        return $this->credit;
    }
    public function getDate(){
        return $this->due_date;
    }
   

    //group of set method
    public function setCreated_on(string $cre){
        $this->created_on = $cre;
    }
    public function setNumber(string $num){
        $this->number = $num;
    }
    public function setAccount(string $ac){
        $this->account = $ac;
    }
    public function setCustomer(string $cus){
        $this->customer = $cus;
    }
    public function setLable(string $la){
        $this->label = $la;
    }
    public function setReference(string $ref){
        $this->reference = $ref;
    }
    public function setDebit(string $deb){
        $this->debit = $deb;
    }
    public function setCredit(string $cre){
        $this->credit = $cre;
    } 
    public function setDate(string $dat){
        $this->due_date = $dat;
    } 
}

?>