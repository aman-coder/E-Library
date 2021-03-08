	
	<?php require 'header.php';?>
    <?php 
	require 'conn.php';
	error_reporting(0);

	$sql = 'SELECT * FROM book';
	
	$statement = $conn->prepare($sql);
	$statement->execute();
	$users = $statement->fetchALL(PDO::FETCH_OBJ);
	
	

		
	

	
?>
	<div class="imagesrotation">
		
	</div>
	<div class="main">
	<?php foreach($users as $user): ?>
	<div class="cards">
	
		<div class="image">
		<img src="<?= htmlspecialchars($user->img);?>" alt="">
		</div>
		<div class="name">
			<h5>Name:-<?= htmlspecialchars($user->name); ?></h5>
			<h6><br> <?= htmlspecialchars($user->auth_name);?><br></h6>
		</div>
		<div class="des">
		<a href="read.php?id=<?php echo($user->id); ?>" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Read More</a>
		</div>
		
	</div>
	<?php endforeach; ?>
			
	</div>
	
								
	
		

<?php
	 require 'footer.php'; ?>