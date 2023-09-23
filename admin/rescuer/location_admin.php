<?php

include_once("connections/session.php");



if(isset($_POST['submit'])){


    $address = $_POST['address'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $user_id = $_POST['user_id'];
    $sub_admin_id = $user['id'];
    $location_id = $_POST['location_id'];


    $sql = "INSERT INTO `location_admin`(`address`, `lat`, `long`, `user_id`, `location_id`, `sub_admin_id`, `date`, time) VALUES ('$address','$lat','$long', '$user_id', '$location_id', '$sub_admin_id', NOW(), NOW())";

    $conn->query($sql) or die($conn->error);

    echo header("Location: dashboard.php");
}
?>