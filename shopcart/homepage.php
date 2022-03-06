<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="navBar.css">
    <script>
            let img = document.querySelector('img');
            let start = img.src;
            let hover = img.getAttribute('data-hover'); //specified in img tag
            console.log(start);

            img.onmouseover = () => { img.src = hover; }
            img.onmouseout = () => { img.src = start; } //to revert back to start
    </script>
    <link rel="stylesheet" href="./css/inventoryStyle.css">
</head>
<body>
    <div class = "wrap">
        <main>
            <div class = "left-panel">
                <div class = "nav-bar">
                    <ul>
                        <li>
                            <a class = "logo" href="homePage.php">
                                    <img src=".\Assets\logo-placeholder-image.png" height = 60px width = 60px alt="logo">
                            </a>
                        </li>
                        <li>
                            <a class = "home" href="homePage.php">
                                    <img src=".\Assets\home.png" onmouseover="this.src='./Assets/homewhite.png'" onmouseout="this.src='./Assets/home.png'" height= 30px  width= 30px alt="home-icon">
                            </a>
                        </li>
                        <li>
                            <a class = "calendar" href="calendarPage.php">
                                <img src=".\Assets\calendar.png" onmouseover="this.src='./Assets/whitecalendar.png'" onmouseout="this.src='./Assets/calendar.png'" height = 30px width = 30px alt = "calendar-icon">
                            </a>
                        </li>
                        <li>
                            <a class = "money" href="moneyPage.php">
                                <img src=".\Assets\wallet.png" onmouseover="this.src='./Assets/whitewallet.png'" onmouseout="this.src='./Assets/wallet.png'" height = 30px width = 30px alt = "wallet-icon">
                            </a>
                        </li>
                        <li>
                            <a class = "history" href="historyPage.php">
                                <img src=".\Assets\history.png" onmouseover="this.src='./Assets/historywhite.png'" onmouseout="this.src='./Assets/history.png'" height = 30px width = 30px alt = "history-icon">
                            </a>
                        </li> 
                        <li>
                            <a class = "settings" href="settingsPage.php">
                                <img src=".\Assets\setting.png" onmouseover="this.src='./Assets/settingswhite.png'" onmouseout="this.src='./Assets/setting.png'" height = 30px width = 30px alt = "settings-icon">
                            
                            </a>
                        </li>
                        <li>
                            <a class = "logout" href="link to signin page">
                                <img src=".\Assets\logout.png" height = 30px width = 30px alt = "logout-icon">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class = "middlePanel">

                
                    <?php 
                    require './classes/session.classes.php';

                    session::start();
                    // session_start();
                    ?>
                    <h1>Inventory Page</h1>
                    <br><br>
                    <div id = "searchPopup" class = "popup">
                        <form name="edit" action="../test/includes/inventory.inc.php" method="POST">
                            <table class="dropShadow">
                                <tr>
                                    <td class="alignLeft">
                                        <label for="searchTypeInput">Search Field:</label></td>
                                    <td class="alignLeft">
                                        <input id = "searchTypeInput" name = "searchTypeInput" list="searchType" placeholder ="Search by...">
                                        <datalist id = "searchType" >
                                        <option value = "Product ID">
                                        <option value = "Product Type">
                                        <option value = "Product Name">
                                        <option value = "Description">
                                        <option value = "Make">
                                        <option value = "Model Number">
                                        <option value = "Quantity Unit">
                                        <option value = "Quantity In Stock">
                                        <option value = "Regular Price">
                                        <option value = "Discounted Price">
                                        <option value = "Number Rented">
                                        <option value = "Number Broken">
                                        <option value = "*">
                                        </datalist>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="searchContent">Search Content:</label></td>
                                    </td>
                                    <td>
                                        <input type="text" id="searchContent"  name = "searchContent" >
                                    </td>    
                                </tr>
                                <tr>
                                    <td>
                                        <input id = "searchSubmit" type="submit" value="Search!"></button>
                                    </td>
                                    <td>
                                        <button type="button" onclick="exitPane('searchPopup')">Close</button>
                                    </td>
                                </tr>
                             </table>
                        </form>
                    </div>
                    <div id="editPopup" class = "popup">
                        <form name="edit">
                            <table class="dropShadow">
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Item Name:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="itemName" name="product_name" value="itemName"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Product Type:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="productType" name="product_type" value="productType"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Description:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="description" name="product_description" value="description"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Make:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="make" name="make" value="make"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Model:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="model" name="model" value="model"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Quantity_Unit:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="quantity" name="qty_unit" value="quantity"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Quantity In Stock:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="quantityInStock" name="qty_in_stock" value="quantityInStock"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">isPromotional</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="checkbox" id="isPromotional" name="isPromotional" ><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Regular Price</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="regularPrice" name="reg_price" value="regularPrice"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Discounted Price:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="discountedPrice" name="discounted_price" value="discountedPrice"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Number Rented:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="numberRented" name="num_rented" value="numberRented"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Number Broken</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="numberBroken" name="num_broken" value="numberBroken"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="Submit!"></button>
                                    </td>
                                    <td>
                                        <button type="button" onclick="exitPane('editPopup')">Cancel!</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div id="addPopup" class = "popup">
                        <form name="add" action="./includes/addProduct.inc.php" method="post">
                            <table class="dropShadow">
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Item Name:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <!-- Different value and name --> 
                                        <input type="text" name="product_name" value="itemName"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Product Type:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="product_type" value="productType"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Description:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="product_description" value="description"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Make:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text"  name="make" value="make"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Model:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="model" value="model"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Quantity_Unit:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="qty_unit" value="quantity"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Quantity In Stock:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="qty_in_stock" value="quantityInStock"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">isPromotional</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="checkbox" name="isPromotional" ><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Regular Price</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="reg_price" value="regularPrice"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Discounted Price:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="discounted_price" value="discountedPrice"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Number Rented:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="num_rented" value="numberRented"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Number Broken</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="num_broken" value="numberBroken"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" name = "submit" value="submit"></button>
                                    </td>
                                    <td>
                                        <button type="button" onclick="exitPane('addPopup')">Cancel!</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <table id="controlPanel">
                        <tr>
                            <th id="addItemBtnTH">
                                <button type="button" onclick="addItem()">Add Item</button>
                            </th>

                            <th id="searchBtn">
                                <button type="button" onclick="searchItem()">Search</button>
                            </th>
                        </tr>
                    </table>
                    <div id = "inventoryWrapper">
                        <table id="inventory">
                            <tr>
                                <th>Product ID</th>
                                <th>Product Type</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Make</th>
                                <th>Model Number</th>
                                <th>Quantity Unit</th>
                                <th>Quantity In Stock</th>
                                <th>Promotional</th>
                                <th>Regular Price</th>
                                <th>Discounted Price</th>
                                <th>Number Rented</th>
                                <th>Number Broken</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Add to Cart</th>
                                <th>Amount </th>
                            </tr>
                            <?php
                                $host='127.0.0.1';
                                $db = 'hv_audio_visual';
                                $user = 'root';
                                $pass = '';
                                $charset = 'utf8mb4';
                                //https://phpdelusions.net/pdo#dsn
                                    

                                $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
                                $options = [
                                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                    PDO::ATTR_EMULATE_PREPARES   => false,
                                ];
                                try {
                                    $pdo = new PDO($dsn, $user, $pass, $options);
                                    if(!isset($_SESSION["searchTypeInput"])){
                                        $_SESSION["searchTypeInput"] = "select * from product";
                                    }
                                    $getData = $pdo->query($_SESSION["searchTypeInput"]);
                                    foreach($getData as $row){
                                        echo "<tr>"; 
                                        echo "<td> {$row['product_ID']} </td>";
                                        echo "<td> {$row['product_type']} </td>";
                                        echo "<td> {$row['product_name']} </td>";
                                        echo "<td> {$row['product_description']} </td>";
                                        echo "<td> {$row['make']} </td>";
                                        echo "<td> {$row['model']} </td>";
                                        echo "<td> {$row['qty_unit']} </td>";
                                        echo "<td> {$row['qty_in_stock']} </td>";
                                        echo "<td> {$row['is_promotional']} </td>";
                                        echo "<td> {$row['reg_price']} </td>";
                                        echo "<td> {$row['discounted_price']} </td>";
                                        echo "<td> {$row['num_rented']} </td>";
                                        echo "<td> {$row['num_broken']} </td>";
                                        echo "<td><button type='button' onclick='addItem()'>Edit</button>";
                                        echo "<form name='remove' action='../test/includes/removeProduct.inc.php' method='post'>";
                                        echo "<td><button type='submit' name='submit' value='submit'>Delete</button>";
                                        echo "<td><form action='homepage.php?page=cart' method='post'><button type='button'>Cart</button></form>";
                                        echo "<td> <input type='hidden' name='deleteID' id='deleteID' value='{$row['product_ID']}'> </td>";
                                        echo "</form>";
                                        echo "</tr>";
                                    }
                                } catch (\PDOException $e) {
                                        $_SESSION["searchTypeInput"] = "select * from product";
                                        throw new \PDOException($e->getMessage(), (int)$e->getCode());
                                }
                            ?>

