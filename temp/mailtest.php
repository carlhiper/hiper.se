<?php
//mail('carl.windfeldt@gmail.com','Test mail','The mail function is working!');
    $to = "hello@hiper.se"; // this is your Email address
    $from = "carl.windfeldt@gmail.com"; // this is the sender's Email address
    $name = "Carl Windfeldt";
    $phone_number = "0701904988";
	$comments = "Good stuff";
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $name . " \n\n" .$phone_number. " \n\n" .$from . "\n\n" . $comments;
	$message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
	$headers2 = "From:" . $to;
 // mail($to,$subject,$message,$headers);
	mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.



echo 'Mail sent!';
?>