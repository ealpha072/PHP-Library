<?php
  //session_start();
  require "header.php";
  require "config.php";
  if(!isset($_SESSION['loggedin'])){
    $_SESSION['msg']= "You must be logged in";
    header("location:login.php");
  }
?>
<div class="user-profile">
    <div class="user-image">
        <img src="images/avatar.png" alt="">
        <button class="btn btn-primary">Change Profile Picture</button>
    </div>
    <div class="user-email">
        <h4>Your E-mail:<span class="email"></span></h4>
        <h4>Your username:<span class="email"></span></h4>
    </div>
    <div class="password">
        <a href="reset.php">Reset my password</a>
    </div>
</div>