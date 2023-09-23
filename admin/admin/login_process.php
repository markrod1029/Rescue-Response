<?php
	session_start();
	include 'connections/connection.php';
	if(isset($_POST['login'])){
		$user = $_POST['username'];
		$pass = $_POST['password'];
	
	
		$sql = "SELECT * FROM admins WHERE username = '$user' ";
		$query = $conn->query($sql);
	
		if ($query->num_rows >= 1) {
	
			$row = $query->fetch_assoc();
			if(password_verify($pass, $row['password'])){
				$_SESSION['admin'] = $row['id'];
					header('location:dashboard.php');
	
	
	
			}
	
			else{
				$_SESSION['error'] = 'Incorrect password';
				
			}
	
	
		} 
	
	
	else{
		$_SESSION['error'] = 'Cannot find account with the email';
	
	
	}

	
	}
			
	
	header('location: index.php');
	
	?>