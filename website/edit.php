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
		header("location:home.php");
	}

//------------------------------------form to b changed -------------------------------------------
}
?><?php require 'header.php'; ?>
		<?php if(!empty($message)):?>
			<div class ="alert alert-success">
				<?= $message;?>
			</div>
		<?php endif; ?>
		<form method="post">

					<table border="2" align="center" cellpadding="5" cellspacing="5">
					<tr>
					<td> Enter Name :</td>
					<td> <input value="<?= $users->name;?>" type="text" name="name" size="48"> </td>
					</tr>
					<tr>
					<td> Enter Author name :</td>
					<td> <input value="<?= $users->auth_name;?>" type="text" name="auth_name" size="48"> </td>
					</tr>
					<tr>
					<td> Enter img url :</td>
					<td> <input value="<?= $users->img;?>" type="text" name="img" size="48"> </td>
					</tr>
					<tr>
					<td> Enter description :</td>
					<td> <input value="<?= $users->dscription;?>" type="text" name="dscription" size="48"> </td>
					</tr>
					<tr>
					<td> Enter Pdf-link: </td>
					<td> <input value="<?= $users->pdf_link;?>" type="text" name="pdf_link" size="48"> </td>
					</tr>
					<tr>
					<td></td>
					<td>
					<input type="submit" actionn = "home1.php" value="submit">
					<input type="reset" value="Reset">
					</td>
					</tr>
					</table>


<?php require 'footer.php'; ?>