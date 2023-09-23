<?php
	include 'connection.php';
	session_start();

	if(isset($_SESSION['admin'])){
		$sql = "SELECT * FROM admins WHERE id = '".$_SESSION['admin']."'";
		$query = $conn->query($sql);
		$user = $query->fetch_assoc();
	}
	else{
		header('location: index.php');
		exit();
	}

?>