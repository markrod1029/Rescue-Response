<?php

include_once("includes/session.php");



if(isset($_POST['submit'])){


    $address = $_POST['address'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $user_id = $_POST['id'];


    $sql = "INSERT INTO `location`(`address`, `lat`, `long`, `user_id`, `date`) VALUES ('$address','$lat','$long', '$user_id', NOW())";

    $conn->query($sql) or die($conn->error);

    echo header("Location: home.php");
}
?>