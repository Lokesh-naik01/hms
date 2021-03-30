<?php include 'session.php' ?>
<?php
    $aid=$_POST['aid'];
    //$mname=$_POST['mid'];
    $mid=$_POST['mname'];
    $mquan=$_POST['mquan'];
    $mmrng=$_POST['mmrng'];
    $maft=$_POST['maft'];
    $mevng=$_POST['mevng'];
    $remarks=$_POST['remarks'];
    $pid=$_POST['pid'];
    $did=$_POST['did'];
    $ndays=$_POST['ndays'];
    $prid=$_POST['prid'];
    $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
    $sql1="SELECT * FROM medicine WHERE mid='{$mid}'";
    $result1=mysqli_query($conn,$sql1) or die("Query Unsuccessfull.");
    while($row1=mysqli_fetch_assoc($result1))
    {
      $mname=$row1['mname'];
    }
    $sql="UPDATE prescribe SET aid='{$aid}',mid='{$mid}',mname='{$mname}',mquan='{$mquan}',mmrng='{$mmrng}',maft='{$maft}',mevng='{$mevng}',remarks='{$remarks}',pid='{$pid}',ndays='{$ndays}',did='{$did}' WHERE prid='{$prid}' ";
    //$sql="UPDATE prescribe SET dname='{$stu_name}',ddob='{$stu_dob}',dgender='{$stu_gen}',dspec='{$stu_spec}',dphone='{$stu_phone}',dmail='{$stu_mail}',daddress='{$stu_address}' WHERE did={$stu_id} ";
    $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
    ?>
    <?php include'style.php'; ?>
    <?php
    //$val="Successfully Updated Medicine Information";
    $val=$aid;
    echo '<script>window.location.href = "pres.php?id='.$val.'"</script>';
    mysqli_close($conn);
 ?>
