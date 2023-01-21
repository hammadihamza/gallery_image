<?php

session_start();
require('config_db.php');

if(isset($_POST) && !empty($_FILES['image']['name']) && !empty($_POST['title'])){

	$name = $_FILES['image']['name'];
	list($txt, $ext) = explode(".", $name);
	$image_name = time().".".$ext;
	//validate file format
	$allowed_formats = ["png","jpg","jpeg","gif"];
	$file_name = $_FILES['image']['name'];
	$file_extension = explode(".",$file_name);
	$file_extension = strtolower(end($file_extension));
	if(in_array($file_extension,$allowed_formats)){$tmp = $_FILES['image']['tmp_name'];}

	 // used to upload image in folder


	if(move_uploaded_file($tmp, 'uploads/'.$image_name)){

		$sql = "UPDATE image_gallery SET title = '".$_GET['title']."' , image = '".$image_name."'  WHERE id = '".$_GET['id']."'";

		$result = $conn->query($sql);

        if($result)
        {
        	$_SESSION['success'] = 'Image Remplacée avec succès.';
		    header("Location: ./image_gallery.php"); // used for redirection

        }
        else{
        	$_SESSION['error'] = 'le Remplacement de l"image a échoué';
		    header("Location: ./image_gallery.php");
        }
	}else{
		$_SESSION['error'] = 'le Remplacement de l"image a échoué';
		header("Location: ./image_gallery.php");
	}
}else{
	$_SESSION['error'] = 'Veuillez sélectionner une image ou écrire un commentaire';
	header("Location: ./image_gallery.php");
}

?>