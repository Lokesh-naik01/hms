<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Add Medicine</title>
    <?php include 'style.php' ?>
  </head>
  <body>
    <?php include 'header.php' ?>
    <div class="row2">
      <?php include 'sidebar.php' ?>
      <div class="column1 right1">

          <div>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
              <div style="padding-left:250px;padding-right:320px;font-size:larger;">

              <div class="container">
                      <div class="row">
                      <div class="col-xs-2">
                      <h1 style="padding-top:25px;"><center>Add Medicine</center></h1>
                      <p>Fill the following details</p>
                      <hr class="mb-3">
                          <label for="mname"><b>Name</b></label>
                          <input required size="50" class="form-control" type="text" name="mname" placeholder="Enter name of Medicine">
                          <label for="mcost"><b>Cost</b></label>
                          <input required size="50" class="form-control" type="text" name="mcost" placeholder="Enter cost of Medicine of each strip">
                          <label for="mnum"><b>Number</b></label>
                          <input required size="50" class="form-control" type="text" name="mnum" placeholder="Enter Number of tablet per strip">
                          <hr class="mb-3">
                          <input class="btn btn-primary" id="register" type="submit" name="padd" value="Add Medicine" onclick="return mess();">
                          <input class="btn btn-primary" type="reset"  value="Reset">
                      </div>
                      </div>
                  </div>
              </div>
              </form>
              <?php
              if(isset($_POST['padd']))
                {
                  $mname=$_POST['mname'];
                  $mcost=$_POST['mcost'];
                  $mnum=$_POST['mnum'];
                  $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                  $sql="INSERT INTO medicine (mname,mcost,mnum) VALUES ('{$mname}','{$mcost}','{$mnum}') ";
                  if ($conn->query($sql) === true)
                  {
                     $val="The newly Added Medicine Id is:".$conn->insert_id ;
                     echo '<script>alert("'.$val.'");
                             window.location.href="http://localhost/lokesh/medlis.php";
                           </script>';
                  }
                  else
                  {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                  mysqli_close($conn);
                 } ?>

          </div>

      </div>
    </div>
  </body>
</html>
