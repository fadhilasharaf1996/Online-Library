<!DOCTYPE html>
  <?php
     require_once('connection.php');
   ?>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Registration Form</title>
      <link rel="stylesheet" type="text/css" href="signup_style.css">
      <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    </head>
    <body>
      <?php include 'header.php';?>
      <form action="" onsubmit="return checkpass(this)" method="post" enctype="multipart/form-data">
        <h1 style="color:black; padding-bottom: 20px;
        padding-top: 20px;  font-size: 25px;   color: black; ">SignUp</h1>
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
                <td><label for="name">Name:</label></td>
                <td><input type="text" name="name" style="color:black" placeholder="name" required ></td>

              </tr>
              <tr>
                <td><label for="email">E-mail</label></td>
                <td><input type="text" name="email" style="color:black" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                  title="email formate abc@x.com" required></td>
              </tr>
              <tr>
                <td><label for="gender">Gender</label></td>
                <td><input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="male">Male</td>
              </tr>
              <tr>
                <td>Address</td>
                <td><input type="text" name="address" style="color:black" placeholder="Address" required ></td>
              </tr>
              <tr>
                <td><label for="password" >Password</label>
                <td><input type="password"  name="password1" style="color:black" placeholder="Password"  required></td>
              </tr>
              <tr>
                <td><label>Confirm Password</label></td>
                <td><input type="password"  name="password2" style="color:black" placeholder="Confirm Password" required ></td>
              </tr>
              <tr>
                <td><label for="telephone">Telephone</label></td>
                <td> <input type="tel" name="telephone" value="" style="color:black" placeholder="Telephone no." pattern="[0-9]{10,}$" title="must need 10 digit mob no." required> </td>
              </tr>
              <tr>
                <td><label for="date">Date Of Birth</label></td>
                <td> <input type="date" name="date" value="" style="color:black"  required></td>
              </tr>
          </table>
        </div>
        <div class="button">
          <input name="submit" type="submit" style="color:black" >
          <button type="button" name="edit"><a href="index.php">Logout</a></button>
        </div>
      </form>
      <!-- password checking -->
      <script type="text/javascript">
        function checkpass(form)
          {

            password1=form.password1.value;
            password2=form.password2.value;

            if (password1 == '') {
              alert ("Enter Password");
              return false;
            }
            else if (password2 == '') {
              alert ("Enter Confirm Password");
              return false;
            }
            else if (password1 != password2) {
              alert ("Mismatch");
              return false;
            }
            else{
              return true;
            }
          }
      </script>
      <?php

        if (isset($_POST['submit'])) {

          // assigning the entered values

          $name= $_POST['name'];
          $email = $_POST['email'];
          $gender = $_POST['gender'];
          $address = $_POST['address'];
          $password = $_POST['password1'];
          $telephone = $_POST['telephone'];
          $date = $_POST['date'];
          $usertype = $_POST['usertype'];


          // checking user type and assigning values.

          if ($usertype == 'student'){
            $sql= "SELECT `id` FROM student_details WHERE `email`= '$email'";
         		$result1 = mysqli_query($conn,$sql);
         		$count = mysqli_num_rows($result1);

         		if ($count >= 1){
              echo "<script type='text/javascript'> alert('user already exists with this email');</script>";
            }
            if ($count == 0) {

              $sql = "INSERT INTO `student_details`(`id`, `name`, `email`, `gender`, `address`, `password`, `telephone`, `dob`)
              VALUES (NULL, '$name', '$email', '$gender', '$address', '$password', '$telephone', '$date')";
              $result = mysqli_query($conn,$sql);
              ?>
               <script>
                  window.location="user_login.php";
                </script>
                <?php
            }
          }
          else {
            if ($usertype == 'librarian'){
              $sql= "SELECT `id` FROM librarian_details WHERE `email`= '$email'";
           		$result1 = mysqli_query($conn,$sql);
           		$count = mysqli_num_rows($result1);
           		if ($count >= 1){
                echo "<script type='text/javascript'> alert('user already exists with this email');</script>";
              }
              if ($count == 0) {
                $sql = "INSERT INTO `librarian_details`(`id`, `name`, `email`, `gender`, `address`, `password`, `telephone`, `dob`, `status`)
                VALUES (NULL, '$name', '$email', '$gender', '$address', '$password', '$telephone', '$date', 'inactive');";
                $result = mysqli_query($conn,$sql);
                ?>
                <script>
                    window.location="user_login.php";
                  </script>
                  <?php
              }
            }
          }
        }
      ?>
    </body>
</html>
