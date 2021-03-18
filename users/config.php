<?php
  #creating a new connection

  session_start();
  //database vars
  $dsn = "mysql:host=localhost;dbname=library;charset=utf8mb4";
  $username = "root";
  $password = "";

  //error variables
  $msg='';
  $loginErrors=[];
  $regErrors =[];
  $globalErrors=[];

	//connection to database
	try{
		$conn = new PDO($dsn,$username,$password);
		//set PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//echo "Connected successfully!!"."<br>";
		//$conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
  	}catch(Exception $e){
    	echo "Connection failed ".$e->getMessage();
  	}

	//prepiring sql statements
	$sql1 = $conn->prepare("SELECT * FROM users where email=? AND password=?");	//login sql
	$sql2 = $conn->prepare("SELECT * FROM users WHERE email=?");	//check if username or email exists
	$sql3 = $conn->prepare("INSERT INTO users (email,user_name,password,user_image,phone,course,study_year,address) VALUES (?,?,?,?,?,?,?,?)");	//reg sql

	$sql4 =$conn->prepare("UPDATE users SET user_image=?,phone=?, address=? WHERE id=?");	//update user profile
	$sql5 = $conn->prepare("UPDATE users SET password=? WHERE email=? ");	//update password
  
  	//login code
	if(isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
		global $conn;

		$email = trim(htmlspecialchars($_POST['email']));
		$password = $_POST['password'];
		
		//validating email

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$loginEmailError ="Invalid email format";
			array_push($loginErrors, $loginEmailError);
		}

		if(count($loginErrors)===0){
			$password =md5($password);
			//$sql = $conn->prepare("SELECT * FROM users where email='$email' AND password='$password'");
			$sql1->execute(array($email,$password));
			$num_rows = $sql1->rowCount();
			$result = $sql1->fetchAll(PDO::FETCH_ASSOC);

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
				$invalid ="Inavalid email address or password";
				array_push($globalErrors,$invalid);
				//echo $num_rows."<br>";
				//echo "Invalid email or password!!";
			}
		}

	}

  	//register code
	if(isset($_POST['register']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
		try{ 
			//setting variables   
			global $conn;
			$error =[];      	
			$email = trim(htmlspecialchars( $_POST['email']));
			$username = trim(htmlspecialchars( $_POST['username']));
			$phone =trim(htmlspecialchars( $_POST['phonenumber']));
			$course =trim(htmlspecialchars( $_POST['course']));
			$study_year=trim(htmlspecialchars( $_POST['studyyear']));
			$password_1 =  $_POST['password_1'];
			$password_2 =$_POST['password_2'];
			$address =trim(htmlspecialchars( $_POST['address']));

			//input validation....
			//name validation
			if(!preg_match('/^[a-zA-Z\s]+$/',$username)){
				$nameError ="Invalid name format, name should only contain letters";
				array_push($regErrors, $nameError);
			}

			//email validation
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$emailError ="Invalid email format";
				array_push($regErrors, $emailError);
			}

			//password validation
			if(strlen($password_1)<6){
				$passwordError ="Password is too short, must be more than 6 characters";
				array_push($regErrors, $passwordError);
			}


			$filename =$_FILES['userimage']['name'];
			$file =$_FILES['userimage']['tmp_name'];
			$destination = "uploads/".$filename;
			$extension =pathinfo($filename, PATHINFO_EXTENSION);

			if(!in_array($extension,['png','jpg','jpeg'])){
					$filetypeError= "You file extension type is not allowed";
					array_push($regErrors,$filetypeError);
				}else{
					if(move_uploaded_file($file,$destination)){
						echo "Success";
					}else{
						echo  "Failed";
				}
			}
			
			//check for password match
			if(!($password_1===$password_2)){
				$mismatchError= "Password mismatch, please provide matching passwords!";
				array_push($error,$mismatchError);
			}

			//check if email exists in database
			//$sql1 = $conn->prepare("SELECT * FROM users WHERE email='$email' OR user_name ='$username'");
			
			$sql2->execute(array($email));
			$results = $sql2->rowCount();

			if($results>1){
				$emailTakenError ='Email already exist, please use a different one';
				array_push($regErrors,$emailTakenError);
				echo "Username or email already taken!!";
			}

			//if everything is okay
			if(count($regErrors)===0){

				//password processing and database entry
				$password_1 = md5($password_1);
				/*$sql = "INSERT INTO users (email,user_name,password,user_image,phone,course,study_year,address) 
						VALUES ('$email','$username','$password_1',
								'$filename','$phone','$course','$study_year','$address'
						)";*/
				$sql3->execute(array($email,$username,$password_1,$filename,$phone,$course,$study_year,$address));
				
				//$newResults=$conn->query($sql);
				
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

	if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['save-profile'])){
		$id =$_SESSION['id'];
		//
		$phone =trim(htmlspecialchars($_POST['number']));
		$address =trim(htmlspecialchars($_POST['address']));
		
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

		//$sql =$conn->prepare("UPDATE users SET user_image='$filename',phone='$phone', address='$address' WHERE id=$id");
		$sql4->execute(array($filename,$phone, $address,$id));

		//delete old image and set new image
		unlink("uploads/".$_SESSION['image']);
		$_SESSION['image']= $filename;

		header("Location: index.php");
	}

	if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['change-password'])){
		//get session variables
		$email =$_SESSION['user_email'];
		$pass =$_SESSION['password'];
		
		//get form inputs
		$current =md5($_POST['current']);
		$new_p=md5($_POST['new-p']);
		$confirm_p =md5($_POST['confirm-p']);

		//matching new and old password
		if($new_p!=$confirm_p){
			$mismatchError ="Please confirm your new password correctly";
			array_push($globalErrors,$mismatchError);
			//echo "Passowrds mismatch..new and confirm";
		}else{
			/*first, match new passwords with confirm pass,
			if they dont match, alert user..if they match, get users 
			current password from database and comapre it to current p
			, if they match, reset the password, if they dont,	
			*/

			if($current!=$pass){
				$passMismatch ='Current password doesnt match your old password';
				array_push($globalErrors,$passMismatch);
				echo 'Password mismatch..current and db'."<br>";
			}else{
				//update user pass
				//$sql = $conn->prepare("UPDATE users SET password='$new_p' WHERE email='$email' ");
            	$sql5->execute(array($new_p, $email));
				header('location: index.php');
			}

		}

	}

?>