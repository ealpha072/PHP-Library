<?php
    require "header.php";
    require "index.php";

    if(!isset($_SESSION['loggedin'])){
      $_SESSION['msg']= "You must be logged in";
      header("location:login.php");
    }

?>

<?php	$results = $user_boorowed_books->fetchAll(PDO::FETCH_ASSOC);?>
	    <h3>Your books</h3>	
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