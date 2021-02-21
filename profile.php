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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Change Profile Picture</button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <input type="file">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" name="profile-pic">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h4>Your E-mail:<span class="email"> </span></h4>
        <h4>Your username:<span class="email"> <?php echo ucfirst($_SESSION["username"]);?></span></h4>
        <a href="reset.php">Reset my password</a>
    </div>
    
</div>
<?php require "footer.php";?>