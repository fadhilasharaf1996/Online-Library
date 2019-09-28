<?php
require_once('connection.php');
$id  = $_GET['id'];
$sql="UPDATE librarian_details SET `status` = 'active' WHERE id='$id'";
$row = mysqli_query($conn, $sql);
header('location:librarian_detail.php');
?>
