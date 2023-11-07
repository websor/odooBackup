<?php

class User{

    //Variables inizialitation 
    public $id="";
    public $name = "";
    public $email = "";
    public $type = "";
    public $password = "";


    //group of set method
    public function setId(string $i){
        $this->id = $i;
    }
    public function setName(string $nam){
        $this->name = $nam;
    }
    public function setEmail(string $ema){
        $this->email = $ema;
    }
    public function setType(string $typ){
        $this->type = $typ;
    }
    public function setPassword(string $pass){
        $this->password = $pass;
    }


    //group of get method
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getType(){
        return $this->type;
    }  
    public function getPassword(){
        return $this->password;
    }    
    
}

?>