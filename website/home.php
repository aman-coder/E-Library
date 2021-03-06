	
	<?php require 'header.php';?>
    <?php 
	require 'conn.php';
	error_reporting(0);

	$sql = 'SELECT * FROM book';
	
	$statement = $conn->prepare($sql);
	$statement->execute();
	$users = $statement->fetchALL(PDO::FETCH_OBJ);
	
	

		
	

	
?>
	<div class="col">
	<?php foreach($users as $user): ?>
	<div class="container">
		<div class="image">
		<img class="image" src="<?= htmlspecialchars($user->img);?>" alt=""></div>
		<div class="middle">
		<div class="text"><?= htmlspecialchars($user->name); ?><br> <?= htmlspecialchars($user->auth_name);?><br>
		<a href="read.php?id=<?php echo($user->id); ?>">Read</a></div>
		</div></div>
		
		
	<?php endforeach; ?>
	</div>
	
	
	
	
								
		
		

<?php 
		
		 require'footer.php'; ?>