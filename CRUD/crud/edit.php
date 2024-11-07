<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$sql = "UPDATE members SET firstname = '$firstname', lastname = '$lastname', address = '$address', phone = '$phone' WHERE id = '$id'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Contact updated successfully';
		}
		///////////////

		//use for MySQLi Procedural
		// if(mysqli_query($conn, $sql)){
		// 	$_SESSION['success'] = 'Contact updated successfully';
		// }
		///////////////
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating this contact';
		}
	}
	else{
		$_SESSION['error'] = 'Select contact to edit first';
	}

	header('location: index.php');

?>