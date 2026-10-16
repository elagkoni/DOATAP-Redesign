<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = 'sdi1800073';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

mysqli_set_charset($conn, "utf8");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
