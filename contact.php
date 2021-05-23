<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	// Database connection
	$conn = new mysqli('localhost','root','','travelgeek');
    if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phone)){
    	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	    } 
        else {
		$stmt = $conn->prepare("insert into contact(firstname, lastname, email, phone) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $firstname, $lastname, $email, $phone);
		$execval = $stmt->execute();
		echo "TravelGeek employee will get in touch with you soon.";
		$stmt->close();
		$conn->close();
	    }
    }
    else{
        echo "Enter correct information. Your fields are NULL.";
    }

?>