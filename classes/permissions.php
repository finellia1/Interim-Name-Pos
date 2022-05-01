<?php
//Author: Nicholas Finelli
    //Allows for permissions
        //Inputs: None
        //Outputs: Current user's security_type
        
    class permissions{
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