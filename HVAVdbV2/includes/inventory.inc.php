    <!-- THIS PAGE RUNS ON  hv_audio_visual_v2.sql -->
<?php
require '../classes/session.classes.php';

session::start();


    $searchType = $_POST["searchTypeInput"];
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

    if($searchType!=""){
        $_SESSION["searchTypeInput"] = "select * from product where {$searchType} like '%{$searchContent}%'";
    }else{
        $_SESSION["searchTypeInput"] = "select * from product";
    }
    header("location: ../homepage.php");


?>