<!DOCTYPE html>
<html lang='en'>

<head>
    <title>Skip Navigation</title>
    <link rel="stylesheet" href=".\css\skipnav.css">
</head>

<body>
    <main>
        <h1>Skip Navigation</h1>
        <ul>
            <li>
                <a href="homepage.php">homepage</a>
            </li>
            <li>
                <a href="calendarPage.php">calendar</a>
            </li>
            <li>
                <?php
                    //Set the ADA flag to true so the skip nav will be generated
                    require_once ("classes\session.classes.php");
                    session::start();
                    session::set("ADA","true");
                ?>
                <a href="vendor.php">vendor</a>
            </li>
            <li>
                <?php
                    //Set the ADA flag to true so the skip nav will be generated
                    require_once ("classes\session.classes.php");
                    session::start();
                    session::set("ADA","true");
                ?>
                <a href="clients.php">clients</a>
            </li>
            <li>
                <?php
                    //Set the ADA flag to true so the skip nav will be generated
                    require_once ("classes\session.classes.php");
                    session::start();
                    session::set("ADA","true");
                ?>
                <a href="inventory.php">inventory</a>
            </li>
            <li>
                <?php
                    //Set the ADA flag to true so the skip nav will be generated
                    require_once ("classes\session.classes.php");
                    session::start();
                    session::set("ADA","true");
                ?>
                <a href="employees.php">employees</a>
            </li>
            <li>
                <a href="moneyPage.php">Money Page</a>
            </li>

        </ul>
    </main>

</body>