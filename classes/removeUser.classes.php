<?php

class removeUser extends Dbh {

    protected function removeUser($employee_ID) {
        $stmt = $this->connect()->prepare('DELETE FROM employee WHERE employee_ID = ?;');

        if(!$stmt->execute(array($employee_ID))) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailed');
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            $_SESSION["removeUserErrorMsg"] = "This employee ID was not found!";
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $stmt = null;
    }
}