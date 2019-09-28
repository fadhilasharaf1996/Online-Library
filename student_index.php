<!DOCTYPE html>
<?php
session_start();
require_once('connection.php'); ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Login</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include 'header.php';?>
    <h6 style="color:black;">Welcome</h6>
    <h3 style="color:black;">Student</h3>
    <?php
      $f_id=$_SESSION['id'];

      $sql = "SELECT * FROM student_details WHERE `id`='$f_id'";
      $res_t = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($res_t,MYSQLI_ASSOC);

      ?>
      <table>
        <tr>
          <td>ID:</td>
          <td><?php echo $row['id']; ?></td>
        </tr>
        <tr>
          <td>Name:</td>
          <td><?php echo $row['name']; ?></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td><?php echo $row['gender']; ?></td>
        </tr>
        <tr>
          <td>E-mail</td>
          <td><?php echo $row['email']; ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?php echo $row['address']; ?></td>
        </tr>
        <tr>
          <td>Telephone</td>
          <td><?php echo $row['telephone']; ?></td>
        </tr>
        <tr>
          <td>D.O.B</td>
          <td><?php echo $row['dob']; ?></td>
        </tr>
      </table>
      <?php
      $_SESSION['id']=$row['id'];
       ?>
      <button type="button" name="edit"><a href="student_update.php">EDIT PROFILE</a></button>
  </body>
</html>
