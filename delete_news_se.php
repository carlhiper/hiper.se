

<?php 
//If located on hiper.se file should be connectHiper.php. If home, connectHome.php
	require('connectdb.php');

//If the form is submitted or not.
	$query = "DELETE FROM news_se ORDER BY id DESC LIMIT 1";
	if ($conn->query($query) === TRUE) {
		echo "Deleted!";
		header('Location: backoffice.php');
	} else {
		echo "Error: " . $query . "<br>" . $conn->error;
	}
?>
