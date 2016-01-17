
<?php


//Server variables
$servername = "localhost";
$username = "root";
$password = "dog8face";
$dbname = "Hiper";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
