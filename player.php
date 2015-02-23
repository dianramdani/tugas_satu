<?php

class Player {
    public $name   ="";
    public $blood   = 100;
    public $mana    = 40;
    
    function __construct(){
        
        echo"Player success created";
        
    }
    
    function set_name($name){
        $this->name = $name;
    }
    function get_name(){
        return $this->name;
    }
    
    function set_mana($mana){
        $this->mana = $mana;
    }
    
    function get_mana(){
        return $this->mana;
    }
    
    function set_blood($blood){
        $this->blood = $blood;
        
    }
    
    function get_blood(){
        return $this->blood;
    }
    
}





?>
