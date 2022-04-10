<?php
//functions for login
class Login extends Dbh {

    //connects to db, prepares and executes $stmt, compares pwd to pwdHashed, logs in
    protected function getUser($email, $pwd) {
        $stmt = $this->connect()->prepare('SELECT pwd FROM employee WHERE email = ?;');

        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header('location: ../index.php?error=stmtfailed3');
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound1");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["pwd"]); // returns a true or False value
        //checks if pwd and pwdHashed match
        if($checkPwd == False) {
            $stmt = null;
            require_once("../classes/session.classes.php");
            session::start();
            session::set("errorMessage", "You have entered an incorrect password");
            header("location: ../index.php?error=wrongpassword");
            exit();
        } elseif($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM employee WHERE email = ? and pwd = ?;');
            //checks db for matching login info
            if(!$stmt->execute(array($email, $pwdHashed[0]["pwd"]))) {
                $stmt = null;
                header("location: ../login.php?error=stmtfailed4");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                require_once("../classes/session.classes.php");
                session::start();
                session::set("errorMessage", "User Not Found");
                header("location: ../login.php?error=usernotfound");
                exit();
            }

        }
        //starts session
        session::start();
        $stmt = null;
    }
}