<?php
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_IDS'], $_POST['qty_in_stock']) && is_numeric($_POST['product_IDS']) && is_numeric($_POST['qty_in_stock'])) {
    $product_IDS = (int)$_POST['product_IDS']; //int check and post to identigy
    $quantity = (int)$_POST['qty_in_stock'];
    // checking if the product exists in our database
    $stmt = $pdo->prepare('SELECT * FROM product WHERE product_ID = ?');
    $stmt->execute([$_POST['product_IDS']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //adding to cart
    if ($product && $quantity > 0) {
        //now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_IDS, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_IDS] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_IDS] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_IDS => $quantity);
        }
    }
    exit;
}


// Remove product from cart, || this is the product ID, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}
// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;

// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM product WHERE product_ID IN (' . $array_to_question_marks . ')');
    // We only need the 'list' keys, not the values, the keys are the ID's of the products
    $stmt->execute(array_keys($products_in_cart));
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal from here we can also figure the total with tax add a taxed total with tax information later on
    foreach ($products as $product) {
        $subtotal += (float)$product['reg_price'] * (int)$products_in_cart[$product['product_ID']];
    }
}
?>
                        
                        </table>
                    </div>

                    <script type="text/javascript" src="./js/inventory.js"></script>

                </div>
            <div class = "rightPanel">
                <h1>Shopping Cart</h1>
    <form action="index.php?page=cart" method="post">
        <table>

                <tr>
                    <td colspan="1">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td>
                        <a href="index.php?page=product&product_ID=<?=$product['product_ID']?>"><?=$product['product_description']?></a>
                        <br>
                        <a href="homepage.php?page=cart&remove=<?=$product['product_ID']?>" >Remove</a>
                    </td>
                    <td>&dollar;<?=$product['reg_price']?></td>
                    <td>
                        <input type="number" name="quantity-<?=$product['product_ID']?>" value="<?=$products_in_cart[$product['product_ID']]?>" min="1" max="<?=$product['qty_in_stock']?>" placeholder="Quantity" required>
                    </td>
                    <td>&dollar;<?=$product['reg_price'] * $products_in_cart[$product['product_ID']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        
           Subtotal
             &dollar;<?=$subtotal?>
             
        </div>
        <div>
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
            </div>
        </main>
    </div>

</body>
</html>     