<?php

include_once("connections/session.php");



$id = $_GET['ID'];

    $status = 1;

    $sql = "UPDATE location_admin SET status = '$status' WHERE user_id='$id'";
    $conn->query($sql) or die($conn->error);


    $sql1 = "UPDATE location SET status = '$status' WHERE user_id='$id'";
    $conn->query($sql1) or die($conn->error);



 header("Location: dashboard.php");
?>