<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include 'style.php' ?>
    <title>Medicine List</title>
    <style>
    .tab{
      padding-left:250px;
      padding-right:250px;
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
               <input required class="form-control" type="text" name="mname" placeholder="Enter Medicine Name">
               <input class="btn btn-primary" style="background-color:black;color:white;margin-top:3px;" id="register" type="submit" name="pdet" value="Show Medicine Details">
              </form>
           <br>
           <?php
             if(isset($_POST['pdet']))
             {
               $data=$_POST['mname'];
               $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
               $sql=" SELECT * FROM medicine where mname LIKE '%".$data."%'";
               $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
               if(mysqli_num_rows($result) > 0)
               {
                 ?>
                 <h1><center>Patient Details</center></h1>
                 <table class="table">
                     <tr style="background-color:#343434;color:white;">
                         <th>ID</th>
                         <th>Name</th>
                         <th>Cost</th>
                         <th>Number of tablets per strip</th>
                         <th>Action</th>
                     </tr>
                     <?php
                           while($row = mysqli_fetch_assoc($result) )
                           {
                      ?>
                             <tr>
                                   <td>   <?php echo $row['mid']; ?>        </td>
                                   <td>   <?php echo $row['mname']; ?>      </td>
                                   <td>   <?php echo $row['mcost']; ?>       </td>
                                   <td>   <?php echo $row['mnum']; ?>    </td>
                                   <td>
                                          <a href="mededi.php?id=<?php echo $row['mid']; ?>">Edit</a>
                                          <a style="background-color:#D22B2B"href="meddel.php?id=<?php echo $row['mid']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                   </td>
                             </tr>
                    <?php
                           }
                    ?>
                  </table>
                 <?php
               }
               else
               { ?>
                 <h1><center>No Medicine present with given name</center></h1>
                 <?php
               }
             }
             else
             {
               ?>
               <h1><center>Medicine Details</center></h1>
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
                       $sql=" SELECT * FROM medicine ORDER BY mid DESC LIMIT $start_from,$num_per_page";
                       $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
                       if(mysqli_num_rows($result) > 0)
                       {
                         ?>
                       <table class="table">
                           <tr style="background-color:#343434;color:white;">
                             <th>ID</th>
                             <th>Name</th>
                             <th>Cost</th>
                             <th>Number of tablets per strip</th>
                             <th>Action</th>
                           </tr>
                           <?php
                                 while($row = mysqli_fetch_assoc($result) )
                                 {
                            ?>
                                   <tr>
                                     <td>   <?php echo $row['mid']; ?>        </td>
                                     <td>   <?php echo $row['mname']; ?>      </td>
                                     <td>   <?php echo $row['mcost']; ?>      </td>
                                     <td>   <?php echo $row['mnum']; ?>       </td>
                                     <td>
                                            <a href="mededi.php?id=<?php echo $row['mid']; ?>">Edit</a>
                                            <a style="background-color:#D22B2B"href="meddel.php?id=<?php echo $row['mid']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                     </td>
                                   </tr>
                          <?php
                                 }
                          ?>
                 <?php } ?>
               </table>
               <?php
               $pr_query="SELECT * FROM medicine";
               $pr_result=mysqli_query($conn,$pr_query);
               $total_record=mysqli_num_rows($pr_result);

               $total_page=ceil($total_record/$num_per_page);
               ?>
               <center>
                 <?php
                 if($pag>1)
                 {
                      echo " <a href='medlis.php?pag=".($pag-1)."' class='btn btn-danger'>Previous</a> ";
                 }
                 for($i=1;$i<$total_page;$i++)
                 {
                       echo " <a href='medlis.php?pag=".$i."' class='btn btn-primary'>$i</a> ";
                 }
                 if($i>$pag)
                 {
                      echo " <a href='medlis.php?pag=".($pag+1)."' class='btn btn-danger'>Next</a> ";
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
