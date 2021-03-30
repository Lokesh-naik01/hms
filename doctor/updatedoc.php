<?php include 'session.php' ?>
<?php
    $stu_id=$_POST['did'];
    $stu_name=$_POST['dname'];
    $stu_dob=$_POST['ddob'];
    $stu_spec=$_POST['dspec'];
    $stu_gen=$_POST['dgender'];
    $stu_phone=$_POST['dphone'];
    $stu_mail=$_POST['dmail'];
    $stu_address=$_POST['daddress'];
    $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
    $sql="UPDATE doctor SET dname='{$stu_name}',ddob='{$stu_dob}',dgender='{$stu_gen}',dspec='{$stu_spec}',dphone='{$stu_phone}',dmail='{$stu_mail}',daddress='{$stu_address}' WHERE did={$stu_id} ";
    $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
    ?>
    <?php include'style.php'; ?>
    <script type="text/javascript">
    Swal.fire(
'Good job!',
'You clicked the button!',
'success'
)
    </script>
    <!-- <script type="text/javascript"> alert ('<?php //echo "Successfully Updated Doctor Information"?>'); </script> -->
    <?php
    $val="Successfully Updated Doctor Information";
    echo '<script>
    alert("'.$val.'");
    window.location.href="http://localhost/lokesh/doctor/panel.php";
    </script>';
    //header("Location: http://localhost/lokesh/doclis.php");
    mysqli_close($conn);
 ?>
