<?php
$host = "localhost";
$user = "root";  // your db username
$pass = "";      // your db password
$dbname = "food_ordering";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
