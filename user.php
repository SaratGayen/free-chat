<?php
include_once "php/connection.php";
session_start();
$user_id = $_SESSION['username'];

if(!isset($user_id)){
  header('location:login.php');
};


if(!isset($_SESSION['username'])){ 
    echo "you are logged out";
    header('location:login.php'); 
}
?>


<?php
 $select = mysqli_query($con, "SELECT * FROM users WHERE username = '$user_id'");
if(mysqli_num_rows($select) > 0){
$fetch = mysqli_fetch_assoc($select);
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <!-- ===== Iconscout CSS ===== -->
    <!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="style/user.css">        
    <title>Free Chat</title>
</head>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <p><?php echo '<img src="userpfpic/'.$fetch['img'].'">';?></p>
          <div class="details">
            <span> <?php echo $fetch['username'];?></span>
            <!-- <p></p> -->
          </div>
        </div>
        <a href="logout.php" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
      <table  >
      <?php
        $sql_disp=("SELECT * FROM users;");
        $result=mysqli_query($con,$sql_disp);
        while($row=mysqli_fetch_array
        ($result)){
          echo "<tr> 
                   <td width='20%'><img src='userpfpic/".$row['img']."'width='80' height='80' /></td>
                   <td>".$row['username']." </td>
                </tr>
                ";  
        }
      ?>
     </table>
      </div>
    </section>
  </div>

  <script src="php/searchbar.js"></script>

</body>
</html>