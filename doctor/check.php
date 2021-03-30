<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include 'style.php' ?>
    <title>Home</title>
    <!-- <style>
      .hi{
        padding-top: 200px;
        letter-spacing: 1px;
        font-size: 90px;
        text-align: center;
        color: #595959;
      }
    </style> -->
  </head>
  <body>
    <?php include 'header.php' ?>
    <div class="row2">
      <?php include 'sidebar.php' ?>
      <div class="column1 right1">
        <div >
          <h1 style="padding-top:20px;"><center>Patient Check Up</center></h1>
          <?php
          $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
          $pat_id=$_GET["id"];
          $sql="SELECT * FROM appointment where aid={$pat_id} ";
          $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
          if(mysqli_num_rows($result)>0)
          {
            while($row=mysqli_fetch_assoc($result))
            {?>
              <form action="" method="post" style="padding-left:250px;">
                <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                  <label for="aid" class="col-sm-2 col-form-label"><b>Appointment ID</b></label>
                    <div class="col-sm-7">
                      <input type="text" readonly class="form-control" name="aid" value="<?php echo $row['aid']; ?>">
                    </div>
                </div>
                <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                  <label for="pid" class="col-sm-2 col-form-label"><b>Patient ID</b></label>
                    <div class="col-sm-7">
                      <input type="text" readonly class="form-control" name="pid" value="<?php echo $row['pid']; ?>">
                    </div>
                </div>
                <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                  <label for="pname" class="col-sm-2 col-form-label"><b>Patient Name</b></label>
                    <div class="col-sm-7">
                      <input type="text" readonly class="form-control" name="pname" value="<?php echo $row['pname']; ?>">
                    </div>
                </div>
                <!-- <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                  <label for="Status" class="col-sm-2 col-form-label"><b>Remarks</b></label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="Status">
                    </div>
                </div> -->
                <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                  <label for="remarks" class="col-sm-2 col-form-label"><b>Remarks</b></label>
                  <div class="col-sm-7">
                      <textarea class="form-control" name="remarks"  rows="3"><?php echo $row['Remarks']; ?></textarea>
                      <!-- <textarea onkeyup="textAreaAdjust(this)" class="form-control" placeholder="Add a new answer" rows="1"></textarea>
                      <script type="text/javascript">
                            function textAreaAdjust(o) {
                            o.style.height = "1px";     o.style.height = (25+o.scrollHeight)+"px"; }
                      </script> -->
                  </div>
                </div>
                <br>
                <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                  <div class="col-sm-7">
                  <div style="padding-left:175px;">
                    <input type="submit" class="btn btn-primary" name="sub" value="Update">
                    <input type="reset" class="btn btn-primary" name="submit" value="Reset">
                  </div>

                 </div>
              </div>
          </form>
           <?php }
         }
         ?>
         <?php
                if(isset($_POST['sub']))
                {
                  $re=$_POST['remarks'];
                  $st="Yes";
                  $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                  $sql="UPDATE appointment SET Remarks='{$re}',Status='{$st}' WHERE aid={$pat_id}";
                  $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
                  $val="Patient Treated";
                  echo '<script>
                  alert("'.$val.'");
                  window.location.href="http://localhost/lokesh/doctor/apptod.php";
                  </script>';
                  mysqli_close($conn);
                }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
