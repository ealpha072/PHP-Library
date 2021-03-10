<?php require "header.php";
      require "config.php";
?>


<h4>Register to be a member</h4>
<div class="row h-100 justify-content-center align-items-center">
	<div class="col-10 col-md-8 col-lg-6">
		<div class="reg-form">
			<form action="registration.php" method="post" enctype="multipart/form-data">

				<div class="form-group input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
					</div>
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
				</div>
			
				<div class="form-group input-group mb-3">				
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
					<input type="text" class="form-control" id="fullname" placeholder="Full name" name="fullname" required>
				</div>

				<div class="form-group input-group mb-3">				
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
					</div>
					<input type="text" class="form-control" placeholder="Phone Number" name="phonenumber" required>
				</div>

				<div class="form-group input-group mb-3">
					<select name="" id="" class="form-control" required>
						<option value="">--Select--</option>
						<option value="">MSC</option>
						<option value="">MBA</option>
					</select>
					<select name="" id="" class="form-control" required>
						<option value="">--Select--</option>
						<option value="">1st Year</option>
						<option value="">2nd Year</option>
						<option value="">3rd Year</option>
						<option value="">4th Year</option>
					</select>
				</div>

				<div class="form-group input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock" aria-hidden="true"></i></span>
					</div>
					<input type="password" class="form-control" id="password" placeholder="Password" name="password_1" required>
				</div>

				<div class="form-group input-group mb-3">
					<!--<label for="password">Confirm Password</label>-->
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock" aria-hidden="true"></i></span>
					</div>
					<input type="password" class="form-control" id="" placeholder="Confirm Password" name="password_2" required>
				</div>

				<div class="form-group input-group mb-3 b-lr-1">					
                        <div class="input-group-prepend prf"><span class="input-group-text ">Photo</span> </div>
                        <input type="file" class="form-control  text-sm" accept=".jpg,.jpeg,.png" name="userimage">
				</div>

				<div class="form-group input-group mb-3 b-lr-1">					
                        <div class="input-group-prepend prf"><span class="input-group-text ">Upl Proof</span> </div>
                        <input type="file" class="form-control  text-sm" accept=".jpg,.jpeg,.png" name="userimageproof">
				</div>

				<div class="row">
					<div class="col-8">
						<div class="icheck-primary">
							<input type="checkbox" name="terms">
							<label for="agreetoterms">I Agree to <a href="">terms</a></label>
						</div>
					</div>
					<div class="col-4">
						<button type="submit" class="btn btn-primary" name="register"><i class="fa fa-paper-plane" aria-hidden="true"></i> Register</button>
					</div>
				</div>
				
			</form>

      		<div class="login">
        		<p>Already a member? <a href="login.php">Login</a></p>
      		</div>
    	</div>
  	</div>
</div>




<?php require "footer.php";?>