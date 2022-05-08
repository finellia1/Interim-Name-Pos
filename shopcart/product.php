<?php
require_once("..\classes\permissions.php");
$permissions = new permissions();
$permissions->checkLoggedInShoppingCart();
//Pulled from permissions.php
//Checks for permissions, bounces to login if user is not logged in

//Pulled from permissions.php


require_once("..\classes\permissions.php");
$permissionsObj = new permissions();
if($permissionsObj->getPermissionArray()["shoppingCart"][$permissionsObj->getPermissionsShoppingCart()]["viewShoppingCart"] == 0){
    header('Location: ../homepage.php');
    //If invalid login role, bounce back to homepage.php
}
// Check to make sure the ID parameter is specified in the URL
if (isset($_POST['product_ID'])) {
    include 'functions.php';
    $pdo = pdo_connect_mysql();
    //session_start();
    $_SESSION["productFound"] = "ran";
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM product WHERE product_ID = ?');
    $stmt->execute([$_POST['product_ID']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the ID for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the ID wasn't specified
    exit('Product does not exist!');
}


?>

<div class="font">
<head>
    <link rel="stylesheet" type="text/css" href="../css/cartStyle.css">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    </head>
    <div class="font">
        <div id="banner">
        <h1><?=$product['product_description']?></h1>
        </div>
            <div class="desc">
           Regular Price: &dollar;<?=$product['reg_price']?>
           <br>
           <br>
           Amount in stock: <?=$product['qty_in_stock']?>
           <br>
           <br>
            Make of product: <?=$product['make']?>
           <br>
           <br>
            Number Broken: <?=$product['num_broken']?>
           <br>
           <br>
        
        <form action="index.php?page=cart" method="post">
            QTY TO ADD: <input type="number" name="quantity" value="1" min="1" max="<?=$product['qty_in_stock']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_ID" value="<?=$product['product_ID']?>">
            <br>
            <br>
            <input class='btn' type="submit" value="Add To Cart" onclick ="refreshPage()">
            
        </form>
        <div>
        <script>
            function refreshPage(){
                //For reloading page : https://stackoverflow.com/questions/5351342/reload-parent-window-from-within-an-iframe
                parent.location.reload();
            }
        </script>
        </div>
    </div>
</div>

