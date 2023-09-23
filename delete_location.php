<?php
include 'includes/conn.php';

if(isset($_GET['id'])){
    $delete_id = $_GET['id'];

    $sql_delete = mysqli_query($conn, "DELETE FROM location_admin WHERE id = '$delete_id'");
    if($sql_delete){
        header('location: notification.php');
    }
    else{
        echo mysqli_error($con);
    }
}
?>