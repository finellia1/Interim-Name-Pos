<?php
//functions for login
class Login extends Dbh {

    //connects to db, prepares and executes $stmt, compares pwd to pwdHashed, logs in
    protected function getUser($email, $pwd) {
        $stmt = $this->connect()->prepare('SELECT pwd FROM employee WHERE email = ?;');

        if(!$stmt->execute(array($email))) {
            $stmt = null;                
            require_once("session.classes.php");
            session::start();
            session::set("loginErrorMessage", "ERROR: PLEASE CONTACT IT classes\login.classes.php line 13");
            header('Location: ../login.php?loginFailed');

            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            require_once("session.classes.php");
            session::start();
            session::set("loginErrorMessage", "Username or password is incorrect, please try again");
            header('Location: ../login.php?loginFailed');            
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]["pwd"]); // returns a true or False value
        //checks if pwd and pwdHashed match
        if($checkPwd == true) { //IF STATEMENT FLIPPED TO ALLOW LOGIN WTIHOUT VERIFIYING: FLIP TRUE AND FALSE CONDITIONS TO SHOW CORRECT LOGIN ONCE YOU HAVE CREATED A USER
            $stmt = null;                
            require_once("session.classes.php");
            session::start();
            session::set("loginErrorMessage", "Username or password is incorrect, please try again");
            header('Location: ../login.php?loginFailed');
            exit();
        } elseif($checkPwd == false) {
            $stmt = $this->connect()->prepare('SELECT * FROM employee WHERE email = ? and pwd = ?;');
            //checks db for matching login info
            if(!$stmt->execute(array($email, $pwdHashed[0]["pwd"]))) {
                $stmt = null;
                require_once("session.classes.php");
                session::start();
                session::set("loginErrorMessage", "ERROR: PLEASE CONTACT IT classes\login.classes.php line 46");
                header('Location: ../login.php?loginFailed');
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
            require_once("session.classes.php");
            session::start();
            session::set("loginErrorMessage", "ERROR: PLEASE CONTACT IT classes\login.classes.php line 55");
            header('Location: ../login.php?loginFailed');
                exit();
            }

            //Sets session variable for user 
            include_once("../classes/session.classes.php");
            session::start();

            //Query to get security role of ID
            //Used https://www.php.net/manual/en/pdo.prepare.php for assistance
            $sth = $this->connect()->prepare('SELECT security_type from employee where email = ?');
            //Connect comes from dbh.classes.php
            //Chris wrote this class
            $sth->execute(array($email));
            session::set("securityType", $sth->fetch()[0]);
            session::set("pass", $pwd);
            session::set("passEncrypted", $pwdHashed[0]["pwd"]);

        }
        //starts session
        //session::start();
        $stmt = null;
    }
}