<?php
  session_start();
  if(!isset($_SESSION['username'])){
    $_SESSION['msg']= "You must be logged in";
    header("location:login.php");
  }

?>

<h1>Welcome home <?php $_SESSION['username'];?></h1>