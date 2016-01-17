

<?php 
//If located on hiper.se file should be connectHiper.php. If home, connectHome.php
require('connectdb.php');

//If the form is submitted or not.
if (isset($_POST['submit_news_se'])){
	if (isset($_POST['news_se']) and isset($_POST['date_se'])){
		//Assigning posted values to variables.
		$news_se = $_POST['news_se'];	
		$date_se = $_POST['date_se'];	

		$query = "INSERT INTO news_se(date, news) VALUES ('$date_se','$news_se')";
		if ($conn->query($query) === TRUE) {
			echo "Done!";
			header('Location: backoffice.php');
		} else {
			echo "Error: " . $query . "<br>" . $conn->error;
		}
	}
}
if (isset($_POST['submit_news_en'])){
	if (isset($_POST['news_en']) and isset($_POST['date_en'])){
		//Assigning posted values to variables.
		$news_en = $_POST['news_en'];	
		$date_en = $_POST['date_en'];	

		$query = "INSERT INTO news_en(date, news) VALUES ('$date_en','$news_en')";
		if ($conn->query($query) === TRUE) {
			echo "Done!";
			header('Location: backoffice.php');
		} else {
			echo "Error: " . $query . "<br>" . $conn->error;
		}
	}
}

?>
