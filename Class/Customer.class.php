<?php

class Customer{

    //Variables inizialitation 
    public $name = "";
    public $parent_name = "";
    public $state = "";
    public $city = "";
    public $country = "";
    public $postal_code = "";
    public $fiscal_position = "";
    public $phone = "";
    public $email = "";
    public $street = "";
    public $created_by = "";
    public $customer_id_number = "";
    public $mobile = "";
    public $fax = "";
    public $phone2 = "";
    public $contact_name = "";
    public $second_contact_name = "";
    public $tags = "";
    public $pst = "";
    public $notes = "";
    public $warning = "";
    public $is_customer = "";
    public $is_vendor = "";
    public $payment_terms = "";
    public $price_list = "";


    //group of set method
    public function setName(string $na){
        $this->name = $na;
    }
    public function setParent_name(string $parent){
        $this->parent_name = $parent;
    }
    public function setState(string $st){
        $this->state = $st;
    }
    public function setCity(string $ci){
        $this->city = $ci;
    }
    public function setCountry(string $con){
        $this->country = $con;
    }
    public function setPostal_code(string $postal){
        $this->postal_code = $postal;
    }
    public function setFiscal_position(string $fiscal){
        $this->fiscal_position = $fiscal;
    }
    public function setPhone(string $pho){
        $this->phone = $pho;
    }
    public function setEmail(string $em){
        $this->email = $em;
    }
    public function setCreated_on(string $cre){
        $this->created_on = $cre;
    }
    public function setCreated_by(string $crea){
        $this->created_by = $crea;
    }
    public function setCustomer_id_number(string $idnum){
        $this->customer_id_number = $idnum;
    }
    public function setMobile(string $mob){
        $this->mobile = $mob;
    }
    public function setFax(string $fax){
        $this->fax = $fax;
    }
    public function setPhone2(string $phone){
        $this->phone2 = $phone;
    }
    public function setContact_name(string $contact){
        $this->contact_name = $contact;
    }
    public function setSecond_contact_name(string $second){
        $this->second_contact_name = $second;
    }
    public function setTags(string $tags){
        $this->tags = $tags;
    }
    public function setPst(string $ps){
        $this->pst = $ps;
    }
    public function setNotes(string $note){
        $this->notes = $note;
    }
    public function setWarning(string $war){
        $this->warning = $war;
    }
    public function setis_Customer(string $iscus){
        $this->is_customer = $iscus;
    }
    public function setIs_vendor(string $isven){
        $this->is_vendor = $isven;
    }
    public function setPayment_terms(string $terms){
        $this->payment_terms = $terms;
    }
    public function setPrice_list(string $list){
        $this->price_list = $list;
    }
    public function setStreet(string $str){
        $this->street = $str;
    }



    //group of get method
    public function getName(){
        return $this->name;
    }
    public function getParent_name(){
        return $this->parent_name;
    }
    public function getState(){
        return $this->state;
    }    
    public function getCity(){
        return $this->city;
    }
    public function getCountry(){
        return $this->country;
    }
    public function getPostal_code(){
        return $this->postal_code;
    }
    public function getFiscal_position(){
        return $this->fiscal_position;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getCreated_on(){
        return $this->created_on;
    }
    public function getCreated_by(){
        return $this->created_by;
    }
    public function getCustomer_id_number(){
        return $this->customer_id_number;
    }
    public function getMobile(){
        return $this->mobile;
    }
    public function getFax(){
        return $this->fax;
    }
    public function getPhone2(){
        return $this->phone2;
    }
    public function getContact_name(){
        return $this->contact_name;
    }
    public function getSecond_contact_name(){
        return $this->second_contact_name;
    }
    public function getTags(){
        return $this->tags;
    }
    public function getPst(){
        return $this->pst;
    }
    public function getNotes(){
        return $this->notes;
    }
    public function getWarning(){
        return $this->warning;
    }
    public function getIs_customer(){
        return $this->is_customer;
    }
    public function getIs_vendor(){
        return $this->is_vendor;
    }
    public function getPayment_terms(){
        return $this->payment_terms;
    }
    public function getPrice_list(){
        return $this->price_list;
    }
    public function getStreet(){
        return $this->street;
    }
    
}

?>