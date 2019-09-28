<?php
require_once('connection.php');
$id  = $_GET['id'];
$sql="DELETE FROM `librarian_details` WHERE id='$id'";
$row = mysqli_query($conn, $sql);
header('location:librarian_detail.php');
?>
