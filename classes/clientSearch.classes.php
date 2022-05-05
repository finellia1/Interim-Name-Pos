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

        //echo $_SESSION["searchTypeInput_client"];

        //Set data to results of search query ran.
        //Search query is session variable set in search popup
        //echo $_SESSION["searchTypeInput"];
        $getData = $stmt->query($_SESSION["searchTypeInput_client"]);
        foreach($getData as $row){
            if($row['is_inactive'] == 0){
                //Echo out table information with row infomration from DB 
                echo "<tr  class = 'inventoryItem'>"; 

                $c_company_name = $row['company'];
                if(str_contains($c_company_name, '"')){
                    $c_company_name = str_replace('"', "“", $row['company']);
                }
                if(str_contains($c_company_name, "'")){
                    $c_company_name = str_replace("'", "’", $company_name);
                }
            
                $c_client_type = $row['client_type'];
                if(str_contains($c_client_type, '"')){
                    $c_client_type = str_replace('"', "“", $row['client_type']);
                }
                if(str_contains($c_client_type, "'")){
                    $c_client_type = str_replace("'", "’", $row['client_type']);
                }
            
                $c_first_name = $row['first_name'];
                if(str_contains($c_first_name, '"')){
                    $c_first_name = str_replace('"', "“", $row['first_name']);
                }
                if(str_contains($c_first_name, "'")){
                    $c_first_name = str_replace("'", "’", $row['first_name']);
                }
            
                $c_last_name = $row['last_name'];
                if(str_contains($c_last_name, '"')){
                    $c_last_name = str_replace('"', "“", $row['last_name']);
                }
                if(str_contains($c_last_name, "'")){
                    $c_last_name = str_replace("'", "’", $row['last_name']);
                }
            
                $c_email = $row['email'];
                if(str_contains($c_email, '"')){
                    $c_email = str_replace('"', "“", $row['email']);
                }
                if(str_contains($c_email, "'")){
                    $c_email = str_replace("'", "’", $row['email']);
                }
            
                $c_address_line1 = $row['address_line1'];
                if(str_contains($c_address_line1, '"')){
                    $c_address_line1 = str_replace('"', "“", $row['address_line1']);
                }
                if(str_contains($c_address_line1, "'")){
                    $c_address_line1 = str_replace("'", "’", $row['address_line1']);
                }
            
                $c_address_line2 = $row['address_line2'];
                if(str_contains($c_address_line2, '"')){
                    $c_address_line2 = str_replace('"', "“", $row['address_line2']);
                }
                if(str_contains($c_address_line2, "'")){
                    $c_address_line2 = str_replace("'", "’", $row['address_line2']);
                }
            
                $c_city = $row['city'];
                if(str_contains($c_city, '"')){
                    $c_city = str_replace('"', "“", $row['city']);
                }
                if(str_contains($c_city, "'")){
                    $c_city = str_replace("'", "’", $row['city']);
                }
            
                $c_state_abbr = $row['state_abbr'];
                if(str_contains($c_state_abbr, '"')){
                    $c_state_abbr = str_replace('"', "“", $row['state_abbr']);
                }
                if(str_contains($c_state_abbr, "'")){
                    $c_state_abbr = str_replace("'", "’", $row['state_abbr']);
                }
            
                $c_zip_code = $row['zip_code'];
                if(str_contains($c_zip_code, '"')){
                    $c_zip_code = str_replace('"', "“", $row['zip_code']);
                }
                if(str_contains($c_zip_code, "'")){
                    $c_zip_code = str_replace("'", "’", $row['zip_code']);
                }
            
                $c_phone = $row['phone'];
                if(str_contains($c_phone, '"')){
                    $c_phone = str_replace('"', "“", $row['phone']);
                }
                if(str_contains($c_phone, "'")){
                    $c_phone = str_replace("'", "’", $row['phone']);
                }
            
                $c_client_notes = $row['client_notes'];
                if(str_contains($c_client_notes, '"')){
                    $c_client_notes = str_replace('"', "“", $row['client_notes']);
                }
                if(str_contains($c_client_notes, "'")){
                    $c_client_notes = str_replace("'", "’", $row['client_notes']);
                }

                //Append single quotes to either side the data
                //This is done to be able to pass a string to a js onclick()
                $p_client_ID = "'".$row['client_ID']."'";
                $p_company = "'".$c_company_name."'";
                $p_client_type= "'".$c_client_type."'";
                $p_first_name = "'".$c_first_name."'";
                $p_last_name = "'".$c_last_name."'";
                $p_email = "'".$c_email."'";
                $p_address_line1 = "'".$c_address_line1."'";
                $p_address_line2 = "'".$c_address_line2."'";
                $p_city = "'".$c_city."'";
                $p_state_abbr = "'".$c_state_abbr."'";
                $p_zip_code = "'".$c_zip_code."'";
                $p_phone = "'".$c_phone."'";
                $p_client_notes = "'".$c_client_notes."'";

                //Pass in the p_ variables to button. This way the variables can be accessed in JS
                printf('<td><button type="button" onclick="editPane_client(%s,%s, %s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)">Edit</button>',$p_client_ID,$p_company,$p_client_type,$p_first_name,$p_last_name,$p_email,$p_address_line1,$p_address_line2,$p_city,$p_state_abbr,$p_zip_code,$p_phone,$p_client_notes);

                //Create form to handle removing item
                echo "<form name='remove' action='./includes/clientRemove.inc.php' method='post'>";
                echo "<td><label for 'Delete button'><button type='submit' name='submit' value='submit'>Delete</button></label>";
                echo "<input type='hidden' name='PID' value='{$row['client_ID']}'>";
                echo "</form>";

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

                echo "</tr>";
            }
        }
    }
} 