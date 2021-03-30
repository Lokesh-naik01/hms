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
              <div style="padding-left:200px;padding-right:100px;font-size:larger;">
                <div class="container">
                  <div class="row">
                  <div class="col-xs-2">
                  <h1 style="padding-top:25px;"><center>AddPrescription</center></h1>
                  <p>Fill the following details</p>
                  <hr class="mb-3">
                  <?php
                        $aid=$_GET['id'];
                        $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                        $sql=" SELECT * FROM appointment WHERE aid='$aid'";
                        $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
                        while($row= mysqli_fetch_assoc($result))
                  {
                   ?>
                   <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                     <label for="pid" class="col-sm-2 col-form-label"><b>Patient ID</b></label>
                       <div class="col-sm-7" style="margin-left:50px;">
                         <input type="text"  readonly class="form-control" name="pid" value="<?php echo $row['pid']; ?>">
                       </div>
                   </div>
                      <!-- <label for="pid"><b>Patient ID</b></label>
                            <input required class="form-control" type="text" name="pid" value="<?php echo $row['pid']; ?>"> -->
                  <?php }
                  mysqli_close($conn);
                  ?>



                        <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                          <label for="mid" class="col-sm-2 col-form-label"><b>Medicine</b></label>
                            <div class="col-sm-7" style="margin-left: 50px;">
                              <select required class="form-control" name="mid">
                                    <option required value="" selected disabled>Select Medicine</option>
                                        <?php
                                                $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                                                $sql=" SELECT * FROM medicine";
                                                $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
                                                while($row= mysqli_fetch_assoc($result))
                                                {
                                              ?>
                                          <option value= "<?php echo $row['mid']; ?>"><?php echo $row['mname'];?></option>
                                          <?php }
                                              mysqli_close($conn); ?>
                            </select>

                            </div>
                        </div>








                        <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                          <label for="mquan" class="col-sm-2 col-form-label"><b>No of Units</b></label>
                            <div class="col-sm-7"style="margin-left: 50px;">
                              <input type="text" required class="form-control" name="mquan" placeholder="Enter Number of units">
                            </div>
                        </div>

                        <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                          <label for="mmrng" class="col-sm-2 col-form-label"><b>Morning</b></label>
                            <div class="col-sm-7"style="margin-left: 50px;">
                              <input type="text" required class="form-control" name="mmrng" placeholder="Enter Number per morning">
                            </div>
                        </div>

                        <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                          <label for="maft" class="col-sm-2 col-form-label"><b>Afternoon</b></label>
                            <div class="col-sm-7"style="margin-left: 50px;">
                              <input type="text" required class="form-control" name="maft" placeholder="Enter Number per afternoon">
                            </div>
                        </div>

                        <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                          <label for="mevng" class="col-sm-2 col-form-label"><b>Evening</b></label>
                            <div class="col-sm-7"style="margin-left: 50px;">
                              <input type="text" required class="form-control" name="mevng" placeholder="Enter Number per Evening">
                            </div>
                        </div>

                        <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                          <label for="ndays" class="col-sm-2 col-form-label"><b>No of Days</b></label>
                            <div class="col-sm-7"style="margin-left: 50px;">
                              <input type="text" required class="form-control" name="ndays" placeholder="Enter Number of daya">
                            </div>
                        </div>


                      <!-- <label for="mquan"><b>No of Units</b></label>
                              <input required class="form-control" type="text" name="mquan" placeholder="Enter Number of units">
                      <label for="mmrng"><b>Morning</b></label>
                              <input required class="form-control" type="text" name="mmrng" placeholder="Enter Number per morning">
                      <label for="maft"><b>Afternoon</b></label>
                              <input required class="form-control" type="text" name="maft"  placeholder="Enter Number per afternoon">
                      <label for="mevng"><b>Evening</b></label>
                              <input required class="form-control" type="text" name="mevng" placeholder="Enter Number per evening">
                      <label for="ndays"><b>Number Of Days</b></label>
                              <input required class="form-control" type="text" name="ndays" placeholder="Enter Number Of days"> -->
                      <div class="form-group row" style="margin-right:20px;padding-top:10px;">
                          <label for="remarks" class="col-sm-2 col-form-label"><b>Remarks</b></label>
                              <div class="col-sm-7"style="margin-left: 50px;">
                                  <textarea class="form-control" name="remarks" rows="3"></textarea>
                              </div>
                      </div>

                  <hr class="mb-3">
                      <input style="margin-left:350px;"class="btn btn-primary" id="register" type="submit" name="padd" value="Prescribe Medicine" onclick="return mess();">
                  </div>
                  </div>
              </div>
          </div>
          </form>
          <?php
          if(isset($_POST['padd']))
          {

              $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
              $sql=" SELECT * FROM appointment where aid='$aid'";
              $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull sql.");
              if(mysqli_num_rows($result)>0)
              {
                  while($row=mysqli_fetch_assoc($result))
                  {
                            $pname=$row['pname'];
                            $pid=$row['pid'];
                            $did=$row['did'];
                  }
                  $mid=$_POST['mid'];
                  $sql5=" SELECT * FROM medicine where mid='$mid'";
                  $result5=mysqli_query($conn,$sql5) or die("Query Unsuccessfull sql.");
                  while($row5=mysqli_fetch_assoc($result5))
                  {
                      $mname=$row5['mname'];
                  }
                  // $mname=$_POST['mname'];
                  $mquan=$_POST['mquan'];
                  $mmrng=$_POST['mmrng'];
                  $maft=$_POST['maft'];
                  $mevng=$_POST['mevng'];
                  $ndays=$_POST['ndays'];
                  $remarks=$_POST['remarks'];
                  $sql1="INSERT INTO prescribe(aid,mid,mname,mquan,mmrng,maft,mevng,remarks,pid,did,ndays) VALUES('{$aid}','{$mid}','{$mname}','{$mquan}','{$mmrng}','{$maft}','{$mevng}','{$remarks}','{$pid}','{$did}','{$ndays}') ";
                  $result1=mysqli_query($conn,$sql1) or die("Query Unsuccessfull sql.");
                  // if(conn->query(sql1)==true)
                  // {
                    //$data=$conn->insert_id;
                    $val=$aid;
                    echo '<script>window.location.href = "pres.php?id='.$val.'"</script>';
                  //}
             }
          }
           ?>
        </div>
    </div>
  </div>
  </body>
</html>
