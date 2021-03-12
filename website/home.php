	
	<?php require 'header.php';?>
    <?php 
	require 'conn.php';
	// error_reporting(0);

	$sql = 'SELECT * FROM book';
	
	$statement = $conn->prepare($sql);
	$statement->execute();
	$users = $statement->fetchALL(PDO::FETCH_OBJ);

	?>
	

	<div class="imagesrotation">
		
	</div>
	<!-- <marquee behavior="alternate" onmouseover="stop()" onmouseout="start()"><h1 style="padding:5px; font-weight: bold;">Welcome to E-Library</h1></marquee> -->
	<h1 style="text-align:center; padding:5px; font-weight: bold;">Welcome to E-Library</h1>
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
		<a href="bookread.php?id=<?php echo($user->id); ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Read More</a>
		</div>
		
	</div>
	<?php endforeach; ?>
			
	</div>
	
								
	
		

<?php
	 require 'footer.php'; ?>