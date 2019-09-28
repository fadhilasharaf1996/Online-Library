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
        padding-top: 20px;  font-size: 25px;   color: black; ">Book Adding</h1>
        <div class="tab">
          <table>
            <tr>
              <td><label for="booktype">Book Type: </label></td>
              <td><select id="type" name="booktype" style="color:black">
                    <option value="novel" style="color:black">Novel</option>
                    <option value="shortstory" style="color:black">Short Story</option>
                    <option value="poem" style="color:black">Poem</option>
                  </select></td>
            </tr>
            <tr>
              <td><label for="book">Book Number: </label></td>
              <td><input type="text" name="book" style="color:black" placeholder="Book Number" required ></td>

            </tr>
              <tr>
                <td><label for="book_name">Book Name: </label></td>
                <td><input type="text" name="book_name" style="color:black" placeholder="Book name" required ></td>

              </tr>
              <tr>
                <td><label for="author">Author</label></td>
                <td><input type="text" name="author" style="color:black" placeholder="Author"  required></td>
              </tr>

          </table>
        </div>
        <div class="button">
          <input name="submit" type="submit" style="color:black" >
          <button type="button" name="book_details"><a href="book_index.php">Book Details</a></button>
          <!-- <button type="button" name="addbook"><a href="admin_index.php">Homepage</a></button> -->
        </div>
      </form>
      <?php

        if (isset($_POST['submit'])) {

          // assigning the entered values

          $type= $_POST['booktype'];
          $bookname = $_POST['book_name'];
          $author = $_POST['author'];
          $book = $_POST['book'];


          $sql= "SELECT `id` FROM book_details WHERE `book_no`= '$book'";
          $result1 = mysqli_query($conn,$sql);
          $count = mysqli_num_rows($result1);

          if ($count >= 1){
            echo "<script type='text/javascript'> alert('Book already exists ');</script>";
          }
          if ($count == 0) {
            $sql = "INSERT INTO `book_details`(`type`, `name`, `author`, `book_no`) VALUES ('$type', '$bookname', '$author', '$book')";
            $result = mysqli_query($conn,$sql);
          
        }
      }
      ?>
</body>
</html>
