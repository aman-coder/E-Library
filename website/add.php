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
		echo '<script>
		alert("Book is successfully Added");
		window.location.href="home.php";
		</script>';
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

		<h2 class="title1">Add Book Detail!</h2>

		<form class ="form" name="Addform" onsubmit="return formvalidation()" method="post" style="max-width: 500px; margin:20px auto; padding:20px;background-color:hsla(120,100%,75%,0.3);">
					<tr>
					<td>Enter Name :</td>
					<br>
					<td> <input type="text" name="name" size="48"  placeholder="Book name" id="name" > <span id="nameloc"></span></td>
					</tr><br><br>
					<tr>
					<td> Enter Author name :</td><br>
					<td> <input type="text" name="auth_name" size="48" placeholder="Author name" id="auth_name" > <span id="authloc"></span></td>
					</tr><br><br>
					<tr>
					<td> Image url :</td><br>
					<td> <input type="url" pattern="^(?:(?:https?|HTTPS?|ftp|FTP):\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-zA-Z\u00a1-\uffff0-9]-*)*[a-zA-Z\u00a1-\uffff0-9]+)(?:\.(?:[a-zA-Z\u00a1-\uffff0-9]-*)*[a-zA-Z\u00a1-\uffff0-9]+)*)(?::\d{2,})?(?:[\/?#]\S*)?$" name="img" size="48" placeholder="Enter the valid image url here" id="img" ><span id="imgloc"></span> </td>
					</tr><br><br>
					<tr>
					<td>Pdf-link: </td><br>
					<td> <input type="url"  pattern="^(?:(?:https?|HTTPS?|ftp|FTP):\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-zA-Z\u00a1-\uffff0-9]-*)*[a-zA-Z\u00a1-\uffff0-9]+)(?:\.(?:[a-zA-Z\u00a1-\uffff0-9]-*)*[a-zA-Z\u00a1-\uffff0-9]+)*)(?::\d{2,})?(?:[\/?#]\S*)?$" name="pdf_link" size="48" placeholder="Enter valid pdf-link" id="pdf"> <span id="pdfloc"></span></td>
					</tr><br><br>
					<tr>
					<td>Description :</td><br>
					<td> <input type="text" name="dscription" size="48" placeholder="Enter Description of the book" id="desc"><span id="desloc"></span> </td>
					</tr>
					
					<tr>
					<td></td>
					<td>
						<br><br>
					<input type="submit" class="btn btn-primary btn-lg active"  value="Submit">
					<input type="reset" class="btn btn-primary btn-lg active" value="Reset">
					</td></tr>
					
		</table>
					


<?php require 'footer.php'; ?></div>