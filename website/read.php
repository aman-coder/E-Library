<?php 
	require 'conn.php';

	$id= $_GET['id'];
	
$sql = 'SELECT * FROM book WHERE id=:id';
$statement = $conn->prepare($sql);
$statement->execute([':id'=> $id]);
$users = $statement->fetch(PDO::FETCH_OBJ);

?>
	
		<?php require 'header.php'; ?>
		<nav> 
								
			<center><div class="read">
					
										  <div class="card text-black">
										  <img class="card-img" src="<?= $users->img;?>" alt="Card image">
										  <div class="card-img-overlay">
										    <h5 class="card-title"><?= htmlspecialchars($users->name);?></h5>
										   
										    <p class="card-text"><?= htmlspecialchars($users->auth_name);?></p>
											<button><a href ="<?= htmlspecialchars($users->pdf_link); ?>">Read</a></button>
											<h5 class="card-text">Description</h5>
										    <p class="card-text-1"><?= htmlspecialchars($users->dscription)?><br></p>
										 &nbsp;<button><a href ="edit.php?id=<?php echo($users->id); ?>">EDIT</a></button>
									 	&nbsp;<button><a href ="delete.php?id=<?php echo($users->id); ?>">DELETE</a></button>
											</div>
										</div>
									</div> </center>
									
							
		<?php require 'footer.php'; ?>