<?php
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
      <h6>ADMIN LOGIN</h6>
      <div class="tab">
        <table>
            <tr>
              <td><label for="username">Username</label></td>
              <td><input type="text" name="username" style="color:black" placeholder="email"  required></td>
            </tr>
              <td><label for="password" >Password</label>
              <td><input type="password"  name="password1" style="color:black" placeholder="Password"  required></td>
            </tr>
        </table>
      </div>
      <div class="button">
        <input type="submit" name="login" value="Login">
        <!-- <button name"submit" type="submit" style="color:black" >hello</button> -->
      </div>
    </form>
    <?php
      if (isset($_POST["login"])) {

            if($_SERVER["REQUEST_METHOD"] == "POST") {
           // username and password sent from form

           $myusername = mysqli_real_escape_string($conn,$_POST['username']);
           $mypassword = mysqli_real_escape_string($conn,$_POST['password1']);

           $sql = "SELECT `id` FROM admin_deatils WHERE username = '$myusername' and password = '$mypassword'";
           $result = mysqli_query($conn,$sql);
           $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
           $admin = $row["id"];

           $count = mysqli_num_rows($result);

           // If result matched $myusername and $mypassword, table row must be 1 row

           if($count == 1) {
                header("location: admin_index.php");
            }
           else {
              $error = "Your Login Name or Password is invalid";
              echo "<script type='text/javascript'> alert('invalid username or password');</script>";
           }
        }
      }
    ?>
  </body>
</html>
