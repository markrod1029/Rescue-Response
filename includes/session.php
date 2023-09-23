<?php
	include 'includes/conn.php';
	session_start();

	if(isset($_SESSION['user_login'])){
		$sql = "SELECT * FROM users WHERE id = '".$_SESSION['user_login']."'";
		$query = $conn->query($sql);
		$user = $query->fetch_assoc();
	}
	else{
		header('location: index.php');
		exit();
	}

?>