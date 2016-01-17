

<?php 
//If located on hiper.se file should be connectHiper.php. If home, connectHome.php
require('connectdb.php');

//If the form is submitted or not.
if (isset($_POST['email'])){
	//Assigning posted values to variables.
	$email = $_POST['email'];	
	$query = "SELECT * FROM Email WHERE email='$email'";
	$result = $conn->query($query);	
	//Insert into database
	if ($result->num_rows > 0){
		echo "Already registered";
	}
	else{
		$query = "INSERT INTO Email(email,language) VALUES ('$email','se')";
		if ($conn->query($query) === TRUE) {
			echo "Your email has been registered!";
		} else {
			echo "Error: " . $query . "<br>" . $conn->error;
		}
	}
}

?>
