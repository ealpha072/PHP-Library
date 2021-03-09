<?php
  //session_start();
  require "header.php";
  require "config.php";
  if(!isset($_SESSION['loggedin'])){
    $_SESSION['msg']= "You must be logged in";
    header("location:login.php");
  }

  $user_id = $_SESSION['id'];
  $user_boorowed_books=$conn-> prepare("SELECT book_id FROM borrowed_books WHERE user_id =$user_id");

  /*
  on start of the load, display the number of books a userr has borrowed and display the number
  on clicking my books, dispaly the info of borrowed books to user

  get users id, in the borrowed books tables, look for books under the user id
  for each book that the user has under his id, display book info from the book table, 
  */
?>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">
			<h4 class="heading">My Dashboard</h4> 
			<img src = '../images/avatar.png'>
			<h5 class="username"><?php echo ucfirst($_SESSION["username"]);?></h5>
		</div>
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action bg-light"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
			<a href="userbooks.php" class="list-group-item list-group-item-action bg-light"><i class="fa fa-user" aria-hidden="true"></i> My Books</a>
            <a href="profile.php" class="list-group-item list-group-item-action bg-light"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a>
            <a href="" class="list-group-item list-group-item-action bg-light"><i class="fa fa-info-circle" aria-hidden="true"></i> About</a>            
        </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle"> Hide/Show</button>

                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              		<span class="navbar-toggler-icon"></span>
            	</button>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" >
					<!--style=""-- should problems arise in the future, add this to this div-->
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        
						<li class="nav-item active">
							<form class="form-inline" method="post" action="">
								<div class="form-group mx-sm-3 mb-2">
									<label for="search" class="sr-only">Search</label>
									<input type="text" class="form-control" id="" placeholder="Search Book" name="book-search">
								</div>
								<button type="submit" class="btn btn-primary mb-2" name="search"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
							</form>
						</li>
						<li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    			My Profile
                  			</a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> View Profile</a>
                                <a class="dropdown-item" href="reset.php"><i class="fa fa-unlock" aria-hidden="true"></i> Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <!--main content goes here-->
				<div class="row user-info-holder">
					<!--holds the display divs for borrowed bks etc-->
					<div class="col b-b">
						<h4>Borrowed Books</h4>
						<?php
							$user_boorowed_books->execute();
							$num_rows =$user_boorowed_books->rowCount();	
						?>
						<h1 class="user-books"><?php echo $num_rows;?></h1>						
					</div>
					<div class="col f-c">						
						<h4>Fines collected</h4>
						<h1 class="fines">40</h1>
					</div>
					<div class="col o-t">						
						<h4>Returned</h4>
						<h1 class="returned">3</h1>
					</div>
					<div class="col c-e">						
						<h4>Credits Earned</h4>
						<h1 class="credits">100</h1>
					</div>
				</div>
				<hr>
				
				<div class="result-holder">
  					<!--search results go here-->
					<?php	
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
											<td><a href="borrow.php?id=<?php echo $row[" id "];?>">Borrow</a></td>
									</tr>
								<?php }?>
							</tbody>
						</table>
					<?php } ?>
					
<?php  require "footer.php"; ?>