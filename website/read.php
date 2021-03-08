<?php 
	require 'conn.php';

	$id= $_GET['id'];
	
$sql = 'SELECT * FROM book WHERE id=:id';
$statement = $conn->prepare($sql);
$statement->execute([':id'=> $id]);
$users = $statement->fetch(PDO::FETCH_OBJ);

?>
	
		<?php require 'header.php'; ?>
		
			<h4 class="title-read">Read</h4>			
			<div class="read">
			<img class="card-img" src="<?= $users->img;?>" alt="Card image">
			<div class="card text-black">
			<div class="card-img-overlay">
			<h5 class="card-title">Name:- <?= htmlspecialchars($users->name);?></h5>
			<p class="card-text">Author's name:- <?= htmlspecialchars($users->auth_name);?></p>
			<h5 class="card-text">Description:- </h5>
			<p class="card-text-1"><?= htmlspecialchars($users->dscription)?><br></p>
			<div class="basse">
			<center><a href="<?= htmlspecialchars($users->pdf_link); ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Read</a>
			<a href="edit.php?id=<?php echo($users->id); ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
			
			<button onclick="document.getElementById('id01').style.display='block'" class="btn btn-primary btn-sm active">Delete</button></center></div>
			<div id="id01" class="modal">
			<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
			<form class="modal-content" action="/action_page.php">
				<div class="container">
				<h1>Delete Account</h1>
				<p>Are you sure you want to delete your account?</p>

				<div class="clearfix">
				<a href="read.php?id=<?php echo($users->id); ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Cancel</a></div>
					<a href="delete.php?id=<?php echo($users->id); ?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Delete</a></div>
				</div>
				
			</form>
			</div>
			</div>
			 </div>
			  </div>
	
	
							
		<?php require 'footer.php'; ?>