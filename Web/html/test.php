<?php
$servername = "localhost";
$username = "proyecto1";
$password = "proyecto1@mikaysushi";
$dbname = "proyecto1_mikay";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "CALL CREAR_PRODUCTO(1,11,'SEXO',3000,30)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
