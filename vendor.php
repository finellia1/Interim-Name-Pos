<?php 
       //Pulled from permissions.php
       require_once("classes\permissions.php");
       $permissions = new permissions();
       $permissions->checkLoggedIn();
       //Checks for permissions, bounces to login if user is not logged in
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vendor Page</title>
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
        <div class="middlePanel">

            <div class="inventory">
                <?php 
                    //https://www.php.net/manual/en/reserved.variables.get.php
                    if(isset($_GET['skipnav'])){
                        if($_GET['skipnav'] == 'true'){
                            echo "<br>";
                            echo '<a class = "skipNav" href="skipNav.html" alt = "Skip navigation link">Skip Navigation</a>';
                        }
                    }
                ?>
                <?php 
                        //require './classes/session.classes.php';

                        //session::start();
                        // session_start();
                        ?>


                <div id="searchPopup" class="popup">
                    <fieldset>
                        <form name="searchForm" action="./includes/vendor.inc.php" method="POST">
                            <table class="dropShadow">
                                <tr>
                                    <td class="alignLeft">
                                        <label for="searchTypeInput">Search Field:</label></td>
                                    <td class="alignLeft">
                                        <select id="searchTypeInput" name="searchTypeInput" placeholder="Search by...">
                                            <option value="Vendor ID">Vendor ID</option>
                                            <option value="Company Name">Company Name</option>
                                            <option value="Website">Website</option>
                                            <option value="Sales Representative">Sales Representative</option>
                                            <option value="Email">Email</option>
                                            <option value="Phone">Phone</option>
                                            <option value="Vendor Notes">Vendor Notes</option>
                                            <option value = "">All</option>
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
                        <form name="edit" action="./includes/vendorUpdate.inc.php" method="POST">
                            <table class="dropShadow">
                                <!-- Company Name -->
                                <input type='hidden' name='deleteID_edit' id='deleteID_edit'>
                                <tr>
                                    <td class="alignLeft">
                                        <label for="company name">Company Name:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="companyName" name="company_name" placeholder="Company Name" required><br>
                                    </td>
                                </tr>
                                <!-- Website -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="item name">Website:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="website" name="website" placeholder="Website"><br>
                                    </td>
                                </tr>
                                <!-- Sales Representative -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="sales represenetative">Sales Representative:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="salesrep" name="salesrep" placeholder="Sales Rep"><br>
                                    </td>
                                </tr>
                                <!-- Email -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="Email">Email:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="email" id="email" name="email" placeholder="Email" required><br>
                                    </td>
                                </tr>
                                <!-- Phone -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="phone">Phone:</label>
                                        <dt> Format: 123-456-7890 </dt>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="tel" id="phone" name="phone" placeholder="Phone Number"  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br>
                                    </td>
                                </tr>
                                <!-- Vendor Notes -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="vendor notes">Vendor Notes:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="vendorNotes" name="vendor_notes"
                                        placeholder="vendor notes"><br>
                                    </td>
                                </tr>
                                <td>
                                    <label for="Submit edit button">
                                        <input type="submit" value="Submit!" ></button>
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
                        <form name="add" action="./includes/vendorAdd.inc.php" method="post">
                            <table class="dropShadow">
                                <!-- Company Name -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="company name">Company Name:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="company_name" placeholder="Company Name" required><br>
                                    </td>
                                </tr>
                                <!-- Website -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="website">Website:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="website" placeholder="Website"><br>
                                    </td>
                                </tr>
                                <!-- Sales Representative -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="sales representative">Sales Rep:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="salesrep" placeholder="Sales Representative"><br>
                                    </td>
                                </tr>

                                <!-- Email -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="model">Email:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="email" name="email" placeholder="Email" required><br>
                                    </td>
                                </tr>
                                <!-- Phone -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="quantity unit">Phone Number:</label>
                                        <dt> Format: 123-456-7890 </dt>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="tel" name="phone" placeholder="Phone Number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br>
                                    </td>
                                </tr>
                                <!-- Vendor Notes -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="vendor notes">Vendor Notes:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="vendor_notes" placeholder="Notes"><br>
                                    </td>
                                </tr>
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


                            <?php
                                    require_once("classes\permissions.php");
                                    $permissionsObj = new permissions();
                                    //Error handling includes and object creation
                                    if($permissionsObj->getPermissionArray()["Vendor"][$permissionsObj->getPermissions()]["addItem"] == 1){
                                        echo '<label for="Open add pane">
                                        <th id="addItemBtnTH">
                                            <button type="button" onclick="addItem()">Add Item</button>
                                        </th>
                                        </label>';
                                    }
                                    require_once("classes\permissions.php");
                                    $permissionsObj = new permissions();
                                    //Error handling includes and object creation
                                    if($permissionsObj->getPermissionArray()["Vendor"][$permissionsObj->getPermissions()]["search"] == 1){
                                        echo '<label for="Open search pane">
                                        <th id="searchBtn">
                                            <button type="button" onclick="searchItem()">Search</button>
                                        </th>
                                    </label>';
                                    }
                            ?>  
                    </tr>
                </table>
                <!--Contains the table-->
                <div id="inventoryWrapper">
                    <table id="inventory">
                        <tr>
                            <?php
                                    require_once("classes\permissions.php");
                                    $permissionsObj = new permissions();
                                    //Error handling includes and object creation
                                    if($permissionsObj->getPermissionArray()["Vendor"][$permissionsObj->getPermissions()]["edit"] == 1){
                                        echo "<th>Edit</th>";
                                    }
                                    //Error handling includes and object creation
                                    if($permissionsObj->getPermissionArray()["Vendor"][$permissionsObj->getPermissions()]["delete"] == 1){
                                        echo "<th>Delete</th>";
                                    }
                            ?>
                            <th>Vendor ID</th>
                            <th>Company Name</th>
                            <th>Website</th>
                            <th>Sales Representative</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Vendor Notes</th>

                        </tr>
                        <?php
                                include "includes/vendorSearch.inc.php";
                            ?>

                    </table>
                </div>

                <script type="text/javascript" src="./js/inventory.js"></script>
                <script type="text/javascript" src="./js/homepage.js"></script>

            </div>

            </main>
        </div>

</body>

</html>