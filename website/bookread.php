<?php 
	require 'conn.php';

	$id= $_GET['id'];
	
$sql = 'SELECT * FROM book WHERE id=:id';
$statement = $conn->prepare($sql);
$statement->execute([':id'=> $id]);
$users = $statement->fetch(PDO::FETCH_OBJ);

?>
<script type="text/JavaScript">
			function alertedit(){
		   alert("Book is successfully Deleted");
		   //window.location.href="bookread.php";
		   window.open('home.php','_self');
		   return false;
		   }
		   </script>

<?php require 'header.php'; ?>
<section>

<h1 style="text-align:center;padding:5px; font-weight: bold;">Welcome to Reading Page</h1>
<div class="row">

 <div class="side">
 <img  class="img-fluid rounded mx-auto d-block" style=" height:600px; box-shadow: 2px 2px 10px black;" src="<?= $users->img;?>" alt="Responsive image">

 </div>
 <div class="main1 rounded mx-auto d-block" >
 <h3 style="text-align: center; margin-top:30px; padding:8px;">Name:- <?= htmlspecialchars($users->name);?></h3>
 <h5 style="text-align: center; padding:8px;">Author's name:- <?= htmlspecialchars($users->auth_name);?></h5>
    <h5 style="text-align: center; padding:8px;">Description:-</h5>
    <p style="text-align:justify; padding:8px"><?= htmlspecialchars($users->dscription)?></p>
    <center><a href="<?= htmlspecialchars($users->pdf_link); ?>"  target="_blank " rel="noopener noreferrer" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Read</a>
			<a href="edit.php?id=<?php echo($users->id); ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Edit</a>
			
			<button onclick="document.getElementById('id01').style.display='block'" class="btn btn-danger btn-lg active">Delete</button></center></div>
			<div id="id01" class="modal">
			<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
			<!--modal for deletion confirmation as needed -->
			<form class="modal-content" action="/action_page.php" >
				<div class="container">
				<h1>Delete Book</h1>
				<p>Are you sure you want to delete Book?</p>

				<div class="clearfix">
				<a  href="bookread.php?id=<?php echo($users->id); ?>"  class="btn btn-primary btn-lg active"  rel="noopener noreferrer" role="button" aria-pressed="true">Cancel</a></div>
					<a href="delete.php?id=<?php echo($users->id); ?>"   class="btn btn-danger btn-lg active" rel="noopener noreferrer" role="button" aria-pressed="true" onclick="alertedit()">Sure</a></div>
				</div>
				
			</form>  
 </div>
</div>
</section>

<?php require 'footer.php';?>