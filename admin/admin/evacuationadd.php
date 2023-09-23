<?php

include_once("connections/session.php");


if(isset($_POST['submit'])){

  

    $name =  htmlspecialchars( $_POST['name'], ENT_QUOTES, 'UTF-8');
    $location = htmlspecialchars( $_POST['location'], ENT_QUOTES, 'UTF-8');
    $point_person = htmlspecialchars( $_POST['point_person'], ENT_QUOTES, 'UTF-8');
    $number = htmlspecialchars( $_POST['number'], ENT_QUOTES, 'UTF-8');
    $status = htmlspecialchars( $_POST['status'], ENT_QUOTES, 'UTF-8');

    $sql = "INSERT INTO `evacuations`(`name`, `location`, `point_person`, `number`, `status`) VALUES ('$name','$location','$point_person','$number','$status')";

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
    <div class="title">Add New Evacuation Area</div>
    <div class="content">
      <form action="" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Evacuation Center</span>
            <input type="text" name="name" id="name" placeholder="Evacuation Center" required>
          </div>
          <div class="input-box">
            <span class="details">Location</span>
            <input type="text" name="location" id="location" placeholder="Location" required>
          </div>
          <div class="input-box">
            <span class="details">Point Person</span>
            <input type="text" name="point_person" id="point_person" placeholder="Point Person" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="number" id="number" placeholder="Phone Number" required>
          </div>
          <div class="input-box">
            <span class="details">Status</span>
            <input type="text" name="status" id="status" placeholder="Status" required>
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
