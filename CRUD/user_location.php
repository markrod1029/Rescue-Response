<?php

include_once("session.php");



if(isset($_POST['submit'])){


    $address = $_POST['address'];
  echo  $lat = $_POST['lat'];
    $long = $_POST['long'];
    $user_id = $_POST['id'];
    $details = $_POST['incident_details'];
    $today = date("Y-m-d");


    $fileinfo=PATHINFO($_FILES["image"]["name"]);
    $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
    move_uploaded_file($_FILES["image"]["tmp_name"],'../img/' .$newFilename);
    $images = $newFilename;


    // $sql = "SELECT * FROM location WHERE user_id =  '$user_id'";
    // $query = $conn->query($sql);
    // while($row = $query->fetch_assoc()){
    //   $time = $row['time'];
    //   $date = $row['date'];
    //   $timestamp = strtotime($time) + 60*60;
    // $timetoday = strtotime("H:i:s");
    //   if($timestamp >=  $timetoday && $date ==  $today ){
    //     break;

    //   }
    //   else{
    //     $_SESSION['error'] = "Wait 1 Hour To Send a Location ";


    //   }
    // }

    $sql = "INSERT INTO `location`(`address`, `lat`, `long`, `user_id`, `date`,  `time`, `proof`, `incident_details`) VALUES ('$address','$lat','$long', '$user_id', NOW(),  NOW(), '$images', '$details')";

  
      if($conn->query($sql)){
        $_SESSION['success'] = 'Successfully send your location!';
    }
    else{
        $_SESSION['error'] = $conn->error;
    }
   

     header("Location: ../dashboard.php");
}
?>