<?php
	session_start();
	include 'includes/conn.php';
	if(isset($_POST['register'])){
        
		
$fname = htmlspecialchars( $_POST['fname'], ENT_QUOTES, 'UTF-8');

        $fname = htmlspecialchars( $_POST['fname'], ENT_QUOTES, 'UTF-8');
        $lname = htmlspecialchars( $_POST['lname'], ENT_QUOTES, 'UTF-8');
		$loc = $_POST['location']. ', San Carlos City' ;
        $location = htmlspecialchars( $loc, ENT_QUOTES, 'UTF-8');

        $contactnum = htmlspecialchars( $_POST['contactnum'], ENT_QUOTES, 'UTF-8');

        $user = htmlspecialchars( $_POST['user'], ENT_QUOTES, 'UTF-8');

        $pass = htmlspecialchars(  password_hash($_POST['pass'], PASSWORD_DEFAULT), ENT_QUOTES, 'UTF-8');


        $fileinfo=PATHINFO($_FILES["valid"]["name"]);
        $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
        move_uploaded_file($_FILES["valid"]["tmp_name"],'img/' .$newFilename);
        $valid = $newFilename;
    
		$sql = "SELECT * FROM users WHERE user = '$user' ";
        $query = $conn->query($sql);
		$result = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($result);

		if ($count == 1 ) {

		$_SESSION['error'] = 'Email is already exist!';
	header('location: register.php');
	
		}
        
	else{

        $sql = "INSERT INTO `users`(`valid_id`, `fname`, `lname`, `location`, `contactnum`, `user`, `pass`, `status` ) VALUES ('$valid', '$fname','$lname','$location','$contactnum','$user','$pass','Pending')";
        if($conn->query($sql)){
			$_SESSION['success'] = 'Wait to accept the request';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

        header('location: index.php');


	}


	}
	?>