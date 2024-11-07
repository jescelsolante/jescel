<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$sql = "INSERT INTO members (firstname, lastname, address, phone) VALUES ('$firstname', '$lastname', '$address', '$phone')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'New Contact added successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'New Contact added successfully';
		// }
		//////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: index.php');
?>