<?php
  //session_start();
  require "header.php";
  require "config.php";
  if(!isset($_SESSION['loggedin'])){
    $_SESSION['msg']= "You must be logged in";
    header("location:login.php");
  }

  if(isset($_POST['passreset'])){
    //converting session variables to simpler vars
    $useremail = $_SESSION['user_email'];
    $userpass = $_SESSION['password'];

    //form inputs
    $oldpass = $_POST['oldpassword'];
    $newpass = $_POST['newpassword'];
    $confirmpass = $_POST['newpassword1'];
    $usererrors =[];

    //matching new and old passwords
    if($newpass != $confirmpass){
        array_push($usererrors, "Password mismatch");
        echo "Your passwords dont match";
    }

    //if no errors
    if(count($usererrors)===0){
        $oldpass=md5($oldpass);
        $encrypt_newpass=md5($newpass);

        if($oldpass != $userpass){
            echo "Passwords mismatch";
        }else{
            //update users passwords
            $sql = $conn->prepare("UPDATE users SET password='$encrypt_newpass' WHERE email='$useremail' ");
            $sql->execute();
            $_SESSION['msg'] = "Successfully updated password";
            header('location: profile.php');
        }
        
    }
    
  }
?>

<div>
<div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <!-- Form -->
            <form class="form-example" action="" method="post">
                <h1>Password Reset</h1>
                <p class="description">Please provide your password and the new passwords below</p>
                <!-- Input fields -->
                <div class="form-group">
                    <label for="oldpassword">Old password</label>
                    <input type="password" class="form-control oldpassword" id="oldpassword" placeholder="Old password..." name="oldpassword" required>
                </div>
                <div class="form-group">
                    <label for="password">New Password:</label>
                    <input type="password" class="form-control new-password" id="new-password" placeholder="New Password..." name="newpassword" required>
                </div>
                <div class="form-group">
                    <label for="password">Confirm new Password</label>
                    <input type="password" class="form-control newpassword1" id="newpassword1" placeholder="Password..." name="newpassword1" required>
                </div>

                <button type="submit" class="btn btn-primary btn-customized" name="passreset">Reset Password</button>
                <!-- End input fields -->
                <p class="copyright">&copy; Alpha's Library by <a href="">Alpha</a>.</p>
            </form>
            <!-- Form end -->
            <a href="index.php">Home</a><br>
            
        </div>
    </div>
</div>