<?php
$num_products_on_each_page = 1; //this is how many items are shown on the page of the products could be help ful
// The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select products ordered by the date added

$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT ?,?');
$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();

// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total_products = $pdo->query('SELECT * FROM products')->rowCount();
?>

<?=template_header('Products')?>

    <h1>Products</h1>
    <p><?=$total_products?> Products</p>
        <?php foreach ($products as $product): ?>
        <a href="index.php?page=product&ID=<?=$product['ID']?>" >
           <?=$product['name']?>
                &dollar;<?=$product['price']?>
                <?php if ($product['retail_price'] > 0): ?>
                &dollar;<?=$product['retail_price']?>
                <?php endif; ?>
        </a>
        <br>
        <?php endforeach; ?> <!-- Adds items in our inventory to a page this might already exist though -->

<!-- Logic to go between last page -->
        <?php if ($current_page > 1): ?>
        <a href="index.php?page=products&p=<?=$current_page-1?>">Prev</a> 
        <?php endif; ?>

<!-- Logic to go between next page -->
        <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
        <a href="index.php?page=products&p=<?=$current_page+1?>">Next</a>
        <?php endif; ?>
    </div>
</div>

<?=template_footer()?>