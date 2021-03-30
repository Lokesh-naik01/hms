<?php
    $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");

     session_start();

     session_unset();

     session_destroy();
     echo '<script>
     window.location.href="http://localhost/lokesh/doctor/";
     </script>';
    //header("Location :http://localhost/lokesh/doctor");
 ?>
