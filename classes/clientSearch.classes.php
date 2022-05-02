<?php

class clientSearch extends Dbh {

    protected function getClients($searchType, $searchContent) {
        //https://stackoverflow.com/questions/28717868/sql-server-select-where-any-column-contains-x
        
        $stmt = $this->connect();



        //If there is no sessions set, default to selecting every item
        if(!isset($_SESSION["searchTypeInput_client"])){
            $_SESSION["searchTypeInput_client"] = "select * from client";
        }
        //$_SESSION["searchTypeInput_client"] = "select * from client";

        echo $_SESSION["searchTypeInput_client"];

        //Set data to results of search query ran.
        //Search query is session variable set in search popup
        //echo $_SESSION["searchTypeInput"];
        $getData = $stmt->query($_SESSION["searchTypeInput_client"]);
        foreach($getData as $row){
            if($row['is_inactive'] == 0){
                //Echo out table information with row infomration from DB 
                echo "<tr  class = 'inventoryItem'>"; 
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
                $p_client_ID = "'".$row['client_ID']."'";
                $p_company = "'".$row['company']."'";
                $p_client_type= "'".$row['client_type']."'";
                $p_first_name = "'".$row['first_name']."'";
                $p_last_name = "'".$row['last_name']."'";
                $p_email = "'".$row['email']."'";
                $p_address_line1 = "'".$row['address_line1']."'";
                $p_address_line2 = "'".$row['address_line2']."'";
                $p_city = "'".$row['city']."'";
                $p_state_abbr = "'".$row['state_abbr']."'";
                $p_zip_code = "'".$row['zip_code']."'";
                $p_phone = "'".$row['phone']."'";
                $p_client_notes = "'".$row['client_notes']."'";

                echo $row['client_notes'];

                //Pass in the p_ variables to button. This way the variables can be accessed in JS
                printf('<td><button type="button" onclick="editPane_client(%s,%s, %s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)">Edit</button>',$p_client_ID,$p_company,$p_client_type,$p_first_name,$p_last_name,$p_email,$p_address_line1,$p_address_line2,$p_city,$p_state_abbr,$p_zip_code,$p_phone,$p_client_notes);

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