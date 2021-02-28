<?php
    require 'config.php';
    require 'header.php';

    //$name = $_SESSION['username'];
    $user_id =$_SESSION['id'];
    $id = $_GET['id'];
    //prepare statemnets
    $borrowedsql = $conn->prepare("SELECT * FROM borrowed_books WHERE book_id=$id");


    if(isset($_GET['id'])){
        #echo $_GET['id'];
            
        echo $id;
        $sql = $conn->prepare("SELECT * FROM books WHERE id=$id");
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
                  <td>
                    <form method="post" action="">
                        <button class="btn btn-success" name="borrow" data-toggle="modal" data-target="#exampleModalCenter">Borrow</button>
                        
                    </form>
                </td>
                </tr>
                <?php }?>
          </tbody>
        </table>
      
    <?php } ?>

<?php 
    if(isset($_POST['borrow'])){
        try{
            $borrowedsql->execute();
            $num_rows = $borrowedsql->rowCount();
            if($num_rows >0){?>
                <div class="result">
                    <p>You have already borrowed this book</p>
                </div>
                
                <?php } else{
                $sql = "INSERT INTO borrowed_books(book_id, user_id) VALUES($id,$user_id)";
                $conn->exec($sql);?>
                <div class="borrowed_book_info">
                    <h3>You have borrowed the following book;</h3>
                    <div class="info">
                        <h4>Book Name: <?php echo $result[0]['book_name'];?></h4>
                        <h4>Book Author: <?php echo $result[0]['book_author'];?></h4>
                        <h4>Subject: <?php echo $result[0]['subject'];?></h4>
                    </div>            
                </div>
            <?php }?>
            
            

        <?php }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }
?>   

<a href="index.php">Home</a>
<?php require "footer.php";?>