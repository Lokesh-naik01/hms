<?php //include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Cancel Appointment</title>
    <?php include 'style.php' ?>
    <style>
      h1{
        padding-top: 50px;
        text-align: center;
      }
      .tab{
        font-size: 30px;
        padding-top:10px;
        padding-left:150px;
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
        <h1>Cancel Appointment</h1>
          <div class="tab">
              <form action="<?php $_SERVER['PHP_SELF']; ?>" style="padding-top:20px;" method="post">
                <label for="aid">Appointment ID</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <input required type="text" name="aid" placeholder="Enter Appointment ID"> <br>
               <input style="background-color:black;color:white;margin-top:3px;margin-left:260px;" style="margin-left:260px;"class="btn btn-primary" type="submit" name="pdet" onclick="return confirm('Are you sure you want to delete this item?');" value="Cancel Appointment">
              </form>
              <?php
                if(isset($_POST['pdet']))
                {
                  $aid=$_POST['aid'];
                  $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                  $sql="SELECT * FROM appointment WHERE aid='{$aid}'";
                  $result=mysqli_query($conn,$sql);
                  if(mysqli_num_rows($result)>0)
                  {
                      while($row=mysqli_fetch_assoc($result))
                      {
                        $stat=$row['Status'];
                      }
                      if($stat==='No')
                      {
                        $sql1="DELETE FROM appointment WHERE aid='{$aid}'";
                        $result1=mysqli_query($conn,$sql1) or die("Query Unsuccessfull");
                        ?>
                               <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                               <script src="sweetalert2.all.min.js"></script>
                               <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
                               <?php
                               echo "<script>
                               Swal.fire(
                                  '',
                                  'Appointment Deleted Successfully',
                                  'success'
                                  )
                               </script>";?>
                        <?php
                      }
                      else
                      {?>
                             <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                             <script src="sweetalert2.all.min.js"></script>
                             <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
                             <?php
                             echo "<script>
                             Swal.fire({
                               text: 'Appointment Completed Cannot Delete',
                               confirmButtonText: 'OK'
                             })

                             </script>";?>
                      <?php
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
                           text: 'No Appointment with Given ID',
                           confirmButtonText: 'OK'
                         })

                         </script>";?>
                  <?php
                  }
                }
               ?>
      </div>
    </div>
  </div>
  </body>
</html>
