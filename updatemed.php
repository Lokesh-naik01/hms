<?php include 'session.php' ?>
<?php
    $stu_id=$_POST['mid'];
    $stu_name=$_POST['mname'];
    $stu_cost=$_POST['mcost'];
    $stu_num=$_POST['mnum'];

    $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
    $sql="UPDATE medicine SET mname='{$stu_name}',mcost='{$stu_cost}',mnum='{$stu_num}' WHERE mid={$stu_id} ";
    $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");

    $val="Successfully Updated Medicine Details";
    echo '<script>
    alert("'.$val.'");
    window.location.href="http://localhost/lokesh/medlis.php";
    </script>';
    mysqli_close($conn);
 ?>
