<?php
$servername = "localhost";
$username = "asfand";
$password = "UE4M9u$(ds4p_A7";
$connected = false;

try {
  $conn = new PDO("mysql:host=$servername;dbname=hv_audio_visual", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
  $connected= true;
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>