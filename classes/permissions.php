<?php
//Author: Nicholas Finelli
    //Allows for permissions
        //Inputs: None
        //Outputs: Current user's security_type
        
    class permissions{
        public $permissionArray = array(    
        "homepage" => array(
            "user" => array(
                            "addToCart" => 0, 
                            "search" => 1,
                            "add" => 0, 
                            "delete" => 0),
            "staff" => array(
                            "addToCart" => 1, 
                            "search" => 1,
                            "add" => 0, 
                            "delete" => 0),
            "manager" => array(
                            "addToCart" => 0, 
                            "search" => 1,
                            "add" => 0, 
                            "delete" => 0),
            "administrator" => array(
                            "addToCart" => 1, 
                            "search" => 1,
                            "add" => 0, 
                            "delete" => 0)
                            )
            
            //Unsure about cart
            //Everyone should have access to Z Report
        );
        function getPermissionArray(){
            return $this->permissionArray;
        }

        function getPermissions(){
            require_once("classes/session.classes.php");
            session::start();
            if (session::isSet("securityType") == false){
                //Route to login page if there is no security type found
                    //No security type would be found if they bypassed login as security type is set on login
                header('Location: ./index.php?invalidLogin'); //Make this dynamic 
            } 
            else{
                return session::get("securityType");
                //Returns security type  
            }
        }
    }
?>