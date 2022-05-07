<?php
//functions to remove user
class employeeRemove extends Dbh {

        //connects to db, prepares and executes $stmt, removes entry from db
    protected function removeUser($product_ID) {
        $stmt = $this->connect()->prepare('DELETE FROM employee WHERE employee_ID = ?;');
        $found = false;
        $stmtEO = $this->connect();
        
        //CHECK PACKING LIST
        $getData = $stmtEO->query("select * from packing_list");
        foreach($getData as $row){
            if($product_ID == "{$row['employee_ID_fk']}"){
                $found = true;
            }else{
                $_SESSION["debug"] = "GOOD!";
            }
        }       
        //If employee not found, delete from DB
        if($found == false){
            if(!$stmt->execute(array($product_ID))) {
                $stmt = null;
                header('location: ../homepage.php?error=stmtfailed');
                exit();
            }
        } else{
            //If employee is found, set it as inactive so it will be not be shown in UI
            $stmt = $this->connect()->prepare('update employee set is_inactive=1 where employee_ID =?;');
            if(!$stmt->execute(array($product_ID))) {
                $stmt = null;
                header('location: ../homepage.php?error=stmtfailed');
                exit();
            }
            $_SESSION["debug"] = "Located in event product list!";
        }


        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../homepage.php?error=Productnotfound");
            exit();
        }
        $stmt = null;
    }
}