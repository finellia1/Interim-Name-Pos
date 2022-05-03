<?php
//functions to remove user
class employeeRemove extends Dbh {

        //connects to db, prepares and executes $stmt, removes entry from db
    protected function removeUser($product_ID) {
        $stmt = $this->connect()->prepare('DELETE FROM employee WHERE employee_ID = ?;');

        if(!$stmt->execute(array($product_ID))) {
            $stmt = null;
            header('location: ../employees.php?error=stmtfailed');
            exit();
        }


        $stmt = null;
    }
}