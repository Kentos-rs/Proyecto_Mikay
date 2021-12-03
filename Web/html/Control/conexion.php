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
?>