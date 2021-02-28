<?php
    require 'config.php';
    require 'header.php';

    //$name = $_SESSION['username'];
    $user_id =$_SESSION['id'];
    $id = $_GET['id'];

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
                        <button class="btn btn-success" name="borrow">Borrow</button>
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
            $sql = "INSERT INTO borrowed_books(book_id, user_id) VALUES($id,$user_id)";
            $conn->exec($sql);
            echo "New record updated!! ";
        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }
?>   

<a href="index.php">Home</a>