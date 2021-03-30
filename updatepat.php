<?php include 'session.php' ?>
<?php
    //include 'style.php';
    $stu_id=$_POST['pid'];
    $stu_name=$_POST['pname'];
    $stu_dob=$_POST['pdob'];
    $stu_gen=$_POST['pgender'];
    $stu_phone=$_POST['pphone'];
    $stu_mail=$_POST['pmail'];
    $stu_address=$_POST['paddress'];
    $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
    $sql="UPDATE patient SET pname='{$stu_name}',pdob='{$stu_dob}',pgender='{$stu_gen}',pphone='{$stu_phone}',pmail='{$stu_mail}',paddress='{$stu_address}' WHERE pid={$stu_id} ";
    $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");

    $val="Patient Deatils Updated";
    echo '<script>
    alert("'.$val.'");
    window.location.href="http://localhost/lokesh/patlis.php";
    </script>';
    //echo "<script> window.location.href='http://localhost/lokesh/patlis.php';
        //  alert('Patient Details Updated');</script>";
    mysqli_close($conn);
 ?>
