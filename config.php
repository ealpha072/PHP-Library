<?php
  #creating a new connection

  $dsn = "mysql:host=localhost;dbname=library;charset=utf8mb4";
  $username = "root";
  $password = "";

  try{
    $conn = new PDO($dsn,$username,$password);
    //set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully!!"."<br>";
    //$conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
  }catch(Exceptions $e){
    echo "Connection failed ".$e->getMessage();
  }

  if(isset($_POST['register'])){
    register();
    
  }

  function register(){

    global $conn;
    $error =[];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    //check if email is empty
    if(empty($email)){
      echo "Please provide an email address!!"."<br>";
    }
    //check if username is empty
    if(empty($username)){
      echo "Username is empty"."<br>";
    }
    //check if password is empty
    if(empty($password_1)){
      echo "Please provide a password"."<br>";
    }
    //check if confirm password is empty
    if(empty($password_2)){
      echo "Please confirm your password"."<br>";
    }
    //check for password match
    if(!($password_1===$password_2)){
      echo "Password mismatch, please provide matching passwords!";
    }
    
  }


?>