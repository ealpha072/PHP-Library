<?php require "header.php";?>

<div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-4">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="text-center">Fill in your email to receive a reset link to your email.</p>
                <form method="POST" action="">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-envelope-o"></span>
                            </div>
                        </div>
                        <input type="email" class="form-control " name="email" value="" required="" autocomplete="email" autofocus="" placeholder="Enter Email To Receive Reset Link">
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark btn-block"> Send Password Reset Link</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>