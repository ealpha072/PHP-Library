<?php require "header.php";?>

<form>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="password" class="form-control" id="username" placeholder="Username" name="username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password_1">
  </div>
  <div class="form-group">
    <label for="password">Confirm Password</label>
    <input type="password" class="form-control" id="" placeholder="Confirm Password" name="password_2">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php require "footer.php";?>