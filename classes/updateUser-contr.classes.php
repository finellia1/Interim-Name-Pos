<?php
session_start();

if (isset($_SESSION["updateUserErrorFlag"])){
    $_SESSION["updateUserErrorFlag"] = 0;
}
if (isset($_SESSION["updateUserErrorMsg"])){
    $_SESSION["updateUserErrorMsg"] = "";
}


class UpdateUserContr extends UpdateUser {
    // create the properties inside the class
    private $employee_ID;
    private $pwd;
    private $email;
    private $first_name;
    private $last_name;
    private $phone_number;
    private $employee_type;
    
    // pass through the variables from the form
    public function __construct($employee_ID, $pwd, $email, $first_name, $last_name, $phone_number, $employee_type)
    {
        // reference this property in this class
        $this->employee_ID = $employee_ID;
        $this->pwd = $pwd;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->phone_number = $phone_number;
        $this->employee_type = $employee_type;
    }
    //updates user
    public function updateUser() {
        if(empty($this->employee_ID)) {
            $_SESSION["updateUserErrorFlag"] = 1;
            $_SESSION["updateUserErrorMsg"] = "Empty User!";
            header("location: ../index.php?error=emptyUSER");
            exit();
        } else if(empty($this->pwd)) {
            $_SESSION["updateUserErrorFlag"] = 1;
            $_SESSION["updateUserErrorMsg"] = "Empty Password!";
            header("location: ../index.php?error=emptyPassword");
            exit();
        } else if(empty($this->email)) {
            $_SESSION["updateUserErrorFlag"] = 1;
            $_SESSION["updateUserErrorMsg"] = "Empty Email!";
            header("location: ../index.php?error=emptyEmail");
            exit();
        } else if(empty($this->first_name)) {
            $_SESSION["updateUserErrorFlag"] = 1;
            $_SESSION["updateUserErrorMsg"] = "Empty First Name!";
            header("location: ../index.php?error=emptyFirstName");
            exit();
        } else if(empty($this->last_name)) {
            $_SESSION["updateUserErrorFlag"] = 1;
            $_SESSION["updateUserErrorMsg"] = "Empty Last Name!";
            header("location: ../index.php?error=emptyLastName");
            exit();
        } else if(empty($this->phone_number)) {
            $_SESSION["updateUserErrorFlag"] = 1;
            $_SESSION["updateUserErrorMsg"] = "Empty Phone Number!";
            header("location: ../index.php?error=emptyPhoneNumber");
            exit();
        } else if(empty($this->employee_type)) {
            $_SESSION["updateUserErrorFlag"] = 1;
            $_SESSION["updateUserErrorMsg"] = "Empty Employee Type!";
            header("location: ../index.php?error=emptyEmployeeType");
            exit();
        } 



        //sets user
        $this->setUser($this->employee_ID, $this->pwd, $this->email, $this->first_name, $this->last_name, $this->phone_number, $this->employee_type);
    }   
}