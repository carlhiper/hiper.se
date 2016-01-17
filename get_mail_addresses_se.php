

<?php

//Get query operation
//header('Content-Type: application/json');
$q = $_REQUEST["q"];
$xml = simplexml_load_string($q);

// Connect to database

require('connectdb.php');

$sql = "SELECT * FROM Email WHERE language='se'";
$result = $conn->query($sql);
$i = 0;

if ($result->num_rows > 0) {
	// output data of a row
	while($row = $result->fetch_assoc()){	
		$email[$i] = $row["email"];
		$i = $i + 1;
	}
	echo json_encode($email);	
} else {
	echo "0 results";
}


$conn->close();
?>

