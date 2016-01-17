
<?php  //Start the Session

session_start();
require('connectHome.php');

//If the form is submitted or not.
if (isset($_POST['email']) and isset($_POST['password'])){
	//Assigning posted values to variables.
	$username = $_POST['email'];
	$password = $_POST['password'];
	
	//Checking the values are existing in the database or not
	$query = "SELECT * FROM Backoffice_login WHERE email='$username' and password='$password'";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();

	//If the posted values are equal to the database values, then session will be created for the user.
	if ($result->num_rows){
		$_SESSION['username'] = $username;
		
		// increment number_logins in db
//		$query = "UPDATE Profiles SET number_logins = number_logins + 1 WHERE email='$username'";
//		$result = $conn->query($query);
	/*	if  ($result == FALSE){
			echo "incrementation not successful"
		}*/
		header("Location:backoffice.php");
	}else{
		//If the login credentials doesn't match, he will be shown with an error message.
		echo "Invalid Login Credentials.";
	}

}

?>
