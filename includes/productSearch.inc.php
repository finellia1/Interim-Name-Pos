<?php
require '../classes/session.classes.php';
session::start();
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

    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/productSearch.classes.php";
    include "../classes/productSearch-contr.classes.php";
    $searchProduct = new productSearchContr($searchType, $searchContent);
    // running error handlers and user signup
    $searchProduct-> searchProducts($searchType, $searchContent);
    // going back to front page
    session::display();
