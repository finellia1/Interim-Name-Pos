<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Clients</title>
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
<!--https://kinsta.com/knowledgebase/xampp-mysql-shutdown-unexpectedly/#how-to-fix-the-xampp-error-mysql-shutdown-unexpectedly-3-methods-->
<body>
    <div class = "wrap">
        <main>
            <div class = "middlePanel">

                <div class = "inventory">
                <?php 
                    //https://www.php.net/manual/en/reserved.variables.get.php
                    if(isset($_GET['skipnav'])){
                        if($_GET['skipnav'] == 'true'){
                            echo "<br>";
                            echo '<a class = "skipNav" href="skipNav.php" alt = "Skip navigation link">Skip Navigation</a>';
                        }
                    }
                ?>
                    <?php 
                        require './classes/session.classes.php';

                        session::start();
                        // session_start();
                        ?>
                        <div id = "searchPopup" class = "popup">
                        <fieldset>
                            <form name="searchForm" action="./includes/client.inc.php" method="POST">
                                <table class="dropShadow">
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="searchTypeInput">Search Field:</label></td>
                                        <td class="alignLeft">
                                            <select id = "searchTypeInput" name = "searchTypeInput" placeholder ="Search by..." >
                                                <option value = "ID">ID</option>    
                                                <option value = "Company">Company</option>
                                                <option value = "Client Type">Client Type</option>
                                                <option value = "First Name">First Name</option>
                                                <option value = "Last Name">Last Name</option>
                                                <option value = "Email">Email</option>
                                                <option value = "Address Line 1">Address Line 1</option>
                                                <option value = "Address Line 2">Address Line 2</option>
                                                <option value = "City">City</option>
                                                <option value = "State Abbreviation">State Abbreviation</option>
                                                <option value = "Zip Code">Zip Code</option>
                                                <option value = "Phone Number">Phone Number</option>
                                                <option value = "Client Notes">Client Notes</option>
                                                <option value = "">All</option>
                                            </select>
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
                        </fieldset>
                    </div>
   <!--Edit popup. Hidden by default-->
   <div id="editPopup" class = "popup">
                     <fieldset>
                        <form name="edit" action="./includes/clientUpdate.inc.php" method="POST">
                            <table class="dropShadow">
                            <!-- Item Name --> 
                            <input type='hidden' name='deleteID_edit' id='deleteID_edit'>
                            <!-- Company --> 
                            <tr>
                                        <td class="alignLeft">
                                            <label for="Company of Client">Company</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input  type="text" name="company_name" value="company name" id="company_name"><br>
                                        </td>
                                    </tr>
                                    <!-- Client Type: -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Type of Client">Client Type:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="client_type" value="client type" id="client_type"><br>
                                        </td>
                                    </tr>
                                    <!-- First Name -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="First Name of Client ">First Name:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="first_name" value="first name" id="first_name"><br>
                                        </td>
                                    </tr>
                                    <!-- Last Name: -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Last Name of Client">Last Name:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text"  name="last_name" value="last name" id="last_name"><br>
                                        </td>
                                    </tr>
                                    
                                    <!-- email -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Email Address of Client">email:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="email" value="email adress" id="email"><br>
                                        </td>
                                    </tr>
                                    <!-- Address Line 1: -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Address Line 1 of Client">Address Line 1:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="address_line1" value="address line 1" id="address_line1"><br>
                                        </td>
                                    </tr>
                                    <!-- Address Line 2 -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Address Line 2 of Client">Address Line 2:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="address_line2" value="address line 2" id="address_line2"><br>
                                        </td>
                                    </tr>
                                    <!-- City -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="City of Client">City:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="city" value="City" id="city"><br>
                                        </td>
                                    </tr>
                                    <!--State Abbreviation -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="State Abbreviation of Client">State Abbreviation</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="state_abbr" value="NY" id="state_abbr"><br>
                                        </td>
                                    </tr>
                                    <!--Zip Code -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Zip Code of Client">Zip Code:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="zip_code" value="10541" id="zip_code"><br>
                                        </td>
                                    </tr>
                                    <tr>
                                    <!--Phone Number -->
                                        <td class="alignLeft">
                                            <label for="Phone Number of Client">Phone Number:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="phone" value="845-745-2802" id="phone"><br>
                                        </td>
                                    </tr>
                                    <!-- Client Notes -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Notes for client">Client Notes</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="client_notes" value="client note" id="client_notes"><br>
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
                            <form name="add" action="./includes/clientAdd.inc.php" method="post">
                                <table class="dropShadow">
                                    <!-- Company --> 
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Company of Client">Company</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="company_name" value="company name"><br>
                                        </td>
                                    </tr>
                                    <!-- Client Type: -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Type of Client">Client Type:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="client_type" value="client type"><br>
                                        </td>
                                    </tr>
                                    <!-- First Name -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="First Name of Client ">First Name:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="first_name" value="first name"><br>
                                        </td>
                                    </tr>
                                    <!-- Last Name: -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Last Name of Client">Last Name:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text"  name="last_name" value="last name"><br>
                                        </td>
                                    </tr>
                                    
                                    <!-- email -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Email Address of Client">email:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="email" value="email adress"><br>
                                        </td>
                                    </tr>
                                    <!-- Address Line 1: -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Address Line 1 of Client">Address Line 1:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="address_line1" value="address line 1"><br>
                                        </td>
                                    </tr>
                                    <!-- Address Line 2 -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Address Line 2 of Client">Address Line 2:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="address_line2" value="address line 2"><br>
                                        </td>
                                    </tr>
                                    <!-- City -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="City of Client">City:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="city" value="City"><br>
                                        </td>
                                    </tr>
                                    <!--State Abbreviation -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="State Abbreviation of Client">State Abbreviation</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="state_abbr" value="NY"><br>
                                        </td>
                                    </tr>
                                    <!--Zip Code -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Zip Code of Client">Zip Code:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="zip_code" value="10541"><br>
                                        </td>
                                    </tr>
                                    <tr>
                                    <!--Phone Number -->
                                        <td class="alignLeft">
                                            <label for="Phone Number of Client">Phone Number:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="phone" value="845-745-2802"><br>
                                        </td>
                                    </tr>
                                    <!-- Client Notes -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="Notes for client">Client Notes</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="client_notes" value="client note"><br>
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
                            <?php
                                require_once("classes\permissions.php");
                                $permissionsObj = new permissions();
                                //Error handling includes and object creation
                                if($permissionsObj->getPermissionArray()["Clients"][$permissionsObj->getPermissions()]["addItem"] == 1){
                                    echo '<label for="Open add pane">
                                    <th id="addItemBtnTH">
                                        <button type="button" onclick="addItem()">Add Item</button>
                                    </th>
                                    </label>';
                                }
                                require_once("classes\permissions.php");
                                $permissionsObj = new permissions();
                                //Error handling includes and object creation
                                if($permissionsObj->getPermissionArray()["Clients"][$permissionsObj->getPermissions()]["search"] == 1){
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
                    <div id = "inventoryWrapper">
                        <table id="inventory">
                            <tr>
                            <?php
                                    require_once("classes\permissions.php");
                                    $permissionsObj = new permissions();
                                    //Error handling includes and object creation
                                    if($permissionsObj->getPermissionArray()["Clients"][$permissionsObj->getPermissions()]["edit"] == 1){
                                        echo "<th>Edit</th>";
                                    }
                                    //Error handling includes and object creation
                                    if($permissionsObj->getPermissionArray()["Clients"][$permissionsObj->getPermissions()]["delete"] == 1){
                                        echo "<th>Delete</th>";
                                    }
                            ?>
                                <th>Client ID</th>
                                <th>Company</th>
                                <th>Client Type</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Address Line 1</th>
                                <th>Address Line 2</th>
                                <th>City</th>
                                <th>State Abbreviation</th>
                                <th>Zip Code</th>
                                <th>Phone Number</th>
                                <th>Client Notes</th>
                            </tr>
                            <?php
                                require_once ("classes\session.classes.php");
                                session::start();
                                //Only display skipnav if ADA compliance is true.
                                if(session::isSet("ADA")){
                                    echo '<a class = "skipNav" href="skipNav.php" alt = "Skip navigation link">Skip Navigation</a>';
                                }
                            ?>
                            <?php
                                include "includes\clientSearch.inc.php";
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