<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include 'style.php' ?>
    <title>Medical History</title>
    <style>
    .column1{
      height:830px;
    }
    .tab{
      padding-left:50px;
      padding-right:50px;
    }
    table,td,th{
      border:1px solid black;
      text-align:center;
      background-color: #FFFAFA;
    }

    .tab{
      overflow:auto;
    }
    td a{
      text-decoration: none;
      background-color: orange;
      font-weight: bold;
      color: #fff;
      border-radius: 3px;
      padding: 5px;
      text-align: center;
    }
    td a:hover{
      color:black;
    }
    table tr th{
      /* font-weight: bold; */
      background-color: black;
    }
    </style>
  </head>
  <body>
    <?php include 'header.php' ?>
    <div class="row2">
      <?php include 'sidebar.php' ?>
      <div class="column1 right1">
        <div class="tab">
          <!-- <form style="padding-top:10px;"class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="aid"></label>
            <input class="form-control" type="text" name="aid" required placeholder="Enter Appointment ID">
            <input class="btn btn-primary" id="register" style="background-color:black;color:white;margin-top:3px;" type="submit" name="pdet" value="Show Medical Details">
          </form> -->
          <br>
          <div class="" style="padding-top:50px;">

          </div>
          <?php

            if(isset($_POST['pdet'])||($_GET['id']))
            {
              if(($_GET['id']))
              {
                $aid=$_GET['id'];
              }
              else
              {
                $aid=$_POST['aid'];
              }
              $dval=$_SESSION["docid"];
              $adval=date("Y-m-d");
              $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
              $sql="SELECT * FROM appointment WHERE (aid='$aid' AND did='$dval')";
              $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.". mysqli_error());
              if(mysqli_num_rows($result)>0)
              {
                while($row=mysqli_fetch_assoc($result))
                {
                  $pname=$row['pname'];
                  $pid=$row['pid'];
                  $dname=$row['did'];
                }
                $sql1="SELECT * FROM prescribe WHERE (aid='$aid' AND did='$dval')";
                $result1=mysqli_query($conn,$sql1) or die("Query Unsuccessfull.". mysqli_error());
                if(mysqli_num_rows($result1) > 0)
                {
                  ?>
                  <h1><center>Medical History</center></h1>
                  <table class="table">
                    <tr style="background-color:#343434;color:white;">
                      <th rowspan="2" style="padding-top:25px;">App ID</th>
                      <th rowspan="2" style="padding-top:25px;">Patient Name</th>
                      <th rowspan="2" style="padding-top:25px;">Medicine Name</th>
                      <th rowspan="2" style="padding-top:25px;">No of units</th>
                      <th colspan="3" >Dosage</th>
                      <th rowspan="2" style="padding-top:25px;">No of Days</th>
                      <th rowspan="2" style="padding-top:25px;">Remarks</th>
                      <th rowspan="2" style="padding-top:25px;">Action</th>

                    </tr>
                    <tr style="background-color:#343434;color:white;">
                      <th>Morning</th>
                      <th>Afternoon</th>
                      <th>Evng</th>
                    </tr>
                      <?php
                        while($row1=mysqli_fetch_assoc($result1))
                        {
                          ?>
                          <tr>
                            <td>   <?php echo $row1['aid']; ?>        </td>
                            <td>   <?php echo $pname; ?>              </td>
                            <td>   <?php echo $row1['mname']; ?>       </td>
                            <td>   <?php echo $row1['mquan']; ?>    </td>
                            <td>   <?php echo $row1['mmrng']; ?>    </td>
                            <td>   <?php echo $row1['maft']; ?>        </td>
                            <td>   <?php echo $row1['mevng']; ?>      </td>
                            <td>   <?php echo $row1['ndays']; ?>    </td>
                            <td>   <?php echo $row1['remarks']; ?>       </td>
                            <td>
                              <a href="medview.php?id=<?php echo $row1['prid']; ?>">View</a>
                            </td>

                          </tr>
                          <?php
                        }

                            mysqli_close($conn);
                     ?>
                   </table>
                  <?php
                }
                else
                {
                  //echo $pname;
                  ?>

                  <h1><center>No medicines prescribed</center></h1>
                <?php
                }?>
                
                 <?php
              }
              // else
              // {
              //     echo "No appointment ID or no appointment today";
              // }
            }
           ?>
        </div>
      </div>
    </div>
  </body>
</html>
