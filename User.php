<?php 
class User 
{
    private $email;
    private $pass;
    function __construct($email,$pass){
        $this->email = $email;
        $this->pass = $pass;
    }

    function getEmail (){
        return $this->email;
    }
    
}



?>