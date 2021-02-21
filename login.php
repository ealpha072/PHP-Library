<?php require "header.php";
      require "config.php";
?>

<div class="row h-100 justify-content-center align-items-center">
  <div class="col-10 col-md-8 col-lg-6">
  <h3>Login</h3>
    <form action="login.php" method="post">
      <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        </div>
      <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password">
      </div>
      <button type="submit" class="btn btn-primary" name="login">Submit</button>

      <div class="register">
        <p>Not yet a member? <a href="registration.php">Register</a></p>
      </div>
    </form>
  </div>
</div>


<?php require "infooter.php";
      require "footer.php";
?>