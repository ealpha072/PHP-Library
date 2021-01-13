<?php
  session_start();
  if(!isset($_SESSION['loggedin'])){
    $_SESSION['msg']= "You must be logged in";
    header("location:login.php");
  }

?>

<h1>Welcome home <?php echo $_SESSION['username'];?></h1>