<!DOCTYPE html>
<?php require_once('connection.php'); ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Book Details</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  </head>
  <body>
    <?php include 'header.php';?>
    <h6 style="color:black;">Book Details</h6>
    <h3 style="color:black;"></h3>
    <?php
    $sql = "SELECT * FROM book_details";
    $records = mysqli_query($conn,$sql); ?>
    <table border="2" cellpadding="1" cellspacing='1'>
        <tr>
                  <th><pre> BOOK ID</th>
                  <th>Book Name</th>
                  <th>Book Type</th>
                  <th>Author</th>
                  <th>Status</th>
                  <th>Fuction</th>
        </tr>

<!-- We use while loop to fetch data and display rows of date on html table -->

        <?php

          while ($course = mysqli_fetch_assoc($records)){

                echo "<tr>";
                    echo "<td>".$course['book_no']."</td>";
                    echo "<td>".$course['name']."</td>";
                    echo "<td>".$course['type']."</td>";
                    echo "<td>".$course['author']."</td>";
                    echo "<td>".$course['status']."</td>";
                    ?>
                    <td>
                      <button type="button" name="delete"><a href="book_request_process.php?id=<?php echo $course['id'];?>">REQUEST BOOK</a></button>
                    </td><?php
                echo "</tr>";

          }
        ?>
     </table>
      <!-- <button type="button" name="edit"><a href="index.php">LOGOUT</a></button> -->

  </body>
</html>
