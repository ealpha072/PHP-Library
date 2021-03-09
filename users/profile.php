<?php
  //session_start();
  require "header.php";
  require "index.php";
  if(!isset($_SESSION['loggedin'])){
    $_SESSION['msg']= "You must be logged in";
    header("location:login.php");
  }
?>
<div class="user-profile"> 
    <div class="row">
        <div class="col userimage">

        </div>
        <div class="col updateprofile">

        </div>
    </div>
    
    <form action="" method="POST">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
    </form>
    
</div>
<?php require "footer.php";?>