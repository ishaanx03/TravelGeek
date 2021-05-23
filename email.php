<?php
	$mail = $_POST['mail'];
	// Database connection
	$conn = new mysqli('localhost','root','','travelgeek');
	if($conn->connect_error){
	echo "$conn->connect_error";
	die("Connection Failed : ". $conn->connect_error);
    } 
    else {
	$stmt = $conn->prepare("insert into email(mail) values(?)");
	$stmt->bind_param("s", $mail);
	$execval = $stmt->execute();
	echo "Thank you for subcribing TravelGeek. We will update you with our opcoming tour packages and discounts.";
	$stmt->close();
	$conn->close();
    }

?>