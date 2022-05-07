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
    }else
    if($searchType == "Vendor"){
        $searchType = "vendor_ID_fk";
    }else
    if($searchType == "Product Type"){
        $searchType = "product_type";
    }else
    if($searchType == "Product Name"){
        $searchType = "product_name";
    }else
    if($searchType == "Description"){
        $searchType = "product_description";
    }else
    if($searchType == "Make"){
        $searchType = "make";
    }else
    if($searchType == "Model Number"){
        $searchType = "model";
    }else
    if($searchType == "Quantity Unit"){
        $searchType = "qty_unit";
    }else
    if($searchType == "Quantity In Stock"){
        $searchType = "qty_in_stock";
    }else
    if($searchType == "Regular Price"){
        $searchType = "reg_price";
    }else
    if($searchType == "Discounted Price"){
        $searchType = "discounted_price";
    }else
    if($searchType == "Number Rented"){
        $searchType = "num_rented";
    }else
    if($searchType == "Number Broken"){
        $searchType = "num_broken";
    }

    //https://stackoverflow.com/questions/28717868/sql-server-select-where-any-column-contains-x

    //If the search type is not blank, set the search type input.
    //This search type session variable is used to run the search query to generate the divs in the homepage 
    $_SESSION["debug"] = $searchType;

    if($searchType=="vendor_ID_fk"){
        $_SESSION["searchTypeInput"] ="SELECT * FROM product 
        INNER JOIN vendor
        on product.vendor_ID_fk = vendor.vendor_ID
        where vendor.company_name like '%{$searchContent}%';";
    }else if($searchType!=""){// If the search type is empty and the search content isn't, search all rows
        $_SESSION["searchTypeInput"] = "select * from product where {$searchType} like '%{$searchContent}%'";
    }
    else if($searchType=="" && $searchContent!=""){
       $_SESSION["searchTypeInput"] = "SELECT * FROM `product` where product_ID LIKE '%{$searchContent}%'
        OR product_type LIKE '%{$searchContent}%'
        OR vendor_ID_fk LIKE '%{$searchContent}%'
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
        //In any other case, search all. This loads all DB info to page
        $_SESSION["searchTypeInput"] = "select * from product";
    }

    
    header("location: ../inventory.php");


?>