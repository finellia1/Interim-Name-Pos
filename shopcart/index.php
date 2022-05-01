<?php
<<<<<<< HEAD
session_start();
=======
    session_start();
>>>>>>> 0092fa73903870bf672aeb2bb53b762717526e32
// Include functions and connect to the database using PDO MySQL
    include 'functions.php';
    $pdo = pdo_connect_mysql();
    // Page is set to cart (CART.php) by default, so when the visitor visits that will be the page they see.
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'cart';
    // Include and show the requested page
    include $page . '.php';
?>
<!-- This is our index page which our hompage has an I frame -->