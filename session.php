<?php
  //$conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
  session_start();
  if(!isset($_SESSION["username"])){
    echo '<script>
    window.location.href="http://localhost/lokesh/";
    </script>';
  }
 ?>
