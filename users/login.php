<?php require "header.php";
      require "config.php";
?>

<div class="row h-100 justify-content-center align-items-center">
  <div class="col-10 col-md-8 col-lg-6">
  <h3>Login</h3>
    <form action="login.php" method="post">

      <div class="form-group input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
        </div>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
      </div>

      <div class="form-group input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock" aria-hidden="true"></i></span>
        </div>
          <!--<label for="password">Password</label>-->
          <input type="password" class="form-control" id="password" placeholder="Password" name="password">
      </div>

		<div class="row">
			<div class="col-8">
				<div class="icheck-primary">
					<input type="checkbox" name="terms">
					<label for="agreetoterms">I Agree to <a href="">terms</a></label>
				</div>
			</div>
			<div class="col-4">
				<button type="submit" class="btn btn-dark" name="login"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</button>
			</div>
		</div>

      <div class="register">
        <p>Not yet a member? <a href="registration.php">Register</a></p>
      </div>
    </form>
  </div>
</div>


<?php require "infooter.php";
      require "footer.php";
?>