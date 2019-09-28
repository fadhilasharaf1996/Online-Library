<!DOCTYPE html>
<?php require_once('connection.php'); ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Librarian Details</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include 'header.php';?>
    <h6 style="color:black;">Librarian Details</h6>
    <h3 style="color:black;"></h3>
    <?php
    $sql = "SELECT * FROM librarian_details";
    $records = mysqli_query($conn,$sql); ?>
    <table border="2" cellpadding="1" cellspacing='1'>
        <tr>
                  <th><pre> STUDENT ID</th>
                  <th>Name</th>
                  <th>E-mail</th>
                  <th>Gender</th>
                  <th>ddress</th>
                  <th>Telephone</th>
                  <th>D.O.B</th>
                  <th>Status</th>
                  <th>Function</th>

        </tr>

<!-- We use while loop to fetch data and display rows of date on html table -->

        <?php

          while ($course = mysqli_fetch_assoc($records)){

                echo "<tr>";
                    echo "<td>".$course['id']."</td>";
                    echo "<td>".$course['name']."</td>";
                    echo "<td>".$course['email']."</td>";
                    echo "<td>".$course['gender']."</td>";
                    echo "<td>".$course['address']."</td>";
                    echo "<td>".$course['telephone']."</td>";
                    echo "<td>".$course['dob']."</td>";
                    echo "<td>".$course['status']."</td>";
                    ?>
                    <td>
                      <button type="button" name="delete"><a href="delete_librarian.php?id=<?php echo $course['id'];?>">DELETE</a></button>
                      <button type="button" name="delete"><a href="edit_stat.php?id=<?php echo $course['id'];?>">STATUS CHANGE</a></button>
                    </td><?php
                echo "</tr>";

          }
        ?>
     </table>
      <!-- <button type="button" name="edit"><a href="index.php">LOGOUT</a></button> -->
  </body>
</html>
