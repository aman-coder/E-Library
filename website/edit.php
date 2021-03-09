<?php
require 'conn.php';
//--------------------------to get the data into the form we use select method-------------------------------------------------------
$id= $_GET['id'];
$sql = 'SELECT * FROM book WHERE id=:id';
$statement = $conn->prepare($sql);
$statement->execute([':id'=> $id]);
$users = $statement->fetch(PDO::FETCH_OBJ);
if(isset($_POST['name']) && isset($_POST['auth_name']) && isset($_POST['img']) && isset($_POST['dscription']) && isset($_POST['pdf_link']) ){
	$name= $_POST['name'];
	$auth_name= $_POST['auth_name'];
	$img= $_POST['img'];
	$dscription= $_POST['dscription'];
	$pdf_link= $_POST['pdf_link'];
//------------------------to update the values of the book------------------------------------------------------------------
	$sql = 'UPDATE  book SET name =:name, auth_name=:auth_name,img=:img, dscription=:dscription, pdf_link=:pdf_link WHERE id=:id';
	$statement = $conn->prepare($sql);
	if ($statement->execute([':name'=> $name, 'auth_name'=> $auth_name, 'img'=> $img, 'dscription'=>$dscription, 'pdf_link'=> $pdf_link, ':id' => $id]))
	{
		echo '<script>
		alert("Book is successfully Edited");
		window.location.href="home.php";
		</script>';
	}

//------------------------------------form to b changed -------------------------------------------
}
?><?php require 'header.php'; ?>
		<?php if(!empty($message)):?>
			<div class ="alert alert-success">
				<?= $message;?>
			</div>
		<?php endif; ?>
		<h3 class="edit">Edit Details!</h3>
			<form class="table" method="post"  style="max-width: 90%; margin:20px auto; padding:20px; background-color:hsla(120,100%,75%,0.3);">
					<br><br>
					
					<tr>
					<td> Enter Name :</td><br>
					<td> <input value="<?= $users->name;?>" type="text" name="name" size="48"> </td>
					</tr><br><br>
					<tr>
					<td> Enter Author name :</td><br>
					<td> <input value="<?= $users->auth_name;?>" type="text" name="auth_name" size="48"> </td>
					</tr><br><br>
					<tr>
					<td> Enter img url :</td><br>
					<td> <input value="<?= $users->img;?>" type="url" name="img" size="48"> </td>
					</tr><br><br>
					<tr>
					<td> Enter Pdf-link: </td><br>
					<td> <input value="<?= $users->pdf_link;?>" type="url" name="pdf_link" size="48"> </td>
					</tr><br><br>
					<tr>
					<td> Enter description :</td><br>
					<td> <input value="<?= $users->dscription;?>" type="text" name="dscription" size="48"> </td>
					</tr><br><br>
					
					<tr>
					<td></td>
					<td>
					<center><input type="submit" class="btn btn-primary btn-sm active" actionn = "home1.php" value="submit"></center>
				
					
					</td>
					</tr>
					


<?php require 'footer.php'; ?>