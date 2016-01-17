
<?php


//Server variables
$servername = "localhost";
$username = "thrsbcfn_admin";
$password = "hiperistheshit9";
$dbname = "thrsbcfn_HiperMailList";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
