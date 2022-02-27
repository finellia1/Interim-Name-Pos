<?php
// Check to make sure the ID parameter is specified in the URL
if (isset($_GET['ID'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM products WHERE ID = ?');
    $stmt->execute([$_GET['ID']]);
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
<?=template_header('Product')?>

<div >
    <div>
        <h1><?=$product['name']?></h1>
         
            &dollar;<?=$product['price']?>
            <?php if ($product['retail_price'] > 0): ?>
             &dollar;<?=$product['retail_price']?>
            <?php endif; ?>
        
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_ID" value="<?=$product['ID']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div>
            <?=$product['desc']?>
        </div>
    </div>
</div>

<?=template_footer()?>