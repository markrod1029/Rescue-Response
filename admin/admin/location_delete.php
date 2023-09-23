<?php

include_once("connections/connection.php");



$id = $_GET['ID'];
$sql = "DELETE FROM location WHERE id = '$id'";
if (mysqli_query($conn, $sql)) {
echo "Record deleted successfully";
header('location:dashboard.php');
} else {
echo "Error deleting record: " . 
mysqli_error($conn);
}
mysqli_close($conn);
?>