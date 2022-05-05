<?php
//Author: Nicholas Finelli
    //Allows for permissions
        //Inputs: None
        //Outputs: Current user's security_type
        
    class permissions{
        public $permissionArray = array(    
        "Inventory" => array(
            "user" => array(
                "addToCart" => 0, 
                "edit" => 0, 
                "delete" => 0, 
                "addItem" => 0, 
                "search" => 1, 
            "staff" => array(
                "addToCart" => 1, 
                "edit" => 0, 
                "delete" => 0, 
                "addItem" => 0, 
                "search" => 1, 
            "manager" => array(
                "addToCart" => 1, 
                "edit" => 1, 
                "delete" => 1, 
                "addItem" => 1, 
                "search" => 1, 
            "administrator" => array(
                "addToCart" => 1, 
                "edit" => 1, 
                "delete" => 1, 
                "addItem" => 1, 
                "search" => 1,      
            )),
        "Clients" => array(
            "user" => array(
                "edit" => 0, 
                "delete" => 0, 
                "addItem" => 0, 
                "search" => 1, 
            "staff" => array(
                "edit" => 0, 
                "delete" => 0, 
                "addItem" => 0, 
                "search" => 1, 
            "manager" => array(
                "edit" => 1, 
                "delete" => 1, 
                "addItem" => 1, 
                "search" => 1, 
            "administrator" => array(
                "edit" => 1, 
                "delete" => 1, 
                "addItem" => 1, 
                "search" => 1, 
            )),
        "Vendors" => array(
            "user" => array(
                "edit" => 0, 
                "delete" => 0, 
                "addItem" => 0, 
                "search" => 1, 
            "staff" => array(
                "edit" => 0, 
                "delete" => 0, 
                "addItem" => 0, 
                "search" => 1, 
            "manager" => array(
                "edit" => 1, 
                "delete" => 1, 
                "addItem" => 1, 
                "search" => 1, 
            "administrator" => array(
                "edit" => 1, 
                "delete" => 1, 
                "addItem" => 1, 
                "search" => 1, 
            )),
        "ProfitPage" => array( //May have to change this name
            "user" => array(
                "View Z Report" => 0, 
                "View Profit Loss Report" => 0, 
                "Print Z Report" => 0, 
                "Print Profit Loss Report" => 0, 
            "staff" => array(
                "View Z Report" => 0, 
                "View Profit Loss Report" => 0, 
                "Print Z Report" => 0, 
                "Print Profit Loss Report" => 0,  
            "manager" => array(
                "View Z Report" => 1, 
                "View Profit Loss Report" => 1, 
                "Print Z Report" => 1, 
                "Print Profit Loss Report" => 1, 
            "administrator" => array(
                "View Z Report" => 1, 
                "View Profit Loss Report" => 1, 
                "Print Z Report" => 1, 
                "Print Profit Loss Report" => 1, 
            )),
        "Calendar" => array( //May have to change this name
            "user" => array(
                "View Schedule of themselves" => 0, 
                "View Schedule of All Lower Roles" => 0, 
                "Change Schedule of Themselves" => 0, 
                "Change Schedules of Others" => 0, 
                "Create Schedules for Themselves" => 0, 
                "Create Scehdule for Themselves" => 0, 
            "staff" => array(
                "View Schedule of themselves" => 0, 
                "View Schedule of All Lower Roles" => 0, 
                "Change Schedule of Themselves" => 0, 
                "Change Schedules of Others" => 0, 
                "Create Schedules for Themselves" => 0, 
                "Create Scehdule for Themselves" => 0, 
            "manager" => array(
                "View Schedule of themselves" => 0, 
                "View Schedule of All Lower Roles" => 0, 
                "Change Schedule of Themselves" => 0, 
                "Change Schedules of Others" => 0, 
                "Create Schedules for Themselves" => 0, 
                "Create Scehdule for Themselves" => 0, 
            "administrator" => array(
                "View Schedule of themselves" => 0, 
                "View Schedule of All Lower Roles" => 0, 
                "Change Schedule of Themselves" => 0, 
                "Change Schedules of Others" => 0, 
                "Create Schedules for Themselves" => 0, 
                "Create Scehdule for Themselves" => 0, 
            )),
        "Invoice" => array( //May have to change this name
            "user" => array(
                "View Invoice" => 0, 
            "staff" => array(
                "View Invoice" => 1, 
            "manager" => array(
                "View Invoice" => 1, 
            "administrator" => array(
                "View Invoice" => 1, 
            ))
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