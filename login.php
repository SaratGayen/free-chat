<?php
         session_start();
          include_once "php/connection.php";
          if(isset($_POST['submit'])){
          $email=$_POST['email'];
          $password=$_POST['password'];

        // checking email
          $email_search= "select * from users where email='$email'";
          $query = mysqli_query($con,$email_search);
          $email_count =  mysqli_num_rows($query);

          if($email_count){
          $email_pass = mysqli_fetch_assoc($query);
        
        // checking password

          $db_pass = $email_pass['password'];

        //   name storing in seesion
          $_SESSION['username'] = $email_pass['username'];


          $pass_decode = password_verify($password,$db_pass);

        //  log in after matching password

           if($pass_decode){

            if(isset($_POST['rememberme'])){
                setcookie('emailcookie',$email,time()+86400);
                setcookie('passwordcookie',$password,time()+86400);
                header('location:user.php');
            }


           echo "login successfull";
      
         // Redirecting to chat screen using script

          ?>
           <script>
           location.replace("user.php");
          </script>
          <?php
        }

       
       else{
           echo "Password Incorrect";
          }

        }else{ 
          echo "Incorrect Email";
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
    <link rel="stylesheet" href="style/login.css">        
    <title>Free Chat</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form action="#"  method="POST" autocomplete="off">
                    <div class="input-field">
                        <input type="email" placeholder="Enter your email" name="email" value= "<?php if(isset($_COOKIE['emailcookie'])) { echo $_COOKIE ['emailcookie'];}?>" required >
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password" name="password" value= "<?php if(isset($_COOKIE['passwordcookie'])) { echo $_COOKIE ['passwordcookie'];}?>" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" name="rememberme" id="logCheck">
                            <label for="logCheck" class="text">Remember me</label>
                        </div>
                        
                        <a href="forgot.php" class="text">Forgot password?</a>
                    </div>

                    <div class="input-field button">
                    <input type="submit" name="submit" value="Login" id="button">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Don't have an account? 
                        <a href="index.php" class="text signup-link">Signup Now</a>
                    </span>
                </div>
                    
                <!-- direct login via google -->
                
                <div class="line"></div>
                <div class="media-options">
                    <a href="#" class="field google">
                        <img src="images/google.png" alt="" class="google-img">
                        <span>Login with Google</span>
                    </a>
                </div>
            </div>
        </div>
    </div>



    <script src="js/sh.js"></script>
</body>
</html>