<?php
		require 'conn.php';

		$id = $_GET['id'];
		$sql = 'DELETE FROM book WHERE id=:id';

		$statament = $conn->prepare($sql);

		if($statament->execute([':id' => $id])):
		echo '<script>
		alert("Book is successfully Deleted");
		window.location.href="home.php";
		</script>';
		
	 endif; ?>

	
