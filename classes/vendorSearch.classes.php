<?php

class vendorSearch extends Dbh {

    protected function getProducts($searchType, $searchContent) {
        //https://stackoverflow.com/questions/28717868/sql-server-select-where-any-column-contains-x
        
        $stmt = $this->connect();
        //$_SESSION["searchTypeInput_vendor"] = "select * from vendor";

        //If there is no sessions set, default to selecting every item
        if(!isset($_SESSION["searchTypeInput_vendor"])){
            $_SESSION["searchTypeInput_vendor"] = "select * from vendor";
        }

        //Set data to results of search query ran.
        //Search query is session variable set in search popup
        //echo $_SESSION["searchTypeInput"];
        $getData = $stmt->query($_SESSION["searchTypeInput_vendor"]);
        foreach($getData as $row){
            if($row['is_inactive'] == 0){
                //Echo out table information with row infomration from DB 
                echo "<tr  class = 'inventoryItem'>"; 

                //Clean company name input
                $c_company_name = $row['company_name'];
                if(strpos($c_company_name, '"')){
                    $c_company_name = str_replace('"', "“", $row['company_name']);
                }
                if(strpos($c_company_name, "'")){
                    $c_company_name = str_replace("'", "’", $row['company_name']);
                }

                //Clean website input
                $c_website = $row['website'];
                if(strpos($c_website, '"')){
                    $c_website = str_replace('"', "“", $row['website']);
                }
                if(strpos($c_website, "'")){
                    $c_website = str_replace("'", "’", $row['website']);
                }

                //Clean salesrep
                $c_salesrep = $row['salesrep'];
                if(strpos($c_salesrep, '"')){
                    $c_salesrep = str_replace('"', "“", $row['salesrep']);
                }
                if(strpos($c_salesrep, "'")){
                    $c_salesrep = str_replace("'", "’", $row['salesrep']);
                }

                //Clean email
                $c_email = $row['email'];
                if(strpos($c_email, '"')){
                    $c_email = str_replace('"', "“", $row['email']);
                }
                if(strpos($c_email, "'")){
                    $c_email = str_replace("'", "’", $row['email']);
                }

                //Clean phone number input
                $c_phone = $row['phone'];
                if(strpos($c_phone, '"')){
                    $c_phone = str_replace('"', "“", $row['phone']);
                }
                if(strpos($c_phone, "'")){
                    $c_phone = str_replace("'", "’", $row['phone']);
                }       
                
                //Clean vendor notes
                $c_vendor_notes = $row['vendor_notes'];
                if(strpos($c_vendor_notes, '"')){
                    $c_vendor_notes = str_replace('"', "“", $row['vendor_notes']);
                }
                if(strpos($c_vendor_notes, "'")){
                    $c_vendor_notes = str_replace("'", "’", $row['vendor_notes']);
                }

                //use strpos instead of str_contains for better compatilibility with PHP versions below 8
                    //https://stackoverflow.com/questions/66519169/call-to-undefined-function-str-contains-php



                //Append single quotes to either side the data
                //This is done to be able to pass a string to a js onclick()
                $p_id = "'".$row['vendor_ID']."'";
                $p_company_name = "'".$c_company_name."'";
                $p_website = "'".$c_website."'";
                $p_salesrep = "'".$c_salesrep."'";
                $p_email = "'".$c_email."'";
                $p_phone = "'".$c_phone."'";
                $p_vendor_notes = "'".$c_vendor_notes."'";

                //Pass in the p_ variables to button. This way the variables can be accessed in JS
                printf('<td><button type="button" onclick="editPane_vendor(%s,%s, %s,%s,%s,%s,%s)">Edit</button>',$p_id,$p_company_name,$p_website,$p_salesrep, $p_email, $p_phone, $p_vendor_notes);

                //Create form to handle removing item
                echo "<form name='remove' action='./includes/vendorRemove.inc.php' method='post'>";
                echo "<td><label for 'Delete button'><button type='submit' name='submit' value='submit'>Delete</button></label>";
                echo "<input type='hidden' name='PID' value='{$row['vendor_ID']}'>";
                echo "</form>";

                echo "<td> {$row['vendor_ID']} </td>";
                echo "<td> {$row['company_name']} </td>";
                echo "<td> {$row['website']} </td>";
                echo "<td> {$row['salesrep']} </td>";
                echo "<td> {$row['email']} </td>";
                echo "<td> {$row['phone']} </td>";
                echo "<td> {$row['vendor_notes']} </td>";

                echo "</tr>";
            }
        }
    }
}