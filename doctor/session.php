<?php
  $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
  session_start();
  if(!isset($_SESSION["docid"])){
    echo '<script>
    window.location.href="http://localhost/lokesh/doctor";
    </script>';
  }
 ?>
