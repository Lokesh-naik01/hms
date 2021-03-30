<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title>Medical History</title>
    <?php include 'style.php' ?>
    <style>
      .tab{
        padding-left:100px;
        padding-right:100px;
      }
      table,td{
        border:1px solid black;
        text-align:center;
        background-color: #FFFAFA;
      }
      th{
        border:1px solid black;
        text-align:center;
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
        font-weight: bold;
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
              <form style="padding-top:20px"action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
               <input required class="form-control" type="text" name="aid" placeholder="Enter Appointment ID or Patient Details">
               <input class="btn btn-primary" id="register" style="background-color:black;color:white;margin-top:3px;" type="submit" name="pdet" value="Show Appointment Details">
              </form>
           <br>
           <?php
             if(isset($_POST['pdet']))
             {
               $data=$_POST['aid'];
               $dval=$_SESSION["docid"];
               $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
               $sql=" SELECT * FROM appointment where ((pid='$data' OR aid='$data' OR pname LIKE '%".$data."%') AND did='$dval') ";
               //$sql=" SELECT * FROM prescribe where ((pid='$data' OR aid='$data') AND did='$dval') ";
               $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.". mysqli_query());
               if(mysqli_num_rows($result) > 0)
               {
                 ?>
                 <h1><center>Appointment Details</center></h1>
                 <table class="table">
                     <tr style="background-color:#343434;color:white;">
                         <th>Appointment ID</th>
                         <th>Patient ID</th>
                         <th>Patient Name</th>
                         <th>Date of Appointment</th>
                         <th>Action</th>
                     </tr>
                     <?php
                           while($row = mysqli_fetch_assoc($result) )
                           {
                      ?>
                             <tr>
                                   <td>   <?php echo $row['aid']; ?>        </td>
                                   <td>   <?php echo $row['pid']; ?>      </td>
                                   <td>   <?php echo $row['pname']; ?>      </td>
                                   <td>   <?php echo $row['adate']; ?>    </td>
                                   <td style="text-align:center;">
                                          <a target="_blank"href="presall.php?id=<?php echo $row['aid']; ?>">View</a>
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
               { ?>
                 <h1><center>No Appointment with given ID</center></h1>
                 <?php
               }
             }?>
             <script type="text/javascript">
               if(window.history.replaceState){
                 window.history.replaceState(null,null,window.location.href)
               }
             </script>
      </div>
    </div>
  </div>
  </body>
</html>
