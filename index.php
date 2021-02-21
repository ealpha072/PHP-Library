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
  <div class="col-3 dashboard" id="dashboard"> 
    <div class="profile">
      <img src="images/avatar.png" alt="Profile">
      <h5 class="username"><?php echo ucfirst($_SESSION["username"]);?></h5>
    </div>
    <div class="links">
      <div>
        <a href="">Dashboard</a>
      </div>
      <div>
        <a href="">My profile</a>
      </div>
      <div>
        <a href="">View my books</a>
      </div>
      <div>
        <a href="">Add new book</a>
      </div>
      <div>
        <a href="about">About</a>
      </div>      
    </div>
  </div>
  <div class="col-9 holder">
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
      <a href="logout.php">Logout</a>
    </div>
    <hr>
    <div class="row user-info-holder">
      <div class="col b-b">
        <h1 class="user-books">10</h1>
        <h4>Borrowed books</h4>
      </div>
      <div class="col f-c">
        <h1 class="fines">40</h1>
        <h4>Fines collected</h4>
      </div>
      <div class="col o-t">
        <h1 class="credits">100</h1>
          <h4>Credits Eraned</h4>
      </div>
      <div class="col c-e">
        <h1 class="credits">100</h1>
          <h4>Credits Eraned</h4>
      </div>
    </div>
  </div>
</div>

