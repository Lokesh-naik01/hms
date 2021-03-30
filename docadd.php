<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Doctor</title>
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
                          <h1><center>Doctor Registration</center></h1>
                          <p>Fill the following details</p>
                          <hr class="mb-3">
                              <label for="dname"><b>Name</b></label>
                              <input required size="50" class="form-control" type="text" name="dname" placeholder="Enter name">
                              <label for="ddob"><b>Date of Birth</b></label>
                              <input required size="50" class="form-control" type="date" name="ddob" placeholder="Enter dob">
                              <label for="dgender"><b>Gender</b></label>&nbsp;&nbsp;
                              <input type="radio" name="dgender" value="Male"> Male
                              <input type="radio" name="dgender" value="Female"> Female
                              <br>
                              <label for="dspec"><b>Specialization</b></label>
                              <input required size="50" class="form-control" type="text" name="dspec" placeholder="Enter Specialization">
                              <label for="dphone"><b>Phone</b></label>
                              <input required size="50" class="form-control" type="text" name="dphone" placeholder="Enter Phone Number">
                              <label for="dmail"><b>Mail</b></label>
                              <input required size="50" class="form-control" type="email" name="dmail" placeholder="Enter Mail ID">
                              <label for="daddress"><b>Address</b></label>
                              <input required size="50" class="form-control" type="text" name="daddress" placeholder="Enter address">
                              <hr class="mb-3">
                              <input class="btn btn-primary" id="register" type="submit" name="dadd" value="Add Doctor">
                              <input class="btn btn-primary" type="reset"  value="Reset">
                    </div>
                  </div>
               </div>
            </div>
          </form>
          </div>
          <?php
          if(isset($_POST['dadd']))
            {
              $dname=$_POST['dname'];
              $ddob=$_POST['ddob'];
              $dgender=$_POST['dgender'];
              $dspec=$_POST['dspec'];
              $dphone=$_POST['dphone'];
              $dmail=$_POST['dmail'];
              $daddress=$_POST['daddress'];
              $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");

              $sql="INSERT INTO doctor(dname,ddob,dgender,dspec,dphone,dmail,daddress) VALUES ('{$dname}','{$ddob}','{$dgender}','{$dspec}','{$dphone}','{$dmail}','{$daddress}') ";
              if ($conn->query($sql) === true)
              {
                $val="The new Inserted Doctor Id is:".$conn->insert_id ;
                echo '<script>
                alert("'.$val.'");
                window.location.href="http://localhost/lokesh/doclis.php";
                </script>';

                $sql1="INSERT INTO doctorlogin(did,dmail,dpass) VALUES ('{$conn->insert_id}','{$dmail}','{$dname}')";
                $result=mysqli_query($conn,$sql1); ?>

              <?php
              }
              else
              {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
              mysqli_close($conn);

            }
            ?>


        </div>
      </div>
    </div>
  </body>
</html>
