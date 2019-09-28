<?php
require_once('connection.php');
$id  = $_GET['id'];
$sql="DELETE FROM `student_details` WHERE id='$id'";
$row = mysqli_query($conn, $sql);
header('location:student_details.php');
?>
