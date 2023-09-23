<?php
include_once("connections/session.php");



$id = $_GET['ID'];

$sql = "SELECT * FROM sub_admin WHERE id = '$id'";
$admin = $conn->query($sql) or die($conn->error);
$row = $admin->fetch_assoc();

if(isset($_POST['submit'])){

    
    $name = htmlspecialchars( $_POST['name'], ENT_QUOTES, 'UTF-8');
    $position = htmlspecialchars( $_POST['position'], ENT_QUOTES, 'UTF-8');
    $contact = htmlspecialchars( $_POST['contact'], ENT_QUOTES, 'UTF-8');
    $username = htmlspecialchars( $_POST['username'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars( password_hash($_POST['password'], PASSWORD_DEFAULT), ENT_QUOTES, 'UTF-8');



    $sql = "UPDATE sub_admin SET name = '$name', position = '$position', contact = '$contact', username = '$username', password = '$password' WHERE id='$id'";

    $conn->query($sql) or die($conn->error);

    echo header("Location: sub_admin.php");
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
  <button class="back"><a href="sub_admin.php" class="text-white">Back</a></button>
    <div class="title">Update Sub-Admin Details</div>
    <div class="content">
      <form action="" method="post">
        <div class="user-details">
        <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="name" id="name" value="<?php echo $row['name'];?>">
          </div>
          <div class="input-box">
            <span class="details">Position</span>
            <input type="text" name="position" id="position" value="<?php echo $row['position'];?>">
          </div>
          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" name="contact" id="contact" value="<?php echo $row['contact'];?>">
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" id="username" value="<?php echo $row['username'];?>">
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" name="password" id="password" value="<?php echo $row['password'];?>">
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
