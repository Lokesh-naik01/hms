<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Edit Patient</title>
    <?php include 'style.php' ?>
  </head>
  <body>
    <?php include 'header.php' ?>
    <div class="row2">
      <?php include 'sidebar.php' ?>
      <div class="column1 right1">

          <div>
            <?php
            $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
            $pat_id=$_GET['id'];
            $sql="SELECT * FROM patient where pid={$pat_id} ";
            $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
            if(mysqli_num_rows($result)>0)
            {
              while($row=mysqli_fetch_assoc($result))
              {
             ?>
            <form action="updatepat.php" method="post">
            <div style="padding-left:250px;padding-right:320px;font-size:larger;">
            <div class="container">
                    <div class="row">
                    <div class="col-xs-2">
                    <h1 style="padding-top:25px;"><center>Update Patient</center></h1>
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
                    </div>
                    </div>
                </div>
            </div>
            </form>
          <?php }
        } ?>
          </div>

    </div>
  </div>
  </body>
</html>
