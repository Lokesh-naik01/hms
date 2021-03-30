<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Add Patient</title>
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
                      <h1 style="padding-top:25px;"><center>Patient Registration</center></h1>
                      <p>Fill the following details</p>
                      <hr class="mb-3">
                          <label for="pname"><b>Name</b></label>
                          <input required size="50" class="form-control" type="text" name="pname" placeholder="Enter name">
                          <label for="pdob"><b>Date of Birth</b></label>
                          <input required size="50" class="form-control" type="date" name="pdob" placeholder="Enter dob">
                          <label for="pgender"><b>Gender</b></label>&nbsp;&nbsp;
                          <input type="radio" name="pgender" value="Male"> Male
                          <input type="radio" name="pgender" value="Female"> Female
                          <br>
                          <label for="pphone"><b>Phone</b></label>
                          <input required size="50" class="form-control" type="text" name="pphone" placeholder="Enter Phone Number">
                          <label for="pmail"><b>Mail</b></label>
                          <input required size="50" class="form-control" type="email" name="pmail" placeholder="Enter Mail ID">
                          <label for="paddress"><b>Address</b></label>
                          <input required size="50" class="form-control" type="text" name="paddress" placeholder="Enter address">
                          <hr class="mb-3">
                          <input class="btn btn-primary" id="register" type="submit" name="padd" value="Add Patient" onclick="return mess();">
                          <input class="btn btn-primary" type="reset"  value="Reset">
                      </div>
                      </div>
                  </div>
              </div>
              </form>
              <?php
              if(isset($_POST['padd']))
                {
                  $pname=$_POST['pname'];
                  $pdob=$_POST['pdob'];
                  $pgender=$_POST['pgender'];
                  $pphone=$_POST['pphone'];
                  $pmail=$_POST['pmail'];
                  $paddress=$_POST['paddress'];
                  $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                  $sql="INSERT INTO patient (pname,pdob,pgender,pphone,pmail,paddress) VALUES ('{$pname}','{$pdob}','{$pgender}',{$pphone},'{$pmail}','{$paddress}') ";
                  if ($conn->query($sql) === true)
                  {
                    ?>

                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                        <script src="sweetalert2.all.min.js"></script>

                        <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
                        <?php
                        $val="The new Inserted Patient Id is:".$conn->insert_id ;

                    echo '<script>
                    alert("'.$val.'");
                    window.location.href="http://localhost/lokesh/patlis.php";
                    </script>';?>
                  <?php
                  }
                  else
                  {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                  //header('Location: http://localhost/lokesh/patlis.php');
                  mysqli_close($conn);
                 } ?>

          </div>

      </div>
    </div>
  </body>
</html>
