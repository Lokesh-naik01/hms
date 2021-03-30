<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Edit Doctor</title>
    <?php include 'style.php' ?>
    <style>
    .column1{
      height:730px;
    }
      .tab{
        padding:0;
        margin: 0;
        padding-left:100px;
        padding-right:100px;
        height:100%;
      }

    </style>
  </head>
  <body>
    <?php include 'header.php' ?>
    <div class="row2">
      <?php include 'sidebar.php' ?>
      <div class="column1 right1">

          <div class="tab">
              <form style="padding-top:20px;padding-left:200px;padding-right:200px;" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
               <input required class="form-control" type="text" name="patid" placeholder="Enter Doctor ID">
               <input class="btn btn-primary" type="submit" name="pdet" value="Show Doctor Details" style="background-color:black;color:white;margin-top: 3px";>
              </form>

           <?php
             if(isset($_POST['pdet']))
             {
               $data=$_POST['patid'];
               $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
               $sql=" SELECT * FROM doctor where did='$data' ";
               $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
               if(mysqli_num_rows($result) > 0)
               {
                   while($row=mysqli_fetch_assoc($result))
                   {
                  ?>
                  <form action="updatedoc.php" method="post">
                  <div style="padding-left:250px;padding-right:320px;font-size:larger;">
                  <div class="container">
                          <div class="row">
                          <div class="col-xs-2">
                          <h1 style="padding-top:10px;"><center>Update Doctor</center></h1>
                          <p>Change the necessary details to be Updated</p>
                          <hr class="mb-3">
                              <label for="dname"><b>Name</b></label>
                                    <input type="hidden" name="did" value="<?php echo $row['did']; ?>">
                                    <input required class="form-control" type="text" name="dname" value="<?php echo $row['dname']; ?>">
                              <label for="ddob"><b>Date of Birth</b></label>
                                    <input required class="form-control" type="date" name="ddob" value="<?php echo $row['ddob']; ?>">
                              <label for="dgender"><b>Gender</b></label>&nbsp;&nbsp;
                              <?php
                                if($row['dgender']=="Male")
                                {?>
                                  <input type="radio" name="dgender" value="Male" checked > Male
                                  <input type="radio" name="dgender" value="Female"> Female
                                <?php }
                                else { ?>
                                  <input type="radio" name="dgender" value="Male"> Male
                                  <input type="radio" name="dgender" value="Female" checked > Female
                               <?php  }
                               ?>
                              <br>
                              <label for="dspec"><b>Specialization</b></label>
                                    <input required class="form-control" type="text" name="dspec" value="<?php echo $row['dspec']; ?>">
                              <label for="dphone"><b>Phone</b></label>
                                    <input required class="form-control" type="text" name="dphone" value="<?php echo $row['dphone']; ?>">
                              <label for="dmail"><b>Mail</b></label>
                                    <input required class="form-control" type="email" name="dmail" value="<?php echo $row['dmail']; ?>">
                              <label for="daddress"><b>Address</b></label>
                                    <input required class="form-control" type="text" name="daddress" value="<?php echo $row['daddress']; ?>">
                              <hr class="mb-3">
                                    <input class="btn btn-primary" id="register" type="submit" name="padd" value="Edit Doctor Information" onclick="return mess();">
                                    <input class="btn btn-primary" id="register" type="reset" value="Reset" onclick="return mess();">
                          </div>
                          </div>
                      </div>
                  </div>
                  </form>
               <?php }
             }
             else
             {
               ?> <h1><center>No Doctor present with given ID</center></h1> <?php
             }
          }
               ?>
        </div>
    </div>
  </div>
  </body>
</html>
