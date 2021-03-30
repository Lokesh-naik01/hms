<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include 'style.php' ?>
    <title>Home</title>
    <style>
      .hi{
        padding-top: 200px;
        letter-spacing: 1px;
        font-size: 90px;
        text-align: center;
        color: #595959;
      }
    </style>
  </head>
  <body>
    <?php include 'header.php' ?>
    <div class="row2">
      <?php include 'sidebar.php' ?>
      <div class="column1 right1">
        <div class="hi">
          <?php
                $id=$_SESSION["docid"];
                $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                $sql="SELECT * FROM doctor WHERE did='{$id}'";
                $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.".mysqli_error());
                while($row=mysqli_fetch_assoc($result))
                {
                  $name=$row['dname'];
                }
           ?>
          <p><center>Welcome <?php echo $name; ?></center></p>
        </div>
      </div>
    </div>
  </body>
</html>
