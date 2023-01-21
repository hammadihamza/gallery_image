<?php
session_start();
require('config_db.php');


if(isset($_POST) && !empty($_POST['id'])){

	   // select image to delete    
	   $sql_select = "SELECT image FROM image_gallery WHERE id = ".$_POST['id'];
	   $select_result = $conn->query($sql_select);
	    $row = $select_result->fetch_row();
		$image_name = $row[0];

		// code to unlink(delete)  image physically from folder 
		$unl = unlink("./uploads/".$image_name);

		$sql = "DELETE FROM image_gallery WHERE id = ".$_POST['id'];
		$conn->query($sql);


		$_SESSION['success'] = 'Image supprimée avec succès.';
		header("Location: ./image_gallery.php");
}else{
	$_SESSION['error'] = 'Veuillez sélectionner l"image ou écrire un commentaire';
	header("Location: ./image_gallery.php");
}


?>