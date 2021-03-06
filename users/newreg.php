<?php require "header.php";
      require "config.php";
?>


<div class="row h-100 justify-content-center align-items-center">
  <div class="col-10 col-md-8 col-lg-6 signup">
    <div class="regular-signup">
        <h4>Sign up</h4>
        <form action="">
            <div class="username signin">
                <input type="text" placeholder="Username">
            </div>
            <div class="email signin">
                <input type="text" placeholder="E-mail">  
            </div>
            <div class="password signin">
                <input type="text" placeholder="Password">
            </div>
            <div class="confirm signin">
                <input type="text" placeholder="Retype password">
            </div>
            <div class="btn">
                <button>Sign me Up</button>
            </div>
        </form>
    </div>
    <div class="social">
        <h4>Sign in with social network</h4>
        <div class="fb">
            <button>Log in with facebook</button>
        </div>
        <div class="twitter">
            <button>Log in with Twitter</button>
        </div>
        <div class="google">
            <button>Log in with Google+</button>
        </div>
    </div>
  </div>
</div>

<?php require "footer.php";?>