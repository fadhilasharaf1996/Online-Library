<!DOCTYPE html>
<?php
  require_once('connection.php');
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="index_style1.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include 'header.php';?>
    <div class="banner">
      <h1 style="color:black">LIBRARIAN PAGE</h1>
      <div class="conatiner">
        <div class="button_cont1" align="center">
             <a class="example_c1" href="student_details.php" >STUDENT DETAILS</a></div>
        <div class="button_cont1" align="center">
             <a class="example_c1" href="librarian_index.php" >LIBRARIAN PROFILE</a></div>
        <div class="button_cont1" align="center">
        <a class="example_c1" href="book_index.php" >BOOKS MANAGMENT</a></div>
        <div class="button_cont1" align="center">
        <a class="example_c1" href="book_accept.php" >REQUEST STATUS</a></div>
        <div style="clear:both"></div>
      </div>
    </div>
  </body>
</html>
