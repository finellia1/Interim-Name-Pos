<?php

class LoginContr extends Login {
    private $employee_ID;
    private $pwd;

    public function __construct($employee_ID, $pwd)
    {
        $this->employee_ID = $employee_ID;
        $this->pwd = $pwd;
    }

    public function loginUser() {
        /*
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        */

        $this->getUser($this->employee_ID, $this->pwd);
    }

    /*
    private function emptyInput() {
        $result;
        if(empty($this->employee_ID) || empty($this->pwd)) {
            $result = false;
            if (empty($this->employee_ID)){
                $_SESSION["loginErrorFlag"] = 1;
                $_SESSION["loginErrorMsg"] = "Please Enter an Employee ID!";
            }
            else if(empty($this->pwd)){
                $_SESSION["loginErrorFlag"] = 1;
                $_SESSION["loginErrorMsg"] = "Please Enter a Password!";
            }
        } else {
            $result = true;
        }
        return $result;
    }
    */


}