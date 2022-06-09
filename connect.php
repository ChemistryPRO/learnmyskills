<?php
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];

	// Database connection
	$conn = new mysqli('127.0.0.1','root','mad','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into login(firstName, lastname, email) values(?, ?, ?)");
		$stmt->bind_param("sss", $firstName, $lastname, $email);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration Done, Dear! :)";
		$stmt->close();
		$conn->close();
	}
?>