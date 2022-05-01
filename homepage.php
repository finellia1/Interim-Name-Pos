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
<<<<<<< HEAD
                            require './classes/session.classes.php';

                            session::start();
                            // session_start();
                            ?>
                        <h1>Inventory Page</h1>
                        <br><br>
                        <div id = "searchPopup" class = "popup">
                            <form name="edit" action="../test/includes/inventory.inc.php" method="POST">
=======
                        echo "test";
                        require './classes/session.classes.php';

                        session::start();
                        require_once("classes\permissions.php");
                        $permissions = new permissions();
                        echo($permissions->getPermissions());
                        //session::display();
                        // session_start();
                        ?>
                        <h1>Inventory Page</h1>
                        <br><br>
                        <div id = "searchPopup" class = "popup">
                        <fieldset>
                            <form name="searchForm" action="./includes/inventory.inc.php" method="POST">
>>>>>>> 0092fa73903870bf672aeb2bb53b762717526e32
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
                                            <label for="Submit search button">
                                                <input id = "searchSubmit" type="submit" value="Search!"></button>
                                            </label>
                                        </td>
                                        <td>
                                            <label for="Exit search pane button">
                                                <button type="button" onclick="exitPane('searchPopup')">Close</button>
                                            </label>
                                        </td>
                                    </tr>
                                </table>
                            </form>
