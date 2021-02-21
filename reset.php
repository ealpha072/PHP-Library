<?php
  //session_start();
  require "header.php";
  require "config.php";
  if(!isset($_SESSION['loggedin'])){
    $_SESSION['msg']= "You must be logged in";
    header("location:login.php");
  }
?>

<div>
<div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <!-- Form -->
            <form class="form-example" action="" method="post">
                <h1>Password Reset</h1>
                <p class="description">Please provide your password and the mnew passwords below</p>
                <!-- Input fields -->
                <div class="form-group">
                    <label for="oldpassword">Old password</label>
                    <input type="text" class="form-control oldpassword" id="oldpassword" placeholder="Old password..." name="oldpassword">
                </div>
                <div class="form-group">
                    <label for="password">New Password:</label>
                    <input type="password" class="form-control new-password" id="new-password" placeholder="New Password..." name="newpassword">
                </div>
                <div class="form-group">
                    <label for="password">Confirm new Password</label>
                    <input type="password" class="form-control newpassword1" id="newpassword1" placeholder="Password..." name="newpassword1">
                </div>

                <button type="submit" class="btn btn-primary btn-customized" name="passreset">Reset Password</button>
                <!-- End input fields -->
                <p class="copyright">&copy; Alpha's Library by <a href="">Alpha</a>.</p>
            </form>
            <!-- Form end -->
        </div>
    </div>
</div>