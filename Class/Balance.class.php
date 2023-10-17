<?php

class Balance{

    //Variables inizialitation 
    public $customer = "";
    public $last_update = "";
    public $total_receivable = "";


    //group of set method
    public function setCustomer(string $cus){
        $this->customer = $cus;
    }
    public function setLast_update(string $last){
        $this->last_update = $last;
    }
    public function setTotal_receivable(string $total){
        $this->total_receivable = $total;
    }


    //group of get method
    public function getCustomer(){
        return $this->customer;
    }
    public function getLast_update(){
        return $this->last_update;
    }
    public function getTotal_receivable(){
        return $this->total_receivable;
    }    
    
}

?>