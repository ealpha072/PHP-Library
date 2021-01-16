<?php
  session_start();

  require "header.php";
  if(!isset($_SESSION['loggedin'])){
    $_SESSION['msg']= "You must be logged in";
    header("location:login.php");
  }
?>

<div>
  <h1>Welcome home <?php echo ucfirst($_SESSION['username']);?></h1>
</div>
<div class="wrapper d-flex align-items-stretch">
<nav id="sidebar" class="active">
<div class="p-4 pt-5">
<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
<ul class="list-unstyled components mb-5">
<li class="active">
<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
<ul class="collapse list-unstyled" id="homeSubmenu">
<li>
<a href="#">Home 1</a>
</li>
<li>
<a href="#">Home 2</a>
</li>
<li>
<a href="#">Home 3</a>
</li>
</ul>
</li>
<li>
<a href="#">About</a>
</li>
<li>
<a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
<ul class="collapse list-unstyled" id="pageSubmenu">
<li>
<a href="#">Page 1</a>
</li>
<li>
<a href="#">Page 2</a>
</li>
<li>
<a href="#">Page 3</a>
</li>
</ul>
</li>
<li>
<a href="#">Portfolio</a>
</li>
<li>
<a href="#">Contact</a>
</li>
</ul>
<div class="footer">
<p>
Copyright ©<script>document.write(new Date().getFullYear());</script>2021 All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
</p>
</div>
</div>
</nav>

<div id="content" class="p-4 p-md-5">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<button type="button" id="sidebarCollapse" class="btn btn-primary">
<i class="fa fa-bars"></i>
<span class="sr-only">Toggle Menu</span>
</button>
<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<i class="fa fa-bars"></i>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="nav navbar-nav ml-auto">
<li class="nav-item active">
<a class="nav-link" href="#">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">About</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Portfolio</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Contact</a>
</li>
</ul>
</div>
</div>
</nav>
<h2 class="mb-4">Sidebar #01</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
</div>

<?php require "infooter.php";?>