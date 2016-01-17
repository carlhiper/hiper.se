

<?php

//Company variables
class Company{
	public $id;
	public $name;
	public $info;
	public $reg_date;
}
//Profile variables
class Profile{
	public $id;
	public $company_id;
	public $firstname;
	public $lastname;
	public $title;
	public $email;
	public $password;
	public $reg_date;
	public $rating;
	public $score;
	public $number_logins;
}
//Goal variables
class Goal{
	public $id;
	public $profile_id;
	public $company_id;
	public $title;
	public $description;
	public $achieved;
	public $achieved_date;
	public $reg_date;
	public $likes;
}
//Comment variables 
class Comment{
	public $id;
	public $goal_id;
	public $comment;
	public $commenter_id;
}

//Get query operation
//header('Content-Type: application/json');
$q = $_REQUEST["q"];
$xml = simplexml_load_string($q);
//$xml = json_encode($q);

// Connect to database
require('connect.php');

switch($xml->command){

	case insert_company:
		$sql = "INSERT INTO Company(company_name, company_info, company_reg_date)
		VALUES ($company_name, $company_info, $company_reg_date)";
		if ($conn->query($sql) === TRUE) {
			echo "Operation successful";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		break;

	case get_company:
		$sql = "SELECT * FROM Companies WHERE id='". $xml->id ."'";
		$result = $conn->query($sql);
		if ($result!=FALSE) {
			// output data of a row
			$Company = new Company();
			$row = $result->fetch_assoc();	
			$Company->id = $row["id"];
			$Company->name = $row["company_name"];
			$Company->info = $row["company_info"];
			$Company->reg_date = $row["company_reg_date"];
			echo json_encode($Company);	
		} else {
			echo "0 results";
		}
		break;

	case get_profile:
		$sql = "SELECT * FROM Profiles WHERE id='". $xml->id ."'";
		$result = $conn->query($sql);
		if ($result!=FALSE) {
			// output data of a row
			$Profile = new Profile();
			$row = $result->fetch_assoc() ;	
			$Profile->id = $row["id"];
			$Profile->company_id = $row["company_id"];
			$Profile->firstname = $row["firstname"];
			$Profile->lastname = $row["lastname"];
			$Profile->title = $row["title"];
			$Profile->email = $row["email"];
			$Profile->password = $row["password"];
			$Profile->reg_date = $row["reg_date"];
			$Profile->rating = $row["rating"];
			$Profile->score = $row["score"];
			$Profile->number_logins = $row["number_logins"];
			echo json_encode($Profile);	
		} else {
			echo "0 results";
		}
		break;	
		
	case get_goal:
		$sql = "SELECT * FROM Goals WHERE id='". $xml->id ."'";
		$result = $conn->query($sql);
		// output data of each row
		if ($result!=FALSE) {
			// output data of a row
			$row = $result->fetch_assoc();	
			$Goal = new Goal();
			$Goal->id = $row["id"];
			$Goal->profile_id = $row["profile_id"];
			$Goal->title = $row["title"];
			$Goal->description = $row["description"];
			$Goal->achieved = $row["achieved"];
			$Goal->reg_date = $row["reg_date"];
			$Goal->achieved_date = $row["achieved_date"];
			$Goal->likes = $row["likes"];
			echo json_encode($Goal);	
		} else {
			echo "0 results";
		}
		break;

	// Input command, company_id. Return list of 20 latest goals from that company
	case get_latest_goals:
		$sql = "SELECT * FROM Goals WHERE company_id='". $xml->id ."'";
		$result = $conn->query($sql);
		$i = 0;
		if ($result->num_rows > 0) {
			$Goal = array();
			// output data of each row
			while(($row = $result->fetch_assoc()) && ($i < 20)) {
				$Goal[$i] = new Goal();
				$Goal[$i]->id = $row["id"];
				$Goal[$i]->profile_id = $row["profile_id"];
				$Goal[$i]->company_id = $row["company_id"];
				$Goal[$i]->title = $row["title"];
				$Goal[$i]->description = $row["description"];
				$Goal[$i]->achieved = $row["achieved"];
				$Goal[$i]->reg_date = $row["reg_date"];
				$Goal[$i]->achieved_date = $row["achieved_date"];
				$Goal[$i]->likes = $row["likes"];
				$i = $i + 1;
			}
			echo json_encode($Goal);	
		} else {
			echo "no luck - get_latest_goals:".$xml->id;
		}
		break;
		
	case get_company_list:
		$sql = "SELECT * FROM Companies";
		$result = $conn->query($sql);
		$i = 0;
		if ($result->num_rows > 0) {
			$Company = array();
			// output data of a row
			while($row = $result->fetch_assoc()){	
				$Company[$i] = new Company();
				$Company[$i]->id = $row["id"];
				$Company[$i]->name = $row["company_name"];
				$Company[$i]->info = $row["company_info"];
				$Company[$i]->reg_date = $row["company_reg_date"];
				$i = $i + 1;
			}
			echo json_encode($Company);	
		} else {
			echo "0 results";
		}
		break;
		
		
	case insert_goal:
		$sql = "INSERT INTO Goals(firstname, lastname, email)
		VALUES ('John', 'Doe', 'john@example.com')";
		break;

	case insert_profile:
		$sql = "INSERT INTO Profiles (firstname, lastname, email)
		VALUES ('Kristian', 'Sternros', 'kristian.sternros@kerdizo.se')";
		break;

	case change_profile:
		$sql = "UPDATE Profiles SET lastname='Doe' WHERE id=2";
		break;
		
	case delete_profile:
		$sql = "DELETE FROM Profiles WHERE id=3";
		break;

	default:
		echo " - no valid request";
		break;
}

$conn->close();
?>

