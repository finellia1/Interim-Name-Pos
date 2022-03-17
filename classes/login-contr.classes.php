<?php

class LoginContr extends Login {
    // create the properties inside the class
    private $email;
    private $pwd;

    // pass through the variables from the form
    public function __construct($email, $pwd)
    {
        // reference this property in this class
        $this->email = $email;
        $this->pwd = $pwd;
    }
    //logs in
    public function loginUser() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }
        //gets user
        $this->getUser($this->email, $this->pwd);
    }
    //bool
    private function emptyInput() {
        $result;
        if(empty($this->email) || empty($this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}