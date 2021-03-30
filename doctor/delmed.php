<?php include 'session.php' ?>
<?php
  $prid=$_GET['id'];
  $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
  $sql="SELECT * FROM prescribe WHERE prid={$prid}";
  $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull");
  if(mysqli_num_rows($result)>0)
  {
      while($row=mysqli_fetch_assoc($result))
      {
        $aid=$row['aid'];
      }
      $sql1="DELETE FROM prescribe WHERE prid='{$prid}'";
      $result1=mysqli_query($conn,$sql1) or die("Query Unsuccessfull");

             $val=$aid;
             echo '<script>window.location.href = "pres.php?id='.$val.'"</script>';
    }

  mysqli_close($conn);
 ?>
