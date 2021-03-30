<?php include 'session.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Delete Medicine</title>
    <?php include 'style.php' ?>
    <style>
    h1{
      padding-top: 50px;
      text-align: center;
    }
      .tab{
        font-size: 30px;
        padding-top:10px;
        padding-left:250px;
        padding-right:200px;
      }
      .tab{
        overflow:auto;
      }
    </style>
  </head>
  <body>
    <?php include 'header.php' ?>
    <div class="row2">
      <?php include 'sidebar.php' ?>
      <div class="column1 right1">
        <h1>Delete Medicine</h1>
          <!-- <h1 style="padding-top:100px;padding-left:50px;">Delete Medicine</h1> -->
          <div class="tab">

                <form action="<?php $_SERVER['PHP_SELF']; ?>" style="padding-top:20px;" method="post">
                  <div>
                      <select  class="form-control" name="mid">
                          <option value="" selected disabled>Select Medicine</option>
                          <?php
                            $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                            $sql=" SELECT * FROM medicine";
                            $result=mysqli_query($conn,$sql) or die("Query Unsuccessfull.");
                            while($row= mysqli_fetch_assoc($result)){
                          ?>
                          <option value= "<?php echo $row['mid']; ?>"><?php echo $row['mname'];?></option>
                          <?php }
                          mysqli_close($conn); ?>
                      </select>
                  </div>
                 <!-- <input required class="form-control" type="text" name="mname1" placeholder="Enter Medicine Name"> -->
                 <input style="background-color:black;color:white;margin-top:3px;" class="btn btn-primary" type="submit" name="pdet" value="Delete Medicine" onclick="return confirm('Are you sure you want to delete this item?');">
                </form>
              </div>
              <?php
              if(isset($_POST['pdet']))
              {
                $mid=$_POST['mid'];
                $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                $sql1="DELETE FROM medicine WHERE mid='{$mid}'";
                $result=mysqli_query($conn,$sql1) or die("Query Unsuccessfull");
                ?>
                       <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
                       <script src="sweetalert2.all.min.js"></script>
                       <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
                       <?php
                       echo "<script>
                       Swal.fire(
                          '',
                          'Medicine Deleted Successfully',
                          'success'
                          )
                       </script>";?>
                <?php
                }
                 //mysqli_close($conn);
               ?>

           <br>

    </div>
  </div>
  </body>
</html>
