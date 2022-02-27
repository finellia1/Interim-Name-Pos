
<?php 
require '../classes/session.classes.php';

session::start();
// session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/inventoryStyle.css">
</head>


<body>



    <h1>Inventory Page</h1>
    <br><br>
    <div id = "searchPopup" class = "popup">
        <form name="edit" action="../includes/inventory.inc.php" method="POST">
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
                        <label for="itemName">Item Name:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="itemName" name="product_name" value="itemName"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Product Type:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="productType" name="product_type" value="productType"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Description:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="description" name="product_description" value="description"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Make:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="make" name="make" value="make"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Model:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="model" name="model" value="model"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Quantity_Unit:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="quantity" name="qty_unit" value="quantity"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Quantity In Stock:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="quantityInStock" name="qty_in_stock" value="quantityInStock"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">isPromotional</label></td>
                    <td class="alignLeft">
                        <input type="checkbox" id="isPromotional" name="isPromotional" ><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Regular Price</label></td>
                    <td class="alignLeft">
                        <input type="text" id="regularPrice" name="reg_price" value="regularPrice"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Discounted Price:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="discountedPrice" name="discounted_price" value="discountedPrice"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Number Rented:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="numberRented" name="num_rented" value="numberRented"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Number Broken</label></td>
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
        <form name="add" action="../includes/addProduct.inc.php" method="post">
            <table class="dropShadow">
            <tr>
                    <td class="alignLeft">
                        <label for="itemName">Product ID:</label></td>
                    <td class="alignLeft">
                        <input type="text" name="product_ID" value="product_ID"><br>
                    </td>
                </tr>
            <tr>
                    <td class="alignLeft">
                        <label for="itemName">Item Name:</label></td>
                    <td class="alignLeft">
                        <!-- Different value and name --> 
                        <input type="text" name="product_name" value="itemName"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Product Type:</label></td>
                    <td class="alignLeft">
                        <input type="text" name="product_type" value="productType"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Description:</label></td>
                    <td class="alignLeft">
                        <input type="text" name="product_description" value="description"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Make:</label></td>
                    <td class="alignLeft">
                        <input type="text"  name="make" value="make"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Model:</label></td>
                    <td class="alignLeft">
                        <input type="text" name="model" value="model"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Quantity_Unit:</label></td>
                    <td class="alignLeft">
                        <input type="text" name="qty_unit" value="quantity"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Quantity In Stock:</label></td>
                    <td class="alignLeft">
                        <input type="text" name="qty_in_stock" value="quantityInStock"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">isPromotional</label></td>
                    <td class="alignLeft">
                        <input type="checkbox" name="isPromotional" ><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Regular Price</label></td>
                    <td class="alignLeft">
                        <input type="text" name="reg_price" value="regularPrice"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Discounted Price:</label></td>
                    <td class="alignLeft">
                        <input type="text" name="discounted_price" value="discountedPrice"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Number Rented:</label></td>
                    <td class="alignLeft">
                        <input type="text" name="num_rented" value="numberRented"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Number Broken</label></td>
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
                            echo "<form name='remove' action='../includes/removeProduct.inc.php' method='post'>";
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

    <script type="text/javascript" src="../js/inventory.js"></script>

</body>

</html>