<!DOCTYPE html>
<?php
session_start();
require_once('connection.php');
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Book Details</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include 'header.php';?>
    <h6 style="color:black;">Booking Status</h6>
    <h3 style="color:black;"></h3>
    <?php
    $f_id = $_SESSION['id'];


    $sql = "SELECT * FROM `book_request` WHERE `student_id` = '$f_id'";
    $records = mysqli_query($conn,$sql);

    ?>
    <table border="2" cellpadding="1" cellspacing='1'>
        <tr>
                  <th><pre> BOOK ID</th>
                  <th>Book Name</th>
                  <th>Status</th>

        </tr>

<!-- We use while loop to fetch data and display rows of date on html table -->

        <?php

          while ($course = mysqli_fetch_assoc($records)){

                echo "<tr>";
                    echo "<td>".$course['book_id']."</td>";
                    echo "<td>".$course['book_name']."</td>";
                    echo "<td>".$course['status']."</td>";

                    ?>
                    <?php
                echo "</tr>";

          }
        ?>
     </table>
      <!-- <button type="button" name="edit"><a href="index.php">LOGOUT</a></button> -->
  </body>
</html>
