<?php
require_once('connection.php');
$id  = $_GET['id'];
$sql="DELETE FROM `book_details` WHERE id='$id'";
$row = mysqli_query($conn, $sql);
header('location:book_index.php');
?>
