<?php
  session_start();
  if(isset($_SESSION["username"]))
  {
    echo '<script>
    window.location.href="http://localhost/lokesh/panel.php";
    </script>';
  }
 ?>
<!DOCTYPE html>
<head>
    <title>Admin Login</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
        }
        body{
            min-height: 100vh;
            display:flex;
            background: #eee;
            font-family: sans-serif;
        }
        .container{
            margin:auto;
            width:500px;
            max-width: 90%;
        }
        .image{
            background-image: url(images/pic02.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .container form{
            width:100%;
            height: 100p%;
            padding:20px;
            background: white;
            border-radius: 4px;
            box-shadow: 0 8px 16px rgba(0,0,0,.3);
        }
        .container form h1{
            text-align:center;
            margin-bottom:24px;
            color:#222;
        }
        .container form .form-control{
            width:100%;
            height:40px;
            background:white;
            border-radius: 4px;
            border: 1px solid silver;
            margin: 10px 0 18px 0;
            padding: 0 10px;
        }
        .container form .btn{
            margin-left:50%;
            width:120px;
            height: 34px;
            border:none;
            outline: none;
            background-color:#27a327;
            cursor:pointer;
            font-size: 16px;
            transform:translateX(-50%);
            color:white;
        }
        .container form .btn:hover{
           opacity: 0.7;
        }
    </style>
</head>
<body class="image">
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
            <h1>Login Form</h1>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" required class="form-control" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" required class="form-control" placeholder="Enter Password">
            </div>
            <input type="submit" name="login" class="btn" value="LOGIN">
        </form>
        <?php
            if(isset($_POST['login']))
            {
                $conn=mysqli_connect("localhost","root","","hospital")or die("connection failed");
                $username=$_POST['username'];
                $password=$_POST['password'];
                $sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
                $result=mysqli_query($conn,$sql) or die("Query Failed.");
                if(mysqli_num_rows($result)>0)
                {
                  while($row=mysqli_fetch_assoc($result))
                  {
                    session_start();
                    $_SESSION["username"]=$row['username'];
                    header("Location: http://localhost/lokesh/panel.php");
                  }
                }
                else
                {
                   echo "<script>
                   Swal.fire({
                     title: 'Please enter Correct Password and Username',
                     icon: 'error',
                     confirmButtonText: 'OK'
                   })

                   </script>";
                }
            }
        ?>
    </div>
</body>
