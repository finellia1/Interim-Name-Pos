<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href=".\css\homePage.css">
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
            <div class = "leftPanel">
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
                <div class = "inventory">
                    <?php 
                        require './classes/session.classes.php';

                        session::start();
                        // session_start();
                        ?>
                        <h1>Inventory Page</h1>
                        <br><br>
                        <div id = "searchPopup" class = "popup">
                            <form name="edit" action="./includes/inventory.inc.php" method="POST">
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
   <!--Edit popup. Hidden by default-->
   <div id="editPopup" class = "popup">
                        <form name="edit" action="./includes/productUpdate.inc.php" method="POST">
                            <table class="dropShadow">
                            <!-- Item Name --> 
                            <input type='hidden' name='deleteID_edit' id='deleteID_edit'>
                            <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Product Type:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="productType" name="product_type" value="productType"><br>
                                    </td>
                                </tr>
                            <!-- Product Type -->
                            <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Item Name:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="itemName" name="product_name" value="itemName"><br>
                                    </td>
                                </tr>
                            <!-- Item Description -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Description:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="description" name="product_description" value="description"><br>
                                    </td>
                                </tr>
                                <!-- Make -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Make:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="make" name="make" value="make"><br>
                                    </td>
                                </tr>
                                <!-- Model -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Model:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="model" name="model" value="model"><br>
                                    </td>
                                </tr>
                                <!-- Quantity Unit -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Quantity_Unit:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="quantity" name="qty_unit_edit" value="quantity"><br>
                                    </td>
                                </tr>
                                <!-- Quantity In Stock -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Quantity In Stock:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="quantityInStock" name="qty_in_stock" value="quantityInStock"><br>
                                    </td>
                                </tr>
                                <!-- Promotional -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">isPromotional</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="checkbox" id="isPromotional" name="isPromotional_edit" ><br>
                                    </td>
                                </tr>
                                <!--Regular Price -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Regular Price</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="regularPrice" name="reg_price" value="regularPrice"><br>
                                    </td>
                                </tr>
                                <!--Discounted Price -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Discounted Price:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="discountedPrice" name="discounted_price" value="discountedPrice"><br>
                                    </td>
                                </tr>
                                <tr>
                                <!--Number Rented -->
                                    <td class="alignLeft">
                                        <label for="itemName">Number Rented:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="numberRented" name="num_rented" value="numberRented"><br>
                                    </td>
                                </tr>
                                <!-- Number Broken -->
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
                                    <!-- Button to close pane-->
                                    <td>
                                        <!-- Button to submit form -->
                                        <button type="button" onclick="exitPane('editPopup')">Cancel!</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>                 
                    <!--Add popup. Hidden by default-->
                    <div id="addPopup" class = "popup">
                        <form name="add" action="./includes/productAdd.inc.php" method="post">
                            <table class="dropShadow">
                                <!-- Item Name --> 
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Item Name:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="product_name" value="itemName"><br>
                                    </td>
                                </tr>
                                <!-- Product Type -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Product Type:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="product_type" value="productType"><br>
                                    </td>
                                </tr>
                                <!-- Item Description -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Description:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="product_description" value="description"><br>
                                    </td>
                                </tr>
                                <!-- Make -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Make:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text"  name="make" value="make"><br>
                                    </td>
                                </tr>
                                
                                <!-- Model -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Model:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="model" value="model"><br>
                                    </td>
                                </tr>
                                <!-- Quantity Unit -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Quantity_Unit:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="qty_unit" value="quantity"><br>
                                    </td>
                                </tr>
                                <!-- Quantity In Stock -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Quantity In Stock:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="qty_in_stock" value="quantityInStock"><br>
                                    </td>
                                </tr>
                                <!-- Promotional -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">isPromotional</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="checkbox" name="isPromotional" ><br>
                                    </td>
                                </tr>
                                <!--Regular Price -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Regular Price</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="reg_price" value="regularPrice"><br>
                                    </td>
                                </tr>
                                <!--Discounted Price -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="itemName">Discounted Price:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="discounted_price" value="discountedPrice"><br>
                                    </td>
                                </tr>
                                <tr>
                                <!--Number Rented -->
                                    <td class="alignLeft">
                                        <label for="itemName">Number Rented:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="num_rented" value="numberRented"><br>
                                    </td>
                                </tr>
                                <!-- Number Broken -->
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
                                        <!-- Button to submit form -->
                                        <input type="submit" name = "submit" value="submit"></button>
                                    </td>
                                    <td>
                                        <!-- Button to close pane-->
                                        <button type="button" onclick="exitPane('addPopup')">Cancel!</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <!-- Control panel contains buttons for adding and searching for items-->
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
                    <!--Contains the table-->
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
                            </tr>
                            <?php
                                include "includes\productSearch.inc.php";
                            ?>

                        </table>
                    </div>

                    <script type="text/javascript" src="./js/inventory.js"></script>

                </div>
            <div class = "rightPanel">
            <?php
                function pdo_connect_mysql() {
                    // Update the details below with your MySQL details
                    try {
                        // changes depending on localhost
                        $username = "root";
                        $password = "";
                        $dbh = new PDO('mysql:host=localhost;dbname=hv_audio_visual', $username, $password);
                        return $dbh;
                    } catch (PDOException $e) {
                        print "Error!: " .$e->getMessage() . "<br/>";
                        die();
                    }
                }
                $pdo = pdo_connect_mysql();
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_ID'], $_POST['quantity']) && is_numeric($_POST['product_ID']) && is_numeric($_POST['quantity'])) {
    $product_ID = (int)$_POST['product_ID']; //int check and post to identigy
    $quantity = (int)$_POST['quantity'];
    // checking if the product exists in our database
    $stmt = $pdo->prepare('SELECT * FROM product WHERE Product_ID = ?');
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



<!--html to make the cart presentalble to me right now going to combine to tais hopefullly; -->


<div>
    <h1>Shopping Cart</h1>
    <form action="homepage.php" method="post">
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
                        <a href="homepage.php?page=product&ID=<?=$product['product_ID']?>"><?=$product['product_description']?></a>
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
                </p>
            </div>
        </main>
    </div>

</body>
</html>    