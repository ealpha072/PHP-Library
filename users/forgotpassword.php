<?php require "header.php";?>

<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Fill in your email to receive a reset link to your email.</p>
        <form method="POST" action="">
            <div class="input-group mb-3">
                <input id="email" type="email" class="form-control " name="email" value="" required="" autocomplete="email" autofocus="" placeholder="Enter Email To Receive Reset Link">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope-o"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-dark btn-block"> Send Password Reset Link</button>
                </div>
            </div>
        </form>
    </div>
</div>