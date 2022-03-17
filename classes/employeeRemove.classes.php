<?php
//functions to remove user
class employeeRemove extends Dbh {

        //connects to db, prepares and executes $stmt, removes entry from db
    protected function removeUser($email) {
        $stmt = $this->connect()->prepare('DELETE FROM employee WHERE email = ?;');

        if(!$stmt->execute(array($email))) {
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