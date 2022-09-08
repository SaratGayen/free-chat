<?php
          session_start();
          include_once "php/connection.php";
          if(isset($_POST['submit'])){
          $username = mysqli_real_escape_string($con, $_POST['username']);
          $email = mysqli_real_escape_string($con, $_POST['email']);
          $password = mysqli_real_escape_string($con, $_POST['password']);
          $ran_id = rand(time(), 100000000);
          if(isset($_FILES['image']))
          
          // servercite empty validation
          if($username != "" && $email !="" && $password !="" && $_FILES !=""){

          
        //   password encryption
          $pass=password_hash($password,PASSWORD_BCRYPT);
          
        //   email chechking
          $emailquery = "select * from users where email='$email'";
          $query=mysqli_query($con,$emailquery);
          $emailcount = mysqli_num_rows($query);
          if($emailcount>0){
          echo "email already exist";
          } 
          // image
          else{
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"userpfpic/".$new_img_name)){
                              
        //   inserting records
          $insertquery = "insert into users (uniqueid,username,email,password,img) values ('$ran_id','$username','$email','$pass','$new_img_name')";


        // connection alerts
          $iquery = mysqli_query($con,$insertquery);
          if($iquery){
            ?>
            <script>
              alert("Connection Successful");
            </script>
            <?php
          }else{
            ?>
            <script>
              alert("Connection not Succeful");
            </script>
            <?php
          }
       }
      }}}}
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
    <link rel="stylesheet" href="style/signup.css">        
    <title>Free Chat</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form signup">
                <span class="title">Registration</span>
   
                <form action="#" method="POST" autocomplete="off" enctype="multipart/form-data">
               <div class="input-field">
                   <input type="text" placeholder="Enter your name" name="username" required>
                   <i class="uil uil-user"></i>
               </div>
               <div class="input-field">
                   <input type="email" placeholder="Enter your email" name="email" required>
                   <i class="uil uil-envelope icon"></i>
               </div>
               <div class="field input-field image">
                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" class="image" name="image" required>
                <i class="uil uil-image-upload"></i>
            </div>
               <div class="input-field">
                   <input type="password" class="password" placeholder="Create a password" name="password" required>
                   <i class="uil uil-lock icon"></i>
                   <i class="uil uil-eye-slash showHidePw"></i>
               </div>
   
               <div class="checkbox-text">
                   <div class="checkbox-content">
                       <input type="checkbox" id="termCon" required>
                       <label for="termCon" class="text">I accepted all terms and conditions</label>
                   </div>
               </div>
   
               <div class="input-field button">
                   <input type="submit" name="submit" id="button" value="Signup">
               </div>
           </form>
   
           <div class="login-signup">
               <span class="text">Already have an account?
                   <a href="login.php" class="text login-link">Login Now</a>
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
   <script src="js/sh.js"></script>
</body>
</html>