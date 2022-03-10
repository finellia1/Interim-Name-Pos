<?php
//functions to remove user
class removeUser extends Dbh {

        //connects to db, prepares and executes $stmt, removes entry from db
    protected function removeUser($employee_ID) {
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
    }
}