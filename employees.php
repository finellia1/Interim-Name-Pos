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
        <div class="middlePanel">
            <div class="inventory">
                <?php 
                        require './classes/session.classes.php';

                        session::start();
                        // session_start();
                        ?>


                <div id="searchPopup" class="popup">
                    <fieldset>
                        <form name="searchForm" action="./includes/employee.inc.php" method="POST">
                            <table class="dropShadow">
                                <tr>
                                    <td class="alignLeft">
                                        <label for="searchTypeInput">Search Field:</label></td>
                                    <td class="alignLeft">
                                        <select id="searchTypeInput">
                                            <option value="Employee ID">Employee ID</option>
                                            <option value="Security Type">Security Type</option>
                                            <option value="Job Title">Job Title</option>
                                            <option value="First Name">First Name</option>
                                            <option value="Last Name">Last Name</option>
                                            <option value="Email">Email</option>
                                            <option value="Hourly Salary">Hourly Salary</option>
                                            <option value="Yearly Salary">Yearly Salary</option>
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
                        <form name="edit" action="includes/updateUser.inc.php" method="POST">
                            <table class="dropShadow">
                                <input type='hidden' name='deleteID_edit' id='deleteID_edit'>
                                <!-- security_type -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="Security type of employee">Security Type:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <!--https://www.w3schools.com/tags/tag_select.asp-->
                                        <select name="security_type" id = "security_type">
                                            <option value="administrator">Administrator</option>
                                            <option value="manager">Manager</option>
                                            <option value="staff">Staff</option>
                                            <option value="user">User</option>
                                        </select>
                                    </td>
                                </tr>
                                <!-- password -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="Password for employee">Password:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="password" id="password" name="password" value=""><br>
                                    </td>
                                </tr>
                                <!-- job_title -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="Job title of employee">Job Title:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="job_title" name="job_title" value="job_title"><br>
                                    </td>
                                </tr>
                                <!-- first_name -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="first name of employee">First name:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="first_name" name="first_name" value="first_name"><br>
                                    </td>
                                </tr>
                                <!-- last_name -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="vendor notes">Last name:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="last_name" name="last_name" value="last_name"><br>
                                    </td>
                                </tr>
                                <!-- email -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="Email address of employee">Email:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="email" name="email" value="email"><br>
                                    </td>
                                </tr>
                                <!-- hourly_salary -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="hourly_salary">Hourly salary:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="hourly_salary" name="hourly_salary"
                                            value="hourly_salary"><br>
                                    </td>
                                </tr>
                                <!-- yearly_salary -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="yearly_salary">Yearly salary:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" id="yearly_salary" name="yearly_salary"
                                            value="yearly_salary"><br>
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
                <div id="addPopup" class="popup">
                    <fieldset>
                        <form name="add" action="./includes/employeeAdd.inc.php" method="post">
                            <table class="dropShadow">
                                <!-- security_type -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="Security type of employee">Security Type:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <!--https://www.w3schools.com/tags/tag_select.asp-->
                                        <select name="security_type">
                                            <option value="administrator">Administrator</option>
                                            <option value="manager">Manager</option>
                                            <option value="staff">Staff</option>
                                            <option value="user">User</option>
                                        </select>
                                    </td>
                                </tr>
                                <!-- password -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="Password for employee">Password:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="password" name="password" value=""><br>
                                    </td>
                                </tr>
                                <!-- job_title -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="Job title of employee">Job Title:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="job_title" value="job_title"><br>
                                    </td>
                                </tr>
                                <!-- first_name -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="first name of employee">First name:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="first_name" value="first_name"><br>
                                    </td>
                                </tr>
                                <!-- last_name -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="vendor notes">Last name:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="last_name" value="last_name"><br>
                                    </td>
                                </tr>
                                <!-- email -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="Email address of employee">Email:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="email" value="email"><br>
                                    </td>
                                </tr>
                                <!-- hourly_salary -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="hourly_salary">Hourly salary:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="hourly_salary" value="hourly_salary"><br>
                                    </td>
                                </tr>
                                <!-- yearly_salary -->
                                <tr>
                                    <td class="alignLeft">
                                        <label for="yearly_salary">Yearly salary:</label>
                                    </td>
                                    <td class="alignLeft">
                                        <input type="text" name="yearly_salary" value="yearly_salary"><br>
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
                            <th>Employee ID</th>
                            <th>Security Type</th>
                            <th>Job Title</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Hourly Salary</th>
                            <th>Yearly Salary</th>
                        </tr>
                        <?php
                                include "includes/employeeSearch.inc.php";
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