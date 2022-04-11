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
                        <h1>Vendor Page</h1>
                        <br><br>
                        <div id = "searchPopup" class = "popup">
                        <fieldset>
                            <form name="searchForm" action="./includes/vendor.inc.php" method="POST">
                                <table class="dropShadow">
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="searchTypeInput">Search Field:</label></td>
                                        <td class="alignLeft">
                                            <input id = "searchTypeInput" name = "searchTypeInput" list="searchType" placeholder ="Search by...">
                                            <datalist id = "searchType" >
                                            <option value = "Vendor ID">
                                            <option value = "Company Name">
                                            <option value = "Website">
                                            <option value = "Sales Representative">
                                            <option value = "Email">
                                            <option value = "Phone">
                                            <option value = "Vendor Notes">
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
                        </fieldset>
                    </div>
   <!--Edit popup. Hidden by default-->
   <div id="editPopup" class = "popup">
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
                                        <input type="text" id="companyName" name="company_name" value="companyName"><br>
                                    </td>
                                </tr>
                            <!-- Website -->
                            <tr>
                                    <td class="alignLeft">
                                        <label for="item name">Website:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="website" name="website" value="website"><br>
                                    </td>
                                </tr>
                            <!-- Sales Representative -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="sales represenetative">Sales Representative:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="salesrep" name="salesrep" value="salesrep"><br>
                                    </td>
                                </tr>
                                <!-- Email -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="Email">Email:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="email" name="email" value="email"><br>
                                    </td>
                                </tr>
                                <!-- Phone -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="phone">Phone:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="phone" name="phone" value="phone"><br>
                                    </td>
                                </tr>
                                <!-- Vendor Notes -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="vendor notes">Vendor Notes:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="vendorNotes" name="vendor_notes" value="vendor notes"><br>
                                    </td>
                                </tr>
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
                            <form name="add" action="./includes/vendorAdd.inc.php" method="post">
                                <table class="dropShadow">
                                    <!-- Company Name -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="company name">Company Name:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="company_name" value="company name"><br>
                                        </td>
                                    </tr>
                                    <!-- Website -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="website">Website:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="website" value="website"><br>
                                        </td>
                                    </tr>
                                    <!-- Sales Representative -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="sales representative">Sales Rep:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text"  name="salesrep" value="Sales Representative"><br>
                                        </td>
                                    </tr>
                                    
                                    <!-- Email -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="model">Email:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="email" value="email"><br>
                                        </td>
                                    </tr>
                                    <!-- Phone -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="quantity unit">Phone Number:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="phone" value="phone"><br>
                                        </td>
                                    </tr>
                                    <!-- Vendor Notes -->
                                    <tr>
                                        <td class="alignLeft">
                                            <label for="vendor notes">Vendor Notes:</label>
                                        </td>
                                        <td class="alignLeft">
                                            <input type="text" name="vendor_notes" value="Notes"><br>
                                        </td>
                                    </tr>
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
                                <th>Vendor ID</th>
                                <th>Company Name</th>
                                <th>Website</th>
                                <th>Sales Representative</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Vendor Notes</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Add to Cart</th>
                            </tr>
                            <?php
                                include "includes/vendorSearch.inc.php";
                            ?>

                        </table>
                    </div>

                    <script type="text/javascript" src="./js/inventory.js"></script>

                </div>
            <div class = "rightPanel">
                <h1> Right Panel </h1>
                <p>
                    lipsum...
                </p>
            </div>
        </main>
    </div>

</body>
</html>    