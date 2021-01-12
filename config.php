<?php
  #creating a new connection

  session_start();
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
    try{
      //PREPARE STMNTS
      //$sql1 = "INSERT INTO users (email, user_name, password) VALUES (:email,:user_name,:password)";
      //$stmt = $conn->prepare($sql);

      global $conn;
      $error =[];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password_1 = $_POST['password_1'];
      $password_2 = $_POST['password_2'];

      //check if email is empty
      if(empty($email)){
        echo "Please provide an email address!!"."<br>";
        array_push($error,"Email Error");
      }
      //check if username is empty
      if(empty($username)){
        echo "Username is empty"."<br>";
        array_push($error,"Username Error");
      }
      //check if password is empty
      if(empty($password_1)){
        echo "Please provide a password"."<br>";
        array_push($error,"Password Error");
      }
      //check if confirm password is empty
      if(empty($password_2)){
        echo "Please confirm your password"."<br>";
        array_push($error,"Password Error");
      }
      //check for password match
      if(!($password_1===$password_2)){
        echo "Password mismatch, please provide matching passwords!";
        array_push($error," Error");
      }

      //check if email exists in database
      $sql1 = "SELECT * FROM users WHERE email='$email' OR user_name ='$username'";
      $results= $conn->query($sql1);

      if($results->rowCount()>0){
        array_push($error,"User exists");
        echo "Username or email already taken!!";
      }

      if(count($error)===0){
        $password_1 = md5($password_1);
        $sql = "INSERT INTO users (email,user_name,password) VALUES ('$email','$username','$password_1')";

        $newResults=$conn->query($sql);

        //$stmt->bindParam('email', $_POST['email'],PDO::PARAM_STR);
        //$stmt->bindParam('username', $_POST['username'],PDO::PARAM_STR);
        //$stmt->bindParam('password', $_POST['password'],PDO::PARAM_STR);
        echo $username. "added successfully!!";
      }

    }catch(Exception $e){
      die ("Error: Could not execute .$sql1 ".$e->getMessage());
    }
}

?>