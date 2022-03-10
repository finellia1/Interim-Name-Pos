<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/inventoryStyle.css">
</head>

<body>
    <h1>Inventory Page</h1>
    <div id="editPopup">
        <form name="edit">
            <table class="dropShadow">
            <tr>
                    <td class="alignLeft">
                        <label for="itemName">Item Name:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="itemName" name="itemName" value="itemName"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Product Type:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="productType" name="productType" value="productType"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Description:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="description" name="description" value="description"><br>
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
                        <input type="text" id="quantity" name="quantity" value="quantity"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Quantity In Stock:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="quantityInStock" name="quantityInStock" value="quantityInStock"><br>
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
                        <input type="text" id="regularPrice" name="regularPrice" value="regularPrice"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Discounted Price:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="discountedPrice" name="discountedPrice" value="discountedPrice"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Number Rented:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="numberRented" name="numberRented" value="numberRented"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Number Broken</label></td>
                    <td class="alignLeft">
                        <input type="text" id="numberBroken" name="numberBroken" value="numberBroken"><br>
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

    <div id="addPopup">
        <form name="edit">
            <table class="dropShadow">
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Item Name:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="itemName" name="itemName" value="itemName"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Product Type:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="productType" name="productType" value="productType"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Description:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="description" name="description" value="description"><br>
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
                        <input type="text" id="quantity" name="quantity" value="quantity"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Quantity In Stock:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="quantityInStock" name="quantityInStock" value="quantityInStock"><br>
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
                        <input type="text" id="regularPrice" name="regularPrice" value="regularPrice"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Discounted Price:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="discountedPrice" name="discountedPrice" value="discountedPrice"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Number Rented:</label></td>
                    <td class="alignLeft">
                        <input type="text" id="numberRented" name="numberRented" value="numberRented"><br>
                    </td>
                </tr>
                <tr>
                    <td class="alignLeft">
                        <label for="itemName">Number Broken</label></td>
                    <td class="alignLeft">
                        <input type="text" id="numberBroken" name="numberBroken" value="numberBroken"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Submit!"></button>
                    </td>
                    <td>
                        <button type="button" onclick="exitPane('addPopup')">Cancel!</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <table id="centerVAlign">
        <tr>
            <th id="addItemBtnTH">
                <button type="button" onclick="addItem()">Add Item</button>
            </th>
        </tr>
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

        </tr>
        <tr>
            <td>1</td>
            <td>Audio</td>
            <td>Speaker</td>
            <td>AN130 Speaker</td>
            <td>Anchor</td>
            <td>AN130</td>
            <td>Each</td>
            <td>2</td>
            <td>No</td>
            <td>$75.00</td>
            <td>$75.00</td>
            <td>0</td>
            <td>0</td>
            <td>
                <button type="button" onclick="editPane()">EDIT</button>
            </td>
            <td>
                <button type="button" onclick="deleteItem()">DELETE</button>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>Audio</td>
            <td>Speaker</td>
            <td>AN130 Speaker</td>
            <td>Anchor</td>
            <td>AN130</td>
            <td>Each</td>
            <td>2</td>
            <td>No</td>
            <td>$75.00</td>
            <td>$75.00</td>
            <td>0</td>
            <td>0</td>
            <td>
                <button type="button" onclick="editPane()">EDIT</button>
            </td>
            <td>
                <button type="button" onclick="deleteItem()">DELETE</button>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>Audio</td>
            <td>Speaker</td>
            <td>AN130 Speaker</td>
            <td>Anchor</td>
            <td>AN130</td>
            <td>Each</td>
            <td>2</td>
            <td>No</td>
            <td>$75.00</td>
            <td>$75.00</td>
            <td>0</td>
            <td>0</td>
            <td>
                <button type="button" onclick="editPane()">EDIT</button>
            </td>
            <td>
                <button type="button" onclick="deleteItem()">DELETE</button>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>Audio</td>
            <td>Speaker</td>
            <td>AN130 Speaker</td>
            <td>Anchor</td>
            <td>AN130</td>
            <td>Each</td>
            <td>2</td>
            <td>No</td>
            <td>$75.00</td>
            <td>$75.00</td>
            <td>0</td>
            <td>0</td>
            <td>
                <button type="button" onclick="editPane()">EDIT</button>
            </td>
            <td>
                <button type="button" onclick="deleteItem()">DELETE</button>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>Audio</td>
            <td>Speaker</td>
            <td>AN130 Speaker</td>
            <td>Anchor</td>
            <td>AN130</td>
            <td>Each</td>
            <td>2</td>
            <td>No</td>
            <td>$75.00</td>
            <td>$75.00</td>
            <td>0</td>
            <td>0</td>
            <td>
                <button type="button" onclick="editPane()">EDIT</button>
            </td>
            <td>
                <button type="button" onclick="deleteItem()">DELETE</button>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>Audio</td>
            <td>Speaker</td>
            <td>AN130 Speaker</td>
            <td>Anchor</td>
            <td>AN130</td>
            <td>Each</td>
            <td>2</td>
            <td>No</td>
            <td>$75.00</td>
            <td>$75.00</td>
            <td>0</td>
            <td>0</td>
            <td>
                <button type="button" onclick="editPane()">EDIT</button>
            </td>
            <td>
                <button type="button" onclick="deleteItem()">DELETE</button>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>Audio</td>
            <td>Speaker</td>
            <td>AN130 Speaker</td>
            <td>Anchor</td>
            <td>AN130</td>
            <td>Each</td>
            <td>2</td>
            <td>No</td>
            <td>$75.00</td>
            <td>$75.00</td>
            <td>0</td>
            <td>0</td>
            <td>
                <button type="button" onclick="editPane()">EDIT</button>
            </td>
            <td>
                <button type="button" onclick="deleteItem()">DELETE</button>
            </td>
        </tr>
    </table>


    <script type="text/javascript" src="../js/inventory.js"></script>

</body>

</html>