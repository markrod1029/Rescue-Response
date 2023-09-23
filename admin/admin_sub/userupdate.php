<?php

include_once("connections/session.php");


$id = $_GET['ID'];

$sql = "SELECT * FROM users WHERE id = '$id'";
$user = $conn->query($sql) or die($conn->error);
$row = $user->fetch_assoc();

if(isset($_POST['submit'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $location = $_POST['location'];
    $contactnum = $_POST['contactnum'];
    $user = $_POST['user'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);


    $sql = "UPDATE users SET fname = '$fname', lname = '$lname', location = '$location', contactnum = '$contactnum', user = '$user', pass = '$pass' WHERE id='$id'";

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
    <div class="title">Update User details</div>
    <div class="content">
      <form action="" method="post">
        <div class="user-details">
        <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="fname" id="fname" value="<?php echo $row['fname'];?>">
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name="lname" id="lname" value="<?php echo $row['lname'];?>">
          </div>
          <div class="input-box">
            <span class="details">Location</span>
            <input type="text" name="location" id="location" value="<?php echo $row['location'];?>">
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" name="contactnum" id="contactnum" value="<?php echo $row['contactnum'];?>">
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="user" id="user" value="<?php echo $row['user'];?>">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" name="pass" id="pass" value="<?php echo $row['pass'];?>">
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Update">
          
        </div>
      </form>
    </div>
  </div>

</body>
</html>
