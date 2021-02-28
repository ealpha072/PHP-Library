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
  $userimg= $_SESSION['image'];
?>

<div class="row">
  <div class="col-3 dashboard" id="dashboard"> 
    <div class="profile">
      <?php //echo "<img src = 'image/".$userimg.'" />'?>
      <h5 class="username"><?php echo ucfirst($_SESSION["username"]);?></h5>
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
    </div>
  </div>
  <div class="col-9 holder">
    <div class="holder-head">
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
        <h1 class="user-books"><?php echo $num_rows;?></h1>
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
    <hr>
    <div class="result-holder">
    
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
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['book_name'];?></td>
                  <td><?php echo $row['book_author'];?></td>
                  <td><?php echo $row['subject'];?></td>
                  <td><a href="borrow.php?id=<?php echo $row["id"];?>">Borrow</a></td>
                </tr>
                <?php }?>
          </tbody>
        </table>
      <?php } ?>

      <?php //refactor from this point
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
                  <td><?php echo $row['id'];?></td>
                  <td><?php echo $row['book_name'];?></td>
                  <td><?php echo $row['book_author'];?></td>
                  <td><?php echo $row['subject'];?></td>
                  <td><a href="borrow.php?id=<?php echo $row["id"];?>"><button class="btn btn-success">Borrow</button></a></td>
                </tr>
                <?php }?>
          </tbody>
        </table>
          
      <?php }?>
    </div>
  </div>
</div>
<?php require "footer.php"; ?>

