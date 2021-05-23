<?php
	$location = $_POST['location'];
	$guests = $_POST['guests'];
	$arrival = $_POST['arrival'];
	$departure = $_POST['departure'];
	$mobile = $_POST['mobile'];
	// Database connection
	$conn = new mysqli('localhost','root','','travelgeek');
    if(!empty($location) && !empty($guests) && !empty($arrival) && !empty($departure) && !empty($mobile)){
    	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	    } 
        else {
		$stmt = $conn->prepare("insert into plan(location, guests, arrival, departure, mobile) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sissi", $location, $guests, $arrival, $departure, $mobile);
		$execval = $stmt->execute();
		echo "We will get back with best suitable itinerary.";
		$stmt->close();
		$conn->close();
	    }
    }
    else{
        echo "Enter correct information. Your fields are NULL.";
    }

?>