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

    //Clean product type input
    $c_type = $product_type;
    if(str_contains($c_type, '"')){
        $c_type = str_replace('"', "“", $product_type);
    }
    if(str_contains($c_type, "'")){
        $c_type = str_replace("'", "’", $product_type);
    }

    //Clean name input
    $c_name = $name;
    if(str_contains($c_name, '"')){
        $c_name = str_replace('"', "“", $name);
    }
    if(str_contains($c_name, "'")){
        $c_name = str_replace("'", "’", $name);
    }

    //Clean description
    $c_description = $description;
    if(str_contains($c_description, '"')){
        $c_description = str_replace('"', "“", $description);
    }
    if(str_contains($c_description, "'")){
        $c_description = str_replace("'", "’", $description);
    }

    //Clean make
    $c_make = $make;
    if(str_contains($c_make, '"')){
        $c_make = str_replace('"', "“", $make);
    }
    if(str_contains($c_make, "'")){
        $c_make = str_replace("'", "’", $make);
    }

    //Clean model
    $c_model = $model_no;
    if(str_contains($c_model, '"')){
        $c_model = str_replace('"', "“", $model_no);
    }
    if(str_contains($c_model, "'")){
        $c_model = str_replace("'", "’", $model_no);
    }

    //Clean Quantity Unit
    $c_qty_unit = $quantity_unit;
    if(str_contains($c_type, '"')){
        $c_qty_unit = str_replace('"', "“", $quantity_unit);
    }
    if(str_contains($c_type, "'")){
        $c_qty_unit = str_replace("'", "’", $quantity_unit);
    }

    // instantiate classes
    include "../classes/dbh.classes.php";
    include "../classes/productUpdate.classes.php";
    include "../classes/productUpdate-contr.classes.php";
    //create object
    $updateProduct = new productUpdateContr($product_ID, $vendor, $c_name, $c_description, $c_type, $c_make, $c_model, $c_qty_unit, $quantity_in_stock,$isPromotional,$regular_price,$discounted_price,$num_rented,$num_broken);
    //  updateProduct
    $updateProduct-> updateProduct($product_ID,  $vendor, $c_name, $c_description, $c_type, $c_make, $c_model, $c_qty_unit, $quantity_in_stock,$isPromotional,$regular_price,$discounted_price,$num_rented,$num_broken);
    // going back to front page
    header("location: ../inventory.php?error=PRODUCT UPDATED");
