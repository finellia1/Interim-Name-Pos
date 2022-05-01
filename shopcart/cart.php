<?php
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_ID'], $_POST['quantity']) && is_numeric($_POST['product_ID']) && is_numeric($_POST['quantity'])) {
    $product_ID = (int)$_POST['product_ID']; //int check and post to identigy
    $quantity = (int)$_POST['quantity'];
    // checking if the product exists in our database
    $stmt = $pdo->prepare('SELECT * FROM products WHERE ID = ?');
    $stmt->execute([$_POST['product_ID']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //adding to cart
    if ($product && $quantity > 0) {
        //now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_ID, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_ID] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_ID] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_ID => $quantity);
        }
    }
    header('Location: ../homepage.php');
    exit;
}


// Remove product from cart, || this is the product ID, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}
// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}

// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
$format_total = 0.00;

// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
<<<<<<< HEAD
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE ID IN (' . $array_to_question_marks . ')');
=======
    $Cnt_qtn = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM product WHERE product_ID IN (' . $Cnt_qtn . ')');
>>>>>>> 0092fa73903870bf672aeb2bb53b762717526e32
    // We only need the 'list' keys, not the values, the keys are the ID's of the products
    $stmt->execute(array_keys($products_in_cart));
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal from here we can also figure the total with tax add a taxed total with tax information later on
<<<<<<< HEAD
    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['ID']];
    }
=======
    foreach ($products as $product){
                $subtotal += (float)$product['reg_price'] * (int)$products_in_cart[$product['product_ID']];
     }  $total = $subtotal*1.089;
        $format_total = number_format($total, 2);
>>>>>>> 0092fa73903870bf672aeb2bb53b762717526e32
}
?>



<!--html to make the cart presentalble to me right now going to combine to tais hopefullly; -->
<?php=template_header('Cart')?>

<div>
    <h1>Shopping Cart</h1>
    <form action="../pform.php"  target="_parent" method="post">
        <table>

                <tr>
                    <td colspan="1">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Final Price</td>
                </tr>
            
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
<<<<<<< HEAD
                    <td>
                        <a href="index.php?page=product&ID=<?=$product['ID']?>"><?=$product['name']?></a>
                        <br>
                        <a href="index.php?page=cart&remove=<?=$product['ID']?>" >Remove</a>
=======
                    <td><br>
                        <?=$product['product_description']?>
                        <br>
                        <a href="index.php?page=cart&remove=<?=$product['product_ID']?>">Remove</a> <br>
>>>>>>> 0092fa73903870bf672aeb2bb53b762717526e32
                    </td>
                    <td>&dollar;<?=$product['price']?></td>
                    <td>
                        <input type="number" name="quantity-<?=$product['ID']?>" value="<?=$products_in_cart[$product['ID']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
<<<<<<< HEAD
                    <td>&dollar;<?=$product['price'] * $products_in_cart[$product['ID']]?></td>
=======
                    <td>&dollar;<?=$product['discounted_price'] * $products_in_cart[$product['product_ID']]?></td>
>>>>>>> 0092fa73903870bf672aeb2bb53b762717526e32
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        
           Subtotal
             &dollar;<?=$subtotal?>
             <br>
            GrandTotal &dollar;<?=$format_total?>
            <?
            session_register('Total');
            $_SESSION["Total"] = $format_total;
            ?>
             
        </div>
        <div>
            <input type="hidden" name="Stotal" value= "<?php  echo $format_total ;?> ">
            <input type="submit" value="Place Order"  target="_parent" name="placeorder">
    
        </div>
    </form>
</div>

<?php=template_footer()?>