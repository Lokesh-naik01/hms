<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Book Appointment</title>
    
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
                                  <h1 style="padding-top:25px;"><center>Book Appointment</center></h1>
                                  <p>Fill the following details</p>
                                  <hr class="mb-3">
                                  <label for="pid"><b>Patient ID</b></label>
                                        <input required size="50" class="form-control" type="text" name="pid" placeholder="Enter ID">
                                  <label for="adate"><b>Date of Appointment</b></label>
                                        <input required size="50" class="form-control" type="date" name="adate">
                                  <label for="did"><b>Doctor</b></label>
                                        <div>
                                            <select  class="form-control" name="did">
                                              <option value="" selected disabled>Select Doctor</option>
                                                  <?php
                                                        $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                                                        $sql=" SELECT * FROM doctor";
                                                        $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
                                                        while($row= mysqli_fetch_assoc($result))
                                                        {
                                                  ?>
                                              <option value= "<?php echo $row['did']; ?>"><?php echo $row['dname'];?></option>
                                                  <?php }
                                                  mysqli_close($conn); ?>
                                            </select>
                                       </div>
                                    <hr class="mb-3">
                                    <input class="btn btn-primary" type="submit" name="padd" value="Book Appointment">
                                    <input class="btn btn-primary" type="reset"  value="Reset">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
              <?php
                    if(isset($_POST['padd']))
                    {
                        $pid=$_POST['pid'];
                        $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                        $sql=" SELECT * FROM patient where pid='$pid'";
                        $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull sql.");
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row=mysqli_fetch_assoc($result))
                            {
                                      $pname=$row['pname'];
                            }
                            $did=$_POST['did'];
                            $adate=$_POST['adate'];
                            $sql1="SELECT * FROM doctor where did='$did' ";
                            $result1=mysqli_query($conn,$sql1) or die("Query Unsuccessfull sql10.");
                            while($row1=mysqli_fetch_assoc($result1))
                            {
                                    $dname=$row1['dname'];
                            }
                            $bdate=date("Y-m-d");
                            if($adate<$bdate)
                            {?>
                                   <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                                   <script src="sweetalert2.all.min.js"></script>
                                   <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
                                   <?php
                                   echo "<script>
                                   Swal.fire({
                                     title: 'Error',
                                     text: 'Appointment Date should Be Greater Than Todays Date',
                                     icon: 'error',
                                     confirmButtonText: 'OK'
                                   })

                                   </script>";?>
                            <?php
                            }
                            else
                            {
                                    $sql2="INSERT INTO appointment(pid,pname,did,dname,adate,bdate) VALUES ('{$pid}','{$pname}','{$did}','{$dname}','{$adate}','{$bdate}') ";
                                    if($conn->query($sql2)===true)
                                    {?>
                                           <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                                           <script src="sweetalert2.all.min.js"></script>
                                           <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
                                           <?php
                                            $val="The newly Appointment Id is:".$conn->insert_id ;
                                            echo '<script>alert("'.$val.'");
                                                    window.location.href="http://localhost/lokesh/appview.php";
                                                  </script>';
                                           ?>
                                    <?php
                                    }
                                    else
                                    {
                                            echo "Error: " . $sql2 . "<br>" . $conn->error;
                                    }
                            }
                        }
                         else
                         {?>
                                <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                                <script src="sweetalert2.all.min.js"></script>
                                <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
                                <?php
                                echo "<script>
                                Swal.fire({
                                  title: 'No Patient With Given ID',
                                  icon: 'error',
                                  confirmButtonText: 'OK'
                                })

                                </script>";?>
                                <!-- <script type="text/javascript">alert("No patient With Given ID");</script> -->
                         <?php
                         }
                    }?>
          </div>
      </div>
    </div>
  </body>
</html>
