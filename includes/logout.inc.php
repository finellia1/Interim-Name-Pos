<?php

require "../classes/session.classes.php";
session::display(); //test

//destroys session
if($_POST['action'] == "Submit Form") 
{
    session::destroy();
    header("location: ../login.php");
}