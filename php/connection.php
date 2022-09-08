<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "chek";

  $con = mysqli_connect($hostname, $username, $password, $dbname);
if($con){
    ?>
    <script>
      alert("Connection Successful");
    </script>
    <?php
  }else{
    ?>
    <script>
      alert("Connection not Succeful")
    </script>
    <?php
  }
?>