<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href=".\css\homePage.css">
    <script>
        let img = document.querySelector('img');
        let start = img.src;
        let hover = img.getAttribute('data-hover'); //specified in img tag
        console.log(start);

        img.onmouseover = () => {
            img.src = hover;
        }
        img.onmouseout = () => {
            img.src = start;
        } //to revert back to start
    </script>
    <link rel="stylesheet" href="./css/inventoryStyle.css">
</head>

<body>
    <div class="wrap">
        <main>

            <div class="middlePanel">
                <div class="inventory">
                    <?php 
                        require './classes/session.classes.php';

                        session::start();
                        // session_start();
                        ?>
                    <div id="searchPopup" class="popup">
                        <fieldset>
                            <form name="searchForm" action="./includes/inventory.inc.php" method="POST">
                                <table class="dropShadow">
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="searchTypeInput">Search Field:</label></td>
                                        <td class="alignLeft">
                                            <!--https://www.w3schools.com/tags/tag_select.asp-->
                                            <select name="searchTypeInput">
                                                <option value="Product ID">Product ID</option>
                                                <option value="Vendor">Vendor</option>
                                                <option value="Product Type">Product Type</option>
                                                <option value="Product Name">Product Name</option>
                                                <option value="Description">Description</option>
                                                <option value="Make">Make</option>
                                                <option value="Model Number">Model Number</option>
                                                <option value="Quantity Unit">Quantity Unit</option>
                                                <option value="Quantity In Stock">Quantity In Stock</option>
                                                <option value="Regular Price">Regular Price</option>
                                                <option value="Discounted Price">Discounted Price</option>
                                                <option value="Number Rented">Number Rented</option>
                                                <option value="Number Broken">Number Broken</option>
                                                <option value="">All</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="searchContent">Search Content:</label></td>
                                        </td>
                                        <td>
                                            <input type="text" id="searchContent" name="searchContent">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="Submit search button">
                                                <input id="searchSubmit" type="submit" value="Search!"></button>
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
                        </fieldset>
                    </div>
                    <!--Edit popup. Hidden by default-->
                    <div id="editPopup" class="popup">
                        <fieldset>
                            <form name="edit" action="./includes/productUpdate.inc.php" method="POST">
                                <table class="dropShadow">
                                    <!-- Item Name -->
                                    <input type='hidden' name='deleteID_edit' id='deleteID_edit'>
                                    <!-- Vendor -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Item vendor">Vendor:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <?php
                                                    include "includes\productAddHelper.inc.php";
                                                ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="product type">Product Type:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" id="productType" name="product_type"
                                                value="productType"><br>
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
                                            <input type="text" id="description" name="product_description"
                                                value="description"><br>
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
                                            <input type="text" id="quantityInStock" name="qty_in_stock"
                                                value="quantityInStock"><br>
                                        </td>
                                    </tr>
                                    <!-- Promotional -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="is promotional">isPromotional</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="checkbox" id="isPromotional" name="isPromotional_edit"><br>
                                        </td>
                                    </tr>
                                    <!--Regular Price -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="regular price">Regular Price</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" id="regularPrice" name="reg_price"
                                                value="regularPrice"><br>
                                        </td>
                                    </tr>
                                    <!--Discounted Price -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="discounted price">Discounted Price:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" id="discountedPrice" name="discounted_price"
                                                value="discountedPrice"><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!--Number Rented -->
                                        <td class="alignLeft">
                                            <label for="number rented">Number Rented:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" id="numberRented" name="num_rented"
                                                value="numberRented"><br>
                                        </td>
                                    </tr>
                                    <!-- Number Broken -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="number broken">Number Broken</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" id="numberBroken" name="num_broken"
                                                value="numberBroken"><br>
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
                    <div id="addPopup" class="popup">
                        <fieldset>
                            <form name="add" action="./includes/productAdd.inc.php" method="post">
                                <table class="dropShadow">
                                    <!-- Vendor -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Item vendor">Vendor:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <?php
                                                    include "includes\productAddHelper.inc.php";
                                                ?>
                                        </td>
                                    </tr>
                                    <!-- Item Name -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="item name">Item Name:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="product_name" value="itemName"><br>
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
                                            <input type="text" name="make" value="make"><br>
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
                                            <input type="checkbox" name="isPromotional"><br>
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
                                                <input type="submit" name="submit" value="submit"></button>
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
                    <div id="inventoryWrapper">
                        <table id="inventory">
                            <tr>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Add to Cart</th>
                                <th>Product ID</th>
                                <th>Vendor</th>
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

                            </tr>
                            <?php
                                include "includes\productSearch.inc.php";
                            ?>

                        </table>
                    </div>

                    <script type="text/javascript" src="./js/inventory.js"></script>

                </div>
            </div>

        </main>
    </div>

</body>

</html>