<?php
  #creating a new connection

  session_start();
  $dsn = "mysql:host=localhost;dbname=library;charset=utf8mb4";
  $username = "root";
  $password = "";
  $msg='';

  try{
    $conn = new PDO($dsn,$username,$password);
    //set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully!!"."<br>";
    //$conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
  }catch(Exception $e){
    echo "Connection failed ".$e->getMessage();
  }
  
  //login code
  if(isset($_POST['login'])){
    global $conn;

    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors=[];

    if(count($errors)===0){
        $password =md5($password);
        $sql = $conn->prepare("SELECT * FROM users where email='$email' AND password='$password'");
        $sql->execute();
        $num_rows = $sql->rowCount();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        if($num_rows===1){

        	$_SESSION['loggedin']=true;
          	$_SESSION['username'] = $result[0]['user_name'];
          	$_SESSION['user_email']=$result[0]['email'];
          	$_SESSION['id']= $result[0]['id'];
          	$_SESSION['password']=$result[0]['password'];
          	$_SESSION['image']=$result[0]['user_image'];
			$_SESSION['course'] =$result[0]['course'];
			$_SESSION['yr']=$result[0]['study_year'];
          
          	header("location:index.php");
          //echo var_dump($result);
        }else{
          	echo $num_rows."<br>";
          	echo "Invalid email or password!!";
        }
      }

  }

  	//register code
	if(isset($_POST['register'])){
		try{ 
			//setting variables   
			global $conn;
			$error =[];      	
			$email = $_POST['email'];
			$username = $_POST['username'];
			$phone =$_POST['phonenumber'];
			$course =$_POST['course'];
			$study_year=$_POST['studyyear'];
			$password_1 = $_POST['password_1'];
			$password_2 = $_POST['password_2'];
			$address =$_POST['address'];

			$filename =$_FILES['userimage']['name'];
			$file =$_FILES['userimage']['tmp_name'];
			$destination = "uploads/".$filename;
			$extension =pathinfo($filename, PATHINFO_EXTENSION);

			if(!in_array($extension,['png','jpg','jpeg'])){
					echo "You file extension type is not allowed";
				}else{
					if(move_uploaded_file($file,$destination)){
						echo "Success";
					}else{
						echo  "Failed";
				}
			}
			
			//check for password match
			if(!($password_1===$password_2)){
				echo "Password mismatch, please provide matching passwords!";
				array_push($error," Error");
			}

			//check if email exists in database
			$sql1 = $conn->prepare("SELECT * FROM users WHERE email='$email' OR user_name ='$username'");
			$sql1->execute();
			$results = $sql1->rowCount();

			if($results>1){
				array_push($error,"User exists");
				echo "Username or email already taken!!";
			}

			//if everything is okay
			if(count($error)===0){

				//password processing and database entry
				$password_1 = md5($password_1);
				$sql = "INSERT INTO users (email,user_name,password,user_image,phone,course,study_year,address) 
						VALUES ('$email','$username','$password_1',
								'$filename','$phone','$course','$study_year','$address'
						)";
				$newResults=$conn->query($sql);
				
				//get last inserted id
				$last_id = $conn->lastInsertId();

				//session variables
				$_SESSION['id'] =$last_id;
				$_SESSION['loggedin']=true;
				$_SESSION['username'] = $username;
				$_SESSION['success'] = 'You are now logged in';
				$_SESSION['user_email']=$email;
				$_SESSION['password']=$password_1;
				$_SESSION['image']= $filename;
				$_SESSION['course'] =$course;
				$_SESSION['yr']=$study_year;
				
				//redirect users
				header('location:index.php');
			}

		}catch(Exception $e){
		die ("Error: Could not execute .$sql1 ".$e->getMessage());
		}
	}

	if(isset($_POST['save-profile'])){
		$id =$_SESSION['id'];
		//
		$phone =$_POST['number'];
		$address =$_POST['address'];
		
		//image
		$filename =$_FILES['user_image']['name'];
		$file =$_FILES['user_image']['tmp_name'];
		$destination="uploads/".$filename;
		$extension=pathinfo($filename,PATHINFO_EXTENSION);

		if(!in_array($extension,['png','jpg','jpeg'])){
			echo "You file extension type is not allowed";
		}else{
			if(move_uploaded_file($file,$destination)){
				echo "Success";
			}else{
				echo 'Failed';
			}
		}

		$sql =$conn->prepare("UPDATE users SET user_image='$filename',phone='$phone', address='$address' WHERE id=$id");
		$sql->execute();

		//delete old image and set new image
		unlink("uploads/".$_SESSION['image']);
		$_SESSION['image']= $filename;

		header("Location: index.php");
	}

?>