<?php
//functions to remove user
class removeUser extends Dbh {

        //connects to db, prepares and executes $stmt, removes entry from db
    protected function removeUser($employee_ID) {

        session_start();
        $stmt = $this->connect()->prepare('DELETE FROM employee WHERE employee_ID = ?;');
        $found = false;
        $stmtEO = $this->connect();
        
        //CHECK EVENT PRODUCT LIST
        $getData = $stmtEO->query("select * from invoice");
        foreach($getData as $row){
            if($product_ID == "{$row['employee_ID_fk']}"){
                $found = true;
            }else{
                $_SESSION["debug"] = "GOOD!";
            }
        }       
        $getData = $stmtEO->query("select * from packing_list");
        foreach($getData as $row){
            if($product_ID == "{$row['employee_ID_fk']}"){
                $found = true;
            }else{
                $_SESSION["debug"] = "GOOD!";
            }
        }       
        if($found == false){
            if(!$stmt->execute(array($employee_ID))) {
                $stmt = null;
                header('location: ../homepage.php?error=stmtfailed');
                exit();
            }
        } else{
            $stmt = $this->connect()->prepare('update employee set is_inactive=1 where employee_ID =?;');
            if(!$stmt->execute(array($employee_ID))) {
                $stmt = null;
                header('location: ../homepage.php?error=stmtfailed');
                exit();
            }
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../homepage.php?error=Productnotfound");
            exit();
        }
        $stmt = null;


        /*
        $stmt = $this->connect()->prepare('DELETE FROM employee WHERE employee_ID = ?;');

        if(!$stmt->execute(array($employee_ID))) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $stmt = null;
        */
    }
}