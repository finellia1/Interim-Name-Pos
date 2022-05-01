<?php
// Check to make sure the ID parameter is specified in the URL
<<<<<<< HEAD
if (isset($_GET['ID'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM products WHERE ID = ?');
    $stmt->execute([$_GET['ID']]);
=======
if (isset($_POST['product_ID'])) {
    include 'functions.php';
    $pdo = pdo_connect_mysql();
    session_start();
    $_SESSION["productFound"] = "ran";
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM product WHERE product_ID = ?');
    $stmt->execute([$_POST['product_ID']]);
>>>>>>> 0092fa73903870bf672aeb2bb53b762717526e32
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

<div >
    <div>
<<<<<<< HEAD
        <h1><?=$product['name']?></h1>
         
            &dollar;<?=$product['price']?>
            <?php if ($product['retail_price'] > 0): ?>
             &dollar;<?=$product['retail_price']?>
            <?php endif; ?>
        
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_ID" value="<?=$product['ID']?>">
=======
        <h1><?=$product['product_description']?></h1>
           Regular Price: &dollar;<?=$product['reg_price']?>
           <br>
           Discounted Price: &dollar;<?=$product['discounted_price']?>
            
        
        <form action="index.php?page=cart" method="post">
            <input type="checkbox" formaction="index.php?page=cart" name="disco" value="ApplyDiscount">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['qty_in_stock']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_ID" value="<?=$product['product_ID']?>">
>>>>>>> 0092fa73903870bf672aeb2bb53b762717526e32
            <input type="submit" value="Add To Cart">
            
        </form>
        <div>
            <?=$product['desc']?>
        </div>
    </div>
</div>

<?=template_footer()?>