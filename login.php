<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];


		// SELECT username, password 
    // FROM table_1 
    // WHERE username='$username' AND password='$password' 
    // UNION 
    // SELECT username, password 
    // FROM table_2 
    // WHERE username='$username' AND password='$password'";

		$sql = "SELECT * FROM admin WHERE email = '$email'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the username';
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
				$_SESSION['admin'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input admin credentials first';
	}

	header('location: index.php');

?>

<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];


        $sql = "SELECT * FROM admin WHERE email = '$email'";
		$query = $conn->query($sql);

        $sql1 = "SELECT * FROM teacher WHERE email = '$email'";
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
				$_SESSION['teacher'] = $row1['id'];
			}

			else{
				$_SESSION['error'] = 'Incorrect password';
			}

    
    }

    else{
        $_SESSION['error'] = 'Cannot find account with the username';


    }
}



	header('location: index.php');

?>



<?php

$sql = " SELECT * FROM admin WHERE username = '$usern' AND password = '$passw'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows === 1) {
    //Current user is in Admin table, hence he/she is an admin
    $_SESSION['admin'] = $usern;
    header("location: ../login_admin.php?log=".$_SESSION['admin']);
    exit(0);
} 

elseif ($result->num_rows > 1) {
      //there should not be more than one rows with same credentials. Two rows with same (username, password), Make username primary key.
      throw new Exception("Multiple entry with same username and password in admin table");
} 

else {
    //Given credentials are not in admin table, check user table.
    $sql1 = " SELECT * FROM users WHERE username = '$usern' AND password = '$passw'";
    $result1 = mysqli_query($conn, $sql1);
    if ($result->num_rows === 1) {
        $_SESSION['user'] = $usern;
        header("location: ../main.php?log=".$_SESSION['user']);
    } elseif ($result->num_rows > 1) {
        throw new Exception("Multiple entry with same username and password in user table");
    }
    else {
        //Nither in User nor in admin table
        header("location:  SpaceAdv/index.php");
    }


}

?>