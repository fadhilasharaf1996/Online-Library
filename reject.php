<?php
require_once('connection.php');
$id  = $_GET['id'];

$sql = "SELECT * FROM `book_request` WHERE `id`='$id' ";
$records = mysqli_query($conn,$sql);
$raw = mysqli_fetch_array($records);
$bid = $raw["book_id"];
// echo $bid;
// // echo $id;
$sql="UPDATE `book_details` SET `status`='available' WHERE `id`='$bid'";
$riw = mysqli_query($conn, $sql);

$sql="UPDATE `book_request` SET `status`='REJECT' WHERE `id`='$id'";
$row = mysqli_query($conn, $sql);
header('location:book_accept.php');

?>
