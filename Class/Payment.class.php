<?php

class Payment{

    //Variables inizialitation 
    public $payment_date = "";
    public $payment_number = "";
    public $customer_ref = "";
    public $employee = "";
    public $payment_journal = "";
    public $customer = "";
    public $amount = "";
    public $status = "";
    public $payment_type = "";
    public $memo = "";
    public $payment_trans = "";

    //group of get method
    public function getPayment_date(){
        return $this->payment_date;
    }
    public function getPayment_number(){
        return $this->payment_number;
    }
    public function getCustomer_ref(){
        return $this->customer_ref;
    }
    public function getEmployee(){
        return $this->employee;
    }
    public function getPayment_journal(){
        return $this->payment_journal;
    }
    public function getCustomer(){
        return $this->customer;
    }
    public function getAmount(){
        return $this->amount;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getPayment_type(){
        return $this->payment_type;
    }
    public function getMemo(){
        return $this->memo;
    }
    public function getPayment_trans(){
        return $this->payment_trans;
    }

    //group of set method
    public function setPayment_date(string $date){
        $this->payment_date = $date;
    }
    public function setPayment_number(string $number){
        $this->payment_number = $number;
    }
    public function setCustomer_ref(string $ref){
        $this->customer_ref = $ref;
    }
    public function setEmployee(string $emp){
        $this->employee = $emp;
    }
    public function setPayment_journal(string $jour){
        $this->payment_journal = $jour;
    }
    public function setCustomer(string $cus){
        $this->customer = $cus;
    }
    public function setAmount(string $amount){
        $this->amount = $amount;
    }
    public function setStatus(string $status){
        $this->status = $status;
    }
    public function setPayment_type(string $type){
        $this->payment_type = $type;
    }
    public function setMemo(string $mem){
        $this->memo = $mem;
    }
    public function setPayment_trans(string $trans){
        $this->payment_trans = $trans;
    }

    
}

?>