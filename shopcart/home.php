<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- This is going to be our home page -->
<?=template_header('Home')?>

<div>
    <h2>:(</h2>
    <p>test</p>
</div>
<div>
    <h2>Items recently added to inventory</h2>
        <?php foreach ($recently_added_products as $product): ?>
                <a href="index.php?page=product&ID=<?=$product['ID']?>" >
                <?=$product['name']?>
                &dollar;<?=$product['price']?>
                <?php if ($product['retail_price'] > 0): ?>
                &dollar;<?=$product['retail_price']?>

                <?php endif; ?>
                <br>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>

