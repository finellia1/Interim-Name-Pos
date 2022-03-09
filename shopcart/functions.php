<?php
//pdo style
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'hv_audio_visual';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}

function template_header($title) { // used to keep consistencty of header through page to page allows for links to be found easy No need to style yet
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
	</head>
	<body>
        <header>
                <h1>Interim POS</h1>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=products">Products</a>
                    <a href="index.php?page=cart"> cart </a>
                </nav>

        </header>
        <main>
EOT;
}
                        // used to keep consistencty of footer through page to page allows for links to be found easy No need to style yet
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
                <p>$year, Interim POS</p>
        </footer>
    </body>
</html>
EOT;
}
?>