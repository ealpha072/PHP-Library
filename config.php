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
    $email = $username ='';
      //check if email is empty
      if(empty($_POST['email'])){
        echo "Please provide an email address!!"."<br>";
      }else{
        $email = $_POST['email'];
      }
      //check if username is empty
      if(empty($_POST['username'])){
        echo "Username is empty"."<br>";
      }else{
        $username = $_POST['username'];
      }
      //check if password is empty
      if(empty($_POST['password_1'])){
        echo "Please provide a password"."<br>";
      }else{
        $password_1 = $_POST['password_1'];
      }
      //check if confirm password is empty
      if(empty($_POST['password_2'])){
        echo "Please confirm your password"."<br>";
      }else{
        $password_2 = $_POST['password_2'];
      }
  }


?>