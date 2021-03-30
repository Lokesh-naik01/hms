<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Doctor List</title>
    <?php include 'style.php' ?>
    <style>
    .tab{
      padding-left:100px;
      padding-right:100px;
    }
    table,td{
      border:1px solid black;
      text-align:left;
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
              <form style="padding-top:20px;"action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
               <input required class="form-control" type="text" name="pid" placeholder="Enter Doctor ID or Name">
               <input class="btn btn-primary" style="background-color:black;color:white;margin-top:3px;" id="register" type="submit" name="pdet" value="Show Doctor Details">
              </form>
           <br>
           <?php
             if(isset($_POST['pdet']))
             {
               $data=$_POST['pid'];
               $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
               $sql=" SELECT * FROM doctor where did='$data' OR dname LIKE '%".$data."%'";
               $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
               if(mysqli_num_rows($result) > 0)
               {
                 ?>
                 <h1><center>Patient Details</center></h1>
                 <table class="table">
                     <tr style="background-color:#343434;color:white;">
                         <th>ID</th>
                         <th>Name</th>
                         <th>Date Of Birth</th>
                         <th>Specialization</th>
                         <th>Gender</th>
                         <th>Phone</th>
                         <th>Mail</th>
                         <th>Address</th>
                         <th>Action</th>
                     </tr>
                     <?php
                           while($row = mysqli_fetch_assoc($result) )
                           {
                      ?>
                             <tr>
                                   <td>   <?php echo $row['did']; ?>        </td>
                                   <td>   <?php echo $row['dname']; ?>      </td>
                                   <td>   <?php echo $row['ddob']; ?>       </td>
                                   <td>   <?php echo $row['dspec']; ?>       </td>
                                   <td>   <?php echo $row['dgender']; ?>    </td>
                                   <td>   <?php echo $row['dphone']; ?>     </td>
                                   <td>   <?php echo $row['dmail']; ?>     </td>
                                   <td>   <?php echo $row['daddress']; ?>     </td>
                                   <div class="tags">
                                     <td>
                                            <a href="docedi.php?id=<?php echo $row['did']; ?>">Edit</a>
                                     </td>

                                   </div>
                             </tr>
                    <?php
                           }
                    ?>
                  </table>
                 <?php
               }
               else
               { ?>
                 <h1><center>No Doctor present</center></h1>
                 <?php
               }
             }
             else
             {
               ?>
               <h1><center>Doctor Details</center></h1>
               <?php
                 $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                 if(isset($_GET['pag']))
                 {
                   $pag=$_GET['pag'];
                 }
                 else
                 {
                   $pag=1;
                 }
                       $num_per_page=10;
                       $start_from=($pag-1)*10;
                       $sql=" SELECT * FROM doctor  ORDER BY did DESC LIMIT $start_from,$num_per_page";
                       $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
                       if(mysqli_num_rows($result) > 0)
                       {
                         ?>
                       <table class="table">
                           <tr style="background-color:#343434;color:white;text-align:center;">
                               <th>ID</th>
                               <th>Name</th>
                               <th>Date Of Birth</th>
                               <th>Specialization</th>
                               <th>Gender</th>
                               <th>Phone</th>
                               <th>Mail</th>
                               <th>Address</th>
                               <th>Action</th>
                           </tr>
                           <?php
                                 while($row = mysqli_fetch_assoc($result) )
                                 {
                            ?>
                                   <tr>
                                         <td>   <?php echo $row['did']; ?>        </td>
                                         <td>   <?php echo $row['dname']; ?>      </td>
                                         <td>   <?php echo $row['ddob']; ?>       </td>
                                         <td>   <?php echo $row['dspec']; ?>       </td>
                                         <td>   <?php echo $row['dgender']; ?>    </td>
                                         <td>   <?php echo $row['dphone']; ?>     </td>
                                         <td>   <?php echo $row['dmail']; ?>     </td>
                                         <td>   <?php echo $row['daddress']; ?>     </td>
                                         <td>
                                                <a href="docedi.php?id=<?php echo $row['did']; ?>" >Edit</a>
                                         </td>
                                   </tr>
                          <?php
                                 }
                          ?>
                 <?php } ?>
               </table>
               <?php
               $pr_query="SELECT * FROM doctor";
               $pr_result=mysqli_query($conn,$pr_query);
               $total_record=mysqli_num_rows($pr_result);

               $total_page=ceil($total_record/$num_per_page);
               ?>
               <center>
                 <?php
                 if($pag>1)
                 {
                      echo " <a href='patlis.php?pag=".($pag-1)."' class='btn btn-danger'>Previous</a> ";
                 }
                 for($i=1;$i<$total_page;$i++)
                 {
                       echo " <a href='patlis.php?pag=".$i."' class='btn btn-primary'>$i</a> ";
                 }
                 if($i>$pag)
                 {
                      echo " <a href='patlis.php?pag=".($pag+1)."' class='btn btn-danger'>Next</a> ";
                 }
                 ?>
               </center>
         <?php
         mysqli_close($conn);
       }
             ?>
        </div>
    </div>
  </div>
  </body>
</html>
