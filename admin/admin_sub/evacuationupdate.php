<?php

include_once("connections/session.php");


$id = $_GET['ID'];

$sql = "SELECT * FROM evacuations WHERE id = '$id'";
$evacuation = $conn->query($sql) or die($conn->error);
$row = $evacuation->fetch_assoc();

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $location = $_POST['location'];
    $point_person = $_POST['point_person'];
    $number = $_POST['number'];
    $status = $_POST['status'];

    $sql = "UPDATE evacuations SET name = '$name', location = '$location', point_person = '$point_person', number = '$number', status = '$status' WHERE id='$id'";

    $conn->query($sql) or die($conn->error);

    echo header("Location: evacuation.php");
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/form.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/scclogo.png" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
  <button class="back"><a href="evacuation.php">Back</a></button>
    <div class="title">Update Evacuation details</div>
    <div class="content">
      <form action="" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Evacuation Center</span>
            <input type="text" name="name" id="name" value="<?php echo $row['name'];?>">
          </div>
          <div class="input-box">
            <span class="details">Location</span>
            <input type="text" name="location" id="location" value="<?php echo $row['location'];?>">
          </div>
          <div class="input-box">
            <span class="details">Point Person</span>
            <input type="text" name="point_person" id="point_person" value="<?php echo $row['point_person'];?>">
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="number" id="number" value="<?php echo $row['number'];?>">
          </div>
          <div class="input-box">
            <span class="details">Status</span>
            <input type="text" name="status" id="status" value="<?php echo $row['status'];?>">
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
