<?php
  session_start();

  require "header.php";
  if(!isset($_SESSION['loggedin'])){
    $_SESSION['msg']= "You must be logged in";
    header("location:login.php");
  }
?>

<div class="row h-100"> 

  <div class="col-3" id="green"> 
    <h4>Sidebar</h4> 
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
        </div>

      <a href="#">Add books</a><br /> 
      <br /> 
      <a href="#">Read Books</a><br /> 
      <br /> 
      <a href="#">Logout</a><br /> 
      <br /> 
    </div> 
    <div class="col-9" style="padding: 0;"> 
      
      <nav class="navbar navbar-expand-lg  navbar-light bg-primary"> 
        <a class="navbar-brand" href="#">Navbar</a> 
                    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"> 
                        <span class="navbar-toggler-icon"></span> 
                    </button> 
        
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup"> 
          <div class="navbar-nav"> 
            <a class="nav-item nav-link  active" href="#">Home</a> 
            <a class="nav-item nav-link" href="#">Features</a> 
            <a class="nav-item nav-link" href="#">Price</a> 
            <a class="nav-item nav-link" href="#">About</a> 
            </div> 
        </div> 
      </nav> 
  </div>