<<<<<<< HEAD
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
=======
                        </fieldset>
                    </div>
   <!--Edit popup. Hidden by default-->
   <div id="editPopup" class = "popup">
                     <fieldset>
                        <form name="edit" action="./includes/productUpdate.inc.php" method="POST">
                            <table class="dropShadow">
                            <!-- Item Name --> 
                            <input type='hidden' name='deleteID_edit' id='deleteID_edit'>
                            <tr>
                                    <td class="alignLeft">
                                        <label for="product type">Product Type:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="productType" name="product_type" value="productType"><br>
                                    </td>
                                </tr>
                            <!-- Product Type -->
                            <tr>
                                    <td class="alignLeft">
                                        <label for="item name">Item Name:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="itemName" name="product_name" value="itemName"><br>
                                    </td>
                                </tr>
                            <!-- Item Description -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="description">Description:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="description" name="product_description" value="description"><br>
                                    </td>
                                </tr>
                                <!-- Make -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="make">Make:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="make" name="make" value="make"><br>
                                    </td>
                                </tr>
                                <!-- Model -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="model">Model:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="model" name="model" value="model"><br>
                                    </td>
                                </tr>
                                <!-- Quantity Unit -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="quantity unit">Quantity_Unit:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="quantity" name="qty_unit_edit" value="quantity"><br>
                                    </td>
                                </tr>
                                <!-- Quantity In Stock -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="quantity in stock">Quantity In Stock:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="quantityInStock" name="qty_in_stock" value="quantityInStock"><br>
                                    </td>
                                </tr>
                                <!-- Promotional -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="is promotional">isPromotional</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="checkbox" id="isPromotional" name="isPromotional_edit" ><br>
                                    </td>
                                </tr>
                                <!--Regular Price -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="regular price">Regular Price</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="regularPrice" name="reg_price" value="regularPrice"><br>
                                    </td>
                                </tr>
                                <!--Discounted Price -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="discounted price">Discounted Price:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="discountedPrice" name="discounted_price" value="discountedPrice"><br>
                                    </td>
                                </tr>
                                <tr>
                                <!--Number Rented -->
                                    <td class="alignLeft">
                                        <label for="number rented">Number Rented:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="numberRented" name="num_rented" value="numberRented"><br>
                                    </td>
                                </tr>
                                <!-- Number Broken -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="number broken">Number Broken</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="numberBroken" name="num_broken" value="numberBroken"><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="Submit edit button">
                                            <input type="submit" value="Submit!"></button>
                                        </label>
                                    </td>
                                    <!-- Button to close pane-->
                                    <td>
                                        <label for="Exit pane button">
                                        <!-- Button to submit form -->
                                            <button type="button" onclick="exitPane('editPopup')">Cancel!</button>
                                        </label>

                                    </td>
                                </tr>
                            </table>
                        </form>
                    </fieldset>
                </div>                 
                    <!--Add popup. Hidden by default-->
                    <div id="addPopup" class = "popup">
                        <fieldset>
                            <form name="add" action="./includes/productAdd.inc.php" method="post">
                                <table class="dropShadow">
                                    <!-- Item Name --> 
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="item name">Item Name:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="product name" name="product_name" value="itemName"><br>
                                        </td>
                                    </tr>
                                    <!-- Product Type -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="product type">Product Type:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="product_type" value="productType"><br>
                                        </td>
                                    </tr>
                                    <!-- Item Description -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="description">Description:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="product_description" value="description"><br>
                                        </td>
                                    </tr>
                                    <!-- Make -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="make">Make:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text"  name="make" value="make"><br>
                                        </td>
                                    </tr>
                                    
                                    <!-- Model -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="model">Model:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="model" value="model"><br>
                                        </td>
                                    </tr>
                                    <!-- Quantity Unit -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="quantity unit">Quantity_Unit:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="qty_unit" value="quantity"><br>
                                        </td>
                                    </tr>
                                    <!-- Quantity In Stock -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="quantity in stock">Quantity In Stock:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="qty_in_stock" value="quantityInStock"><br>
                                        </td>
                                    </tr>
                                    <!-- Promotional -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="is promotional">isPromotional</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="checkbox" name="isPromotional" ><br>
                                        </td>
                                    </tr>
                                    <!--Regular Price -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="regular price">Regular Price</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="reg_price" value="regularPrice"><br>
                                        </td>
                                    </tr>
                                    <!--Discounted Price -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="discounted price">Discounted Price:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="discounted_price" value="discountedPrice"><br>
                                        </td>
                                    </tr>
                                    <tr>
                                    <!--Number Rented -->
                                        <td class="alignLeft">
                                            <label for="number rented">Number Rented:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="num_rented" value="numberRented"><br>
                                        </td>
                                    </tr>
                                    <!-- Number Broken -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="number broken">Number Broken</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="num_broken" value="numberBroken"><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="Submit add button">
                                            <!-- Button to submit form -->
                                                <input type="submit" name = "submit" value="submit"></button>
                                            </label>
                                        </td>
                                        <td>
                                            <label for="Exit add pane">
                                            <!-- Button to close pane-->
                                                <button type="button" onclick="exitPane('addPopup')">Cancel!</button>
                                            </label>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        <fieldset>
                    </div>
                    <!-- Control panel contains buttons for adding and searching for items-->
                    <table id="controlPanel">
                        <tr>
                            <label for="Open add pane">
                                <th id="addItemBtnTH">
                                    <button type="button" onclick="addItem()">Add Item</button>
                                </th>
                            </label>

                            <label for="Open search pane">
                                <th id="searchBtn">
                                    <button type="button" onclick="searchItem()">Search</button>
                                </th>
                            </label>
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
>>>>>>> 0092fa73903870bf672aeb2bb53b762717526e32
                            </tr>
                        </table>
<<<<<<< HEAD
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
                                            echo "<td><button type='button'>Cart</button>";
                                            echo "<td> <input type='hidden' name='deleteID' id='deleteID' value='{$row['product_ID']}'> </td>";
                                            echo "</form>";
                                            echo "</tr>";
                                        }
                                    } catch (\PDOException $e) {
                                            $_SESSION["searchTypeInput"] = "select * from product";
                                            throw new \PDOException($e->getMessage(), (int)$e->getCode());
                                    }
                                ?>

                            </table>
                        </div>

                        <script type="text/javascript" src="./js/inventory.js"></script>
                </div>
            </div>
            <div class = "rightPanel">
                adadad   
=======
                    </div>
                    <script type="text/javascript" src="./js/inventory.js"></script>
                </div>
            </div>
            <div class = "rightPanel">
                <iframe src="shopcart\index.php" frameborder="0" height=100%"></iframe>
>>>>>>> 0092fa73903870bf672aeb2bb53b762717526e32
            </div>
        </main>
    </div>
</body>
</html>     