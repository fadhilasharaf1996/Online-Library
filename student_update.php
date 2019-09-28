<!DOCTYPE html>
<?php
session_start();
require_once('connection.php');
  $id  = $_SESSION['id'];
echo $id;
  $sql = "SELECT * FROM student_details WHERE `id`='$id'";
  $res_t = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($res_t,MYSQLI_ASSOC);
  $rname =$row["name"];
  $remail = $row['email'];
  $rgender = $row['gender'];
  $raddress = $row['address'];
  $rdob = $row['dob'];
  $rtel = $row['telephone'];
  ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="signup_style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include 'header.php';?>
    <form name="f1" method="POST" action="" enctype="multipart/form-data">
      <h1 style="color:black; padding-bottom: 20px;
      padding-top: 20px;  font-size: 25px;   color: black; ">Register Updation</h1>


    <table>
        <tr>
          <td><label for="name">Name:</label></td>
          <td><input type="text" name="name" value="<?php echo $rname ?>" style="color:black" placeholder="name" required ></td>

        </tr>
        <!-- <tr>
          <td><label for="email">E-mail</label></td>
          <td><input type="text" name="email" value="<?php echo $remail ?>" style="color:black" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            title="email formate abc@x.com" required></td>
        </tr> -->
        <tr>
          <td><label for="gender">Gender</label></td>
          <td><input type="radio" name="gender" value="female" <?php echo ($rgender=='female')?'checked':'' ?> >Female
          <input type="radio" name="gender" value="male" <?php echo ($rgender=='male')?'checked':'' ?>>Male</td>
        </tr>
        <!-- <tr>
          <td><label for="address">Address</label></td>
          <td><textarea  name="address" value="<?php echo $raddress ?>" rows="5" cols="40" placeholder="<?php echo $raddress ?>" style="color:black" ></textarea></td>
        </tr> -->
        <tr>
          <td>Address</td>
          <td><input type="text" name="address" value="<?php echo $raddress ?>" rows="5" cols="40" placeholder="<?php echo $raddress ?>" style="color:black" placeholder="Address" required ></td>
        </tr>
        <tr>
          <td><label for="date">Date Of Birth</label></td>
          <td> <input type="date" name="date" value="<?php echo $rdob ?>" value="" style="color:black"  required></td>
        </tr>
        <tr>
          <td><label for="telephone">Telephone</label></td>
          <td> <input type="text" name="telephone" value="<?php echo $rtel ?>" value="" style="color:black"  required></td>
        </tr>
        </table>
        <div class="button">
          <input name="login" type="submit" style="color:black" >
        </div>
      </form>
        <?php
         // Database Config

        /* Update Student Detail Php  */

        if (isset($_POST['login'])) // Get id
        {


            $name= $_POST['name'];
            $gender = $_POST['gender'];
            $address = $_POST['address'];
            $date = $_POST['date'];
            $telephone = $_POST['telephone'];

            //
            //
              $query="UPDATE `student_details` SET `name`='$name', `gender`='$gender',`address`='$address',
              `telephone`='$telephone',`dob`='$date' WHERE id = $id;";
            //
            //
            //
              $row = mysqli_query($conn, $query);
              header('location:student_page.php');
            }

        ?>
  </body>
</html>
