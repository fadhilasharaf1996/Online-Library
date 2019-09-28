<?php
require_once('connection.php');
session_start();
$f_id=$_SESSION['id'];
$id  = $_GET['id'];
// $sql="UPDATE `book_details` SET `status`='unavailable' WHERE `id`='$id'";
// $row = mysqli_query($conn, $sql);

$sql = "SELECT * FROM `book_details` WHERE `id`='$id' ";
$records = mysqli_query($conn,$sql);
$raw = mysqli_fetch_array($records);
$bid = $raw["id"];
$bname = $raw["name"];
$status= $raw["status"];

$sql = "SELECT * FROM `student_details` WHERE `id`='$f_id' ";
$records = mysqli_query($conn,$sql);
$riw = mysqli_fetch_array($records);
$sid = $riw["id"];
$sname = $riw["name"];
// echo $bid;
// echo $bname;
// echo $sid;
// echo $sname;
$sql = "SELECT * FROM book_request WHERE student_id = '$sid' AND book_id = '$bid'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if( $status == "available"){

  $sql="INSERT INTO `book_request`(`id`, `book_id`, `book_name`, `student_id`, `student_name`) VALUES (NULL,'$bid','$bname','$sid','$sname')";
    $records = mysqli_query($conn,$sql);
    // $rew = mysqli_fetch_array($records);
    // $riw = mysqli_query($conn, $sql);
    $sql="UPDATE `book_details` SET `status`='librarian need to approve' WHERE `id`='$bid'";
    $row = mysqli_query($conn, $sql);
    header('location:book_request.php');

}
else {
    echo "<script type='text/javascript'> alert('You have requested for same book'); </script>";

}
?>
