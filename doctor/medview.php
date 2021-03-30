<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Medical History</title>
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
            $prid=$_GET['id'];
            //echo $prid;
            $sql="SELECT * FROM prescribe where prid='{$prid}' ";
            $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.".mysqli_error());
            if(mysqli_num_rows($result)>0)
            {
              while($row=mysqli_fetch_assoc($result))
              {
             ?>
            <form action="updatemed.php" method="post">
                <div style="padding-left:200px;padding-right:200px;font-size:larger;">
                  <div class="container">
                    <div class="row">
                    <div class="col-xs-2">
                    <h1 style="padding-top:25px;"><center>Prescription</center></h1>
                    <hr class="mb-3">
                    <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                      <label for="pid" class="col-sm-2 col-form-label"><b>Patient ID</b></label>
                        <div class="col-sm-7" style="margin-left:50px;">
                          <input type="hidden" name="prid" value="<?php echo $row['prid']; ?>">
                          <input type="hidden" name="aid" value="<?php echo $row['aid']; ?>">
                          <input type="hidden" name="did" value="<?php echo $row['did']; ?>">
                          <input type="text" readonly class="form-control" name="pid" value="<?php echo $row['pid']; ?>">
                        </div>
                    </div>


                    <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                      <label for="mid" class="col-sm-2 col-form-label"><b>Medicine</b></label>
                        <div class="col-sm-7" style="margin-left:50px;">
                          <div>
                              <?php
                              $sql1="SELECT * FROM medicine";
                              $result1=mysqli_query($conn,$sql1) or die("Query Unsuccessfull.");
                              if(mysqli_num_rows($result1) > 0)
                              {
                                  echo ' <select name="mname" class="form-control">';
                                      while($row1=mysqli_fetch_assoc($result1)){
                                        if($row['mid']==$row1['mid'])
                                        {
                                          $select="selected";
                                        }
                                        else {
                                          $select="";
                                        }
                                        echo "<option {$select} value='{$row1['mid']}'>{$row1['mname']}</option>";
                                }
                              echo "</select>";
                            }
                              ?>
                          </div>

                        </div>
                      </div>

                        <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                          <label for="mquan" class="col-sm-2 col-form-label"><b>No of Units</b></label>
                            <div class="col-sm-7" style="margin-left:50px;">
                              <input type="text" readonly class="form-control" name="mquan" value="<?php echo $row['mquan']; ?>">
                            </div>
                        </div>

                        <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                          <label for="mmrng" class="col-sm-2 col-form-label"><b>Morning</b></label>
                            <div class="col-sm-7" style="margin-left:50px;">
                              <input required readonly class="form-control" type="text" name="mmrng" value="<?php echo $row['mmrng']; ?>">

                            </div>
                        </div>

                        <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                          <label for="maft" class="col-sm-2 col-form-label"><b>Afternoon</b></label>
                            <div class="col-sm-7" style="margin-left:50px;">
                              <input required readonly class="form-control" type="text" name="maft" value="<?php echo $row['maft']; ?>">
                            </div>
                        </div>

                        <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                          <label for="mevng" class="col-sm-2 col-form-label"><b>Evening</b></label>
                            <div class="col-sm-7" style="margin-left:50px;">
                              <input required readonly class="form-control" type="text" name="mevng" value="<?php echo $row['mevng']; ?>">
                            </div>
                        </div>

                        <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                          <label for="ndays" class="col-sm-2 col-form-label"><b>No of Days</b></label>
                            <div class="col-sm-7" style="margin-left:50px;">
                              <input required readonly class="form-control" type="text" name="ndays" value="<?php echo $row['ndays']; ?>">
                            </div>
                        </div>


                        <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                            <label for="remarks" class="col-sm-2 col-form-label"><b>Remarks</b></label>
                                <div class="col-sm-7" style="margin-left:50px;">
                                    <textarea readonly class="form-control" name="remarks" rows="3"><?php echo $row['remarks']; ?></textarea>
                                </div>
                        </div>

                    <hr class="mb-3">
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
