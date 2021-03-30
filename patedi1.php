<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Edit Patient</title>
    <?php include 'style.php' ?>
    <style>
      .tab{
        padding-left:100px;
        padding-right:100px;
      }
      .tab{
        overflow:auto;
      }
    </style>
  </head>
  <body>
    <?php include 'header.php' ?>
    <div class="row2">
      <?php include 'sidebar.php' ?>
      <div class="column1 right1">

          <div class="tab">
              <form style="padding-top:20px;padding-left:200px;padding-right:200px;" action="<?php $_SERVER['PHP_SELF']; ?>" style="padding-top:20px;" method="post">
               <input required class="form-control" type="text" name="patid" placeholder="Enter Patient ID">
               <input class="btn btn-primary" type="submit" name="pdet" style="background-color:black;color:white;margin-top: 3px;font-weight:bold;" value="Show Patient Details">
              </form>
           <br>
           <?php
             if(isset($_POST['pdet']))
             {
               $patid=$_POST['patid'];
               $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
               $sql=" SELECT * FROM patient where pid='$patid'";
               $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
               if(mysqli_num_rows($result) > 0)
               {
                   while($row=mysqli_fetch_assoc($result))
                   {
                  ?>
                 <form action="updatepat.php" method="post">
                 <div style="padding-left:250px;padding-right:320px;font-size:larger;">
                 <div class="container">
                         <div class="row">
                         <div class="col-xs-2">
                         <h1><center>Update Patient</center></h1>
                         <p>Change the necessary details to be Updated</p>
                         <hr class="mb-3">
                             <label for="pname"><b>Name</b></label>
                             <input type="hidden" name="pid" value="<?php echo $row['pid']; ?>">
                             <input required class="form-control" type="text" name="pname" value="<?php echo $row['pname']; ?>">
                             <label for="pdob"><b>Date of Birth</b></label>
                             <input required class="form-control" type="date" name="pdob" value="<?php echo $row['pdob']; ?>">
                             <label for="pgender"><b>Gender</b></label>&nbsp;&nbsp;
                             <?php
                               if($row['pgender']=="Male")
                               {?>
                                 <input type="radio" name="pgender" value="Male" checked > Male
                                 <input type="radio" name="pgender" value="Female"> Female
                               <?php }
                               else { ?>
                                 <input type="radio" name="pgender" value="Male"> Male
                                 <input type="radio" name="pgender" value="Female" checked > Female
                              <?php  }
                              ?>
                             <br>
                             <label for="pphone"><b>Phone</b></label>
                             <input required class="form-control" type="text" name="pphone" value="<?php echo $row['pphone']; ?>">
                             <label for="pmail"><b>Mail</b></label>
                             <input required class="form-control" type="email" name="pmail" value="<?php echo $row['pmail']; ?>">
                             <label for="paddress"><b>Address</b></label>
                             <input required class="form-control" type="text" name="paddress" value="<?php echo $row['paddress']; ?>">
                             <hr class="mb-3">
                             <input class="btn btn-primary" id="register" type="submit" name="padd" value="Edit Patient Information" onclick="return mess();">
                             <input class="btn btn-primary" type="reset"  value="Reset">
                         </div>
                         </div>
                     </div>
                 </div>
                 </form>
               <?php }
             }
             else
             {
               ?> <h1><center>No Patient present with given ID</center></h1> <?php
             }
          }
               ?>

      </div>
    </div>
  </div>
  </body>
</html>
