<?php
//gets data from form, creates updateProduct Object, passes to updateProduct()

    // grab the data from form
    $product_ID = $_POST["deleteID_edit"];
    $vendor = $_POST["vendorInput"];
    $name = $_POST["product_name"];
    $description = $_POST["product_description"];
    $product_type = $_POST["product_type"];
    $make= $_POST["make"];
    $model_no = $_POST["model"];
    $quantity_unit = $_POST["qty_unit_edit"];
    $quantity_in_stock = $_POST["qty_in_stock"];
    $isPromotional = 1; // needs to be fixed
    $regular_price = $_POST["reg_price"];
    $discounted_price= $_POST["discounted_price"];
    $num_rented = $_POST["num_rented"];
    $num_broken = $_POST["num_broken"];

    // instantiate classes
    include "../classes/dbh.classes.php";
    include "../classes/productUpdate.classes.php";
    include "../classes/productUpdate-contr.classes.php";
    //create object
    $updateProduct = new productUpdateContr($product_ID, $vendor, $name, $description, $product_type, $make, $model_no, $quantity_unit, $quantity_in_stock,$isPromotional,$regular_price,$discounted_price,$num_rented,$num_broken);
    //  updateProduct
    $updateProduct-> updateProduct($product_ID,  $vendor, $name, $description, $product_type, $make, $model_no, $quantity_unit, $quantity_in_stock,$isPromotional,$regular_price,$discounted_price,$num_rented,$num_broken);
    // going back to front page
    header("location: ../inventory.php?error=PRODUCT UPDATED");
