<!DOCTYPE html>
<?php
  session_start();
   require_once('connection.php');
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <title>Login</title>
  </head>
  <body>
    <?php include 'header.php';?>
    <form action=""  method="post">
      <h6 style="color:black; padding-bottom: 20px;
      padding-top: 20px;  font-size: 25px;   color: black; ">SignIn</h6>
      <div class="tab">
        <table>
          <tr>
            <td><label for="usertype">User Type</label></td>
            <td><select id="type" name="usertype" style="color:black">
                  <option value="student" style="color:black">Student</option>
                  <option value="librarian" style="color:black">Librarian</option>
                </select></td>
          </tr>
            <tr>
              <td><label for="email">E-mail</label></td>
              <td><input type="text" name="mail" style="color:black" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                title="email formate abc@x.com" required></td>
            </tr>
              <td><label for="password" >Password</label>
              <td><input type="password"  name="passwordd" style="color:black" placeholder="Password"  required></td>
            </tr>
        </table>
      </div>
      <div class="button">
        <input type="submit" name="login" value="Login">
      </div>
    </form>
    <?php

      if (isset($_POST['login'])) {

        // assigning the entered values

        $myusername = $_POST['mail'];
        $mypassword = $_POST['passwordd'];
        $usertype = $_POST['usertype'];



        // student login checking
        if ($usertype == 'student'){
          if($_SERVER["REQUEST_METHOD"] == "POST") {

            $sql = "SELECT id FROM student_details WHERE email = '$myusername' and password = '$mypassword'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $id = $row["id"];
            $count = mysqli_num_rows($result);

            // If result matched $myusername and $mypassword, table row must be 1 row

            if($count == 1) {
                header("location: student_page.php");
                $_SESSION['id']= $row["id"];
           }else {

              echo "<script type='text/javascript'> alert('invalid username or password');</script>";

                  }
              }
            }
        // librarian login checking
        elseif ($usertype == 'librarian'){
          if($_SERVER["REQUEST_METHOD"] == "POST") {

            $sql = "SELECT id FROM librarian_details WHERE email = '$myusername' and password = '$mypassword'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $id = $row["id"];
            $count = mysqli_num_rows($result);


            // If result matched $myusername and $mypassword, table row must be 1 row

            if($count == 1) {
                $sql = "SELECT status FROM librarian_details WHERE email = '$myusername' and password = '$mypassword'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $stat = $row["status"];


                if ($stat == 'active'){

                $sql = "SELECT * FROM librarian_details WHERE email = '$myusername' and password = '$mypassword'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $_SESSION['lid']= $row["id"];
                header("location: librarian_page.php");

              }
              elseif ($stat == 'inactive'){
                echo "<script type='text/javascript'> alert('Your Request for Librarian is Pending');</script>";
              }
           }else {

              echo "<script type='text/javascript'> alert('invalid username or password');</script>";

                  }
              }
            }
        }
        ?>
  </body>
</html>
