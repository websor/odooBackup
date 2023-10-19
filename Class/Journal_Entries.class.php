<?php

class Journal_Entries{

    //Variables inizialitation 
    public $created_on = "";
    public $date = "";
    public $number = "";
    public $customer = "";
    public $reference = "";
    public $journal = "";
    public $status = "";
    public $amount = "";


    //group of get method
    public function getCreated_on(){
        return $this->created_on;
    }
    public function getDate(){
        return $this->date;
    }
    public function getNumber(){
        return $this->number;
    }
    public function getCustomer(){
        return $this->customer;
    }
    public function getReference(){
        return $this->reference;
    }
    public function getJournal(){
        return $this->journal;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getAmount(){
        return $this->amount;
    }
   

    //group of set method
    public function setCreated_on(string $cre){
        $this->created_on = $cre;
    }
    public function setDate(string $da){
        $this->date = $da;
    }
    public function setNumber(string $num){
        $this->number = $num;
    }
    public function setCustomer(string $cus){
        $this->customer = $cus;
    }
    public function setReference(string $re){
        $this->reference = $re;
    }
    public function setJournal(string $jou){
        $this->journal = $jou;
    }
    public function setStatus(string $sta){
        $this->status = $sta;
    }
    public function setAmount(string $amo){
        $this->amount = $amo;
    } 
}

?>