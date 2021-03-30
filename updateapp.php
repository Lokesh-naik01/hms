<?php include 'session.php' ?>
<?php
    $aid=$_POST['aid'];
    $pid=$_POST['pid'];
    $adate=$_POST['adate'];
    //$did=$_POST['did'];
    $did=$_POST['dname'];
    $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");



    $sql=" SELECT * FROM patient where pid='$pid' ";
    $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull sql.");
    if(mysqli_num_rows($result)>0)
    {
       while($row=mysqli_fetch_assoc($result))
       {
         $pname=$row['pname'];
       }
    }
    else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }



    $sql1=" SELECT * FROM doctor where did='$did' ";
    $result1=mysqli_query($conn,$sql1) or die("Query Unsuccessfull sql1.");
    if(mysqli_num_rows($result1)>0)
    {
       while($row1=mysqli_fetch_assoc($result1))
       {
         $dname=$row1['dname'];
       }
    }
    else {
      echo "Error: " . $sql1 . "<br>" . $conn->error;
    }



    $bdate=date("Y-m-d");
    if($adate<$bdate)
    {?>
           <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
           <script src="sweetalert2.all.min.js"></script>
           <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
           <?php
           $val="Appointment Date should be greater than Todays Date";
           $link="http://localhost/lokesh/appedi.php?id=$aid";
           echo '<script>alert("'.$val.'");
                   window.location.href="'.$link.'";
                 </script>';
           mysqli_close($conn);
    }
    else
    {
      $sql2="UPDATE appointment SET pid='{$pid}',pname='{$pname}',did='{$did}',dname='{$dname}',adate='{$adate}',bdate='{$bdate}' WHERE aid='{$aid}' ";
      $result2=mysqli_query($conn,$sql2) or die("Query Unsuccessfull .");
      $val="Appointment Details Successfully Updated";
      echo '<script>alert("'.$val.'");
              window.location.href="http://localhost/lokesh/appview.php";
            </script>';
      mysqli_close($conn);
    }
 ?>
