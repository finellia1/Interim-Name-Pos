<?php
    $product_ID = $_POST["product_ID"];
    $name = $_POST["product_name"];
    $description = $_POST["product_description"];
    $product_type = $_POST["product_type"];
    $make= $_POST["product_type"];
    $model_no = $_POST["model"];
    $quantity_unit = $_POST["qty_in_stock"];
    $quantity_in_stock = $_POST["qty_in_stock"];
    $isPromotional = $_POST["product_type"];
    $regular_price = $_POST["reg_price"];
    $discounted_price= $_POST["discounted_price"];
    $num_rented = $_POST["product_type"];
    $num_broken = $_POST["num_broken"];

    
    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/addProduct.classes.php";
    include "../classes/addProduct-contr.classes.php";
    $addProduct = new addProductContr($product_ID, $name, $description, $product_type, $make, $model_no, $quantity_unit, $quantity_in_stock,$isPromotional,$regular_price,$discounted_price,$num_rented,$num_broken);
    // running error handlers and user signup
    $addProduct-> addProduct($product_ID, $name, $description, $product_type, $make, $model_no, $quantity_unit, $quantity_in_stock,$isPromotional,$regular_price,$discounted_price,$num_rented,$num_broken);
    // going back to front page
    header("location: ../includes/inventory.php?error=ran");

?>