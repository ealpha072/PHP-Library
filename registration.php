<?php require "header.php";
      require "config.php";
?>


<h4>Register to be a member</h4>
<div class="row h-100 justify-content-center align-items-center">
  <div class="col-10 col-md-8 col-lg-6">
    <div class="reg-form">
      <form action="registration.php" method="post" enctype="multipart/form-data">
        <div class="form-group input-group mb-3">
          <!--<label for="email">Email address</label>-->
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
          </div>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        </div>
        <div class="form-group input-group mb-3">
          <!--<label for="username">Username</label>-->
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
          </div>
          <input type="text" class="form-control" id="username" placeholder="Username" name="username">
        </div>
        <div class="form-group input-group mb-3">
          <!--<label for="password">Password</label>-->
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock" aria-hidden="true"></i></span>
          </div>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password_1">
        </div>
        <div class="form-group input-group mb-3">
          <!--<label for="password">Confirm Password</label>-->
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock" aria-hidden="true"></i></span>
          </div>
          <input type="password" class="form-control" id="" placeholder="Confirm Password" name="password_2">
        </div>
        <div class="form-group input-group mb-3">
          <!--<label for="password">Confirm Password</label>-->
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-picture-o" aria-hidden="true"></i></span>
          </div>
          <input type="file" class="form-control" id="" value="" name='userimage'>
        </div>
        <button type="submit" class="btn btn-primary" name="register"><i class="fa fa-paper-plane" aria-hidden="true"></i> Register</button>
      </form>
      <div class="login">
        <p>Already a member? <a href="login.php">Login</a></p>
      </div>
    </div>
  </div>
</div>
<?php require "footer.php";?>