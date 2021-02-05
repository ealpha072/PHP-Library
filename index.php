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
  <div class="col-4 dashboard" id="dashboard"> 
    <div class="profile">
      <img src="images/avatar.png" alt="Profile">
      <h5 class="username"><?php echo ucfirst($_SESSION["username"]);?></h5>
    </div>
    <div class="links">
      <a href="">Dashboard</a>
      <a href="">My profile</a>
      <a href="">View my books</a>
      <a href="">Add new book</a>
      <a href="about">About</a>

    </div>
  </div>
  <div class="col-8 holder">
    <div class="user-info">
      <div class="user-search">
        <form action="" method="" class="form-inline">
          <div class="form-group">
            <label for="search">Search Book</label>
            <input type="text" class="form-control" placeholder="Search Book..." id="search">
            <button class="btn btn-primary" name="search-book"><i class="fas fa-book"></i> Search Book</button>
          </div>
        </form>
      </div>
      <a href=""><?php echo ucfirst($_SESSION["username"]);?></a><!--add space -->
      <a href="log-out">Logout</a>
    </div>
  </div>
</div>

