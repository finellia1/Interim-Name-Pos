    <!-- THIS PAGE RUNS ON  hv_audio_visual_v2.sql -->
<?php
// require "../classes/session.classes.php";
// session::start();
// if(session::isSet("loggedInID")) {
//gets data from form, creates updateProduct Object, passes to updateProduct()

    // grab the data from form
    $product_ID = $_POST["deleteID_edit"];
    $name = $_POST["product_name"];
    $description = $_POST["product_description"];
    $product_type = $_POST["product_type"];
    $make= $_POST["make"];
    $model_no = $_POST["model"];
    $quantity_unit = $_POST["qty_unit_edit"];
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
    $updateProduct-> updateProduct($product_ID, $name, $description, $product_type, $make, $model_no, $quantity_unit, $quantity_in_stock,$isPromotional,$regular_price,$discounted_price,$num_rented,$num_broken);
    // going back to front page
    header("location: ../homepage.php?error=PRODUCT UPDATED");
// } else {
//     session::destroy();
//     header("location: ../index.php?error=Not Logged In");
// }