<?php

class productSearch extends Dbh {

    protected function getVendors(){
        echo "asdasdsadasddsa";
        /*
        $getCompanyName= $this->connect()->prepare('select company_name from vendor');
        $getCompanyName->execute(array());
        $companyName =  $getCompanyName->fetchall();
        */
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
        $getData = $stmt->query($_SESSION["searchTypeInput"]);
        foreach($getData as $row){
            if($row['is_discontinued'] == 0){

                //Echo out table information with row infomration from DB 
                echo "<tr class = 'inventoryItem'>"; 
                echo "<td> {$row['product_ID']} </td>";
                //Display vendor as name instead of integer  
                //https://www.php.net/manual/en/pdo.prepare.php
                $getCompanyName= $this->connect()->prepare('select company_name from vendor where vendor_ID = ?');
                $getCompanyName->execute(array($row['vendor_ID_fk']));
                $companyName =  $getCompanyName->fetch()[0];

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

                //Append single quotes to either side the data
                //This is done to be able to pass a string to a js onclick()
                $p_id = "'".$row['product_ID']."'";
                $p_vendor = "'".$row['vendor_ID_fk']."'";
                $p_type = "'".$row['product_type']."'";
                $p_name = "'".$row['product_name']."'";
                $p_description = "'".$row['product_description']."'";
                $p_make = "'".$row['make']."'";
                $p_model = "'".$row['model']."'";
                $p_qty_unit = "'".$row['qty_unit']."'";
                $p_qty_in_stock = "'".$row['qty_in_stock']."'";
                $p_is_promotional = "'".$row['is_promotional']."'";
                $p_reg_price = "'".$row['reg_price']."'";
                $p_discounted_price = "'".$row['discounted_price']."'";
                $p_num_rented = "'".$row['num_rented']."'";
                $p_num_broken = "'".$row['num_broken']."'";

                //Pass in the p_ variables to button. This way the variables can be accessed in JS
                printf('<td><button type="button" onclick="editPane(%s,%s, %s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)">Edit</button>',$p_id,$p_vendor,$p_name,$p_type,$p_description, $p_make, $p_model, $p_qty_unit, $p_qty_in_stock, $p_is_promotional, $p_reg_price, $p_discounted_price, $p_num_rented, $p_num_broken);

                //Create form to handle removing item
                echo "<form name='remove' action='./includes/productRemove.inc.php' method='post'>";
                echo "<td><label for 'Delete button'><button type='submit' name='submit' value='submit'>Delete</button></label>";
                echo "<td><label for 'Cart button'><button type='button'>Cart</button></label>";
                echo "<td> <input type='hidden' name='PID' id='deleteID' value='{$row['product_ID']}'> </td>";
                echo "</form>";
                echo "</tr>";
            }
        }
    }
}