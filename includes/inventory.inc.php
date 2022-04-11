<?php
require '../classes/session.classes.php';

session::start();
    //Search type is populated by form
    $searchType = $_POST["searchTypeInput"];
    //Search content is populated by form

    //Search content is set to whatever is in search content 
    $searchContent = $_POST["searchContent"];
    if($searchType == "Product ID"){
        $searchType = "product_ID";
    }
    if($searchType == "Product ID"){
        $searchType = "product_ID";
    }
    if($searchType == "Product Type"){
        $searchType = "product_type";
    }
    if($searchType == "Product Name"){
        $searchType = "product_name";
    }
    if($searchType == "Description"){
        $searchType = "product_description";
    }
    if($searchType == "Make"){
        $searchType = "make";
    }
    if($searchType == "Model Number"){
        $searchType = "model";
    }
    if($searchType == "Quantity Unit"){
        $searchType = "qty_unit";
    }
    if($searchType == "Quantity In Stock"){
        $searchType = "qty_in_stock";
    }
    if($searchType == "Regular Price"){
        $searchType = "reg_price";
    }
    if($searchType == "Discounted Price"){
        $searchType = "discounted_price";
    }
    if($searchType == "Number Rented"){
        $searchType = "num_rented";
    }
    if($searchType == "Number Broken"){
        $searchType = "num_broken";
    }

    if($searchContent==""){
        $searchContent=" ";
    }

    //If the search type is not blank, set the search type input.
    //This search type session variable is used to run the search query to generate the divs in the homepage 


    if($searchType!=""){
        $_SESSION["searchTypeInput"] = "select * from product where {$searchType} like '%{$searchContent}%'";
    }else if($searchType=="" && $searchContent!=""){
        $_SESSION["searchTypeInput"] = "SELECT * FROM `product` where product_ID LIKE '%{$searchContent}%'
        OR product_type LIKE '%{$searchContent}%'
        OR product_name LIKE '%{$searchContent}%'
        OR product_description LIKE '%{$searchContent}%'
        OR make LIKE '%{$searchContent}%'
        OR model LIKE '%{$searchContent}%'
        OR qty_unit LIKE '%{$searchContent}%'
        OR qty_in_stock LIKE '%{$searchContent}%'
        OR is_promotional LIKE '%{$searchContent}%'
        OR reg_price LIKE '%{$searchContent}%'
        OR discounted_price LIKE '%{$searchContent}%'
        OR num_rented LIKE '%{$searchContent}%'
        OR num_broken LIKE '%{$searchContent}%';";
    }
    else{
        $_SESSION["searchTypeInput"] = "select * from product";
    }
    
    header("location: ../homepage.php");


?>