<?php
  //session_start();
  require "header.php";
  require "index.php";
  if(!isset($_SESSION['loggedin'])){
    $_SESSION['msg']= "You must be logged in";
    header("location:login.php");
  }
?>
<div class="user-profile"> 
    <h2>My Profile</h2>
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-thumbnail border-0" src="uploads/<?php echo $user_image_name?>" alt="">
                    </div>
                    <h3 class="profile-username text-center"><?php echo ucfirst($_SESSION["username"]);?></h3>
                    <p class="text-muted text-center"> 
                        <span class="badge badge-dark">Student</span>
                        <span class="badge badge-dark"><?php echo $_SESSION['course']?> | Year <?php echo $_SESSION['yr']?></span><br>
                    </p>                                                                        
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active details"  href="#" data-toggle="tab">My Details</a></li>
                        <li class="nav-item"><a class="nav-link changepassword"  href="#" data-toggle="tab">Change Password</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body updateprofile">
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <form class="form-horizontal" method="POST" action="">
                                <input type="hidden" name="_token">
                                <div class="mb-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend prf"><span class="input-group-text ">Upl. Image</span> </div>
                                        <input type="file" class="form-control  text-sm" name="user_image">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group"><div class="input-group-prepend prf"><span class="input-group-text ">Full Name</span> </div>
                                        <input type="text" class="form-control" readonly value="<?php echo $_SESSION['username']; ?>">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group"><div class="input-group-prepend prf"><span class="input-group-text ">Email</span> </div>
                                        <input type="email" class="form-control" readonly="" value="<?php echo $_SESSION["user_email"];?>">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group"><div class="input-group-prepend prf"><span class="input-group-text ">Phone</span> </div>
                                        <input type="text" class="form-control" name="number">
                                    </div>
                                </div>                           
                                <div class="mb-2">
                                    <div class="input-group"><div class="input-group-prepend prf"><span class="input-group-text ">Address</span> </div>
                                        <textarea class="form-control" name="address"></textarea>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" checked="">
                                                <label class="form-check-label" for="">
                                                    I Agree <a target="_blank" href="">Terms and conditions.</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-sm btn-dark" name="save-profile"><i class="fa fa-save mr-1"></i>Save Profile
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.tab-pane -->                                        
                    </div><!-- /.tab-content -->
                </div><!-- /.card-body -->
                <!--password section-->
                <div class=" tab-pane passwordchange" style="display: none;">                                            
                    <form class="form-horizontal">
                        <input type="hidden" name="_token">
                        <div class="mb-2">
                            <div class="input-group"><div class="input-group-prepend pass"><span class="input-group-text ">Current Password</span> </div>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend pass">
                                    <span class="input-group-text ">New Password</span> 
                                </div>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="input-group">
                                <div class="input-group-prepend pass">
                                    <span class="input-group-text ">Confirm Password</span> 
                                </div>
                                <input type="password" class="form-control">
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="input-group">
                                <button type="submit" class="btn btn-sm btn-dark"><i class="fa fa-save mr-1"></i>Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--end of pss-->
            </div><!-- /.nav-tabs-custom -->
        </div><!-- /.col -->
    </div>    
</div>
<script src="../js-files/script.js"></script>
<?php require "footer.php";?>