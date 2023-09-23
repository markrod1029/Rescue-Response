<?php

include_once("connections/session.php");


if(isset($_POST['submit'])){


    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $location = $_POST['location'];
    $contactnum = $_POST['contactnum'];
    $user = $_POST['user'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $fileinfo=PATHINFO($_FILES["image"]["name"]);
    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
    move_uploaded_file($_FILES["image"]["tmp_name"],'../../img/' .$newFilename);
    $images = $newFilename;


    $sql = "INSERT INTO `users`(`fname`, `lname`, `location`, `contactnum`, `user`, `pass` , `photo`) VALUES ('$fname','$lname','$location','$contactnum','$user','$pass','$images')";

    $conn->query($sql) or die($conn->error);

    echo header("Location: user.php");
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
    <link rel="stylesheet" href="css/form.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
  <button class="back"><a href="user.php" class="text-white">Back</a></button>
    <div class="title">Add User</div>
    <div class="content">
      <form action="" method="post"  enctype="multipart/form-data">
        <div class="user-details">
        <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="fname" id="fname" placeholder="First Name" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="lname" id="lname" placeholder="Last Name" required>
          </div>
          <div class="input-box">
            <span class="details">Location</span>
            <input type="text" name="location" id="location" placeholder="Location" required>
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" name="contactnum" id="contactnum" placeholder="Contact Number" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="user" id="user" placeholder="Username" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" name="pass" id="pass" placeholder="Password" required>
          </div>
          <div class="input-box">
            <span class="details">Upload Images</span>
            <input type="file"  name="image"  >
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Add">
          
        </div>
      </form>
    </div>
  </div>

</body>
</html>
