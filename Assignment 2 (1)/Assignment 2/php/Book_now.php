<?php

print_r($_POST);

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$date = $_POST['date'];
	$address = $_POST['address'];
	$pkg_type = $_POST['pkg_type'];
	
	//connection
	
	$conn = new mysqli('localhost','root','','hotel_reserwation_system');
	if($conn->connect_error){
		die('Connection Failed :'.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into reservation(firstname,lastname,email,phone,date,address,pkg_type)values(?,?,?,?,?,?,?)");
		$stmt->bind_param($stmt, "sssiiss",$firstname,$lastname,$email,$phone,$date,$address,$pkg_type);
		$execval = $stmt->execute();
		echo $execval;
		echo "Submitted...";
		$stmt->close();
		$conn->close();
	}
	
	

?>
