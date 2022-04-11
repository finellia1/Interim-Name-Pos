<?php

class vendorSearch extends Dbh {

    protected function getProducts($searchType, $searchContent) {
        //https://stackoverflow.com/questions/28717868/sql-server-select-where-any-column-contains-x
        
        $stmt = $this->connect();
        //$_SESSION["searchTypeInput_vendor"] = "select * from vendor";
        echo $_SESSION["searchTypeInput_vendor"];

        //If there is no sessions set, default to selecting every item
        if(!isset($_SESSION["searchTypeInput_vendor"])){
            $_SESSION["searchTypeInput_vendor"] = "select * from product";
        }

        //Set data to results of search query ran.
        //Search query is session variable set in search popup
        //echo $_SESSION["searchTypeInput"];
        $getData = $stmt->query($_SESSION["searchTypeInput_vendor"]);
        foreach($getData as $row){
            if($row['is_inactive'] == 0){
                //Echo out table information with row infomration from DB 
                echo "<tr>"; 
                echo "<td> {$row['vendor_ID']} </td>";
                echo "<td> {$row['company_name']} </td>";
                echo "<td> {$row['website']} </td>";
                echo "<td> {$row['salesrep']} </td>";
                echo "<td> {$row['email']} </td>";
                echo "<td> {$row['phone']} </td>";
                echo "<td> {$row['vendor_notes']} </td>";

                //Append single quotes to either side the data
                //This is done to be able to pass a string to a js onclick()
                $p_id = "'".$row['vendor_ID']."'";
                $p_company_name = "'".$row['company_name']."'";
                $p_website = "'".$row['website']."'";
                $p_salesrep = "'".$row['salesrep']."'";
                $p_email = "'".$row['email']."'";
                $p_phone = "'".$row['phone']."'";
                $p_vendor_notes = "'".$row['vendor_notes']."'";

                //Pass in the p_ variables to button. This way the variables can be accessed in JS
                printf('<td><button type="button" onclick="editPane(%s,%s, %s,%s,%s,%s,%s)">Edit</button>',$p_id,$p_company_name,$p_website,$p_salesrep, $p_email, $p_phone, $p_vendor_notes);

                //Create form to handle removing item
                echo "<form name='remove' action='./includes/productRemove.inc.php' method='post'>";
                echo "<td><label for 'Delete button'><button type='submit' name='submit' value='submit'>Delete</button></label>";
                echo "<td><label for 'Cart button'><button type='button'>Cart</button></label>";
                echo "<td> <input type='hidden' name='PID' id='deleteID' value='{$row['vendor_ID']}'> </td>";
                echo "</form>";
                echo "</tr>";
            }
        }
    }
}