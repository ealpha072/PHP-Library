<!--<div class="row">
    <div class="col-3 dashboard" id="dashboard">
        <div class="profile">
            <img src='../images/avatar.png'>
            <h5 class="username">
                <?php echo ucfirst($_SESSION["username"]);?>
            </h5>
        </div>
<div class="links">
    <div>
        <a href=""><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
    </div>
    <div>
        <a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> My profile</a>
    </div>
    <div>
        <form action="" method="POST">
            <button class="btn btn-primary" name="borrowed_books"><i class="fa fa-book" aria-hidden="true"></i> View borrowed books</button>
        </form>
    </div>
    <div>
        <a href="about"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a>
    </div>
</div>-->
</div>
<div class="col-9 holder">
    <!--<div class="holder-head">
        <div class="search-book">
            <form class="form-inline" method="post" action="">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" class="form-control" id="" placeholder="Search Book" name="book-search">
                </div>
                <button type="submit" class="btn btn-primary mb-2" name="search"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                <button type="submit" class="btn btn-primary mb-2" name="allbooks"><i class="fa fa-book" aria-hidden="true"></i> See All Books</button>
            </form>
        </div>
        <div class="user-info">
            <div class="log-out">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user" aria-hidden="true"></i>
            My Profile
            </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> View Profile</a>
                        <a class="dropdown-item" href="reset.php"><i class="fa fa-unlock" aria-hidden="true"></i> Password</a>
                        <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row user-info-holder">
        <div class="col b-b">
            <?php
          $user_boorowed_books->execute();
          $num_rows =$user_boorowed_books->rowCount();
                 
        ?>
                <h1 class="user-books">
                    <?php echo $num_rows;?>
                </h1>
                <h4>Borrowed books</h4>
        </div>
        <div class="col f-c">
            <h1 class="fines">40</h1>
            <h4>Fines collected</h4>
        </div>
        <div class="col o-t">
            <h1 class="returned">3</h1>
            <h4>Returned</h4>
        </div>
        <div class="col c-e">
            <h1 class="credits">100</h1>
            <h4>Credits Earned</h4>
        </div>
    </div>
    <hr>-->
    <!--<div class="result-holder">

        <?php
      if (isset($_POST['borrowed_books'])){
        $results = $user_boorowed_books->fetchAll(PDO::FETCH_ASSOC);?>

            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Subject</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
          foreach($results as $row){
            $row_id =$row['book_id'];
            $sql1 =$conn->prepare("SELECT * FROM books WHERE id=$row_id");
            $sql1->execute();
            $results1 =$sql1->fetchAll(PDO::FETCH_ASSOC);
               
            foreach ($results1 as $line) {?>
                        <tr>
                            <td>
                                <?php echo $line['id'];?>
                            </td>
                            <td>
                                <?php echo $line['book_name'];?>
                            </td>
                            <td>
                                <?php echo $line['book_author'];?>
                            </td>
                            <td>
                                <?php echo $line['subject'];?>
                            </td>
                        </tr>
                        <?php } }?>
                </tbody>
            </table>
            <?php
       }

      if(isset($_POST['search'])){
        $searched_book=$_POST['book-search'];
        $sql = $conn->prepare("SELECT * FROM books WHERE book_name='$searched_book'");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);?>

                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Subject</th>
                            <th scope="col" class='text-center'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row){?>
                        <tr>
                            <td>
                                <?php echo $row['id'];?>
                            </td>
                            <td>
                                <?php echo $row['book_name'];?>
                            </td>
                            <td>
                                <?php echo $row['book_author'];?>
                            </td>
                            <td>
                                <?php echo $row['subject'];?>
                            </td>
                            <td><a href="borrow.php?id=<?php echo $row[" id "];?>">Borrow</a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <?php } 

       //refactor from this point
      if(isset($_POST['allbooks'])){
        $sql = $conn->prepare("SELECT * FROM books");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        ?>

                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Subject</th>
                            <th scope="col" class='text-center'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $row){?>
                        <tr>
                            <td>
                                <?php echo $row['id'];?>
                            </td>
                            <td>
                                <?php echo $row['book_name'];?>
                            </td>
                            <td>
                                <?php echo $row['book_author'];?>
                            </td>
                            <td>
                                <?php echo $row['subject'];?>
                            </td>
                            <td><a href="borrow.php?id=<?php echo $row[" id "];?>"><button class="btn btn-success">Borrow</button></a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>

                <?php }?>
    </div>-->
</div>
</div>


//code for viewing all books
<?php if(isset($_POST['allbooks'])){
						$sql = $conn->prepare("SELECT * FROM books");
						$sql->execute();
						$result = $sql->fetchAll(PDO::FETCH_ASSOC);?>

						<table class="table table-striped table-dark">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Title</th>
									<th scope="col">Author</th>
									<th scope="col">Subject</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($result as $row){?>
								<tr>
									<td><?php echo $row['id'];?></td>
									<td><?php echo $row['book_name'];?></td>
									<td><?php echo $row['book_author'];?></td>
									<td><?php echo $row['subject'];?></td>
									<td><a href="borrow.php?id=<?php echo $row[" id "];?>"><button class="btn btn-success">Borrow</button></a></td>
								</tr>
							<?php }?>
							</tbody>
						</table>

					<?php }?>
// borrowewd books
                    <?php
						if (isset($_POST['borrowed_books'])){
							$results = $user_boorowed_books->fetchAll(PDO::FETCH_ASSOC);?>

								<table class="table table-striped table-dark">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Title</th>
											<th scope="col">Author</th>
											<th scope="col">Subject</th>
										</tr>
									</thead>
									<tbody>
							<?php
							foreach($results as $row){
								$row_id =$row['book_id'];
								$sql1 =$conn->prepare("SELECT * FROM books WHERE id=$row_id");
								$sql1->execute();
								$results1 =$sql1->fetchAll(PDO::FETCH_ASSOC);
								
								foreach ($results1 as $line) {?>
									<tr>
										<td><?php echo $line['id'];?></td>
										<td><?php echo $line['book_name'];?></td>
										<td><?php echo $line['book_author'];?></td>
										<td><?php echo $line['subject'];?></td>
									</tr>
								<?php } }?>
									</tbody>
								</table>
					<?php }?>

//for prepend and append
<div>
        <h4>Your E-mail:<span class="email"> <?php echo $_SESSION["user_email"];?></span></h4>
        <h4>Your username:<span class="email"> <?php echo ucfirst($_SESSION["username"]);?></span></h4>
        <a href="reset.php">Reset my password</a><br>
        <a href="index.php">Home</a>
    </div>

//user profile div 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Change Profile Picture</button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">New Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <input type="file">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" name="profile-pic">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <small id="emailHelp" class="form-text text-muted"></small>


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


      <form method="POST" action="">
	Name: <input type="text" name="name" value="<?php if (isset($name)) echo $name; ?>">
	<span class="error"><?php if (isset($nameError)) echo $nameError ?></span>

	Email: <input type="text" name="email" value="<?php if (isset($email)) echo $email; ?>">
	<span class="error"><?php if (isset($emailError)) echo $emailError ?></span>
	<input type="submit" name="submit">
</form>

$remember = validate($_POST['remember']);
$remember = filter_var($remember, FILTER_VALIDATE_BOOLEAN);

