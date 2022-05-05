<?php

class productSearch extends Dbh {

    protected function fillVendorForm(){
       // echo '<input id="vendorInput" name="vendorInput" list="vendorList" placeholder="Search by..."  class = "dropDown">';
        //echo "<select name = 'vendorInput' id = 'vendorList'>";
        $stmt = $this->connect();
        $getCompanyName= $this->connect()->prepare('select company_name from vendor');
        $getCompanyName->execute();

        foreach($getCompanyName as $row){
            printf('<option>%s</option>', $row['company_name']); 

        }
        //echo "</select>";
    }

    protected function getProducts($searchType, $searchContent) {
        //https://stackoverflow.com/questions/28717868/sql-server-select-where-any-column-contains-x
        
        $stmt = $this->connect();

        //If there is no sessions set, default to selecting every item
        if(!isset($_SESSION["searchTypeInput"])){
            $_SESSION["searchTypeInput"] = "select * from product";
        }
        //$_SESSION["searchTypeInput"] = "select * from product";

        //Set data to results of search query ran.
        //Search query is session variable set in search popup
        //echo $_SESSION["searchTypeInput"];
        //echo $_SESSION["debug"];

        $getData = $stmt->query($_SESSION["searchTypeInput"]);
        foreach($getData as $row){
            if($row['is_discontinued'] == 0){

                //Echo out table information with row infomration from DB 
                echo "<tr class = 'inventoryItem'>"; 

                //Used for cleaning up input
                //https://www.php.net/manual/en/function.str-replace.php
                //https://www.php.net/manual/en/function.str-contains.php
                //https://unicode-table.com/en/2018/
                //https://unicode-table.com/en/201C/

                //Clean product type input
                $c_type = $row['product_type'];
                if(str_contains($c_type, '"')){
                    $c_type = str_replace('"', "“", $row['product_type']);
                }
                if(str_contains($c_type, "'")){
                    $c_type = str_replace("'", "’", $row['product_type']);
                }

                //Clean name input
                $c_name = $row['product_name'];
                if(str_contains($c_name, '"')){
                    $c_name = str_replace('"', "“", $row['product_name']);
                }
                if(str_contains($c_name, "'")){
                    $c_name = str_replace("'", "’", $row['product_name']);
                }

                //Clean description
                $c_description = $row['product_description'];
                if(str_contains($c_description, '"')){
                    $c_description = str_replace('"', "“", $row['product_description']);
                }
                if(str_contains($c_description, "'")){
                    $c_description = str_replace("'", "’", $row['product_description']);
                }

                //Clean make
                $c_make = $row['make'];
                if(str_contains($c_make, '"')){
                    $c_make = str_replace('"', "“", $row['make']);
                }
                if(str_contains($c_make, "'")){
                    $c_make = str_replace("'", "’", $row['make']);
                }

                //Clean model
                $c_model = $row['model'];
                if(str_contains($c_model, '"')){
                    $c_model = str_replace('"', "“", $row['model']);
                }
                if(str_contains($c_model, "'")){
                    $c_model = str_replace("'", "’", $row['model']);
                }

                //Clean Quantity Unit
                $c_qty_unit = $row['qty_unit'];
                if(str_contains($c_type, '"')){
                    $c_qty_unit = str_replace('"', "“", $row['qty_unit']);
                }
                if(str_contains($c_type, "'")){
                    $c_qty_unit = str_replace("'", "’", $row['qty_unit']);
                }
                
                //echo str_replace("'", "“", $Test);

                //Append single quotes to either side the data
                //This is done to be able to pass a string to a js onclick()
                $p_id = "'".$row['product_ID']."'";
                $p_vendor = "'".$row['vendor_ID_fk']."'";
                $p_type = "'".$c_type."'";
                $p_name = "'".$c_name."'";
                $p_description = "'".$c_description."'";
                $p_make = "'".$c_make."'";
                $p_model = "'".$c_model."'";
                $p_qty_unit = "'".$c_qty_unit."'";
                $p_qty_in_stock = "'".$row['qty_in_stock']."'";
                $p_is_promotional = "'".$row['is_promotional']."'";
                $p_reg_price = "'".$row['reg_price']."'";
                $p_discounted_price = "'".$row['discounted_price']."'";
                $p_num_rented = "'".$row['num_rented']."'";
                $p_num_broken = "'".$row['num_broken']."'";


                $getCompanyName= $stmt->prepare('select company_name from vendor where vendor_ID = ?');
                $getCompanyName->execute(array($row['vendor_ID_fk']));
                $companyName =  $getCompanyName->fetch()[0];
                $p_companyName = "'".$companyName."'";

                //Pass in the p_ variables to button. This way the variables can be accessed in JS
                printf('<td><button type="button" onclick="editPane(%s,%s, %s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)">Edit</button>',$p_id,$p_vendor,$p_name,$p_type,$p_description, $p_make, $p_model, $p_qty_unit, $p_qty_in_stock, $p_is_promotional, $p_reg_price, $p_discounted_price, $p_num_rented, $p_num_broken,$p_companyName);

                //Create form to handle removing item
                /*
                echo "<form name='remove' action='./includes/productRemove.inc.php' method='post'>";
                echo "<td><label for 'Delete button'><button type='submit' name='submit' value='submit'>Delete</button></label>";
                echo "<td><label for 'Cart button'><button type='button'>Cart</button></label>";
                echo "<td> <input type='hidden' name='PID' id='deleteID' value='{$row['product_ID']}'> </td>";
                echo "</form>";
                echo "</tr>";
                */

                echo "<form name='remove' action='./includes/productRemove.inc.php' method='post'>";
                echo "<td><button type='submit' name='submit' value='submit'>Delete</button>";
                echo "<input type='hidden' name='PID' value='{$row['product_ID']}'>";
                echo "</form>";
                echo "<form action='shopcart\product.php' method='post'>";
                echo "<td><button type='submit' value='Cart'>Cart</button>";
                echo "<input type='hidden' name='quantity' value='{$row['qty_in_stock']}'>";
                echo "<input type='hidden' name='product_ID' value='{$row['product_ID']}'>";
                echo "</form>";





                echo "<td> {$row['product_ID']} </td>";
                //Display vendor as name instead of integer  
                //https://www.php.net/manual/en/pdo.prepare.php


                echo "<td> $companyName </td>";
                echo "<td> {$row['product_type']} </td>";
                echo "<td> {$row['product_name']} </td>";
                echo "<td> {$row['product_description']} </td>";
                echo "<td> {$row['make']} </td>";
                echo "<td> {$row['model']} </td>";
                echo "<td> {$row['qty_unit']} </td>";
                echo "<td> {$row['qty_in_stock']} </td>";
                echo "<td> {$row['is_promotional']} </td>";
                echo "<td> {$row['reg_price']} </td>";
                echo "<td> {$row['discounted_price']} </td>";
                echo "<td> {$row['num_rented']} </td>";
                echo "<td> {$row['num_broken']} </td>";

                echo "</tr>";

                
            }
        }
    }
}               
