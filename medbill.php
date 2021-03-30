<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Medical Bill</title>
    <?php include 'style.php' ?>
    <style>
      .tab{
        padding-left:150px;
        padding-right:150px;
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
            <h1 style="padding-top:50px;padding-bottom:50px;"><center>Medical Bill</center></h1>
             <?php
               // if(isset($_POST['pdet']))
               // {
                 $data=$_GET['id'];
                 $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                 $sql=" SELECT * FROM prescribe where aid='$data' ";
                 //$sql=" SELECT * FROM prescribe where ((pid='$data' OR aid='$data') AND did='$dval') ";
                 $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.". mysqli_error());
                 if(mysqli_num_rows($result) > 0)
                 {
                   ?>
                   <table class="table">
                       <tr style="background-color:#343434;color:white;">
                           <th>Sl No</th>
                           <th>Medicine Name</th>
                           <th>Quantity</th>
                           <th>Cost per Stripe</th>
                           <th>Amount</th>
                       </tr>
                       <?php
                            $i=1;
                            $sum=0;
                             while($row = mysqli_fetch_assoc($result) )
                             {
                        ?>
                               <tr>
                                     <td>   <?php echo $i; ?>        </td>
                                     <td>   <?php echo $row['mname']; ?>      </td>
                                     <td>   <?php echo $row['mquan']; ?>      </td>
                                     <td>
                                       <?php
                                          $mval=$row['mid'];
                                          $sql2=" SELECT * FROM medicine where mid='$mval' ";
                                          $result2=mysqli_query($conn,$sql2) or die("Query Unsuccessfull.". mysqli_error());
                                          while($row2=mysqli_fetch_assoc($result2))
                                          {
                                            $pro=$row2['mcost'];
                                          }
                                          echo $pro;
                                          $fval=($pro)*($row['mquan']);
                                          //echo ($pro)*($row['mquan']);
                                          $sum=$sum+$fval;
                                        ?>
                                     </td>
                                     <td> <?php echo $fval; ?></td>
                               </tr>
                      <?php
                            $i=$i+1;
                             }

                             mysqli_close($conn);
                      ?>
                      <tr>
                        <td>  <?php echo $i; ?></td>
                        <td>   Visiting Charges</td>
                        <td></td>
                        <td></td>
                        <td>    200 </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>Total</td>
                        <td></td>
                        <td></td>
                        <td> <?php echo $sum+200; ?></td>
                      </tr>
                    </table>
                   <?php

                 }
                 ?>
          </div>

      </div>
    </div>
  </div>
  </body>
</html>
