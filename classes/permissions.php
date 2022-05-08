<?php
//Author: Nicholas Finelli
    //Allows for permissions
        //Inputs: None
        //Outputs: Current user's security_type
        
    class permissions{
        public $permissionArray = array(    
        "Inventory" => array( //Done
            "user" => array(
                "addToCart" => 0, 
                "edit" => 1, 
                "delete" => 0, 
                "addItem" => 0, 
                "search" => 1), 
            "staff" => array(
                "addToCart" => 1, 
                "edit" => 0, 
                "delete" => 0, 
                "addItem" => 0, 
                "search" => 1), 
            "manager" => array(
                "addToCart" => 1, 
                "edit" => 1, 
                "delete" => 1, 
                "addItem" => 1, 
                "search" => 1), 
            "administrator" => array(
                "addToCart" => 1, 
                "edit" => 1, 
                "delete" => 1, 
                "addItem" => 1, 
                "search" => 1)
            ),      
            
        "shoppingCart" => array( 
            "user" => array(
                "viewShoppingCart" => 0), 
            "staff" => array(
                "viewShoppingCart" => 0), 
            "manager" => array(
                "viewShoppingCart" => 1), 
            "administrator" => array(
                "viewShoppingCart" => 1), 
            ),      

        "Clients" => array( //Done
            "user" => array(
                "edit" => 0, 
                "delete" => 0, 
                "addItem" => 0, 
                "search" => 1), 
            "staff" => array(
                "edit" => 0, 
                "delete" => 0, 
                "addItem" => 0, 
                "search" => 1), 
            "manager" => array(
                "edit" => 1, 
                "delete" => 1, 
                "addItem" => 1, 
                "search" => 1), 
            "administrator" => array(
                "edit" => 1, 
                "delete" => 1, 
                "addItem" => 1, 
                "search" => 1), 
            ),
        "Vendor" => array( //Done
            "user" => array(
                "edit" => 0, 
                "delete" => 0, 
                "addItem" => 0, 
                "search" => 1), 
            "staff" => array(
                "edit" => 0, 
                "delete" => 0, 
                "addItem" => 0, 
                "search" => 1), 
            "manager" => array(
                "edit" => 1, 
                "delete" => 0, 
                "addItem" => 1, 
                "search" => 1), 
            "administrator" => array(
                "edit" => 1, 
                "delete" => 1, 
                "addItem" => 1, 
                "search" => 1), 
            ),
        "Employees" => array( //Done, come back to test
            "user" => array(
                "edit" => 0, 
                "delete" => 0, 
                "addItem" => 0, 
                "search" => 1), 
            "staff" => array(
                "edit" => 0, 
                "delete" => 0, 
                "addItem" => 0, 
                "search" => 1), 
            "manager" => array(
                "edit" => 1, 
                "delete" => 0, 
                "addItem" => 1, 
                "search" => 1), 
            "administrator" => array(
                "edit" => 1, 
                "delete" => 1, 
                "addItem" => 1, 
                "search" => 1), 
            ),
        "moneyPage" => array( //May have to change this name
            "user" => array(
                "Access Z Report" => 0, 
                "Access Profit Loss Report" => 0), 
            "staff" => array(
                "Access Z Report" => 0, 
                "Access Profit Loss Report" => 0), 
            "manager" => array(
                "Access Z Report" => 1, 
                "Access Profit Loss Report" => 1), 
            "administrator" => array(
                "Access Z Report" => 1, 
                "Access Profit Loss Report" => 1), 
            ),
        "Shopping Cart" => array( 
            "user" => array(
                "Access shopping cart" => 0, 
                "Place Order" => 0),
            "staff" => array(
                "Access shopping cart" => 0, 
                "Place Order" => 0),
            "manager" => array(
                "Access shopping cart" => 0, 
                "Place Order" => 0),
            "administrator" => array(
                "Access shopping cart" => 0, 
                "Place Order" => 0),
            ),
        "EO" => array( 
            "user" => array(
                "Access EO Page" => 0), 
            "staff" => array(
                "Access EO Page" => 1), 
            "manager" => array(
                "Access EO Page" => 1), 
            "administrator" => array(
                "Access EO Page" => 1), 
            ),
        "Calendar" => array( //May have to change this name
            "user" => array(
                "View Schedule of themselves" => 0, 
                "View Schedule of All Lower Roles" => 0, 
                "Change Schedule of Themselves" => 0, 
                "Change Schedules of Others" => 0, 
                "Create Schedules for Themselves" => 0, 
                "Create Scehdule for Themselves" => 0), 
            "staff" => array(
                "View Schedule of themselves" => 0, 
                "View Schedule of All Lower Roles" => 0, 
                "Change Schedule of Themselves" => 0, 
                "Change Schedules of Others" => 0, 
                "Create Schedules for Themselves" => 0, 
                "Create Scehdule for Themselves" => 0), 
            "manager" => array(
                "View Schedule of themselves" => 0, 
                "View Schedule of All Lower Roles" => 0, 
                "Change Schedule of Themselves" => 0, 
                "Change Schedules of Others" => 0, 
                "Create Schedules for Themselves" => 0, 
                "Create Scehdule for Themselves" => 0), 
            "administrator" => array(
                "View Schedule of themselves" => 0, 
                "View Schedule of All Lower Roles" => 0, 
                "Change Schedule of Themselves" => 0, 
                "Change Schedules of Others" => 0, 
                "Create Schedules for Themselves" => 0, 
                "Create Scehdule for Themselves" => 0), 
            ),
        "Invoice" => array( //May have to change this name
            "user" => array(
                "View Invoice" => 0), 
            "staff" => array(
                "View Invoice" => 1), 
            "manager" => array(
                "View Invoice" => 1), 
            "administrator" => array(
                "View Invoice" => 1)
            )
        );


        function getPermissionArray(){
            return $this->permissionArray;
        }

        function getPermissions(){
            require_once("classes/session.classes.php");
            session::start();
            /*
            if (session::isSet("securityType") == false){
                //Route to login page if there is no security type found
                    //No security type would be found if they bypassed login as security type is set on login
                header('Location: ./index.php?invalidLogin'); //Make this dynamic 
            } */
                return session::get("securityType");
                //Returns security type  
            
        }

        function getPermissionsShoppingCart(){
            require_once("../classes/session.classes.php");
            session::start();
            /*
            if (session::isSet("securityType") == false){
                //Route to login page if there is no security type found
                    //No security type would be found if they bypassed login as security type is set on login
                header('Location: ./index.php?invalidLogin'); //Make this dynamic 
            } */
                return session::get("securityType");
                //Returns security type  
        }
        function checkLoggedIn(){
            require_once("classes/session.classes.php");
            session::start();
            if (session::isSet("securityType") == false){
                //Route to login page if there is no security type found
                    //No security type would be found if they bypassed login as security type is set on login
                header('Location: ./login.php?invalidLogin');
                //https://www.php.net/manual/en/function.header.php
            } 

        }
        function checkLoggedInLogin(){
            require_once("classes/session.classes.php");
            session::start();
            if (session::isSet("securityType") == true){
                //Route to homepage if security type is found, therefore the user is already logged in
                header('Location: ./homepage.php');
                //https://www.php.net/manual/en/function.header.php
            } 
        }
        function checkLoggedInShoppingCart(){
            require_once("..\classes\session.classes.php");
            session::start();
            if (session::isSet("securityType") == false){
                //Route to login page if there is no security type found
                    //No security type would be found if they bypassed login as security type is set on login
                header('Location: ../login.php?invalidLogin');
                //https://www.php.net/manual/en/function.header.php
            } 
        }
    }
?>