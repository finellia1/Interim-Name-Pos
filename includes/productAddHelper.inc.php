<?php
require_once 'classes/session.classes.php';
if(isset($_POST["submit"])) 
{
    //Search type is populated by form
    $searchType = $_POST["searchTypeInput"];
    //Search content is populated by form

    //Search content is set to whatever is in search content 
    $searchContent = $_POST["searchContent"];
} else {
        //Search type is populated by form
        $searchType = " ";
        //Search content is populated by form
    
        //Search content is set to whatever is in search content 
        $searchContent = " ";

}

    include_once "classes/dbh.classes.php";
    include_once "classes/productSearch.classes.php";
    include_once "classes/productSearch-contr.classes.php";

    // instantiate product search controller class
    $searchProduct = new productSearchContr($searchType, $searchContent);
    // Calls get vendors
    $searchProduct-> getVendors();
    // going back to front page
    //session::display();
