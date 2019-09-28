<!DOCTYPE html>
<?php
   require_once('connection.php');
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="indexstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <title>Welcome Page</title>
  </head>
  <body>
    <?php include 'header.php';?>
    <div class="banner">
      <h1>WELCOME</h1>
      <div class="conatiner">
        <div class="button_cont1" align="center">
             <a class="example_c1" href="admin_login.php" >ADMIN LOGIN</a></div>
        <div class="button_cont1" align="center">
             <a class="example_c1" href="user_login.php" >USER LOGIN</a></div>
        <div class="button_cont1" align="center">
        <a class="example_c1" href="signup.php" >REGISTRATION</a></div>
        <div style="clear:both"></div>
      </div>
    </div>
    <?php include 'footer.php';?>
  </body>
</html>
