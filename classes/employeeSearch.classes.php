<?php

class employeeSearch extends Dbh {

    protected function getEmployees($searchType, $searchContent) {
        //https://stackoverflow.com/questions/28717868/sql-server-select-where-any-column-contains-x
        
        $stmt = $this->connect();

        //If there is no sessions set, default to selecting every item
        if(!isset($_SESSION["searchTypeInput_employee"])){
            $_SESSION["searchTypeInput_employee"] = "select * from employee";
        }

        //echo $_SESSION["searchTypeInput_employee"];

        //Set data to results of search query ran.
        //Search query is session variable set in search popup
        //echo $_SESSION["searchTypeInput"];
        $getData = $stmt->query($_SESSION["searchTypeInput_employee"]);
        foreach($getData as $row){
            if($row['is_inactive'] == 0){
                //Echo out table information with row infomration from DB 
                echo "<tr  class = 'inventoryItem'>"; 


                //Append single quotes to either side the data
                //This is done to be able to pass a string to a js onclick()
                $p_id = "'".$row['employee_ID']."'";
                $p_security_type = "'".$row['security_type']."'";
                $p_pwd= "'".$row['pwd']."'";
                $p_job_title = "'".$row['job_title']."'";
                $p_first_name = "'".$row['first_name']."'";
                $p_last_name = "'".$row['last_name']."'";
                $p_email = "'".$row['email']."'";
                $p_hourly_salary = "'".$row['hourly_salary']."'";
                $p_yearly_salary = "'".$row['yearly_salary']."'";

                //Pass in the p_ variables to button. This way the variables can be accessed in JS
                printf('<td><button type="button" onclick="editPane_employee(%s,%s, %s,%s,%s,%s,%s,%s,%s)">Edit</button>',$p_id,$p_security_type,$p_pwd,$p_job_title,$p_first_name, $p_last_name, $p_email, $p_hourly_salary,$p_yearly_salary);

                //Create form to handle removing item
                echo "<form name='remove' action='./includes/employeeRemove.inc.php' method='post'>";
                echo "<td><label for 'Delete button'><button type='submit' name='submit' value='submit'>Delete</button></label>";
                //echo "<td><label for 'Cart button'><button type='button'>Cart</button></label>";
                echo "<input type='hidden' name='PID' id='deleteID' value='{$row['employee_ID']}'>";
                echo "</form>";
                

                echo "<td> {$row['employee_ID']} </td>";
                echo "<td> {$row['security_type']} </td>";
                //echo "<td> {$row['pwd']} </td>";
                echo "<td> {$row['job_title']} </td>";
                echo "<td> {$row['first_name']} </td>";
                echo "<td> {$row['last_name']} </td>";
                echo "<td> {$row['email']} </td>";
                echo "<td> {$row['hourly_salary']} </td>";
                echo "<td> {$row['yearly_salary']} </td>";

                echo "</tr>";
            }
        }
    }
}