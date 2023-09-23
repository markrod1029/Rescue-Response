<?php

include_once("includes/conn.php");


$id = $_GET['ID'];
if(isset($_POST['save'])){

 $fname = htmlspecialchars( $_POST['fname'], ENT_QUOTES, 'UTF-8');
        $lname = htmlspecialchars( $_POST['lname'], ENT_QUOTES, 'UTF-8');
		$location = $_POST['location']. 'San Carlos City' ;
     $contactnum = htmlspecialchars( $_POST['contactnum'], ENT_QUOTES, 'UTF-8');
  
    $user = $_POST['user'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);


    $fileinfo=PATHINFO($_FILES["image"]["name"]);
    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
    move_uploaded_file($_FILES["image"]["tmp_name"],'img/' .$newFilename);
    $images = $newFilename;


    $sql = "UPDATE users SET fname = '$fname',  lname = '$lname', location = '$location', contactnum = '$contactnum', user = '$user', pass = '$pass' , photo = '$images' WHERE id='$id'";

    $conn->query($sql) or die($conn->error);

}

echo header("Location: profile.php");

?>