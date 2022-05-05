
<?php
// if(isset($_POST["submit"])) 
// {
    $product_ID = "add";
    $vendor = $_POST["vendorInput"];
    $product_name = $_POST["product_name"];
    $product_description = $_POST["product_description"];
    $product_type = $_POST["product_type"];
    $make= $_POST["make"];
    $model = $_POST["model"];
    $qty_unit = $_POST["qty_unit"];
    $qty_in_stock = $_POST["qty_in_stock"];
    $is_promotional =1;
    
    $reg_price = $_POST["reg_price"];
    $discounted_price= $_POST["discounted_price"];
    $num_rented = $_POST["num_rented"];
    $num_broken = $_POST["num_broken"];

    $c_type = $product_type;
    if(str_contains($c_type, '"')){
        $c_type = str_replace('"', "“", $product_type);
    }
    if(str_contains($c_type, "'")){
        $c_type = str_replace("'", "’", $product_type);
    }

    //Clean name input
    $c_name = $product_name;
    if(str_contains($c_name, '"')){
        $c_name = str_replace('"', "“", $product_name);
    }
    if(str_contains($c_name, "'")){
        $c_name = str_replace("'", "’", $product_name);
    }

    //Clean description
    $c_description = $product_description;
    if(str_contains($c_description, '"')){
        $c_description = str_replace('"', "“", $product_description);
    }
    if(str_contains($c_description, "'")){
        $c_description = str_replace("'", "’", $product_description);
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
    $c_model = $model;
    if(str_contains($c_model, '"')){
        $c_model = str_replace('"', "“", $model);
    }
    if(str_contains($c_model, "'")){
        $c_model = str_replace("'", "’", $model);
    }

    //Clean Quantity Unit
    $c_qty_unit = $qty_unit;
    if(str_contains($c_qty_unit, '"')){
        $c_qty_unit = str_replace('"', "“", $qty_unit);
    }
    if(str_contains($c_qty_unit, "'")){
        $c_qty_unit = str_replace("'", "’", $qty_unit);
    }
    
    // instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/productAdd.classes.php";
    include "../classes/productAdd-contr.classes.php";
    $addProduct = new productAddContr($product_ID, $vendor,$c_name, $c_description, $c_type, $c_make, $c_model, $c_qty_unit, $qty_in_stock,$is_promotional,$reg_price,$discounted_price,$num_rented,$num_broken);
    // running error handlers and user signup
    $addProduct-> addProduct($product_ID, $vendor,$c_name, $c_description, $c_type, $c_make, $c_model, $c_qty_unit, $qty_in_stock,$is_promotional,$reg_price,$discounted_price,$num_rented,$num_broken);
    // going back to front page
    header("location: ../inventory.php?error=ran");
// }
?>

