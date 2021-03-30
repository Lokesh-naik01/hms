<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Update Password</title>
    <meta charset="utf-8">
    <?php include 'style.php' ?>
</head>
  <body>
    <?php include 'header.php' ?>
    <div class="row2">
      <?php include 'sidebar.php' ?>
      <div class="column1 right1">
          <div>
            <form style="padding-top:100px;padding-left:250px;padding-right:250px;" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
              <h1><center>Update Password</center></h1>
              <div style="padding-top:10px;">

              </div>
              <div class="form-group row">
                <label for="opass" class="col-sm-2 col-form-label"><b>Password</b></label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputEmail3"name="opass" placeholder="Enter Password">
                </div>
              </div>
              <div style="padding-top:10px;">
              </div>
              <div class="form-group row">
                <label for="npass1" class="col-sm-2 col-form-label"><b>New Password</b></label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="npass1"id="inputPassword3" placeholder="Enter New Password">
                </div>
              </div>
              <div style="padding-top:10px;">
              </div>
              <div class="form-group row">
                <label for="npass2" class="col-sm-2 col-form-label"><b>New Password</b></label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="npass2"id="inputPassword3" placeholder="Re-Enter New Password">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-10" style="padding-left:160px;padding-top:10px;">
                  <button type="submit" class="btn btn-primary" name="signin" >Update Password</button>
                </div>
              </div>
            </form>
            <?php
                if(isset($_POST['signin']))
                {
                  $opass=$_POST['opass'];
                  $npass1=$_POST['npass1'];
                  $npass2=$_POST['npass2'];
                  // $name='admin';
                  $id=$_SESSION["docid"];
                  $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                  $sql=" SELECT * FROM doctorlogin where did='$id'";
                  $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull sql.");
                  if(mysqli_num_rows($result)>0)
                  {
                        while($row=mysqli_fetch_assoc($result))
                        {
                              $pass=$row['dpass'];
                        }
                        if($pass==$opass)
                        {
                            if($npass1==$npass2)
                            {

                                $sql1="UPDATE doctorlogin SET dpass='{$npass1}' WHERE did='{$id}'";
                                $result1=mysqli_query($conn,$sql1) or die("Query Unsuccessfull.");
                                echo "<script>
                                Swal.fire({
                                  text: 'Password Updated Successfully',
                                  confirmButtonText: 'OK'
                                })

                                </script>";
                            }
                            else
                            {
                              echo "<script>
                              Swal.fire({
                                title: 'Error',
                                text: 'Make sure that passwords in both fields are same',
                                icon: 'error',
                                confirmButtonText: 'OK'
                              })

                              </script>";
                            }
                        }
                        else
                        {
                          echo "<script>
                          Swal.fire({
                            title: 'Error',
                            text: 'Password Incorrect',
                            icon: 'error',
                            confirmButtonText: 'OK'
                          })

                          </script>";
                        }
                  }
                }
             ?>
          </div>
      </div>
    </div>
  </body>
</html>
