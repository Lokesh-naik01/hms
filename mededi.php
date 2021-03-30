<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Edit Medicie</title>
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
            $med_id=$_GET['id'];
            $sql="SELECT * FROM medicine where mid={$med_id} ";
            $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull in mededi.php.");
            if(mysqli_num_rows($result)>0)
            {
              while($row=mysqli_fetch_assoc($result))
              {
             ?>
            <form action="updatemed.php" method="post">
            <div style="padding-left:250px;padding-right:320px;font-size:larger;">
            <div class="container">
                    <div class="row">
                    <div class="col-xs-2">
                    <h1 style="padding-top:25px;"><center>Update Patient</center></h1>
                    <p>Change the necessary details to be Updated</p>
                    <hr class="mb-3">
                        <label for="mname"><b>Name</b></label>
                        <input type="hidden" name="mid" value="<?php echo $row['mid']; ?>">
                        <input required class="form-control" type="text" name="mname" value="<?php echo $row['mname']; ?>">
                        <label for="mcost"><b>Cost</b></label>
                        <input required class="form-control" type="text" name="mcost" value="<?php echo $row['mcost']; ?>">
                        <label for="mnum"><b>Number of tablets per strip</b></label>
                        <input required class="form-control" type="text" name="mnum" value="<?php echo $row['mnum']; ?>">
                        <input class="btn btn-primary" id="register" type="submit" name="padd" value="Edit Medicine Information" onclick="return mess();">
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
