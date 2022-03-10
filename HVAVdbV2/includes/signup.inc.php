<!-- THIS PAGE RUNS ON  hvav-modified-1.sql -->
<?php
// require "../classes/session.classes.php";
// session::start();
// if(session::isSet("loggedInID")) {
    //gets data from form, creates signup Object, passes to signupUser()
    if(isset($_POST["submit"])) 
    {
        // grab the data from form
        $employee_ID = $_POST["employee_ID"];
        $pwd = $_POST["pwd"];
        $confirmpwd = $_POST["confirmpwd"];
        $email = $_POST["email"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $phone_number = $_POST["phone_number"];
        $employee_type = $_POST["employee_type"];

        // instantiate classes
        include "../classes/dbh.classes.php";
        include "../classes/signup.classes.php";
        include "../classes/signup-contr.classes.php";
            //create object
        $signup = new SignupContr($employee_ID, $pwd, $confirmpwd, $email, $first_name, $last_name, $phone_number, $employee_type);
        // signing up user
        $signup-> signupUser();
        // going back to front page
        header("location: ../index.php?error=EMPLOYEE ADDED");
    }
// } else {
//     header("location: ../index.php?error=Not Logged In");
// }
