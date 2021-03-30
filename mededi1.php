<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Edit Medicine</title>
    <meta charset="utf-8">
    <?php include 'style.php' ?>
    <style>
      .tab{
        padding-left:200px;
        padding-right:250px;
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
              <form action="<?php $_SERVER['PHP_SELF']; ?>" style="padding-top:20px;" method="post">
                <div>
                    <select  class="form-control" name="mid">
                        <option value="" selected disabled>Select Medicine</option>
                        <?php
                          $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                          $sql=" SELECT * FROM medicine";
                          $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
                          while($row= mysqli_fetch_assoc($result)){
                        ?>
                        <option value= "<?php echo $row['mid']; ?>"><?php echo $row['mname'];?></option>
                        <?php }
                        mysqli_close($conn); ?>
                    </select>
                </div>
               <!-- <input required class="form-control" type="text" name="mname1" placeholder="Enter Medicine Name"> -->
               <input style="background-color:black;color:white;margin-top:3px;" class="btn btn-primary" type="submit" name="pdet" value="Show Medicine Details">
              </form>
            </div>
            <div
           <br>
           <?php
             if(isset($_POST['pdet']))
             {
               $patid=$_POST['mid'];
               $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
               $sql=" SELECT * FROM medicine where mid='$patid'";
               $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
               if(mysqli_num_rows($result) > 0)
               {
                   while($row=mysqli_fetch_assoc($result))
                   {
                  ?>
                  <form action="updatemed.php" method="post">
                  <div style="padding-left:250px;padding-right:320px;font-size:larger;">
                  <div class="container">
                          <div class="row">
                          <div class="col-xs-2">
                          <h1 style="padding-top:25px;"><center>Update Medicine</center></h1>
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
             }
             else
             {
               ?> <h1><center>No Medicine present with given name</center></h1> <?php
             }
          }
               ?>

      </div>
    </div>
  </div>
  </body>
</html>
