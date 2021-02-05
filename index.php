<?php
  //session_start();
  require "header.php";
  require "config.php";
  if(!isset($_SESSION['loggedin'])){
    $_SESSION['msg']= "You must be logged in";
    header("location:login.php");
  }
?>

<div class="row">
  <div class="col-4 dashboard"> 
    <div class="profile">
      <img src="avatar.png" alt="Profile">
      <h5 class="username"><?php echo $_SESSION["username"]?></h5>
    </div>
    <div class="links">
      <a href="">View my books</a>
      <a href="">View my books</a>
    </div>
  </div>
  <div class="col-8 holder">
    <div class="user-info">
      <a href=""><?php echo $_SESSION["username"];?></a><!--add space -->
      <a href="log-out">Logout</a>
    </div>
  </div>
</div>

