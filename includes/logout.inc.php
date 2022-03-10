<?php

require "../classes/session.classes.php";
session::display(); //test

//destroys session
if(isset($_POST["submit"])) 
{
    session::destroy();
    header("location: ../index.php?error=LOGGED OUT");
}