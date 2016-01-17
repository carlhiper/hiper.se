<?php
 
if(isset($_POST['email'])){
    $to = "hello@hiper.se"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
	$comments = $_POST['comments'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $name . " \n\n" . $phone_number . " \n\n" . $from . "\n\n" . $comments;
	$message2 = "Here is a copy of your message " . $name . "\n\n" . $comments;
    $headers = "From:" . $from;
	mail($to,$subject,$message,$headers);
//	mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
   }
?>