<?php
session_start();
include_once "php/connection.php";
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $newpassword=$_POST['newpassword'];

    $pass = password_hash($newpassword, PASSWORD_BCRYPT);

    $chg_pwd ="UPDATE users set password='$pass' where email='$email' ";

    $run_query = mysqli_query($con,$chg_pwd);
    if($run_query){
      echo "Password change sucfully";
      header('location:login.php');
    }else{
      echo "something wrong";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="style/fps.css">        
    <title>Free Chat</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Forgot Password</span>

                <form action="#"  method="POST" autocomplete="off">
                <div class="input-field">
                   <input type="email" placeholder="Enter your email" name="email" required>
                   <i class="uil uil-envelope icon"></i>
               </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Create New password" name="newpassword" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="input-field button">
                    <input type="submit" name="submit" value="Forgot Password " id="button">
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="js/sh.js"></script>
</body>
</html>