<?php

class removeUserContr extends removeUser {
    // create the properties inside the class
    private $employee_ID;

    // pass through the variables from the form
    public function __construct($employee_ID)
    {
        // reference this property in this class
        $this->employee_ID = $employee_ID;
    }

    public function checkUser() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        $this->removeUser($this->employee_ID);
    }

    // error handling using methods

    // check if any of the fields are empty
    private function emptyInput() {
        $result;

        if(empty($this->employee_ID)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // check that the username is valid
    private function invalidemployee_ID() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->employee_ID)){
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

}