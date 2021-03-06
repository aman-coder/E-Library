<?php
require 'conn.php';

$message="";
if(isset($_POST['name']) && isset($_POST['auth_name']) && isset($_POST['img']) && isset($_POST['dscription']) && isset($_POST['pdf_link']) ){
	$name= $_POST['name'];
	$auth_name= $_POST['auth_name'];
	$img= $_POST['img'];
	$dscription= $_POST['dscription'];
	$pdf_link= $_POST['pdf_link'];

	//to insert values to the server ---------------------------------------------------------
	$sql = 'INSERT INTO book(name, auth_name, img, dscription, pdf_link) VALUES (:name, :auth_name, :img, :dscription, :pdf_link)';
	$statement = $conn->prepare($sql);
	if ($statement->execute([':name'=> $name, 'auth_name'=> $auth_name, 'img'=> $img, 'dscription'=>$dscription, 'pdf_link'=> $pdf_link]))
	{
		$message = 'data inserted succesfully';
		header("Location: home.php");
	}

}
?>
<!--form to be filled by the user-->
<div class="bigimg">
<?php require 'header.php'; ?>
		<?php if(!empty($message)):?>
			<div class ="alert alert-success">
				<?= $message;?>
			</div>
		<?php endif; ?>
		
		<form class ="form" method="post">

					<table border="2" align="center" cellpadding="5" cellspacing="5">
					<tr>
					<td> Enter Name :</td>
					<td> <input type="text" name="name" size="48"> </td>
					</tr>
					<tr>
					<td> Enter Author name :</td>
					<td> <input type="text" name="auth_name" size="48"> </td>
					</tr>
					<tr>
					<td> Enter img url :</td>
					<td> <input type="text" name="img" size="48"> </td>
					</tr>
					<tr>
					<td> Enter description :</td>
					<td> <input type="text" name="dscription" size="48"> </td>
					</tr>
					<tr>
					<td> Enter Pdf-link: </td>
					<td> <input type="text" name="pdf_link" size="48"> </td>
					</tr>
					<tr>
					<td></td>
					<td>
					<input type="submit" actionn = "home1.php" value="submit">
					<input type="reset" value="Reset">
					</td>
					</tr>
					</table>
					


<?php require 'footer.php'; ?></div>