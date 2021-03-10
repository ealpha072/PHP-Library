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
                        <img class="profile-user-img img-fluid img-thumbnail border-0" src="../images/avatar.png" alt="">
                    </div>
                    <h3 class="profile-username text-center"><?php echo ucfirst($_SESSION["username"]);?></h3>
                    <p class="text-muted text-center"> <span class="badge badge-dark">Student</span><span class="badge badge-dark">Mba | 1St Year</span><br></p>                                                                        
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active"  href="#" data-toggle="tab">My Details</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <form class="form-horizontal">
                                <input type="hidden" name="_token">
                                <div class="mb-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend prf"><span class="input-group-text ">Upl. Image</span> </div>
                                        <input type="file" class="form-control  text-sm" accept=".jpg,.jpeg,.png">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group"><div class="input-group-prepend prf"><span class="input-group-text ">Upl. Proof<i class="fas fa-info-circle ml-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Either images/pdf are allowed."></i></span> </div>
                                        <input type="file" class="form-control  text-sm">                                                   
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group"><div class="input-group-prepend prf"><span class="input-group-text ">Full Name</span> </div>
                                        <input type="text" class="form-control" >
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group"><div class="input-group-prepend prf"><span class="input-group-text ">Email</span> </div>
                                        <input type="email" class="form-control" readonly="">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group"><div class="input-group-prepend prf"><span class="input-group-text ">Phone</span> </div>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>                           
                                <div class="mb-2">
                                    <div class="input-group"><div class="input-group-prepend prf"><span class="input-group-text ">Address</span> </div>
                                        <textarea class="form-control" ></textarea>
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
                                        <button type="submit" class="btn btn-sm btn-dark"><i class="fa fa-save mr-1"></i>Save Profile
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div><!-- /.tab-pane -->                                        
                    </div><!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div><!-- /.nav-tabs-custom -->
        </div><!-- /.col -->
    </div>
    
</div>
<?php require "footer.php";?>