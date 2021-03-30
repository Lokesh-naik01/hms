<?php include 'session.php' ?>
<?php
  $aid=$_GET['id'];
  $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
  $sql1="SELECT * FROM appointment WHERE aid={$aid}";
  $result1=mysqli_query($conn,$sql1) or die("Query Unsuccessfull");
  if(mysqli_num_rows($result1)>0)
  {
    while($row = mysqli_fetch_assoc($result1))
    {
      $stat=$row['Status'];
    }
    if($stat=='No')
    {
      $sql1="DELETE FROM appointment WHERE aid='{$aid}'";
      $result1=mysqli_query($conn,$sql1) or die("Query Unsuccessfull");
      ?>
             <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
             <script src="sweetalert2.all.min.js"></script>
             <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
             <?php
             $val="Appointment deleted";
             echo '<script>
                     window.location.href="http://localhost/lokesh/appview.php";
                   </script>';
            ?>
      <?php
    }
    else
    {?>
           <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
           <script src="sweetalert2.all.min.js"></script>
           <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
           <?php
           $val="Appointment Status is Completed Can't be deleted";
           echo '<script>alert("'.$val.'");
                   window.location.href="http://localhost/lokesh/appview.php";
                 </script>';
          ?>
    <?php

    }
  }
  mysqli_close($conn);
 ?>
