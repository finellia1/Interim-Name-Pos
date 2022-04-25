<?php

class clientSearch extends Dbh {

    protected function getClients($searchType, $searchContent) {
        //https://stackoverflow.com/questions/28717868/sql-server-select-where-any-column-contains-x
        
        $stmt = $this->connect();



        //If there is no sessions set, default to selecting every item
        if(!isset($_SESSION["searchTypeInput_client"])){
            $_SESSION["searchTypeInput_client"] = "select * from client";
        }
        //echo $_SESSION["searchTypeInput_client"];

        //Set data to results of search query ran.
        //Search query is session variable set in search popup
        //echo $_SESSION["searchTypeInput"];
        $getData = $stmt->query($_SESSION["searchTypeInput_client"]);
        foreach($getData as $row){
            if($row['is_inactive'] == 0){
                //Echo out table information with row infomration from DB 
                echo "<tr class = 'tableRow'>"; 
                echo "<td> {$row['client_ID']} </td>";
                echo "<td> {$row['company']} </td>";
                echo "<td> {$row['client_type']} </td>";
                echo "<td> {$row['first_name']} </td>";
                echo "<td> {$row['last_name']} </td>";
                echo "<td> {$row['email']} </td>";
                echo "<td> {$row['address_line1']} </td>";
                echo "<td> {$row['address_line2']} </td>";
                echo "<td> {$row['city']} </td>";
                echo "<td> {$row['state_abbr']} </td>";
                echo "<td> {$row['zip_code']} </td>";
                echo "<td> {$row['phone']} </td>";
                echo "<td> {$row['client_notes']} </td>";

                //Append single quotes to either side the data
                //This is done to be able to pass a string to a js onclick()
                $p_id = "'".$row['client_ID']."'";
                $p_type = "'".$row['company']."'";
                $p_name = "'".$row['client_type']."'";
                $p_description = "'".$row['first_name']."'";
                $p_make = "'".$row['last_name']."'";
                $p_model = "'".$row['email']."'";
                $p_qty_unit = "'".$row['address_line1']."'";
                $p_qty_in_stock = "'".$row['address_line2']."'";
                $p_is_promotional = "'".$row['city']."'";
                $p_reg_price = "'".$row['state_abbr']."'";
                $p_discounted_price = "'".$row['zip_code']."'";
                $p_num_rented = "'".$row['phone']."'";
                $p_num_broken = "'".$row['client_notes']."'";


                //Pass in the p_ variables to button. This way the variables can be accessed in JS
                printf('<td><button type="button" onclick="editPane_client(%s,%s, %s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)">Edit</button>',$p_id,$p_name,$p_type,$p_description, $p_make, $p_model, $p_qty_unit, $p_qty_in_stock, $p_is_promotional, $p_reg_price, $p_discounted_price, $p_num_rented, $p_num_broken);

                //Create form to handle removing item
                echo "<form name='remove' action='./includes/clientRemove.inc.php' method='post'>";
                echo "<td><label for 'Delete button'><button type='submit' name='submit' value='submit'>Delete</button></label>";
                echo "<td><label for 'Cart button'><button type='button'>Cart</button></label>";
                echo "<td> <input type='hidden' name='PID' id='deleteID' value='{$row['client_ID']}'> </td>";
                echo "</form>";
                echo "</tr>";
            }
        }
    }
}