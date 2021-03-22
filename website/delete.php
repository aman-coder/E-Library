<?php
		require 'conn.php';

		$id = $_GET['id'];
		$sql = 'DELETE FROM book WHERE id=:id';

		$statament = $conn->prepare($sql);

		if($statament->execute([':id' => $id])):
			
			header("Location: index.php");
		
	 endif; ?>

	
