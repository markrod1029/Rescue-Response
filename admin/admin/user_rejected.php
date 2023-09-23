<?php
include_once("connections/session.php");


$id = $_GET['ID'];
    $query = "SELECT * from users where id = '$id'";



	$status	= "Archive";


        
        $sql = "UPDATE users SET  status = '$status' WHERE id = '$id'";

    
		if($conn->query($sql)){
			$_SESSION['success'] = 'User Archive Successfully';

            $query = mysqli_query($conn,$sql);
		}
        
		else{
			$_SESSION['error'] = $conn->error;
		}


        header('location: user_archive.php');
