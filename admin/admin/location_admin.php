<?php

include_once("connections/session.php");



if(isset($_POST['submit'])){


    $address = $_POST['address'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $user_id = $_POST['user_id'];
    $sub_admin_id = $user['id'];

    $address = htmlspecialchars( $_POST['address'], ENT_QUOTES, 'UTF-8');
    $lat = htmlspecialchars( $_POST['lat'], ENT_QUOTES, 'UTF-8');
    $long = htmlspecialchars( $_POST['long'], ENT_QUOTES, 'UTF-8');
    $user_id = htmlspecialchars( $_POST['user_id'], ENT_QUOTES, 'UTF-8');
    $sub_admin_id = htmlspecialchars( $_POST['id'], ENT_QUOTES, 'UTF-8');



    $sql = "INSERT INTO `location_admin`(`address`, `lat`, `long`, `user_id`, `sub_admin_id`, `date`, time) VALUES ('$address','$lat','$long', '$user_id', '$sub_admin_id', NOW(), NOW())";

    $conn->query($sql) or die($conn->error);

    echo header("Location: dashboard.php");
}
?>