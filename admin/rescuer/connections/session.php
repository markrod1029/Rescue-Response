<?php
	include 'connection.php';
	session_start();

	if(isset($_SESSION['staff'])){
		$sql = "SELECT * FROM sub_admin WHERE id = '".$_SESSION['staff']."'";
		$query = $conn->query($sql);
		$user = $query->fetch_assoc();
	}
	else{
		header('location: ../index.php');
		exit();
	}

?>