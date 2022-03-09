<?php

if(isset($_POST['submit'])){
		
	//Load connecter
	include_once('connect-mysql.php');

	//Setup query
	$query = "INSERT INTO inventory_item (name, s_num, model, cost, rental_cost)
			VALUES ('".$_POST['n']."', '".$_POST['t']."', '".$_POST['d']."', '".$_POST['p']."', '".$_POST['c']."')";


	if ($dbconn->query($query) === TRUE) {
		echo "New record created successfully";
	} 
	else {
		echo "Error: " . $query . "<br>" . $dbconn->error;
	}


	//Fetch the results
	//$result = mysqli_query($dbconn, $query)
	//	or die("Couldn't execute query.");


}

else{
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<label for="n">Name</label><br>
<input name="n" id="n" type="text"><br><br>
<label for="t">Serial Number</label><br>
<input name="t" id="t"  type="text"><br><br>
<label for="d">Model</label><br>
<input name="d" id="d" type="text"><br><br>
<label for="p">Cost</label><br>
<input name="p" id="p" type="text"><br><br>
<label for="c">Rental Cost</label><br>
<input name="c" id="c" type="text"><br><br>



	<br>
	<input type="submit" name="submit" value="Submit Form"><br>

</form>
<?php
}
?>