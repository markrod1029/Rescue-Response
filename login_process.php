<?php
	session_start();
	include 'includes/conn.php';
	if(isset($_POST['login'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
	
	
		$sql = "SELECT * FROM users WHERE user = '$user' AND status = 'Approved'";
		$query = $conn->query($sql);
	
		if ($query->num_rows >= 1) {
	
			$row = $query->fetch_assoc();
			if(password_verify($pass, $row['pass'])){
				$_SESSION['user_login'] = $row['id'];
					header('location:dashboard.php');
			}
			else{
				$_SESSION['error'] = 'Incorrect password';	
			}
		}
	else{
		$_SESSION['error'] = 'Email Not Found!';
	}
	}
	header('location: index.php');
	?>