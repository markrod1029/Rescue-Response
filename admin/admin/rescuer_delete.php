<?php

include_once("connections/connection.php");


$id = $_GET['id'];
$sql = "DELETE FROM sub_admin WHERE id = '$id'";
if (mysqli_query($conn, $sql)) {
echo "Record deleted successfully";
header('location:rescuer.php');
} else {
echo "Error deleting record: " . 
mysqli_error($conn);
}
mysqli_close($conn);
?>