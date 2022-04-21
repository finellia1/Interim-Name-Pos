<?php

include('../invoice/db_connect.php');
// id= 7Ucr2AUj5k
// key = 69Qcf7E4Q4PQc76m 

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
<form method="POST" action="editData.php" > 
    <label>New Transaction Key:</label> <input name="key" type="text"/><br>
    <label>Re-Enter New Key: </label> <input name="keyconfirm" type="text"/><br>
    <label>New Transaction ID:</label> <input name="id" type="text"/> <br>
    <label>Re-Enter New ID: </label> <input name="idconfirm" type="text"/><br>
    <input type="submit" name="submit" value="Insert" /> <br>
</form> 
</body>
</html>