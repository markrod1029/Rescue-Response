<?php

include_once("session.php");

$id = $_GET['ID'];
if(isset($_POST['save'])){
 $fname = htmlspecialchars( $_POST['fname'], ENT_QUOTES, 'UTF-8');
        $lname = htmlspecialchars( $_POST['lname'], ENT_QUOTES, 'UTF-8');
		$location = $_POST['location']. 'San Carlos City' ;
     $contactnum = htmlspecialchars( $_POST['contactnum'], ENT_QUOTES, 'UTF-8');
  
    $user = $_POST['user'];
  
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
 

    $fileinfo=PATHINFO($_FILES["image"]["name"]);
    $newFilename=$fileinfo['filename'].$fileinfo['extension'];
    move_uploaded_file($_FILES["image"]["tmp_name"],'../img/' .$newFilename);
    $images = $newFilename;


    if(empty($images)){

        $sql = "UPDATE users SET fname = '$fname',  lname = '$lname', location = '$location', contactnum = '$contactnum', user = '$user', pass = '$pass'  WHERE id='$id'";

    }
    else{

        $sql = "UPDATE users SET fname = '$fname',  lname = '$lname', location = '$location', contactnum = '$contactnum', user = '$user', pass = '$pass' , photo = '$images' WHERE id='$id'";

    }
    $conn->query($sql) or die($conn->error);
    echo header("Location: ../profile.php");

}




if(isset($_POST['pass'])){

    $current_password = $_POST["old"];
    $new_password = $_POST["new"];
    $confirm_password = $_POST["confirm"];

    $sql = "SELECT * FROM users WHERE id = '" . $id . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_object($result);
     
    if (password_verify($current_password, $row->pass))
    {
        // Check if password is same
        if ($new_password == $confirm_password)
        {
            if($new_password == $current_password && $current_password ==  $confirm_password){
                $_SESSION['error'] = 'Password Already use in Current Password';
    
            }

            else{

                $sql = "UPDATE users SET pass = '" . password_hash($new_password, PASSWORD_DEFAULT) . "' WHERE id = '" . $id . "'";
                mysqli_query($conn, $sql);
 
                $_SESSION['success'] = 'Password has been changed';

            }

           
        }
        else
        {
            $_SESSION['error'] = 'New and Confirm Password does not match';
        }
    }

    
    else
    {
        $_SESSION['error'] = 'Current Password is not correct';

    }
    echo header("Location: ../security.php");

}


?>