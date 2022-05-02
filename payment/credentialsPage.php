<?php

include('../invoice/db_connect.php');
// id= 7Ucr2AUj5k
// key = 69Qcf7E4Q4PQc76m 
// for testing purposes.

$stmt = $conn ->query('SELECT * FROM authorize_credentials');
$creds = $stmt -> fetchALL(PDO::FETCH_COLUMN);

if($creds != null){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lol</title>
</head>
<body>
<form method="POST" action="subEncData.php" > 
    <label>Transaction Key:</label> <input name="key" type="text"/><br>
    <label>Re-Enter Key: </label> <input name="keyconfirm" type="text"/><br>
    <label>Transaction ID:</label> <input name="id" type="text"/> <br>
    <label>Re-Enter ID: </label> <input name="idconfirm" type="text"/><br>
    <input type="submit" name="submit" value="Insert" /> <br>
</form> 
</body>
</html>