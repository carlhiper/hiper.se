

<?php 

$q = $_REQUEST["q"];
$xml = simplexml_load_string($q);

class news{
	public $dat = "";
	public $text = "";
}

$amount = $xml->amount;
//If located on hiper.se file should be connectHiper.php. If home, connectHome.php
require('connectdb.php');

//If the form is submitted or not.
//Assigning posted values to variables.
$query = "SELECT * FROM news_en ORDER BY id DESC LIMIT $amount";
$result = $conn->query($query);	
$i=0;

//Insert into database
if ($result->num_rows > 0){
		// output data of a row
	while($row = $result->fetch_assoc()){	
		$news[$i]->dat = $row["date"];
		$news[$i]->text = $row["news"];
		$i = $i + 1;
	}
	echo json_encode($news);	
}
else{
	echo "No news!";
}

?>
