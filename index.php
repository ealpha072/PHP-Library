<?php
  session_start();

  require "header.php";
  if(!isset($_SESSION['loggedin'])){
    $_SESSION['msg']= "You must be logged in";
    header("location:login.php");
  }
?>

<div>
  <h1>Welcome home <?php echo ucfirst($_SESSION['username']);?></h1>
</div>
<p><a href="logout.php">Logout</a></p>

<?php require "footer.php";?>