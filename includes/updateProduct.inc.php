<?php
//gets data from form, creates updateProduct Object, passes to updateProduct()
if(isset($_POST["submit"])) 
{
    // grab the data from form
    $product_ID ="add";
    $name = $_POST["product_name"];
    $description = $_POST["product_description"];
    $product_type = $_POST["product_type"];
    $make= $_POST["make"];
    $model_no = $_POST["model"];
    $quantity_unit = $_POST["qty_unit"];
    $quantity_in_stock = $_POST["qty_in_stock"];
    $isPromotional = $_POST["product_type"];
    $regular_price = $_POST["reg_price"];
    $discounted_price= $_POST["discounted_price"];
    $num_rented = $_POST["num_rented"];
    $num_broken = $_POST["num_broken"];

    // instantiate classes
    include "../classes/dbh.classes.php";
    include "../classes/updateProduct.classes.php";
    include "../classes/updateProduct-contr.classes.php";
    //create object
    $updateProduct = new UpdateProductContr($product_ID, $name, $description, $product_type, $make, $model_no, $quantity_unit, $quantity_in_stock,$isPromotional,$regular_price,$discounted_price,$num_rented,$num_broken);
    //  updateProduct
    $updateProduct-> updateProduct();
    // going back to front page
    header("location: ../homepage.php?error=PRODUCT UPDATED");
}