<?php require "header.php";
      require "config.php";
?>

<div class="row h-100 justify-content-center align-items-center">
	<div class="col-10 col-md-8 col-lg-4">
		<div class="reg-form">
			<form action="registration.php" method="post" enctype="multipart/form-data">
				<h4 class="text-center">Register to be a member</h4>

				<!--email field-->
				<div class="form-group input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
					</div>
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
				</div>

				<!--fullname field-->
				<div class="form-group input-group mb-3">				
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
					<input type="text" class="form-control" id="fullname" placeholder="Full name" name="username" required>
				</div>
				
				<!--phonenumber field-->
				<div class="form-group input-group mb-3">				
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
					</div>
					<input type="number" class="form-control" placeholder="Phone Number" name="phonenumber" required maxlength="10">
				</div>

				<!--course/year field-->
				<div class="form-group input-group mb-3">
					<select id="" class="form-control" required name="course">
						<option value="">--Select--</option>
						<option value="MSC">MSC</option>
						<option value="MBA">MBA</option>
					</select>
					<select class="form-control" required name="studyyear">
						<option value="">--Select--</option>
						<option value="1">1st Year</option>
						<option value="2">2nd Year</option>
						<option value="3">3rd Year</option>
						<option value="4">4th Year</option>
					</select>
				</div>

				<!--password_1 field-->
				<div class="form-group input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock" aria-hidden="true"></i></span>
					</div>
					<input type="password" class="form-control" id="password" placeholder="Password" name="password_1" required>
				</div>

				<!--password_2 field-->
				<div class="form-group input-group mb-3">
					<!--<label for="password">Confirm Password</label>-->
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock" aria-hidden="true"></i></span>
					</div>
					<input type="password" class="form-control" id="" placeholder="Confirm Password" name="password_2" required>
				</div>

				<!--userimage field-->
				<div class="form-group input-group mb-3 b-lr-1">					
                        <div class="input-group-prepend prf"><span class="input-group-text ">Photo</span> </div>
                        <input type="file" class="form-control  text-sm"  name="userimage">
				</div>

				<!--userimageproof field-->
				<div class="form-group input-group mb-3 b-lr-1">					
                        <div class="input-group-prepend prf"><span class="input-group-text ">Upl Proof</span> </div>
                        <input type="file" class="form-control  text-sm" name="userimageproof">
				</div>

				<!--submitbtn/terms field-->
				<div class="row">
					<div class="col-8">
						<div class="icheck-primary">
							<input type="checkbox" name="terms" required>
							<label for="agreetoterms">I Agree to <a href="">terms</a></label>
						</div>
					</div>
					<div class="col-4">
						<button type="submit" class="btn btn-secondary" name="register"><i class="fa fa-paper-plane" aria-hidden="true"></i> Register</button>
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