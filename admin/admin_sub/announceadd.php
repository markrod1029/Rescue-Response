<?php

include_once("connections/session.php");


if(isset($_POST['submit'])){

    $message = $_POST['message'];
    $date = date('y-m-d h:i:s');


    $sql = "INSERT INTO `alert`(`message`, `date`) VALUES ('$message','$date')";
  
    $conn->query($sql) or die($conn->error);

    echo header("Location: announce.php");
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
  <button class="back"><a href="announce.php" class="text-white">Back</a></button>
    <div class="title">Announcement</div>
    <div class="content">
      <form action="" method="post">
        <div class="user-details">
       
        <div class="input-box">
            <span class="details">Message</span>
            <textarea name="message" id="message" cols="90" rows="10" style="padding:10px;" required></textarea>
          </div>
        
   
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Post Message">
          
        </div>
      </form>
    </div>
  </div>

</body>
</html>
