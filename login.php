<?php require "header.php";?>
<h3>Login</h3>
<form action="" method="post">
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
<?php require "footer.php";?>