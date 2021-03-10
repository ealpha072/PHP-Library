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
                        <li class="nav-item"><a class="nav-link active" wire:click="$set('tab', 1)" href="#" data-toggle="tab">My Details</a></li>
                        <li class="nav-item"><a class="nav-link " wire:click="$set('tab', 2)" href="#" data-toggle="tab">Change Password</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <form class="form-horizontal" wire:submit.prevent="saveProfile">
                                <input type="hidden" name="_token" value="9QM5rt7kDVjhGGKhx90B2qfpCbfJo5pP2dAEZhoE">
                                <div class="mb-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend prf"><span class="input-group-text ">Upl. Image</span> </div>
                                        <input type="file" class="form-control  text-sm" accept=".jpg,.jpeg,.png" wire:model="photo">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group"><div class="input-group-prepend prf"><span class="input-group-text ">Upl. Proof<i class="fas fa-info-circle ml-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Either images/pdf are allowed."></i></span> </div>
                                        <input type="file" class="form-control  text-sm" wire:model="proof" accept=".jpg,.jpeg,.png,.pdf">                                                   
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group"><div class="input-group-prepend prf"><span class="input-group-text ">Full Name</span> </div>
                                        <input type="text" class="form-control" wire:model.defer="name">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group"><div class="input-group-prepend prf"><span class="input-group-text ">Email</span> </div>
                                        <input type="email" wire:model="email" class="form-control" readonly="">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group"><div class="input-group-prepend prf"><span class="input-group-text ">Phone</span> </div>
                                        <input type="text" class="form-control" wire:model.defer="phone">
                                    </div>
                                </div>                           
                                <div class="mb-2">
                                    <div class="input-group"><div class="input-group-prepend prf"><span class="input-group-text ">Address</span> </div>
                                        <textarea class="form-control" wire:model.defer="address"></textarea>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="form-check">
                                                <input wire:model.defer="check" class="form-check-input" type="checkbox" value="" id="tacCheckChecked" checked="">
                                                <label class="form-check-label" for="tacCheckChecked">
                                                    I Agree <a target="_blank" href="/terms-and-conditions ">Terms and conditions.</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-sm btn-dark"><i class="fas fa-save mr-1"></i>Save Profile
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                                        <!-- /.tab-pane -->                                        
                    </div>
                                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
                            <!-- /.nav-tabs-custom -->
        </div>
                        <!-- /.col -->
    </div>
    
</div>
<?php require "footer.php";?>