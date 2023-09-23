<?php
	session_start();
	include 'connections/connection.php';

	if(isset($_POST['login'])){
		$user = $_POST['username'];
		$password = $_POST['password'];


        $sql = "SELECT * FROM admins WHERE username = '$user'";
		$query = $conn->query($sql);

        $sql1 = "SELECT * FROM sub_admin WHERE username = '$user'";
		$query1 = $conn->query($sql1);

        if ($query->num_rows >= 1) {

            $row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['admin'] = $row['id'];
			}

			else{
				$_SESSION['error'] = 'Incorrect password';
			}

    
        } 



        else if ($query1->num_rows >= 1) {

            $row1 = $query1->fetch_assoc();
			if(password_verify($password, $row1['password'])){
				$_SESSION['staff'] = $row1['id'];
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