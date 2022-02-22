<?php

// require './classes/session.classes.php';
// require '../classes/session.classes.php';
// require '/classes/session.classes.php';
// session::destroy();

session_start();
session_unset();
session_destroy();

header("location: ../index.php?error=LOGGED OUT");