<?php
// if(isset($_POST["submit"])) 
// {
    $product_ID = "add";
    $product_name = $_POST["product_name"];
    $product_description = $_POST["product_description"];
    $product_type = $_POST["product_type"];
    $make= $_POST["make"];
    $model = $_POST["model"];
    $qty_unit = $_POST["qty_unit"];
    $qty_in_stock = $_POST["qty_in_stock"];
    $is_promotional = 1; //needs to be fixed
    $reg_price = $_POST["reg_price"];
    $discounted_price= $_POST["discounted_price"];
    $num_rented = $_POST["num_rented"];
    $num_broken = $_POST["num_broken"];

    
    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/productAdd.classes.php";
    include "../classes/productAdd-contr.classes.php";
    $addProduct = new productAddContr($product_ID, $product_name, $product_description, $product_type, $make, $model, $qty_unit, $qty_in_stock,$is_promotional,$reg_price,$discounted_price,$num_rented,$num_broken);
    // running error handlers and user signup
    $addProduct-> addProduct($product_ID, $product_name, $product_description, $product_type, $make, $model, $qty_unit, $qty_in_stock,$is_promotional,$reg_price,$discounted_price,$num_rented,$num_broken);
    // going back to front page
    header("location: ../homepage.php?error=ran");
// }
?>