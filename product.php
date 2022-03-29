<?php

function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'hv_audio_visual';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}

//CAN I JUST INCLUDE THAT WITH AND INC FILE^^^^^^^^^^^^^??? ALL I NEED IS THAT LINE UNDER
$pdo = pdo_connect_mysql();



if (isset($_GET['product_ID'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM product WHERE product_ID = ?');
    $stmt->execute([$_GET['product_ID']]);
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
        <h1><?=$product['product_description']?></h1>
        <p> Amount in Stock: <?=$product  ['qty_in_stock']?> </p>

           Price: &dollar;<?=$product['reg_price']?>
           <br>
            
        
        <form action="homepage.php" method="post">
        <br>
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['qty_in_stock']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_ID" value="<?=$product['product_ID']?>">
           <input type="submit" value="Add To Cart">
        </form>
        <div>
            <?=$product['make']?>
        </div>
    </div>
</div>

