<?php //include 'session.php' ?>
<?php
  $mid=$_GET['id'];
  $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
  $sql="DELETE FROM medicine WHERE mid={$mid}";
  $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull");
  header("Location:http://localhost/lokesh/medlis.php");
  mysqli_close($conn);
 ?>
