<?php
    require 'header.php';
    //header hides code
?>

<main> 
    <?php //test
        session::display();
        if (session::get("loggedInID")) {
            echo '<p>You are logged in</p>';
        } else {
            echo '<p>You are logged out</p>';
        }
    ?>
</main>

<?php
    require 'footer.php';
    //footer closes tags 
?>