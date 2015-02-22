<?
	session_start();
	if($_SESSION['logged'])
	{ 
?>

<?php
	$nombre = $_POST['imgName'];
	$autor  = $_POST['autor'];
	$info   = $_POST['info'];

	if ($_POST['subirBtn']) {
		copy($_FILES['imagen']['tmp_name'], "images/nuevaImagen.jpg");
	}else{
		echo "Not image to Upload";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Imagen Subida</title>
	</head>

	<body>
		<?php
			echo $nombre."<br>";
			echo $autor."<br>";
			echo $info."<br>";

		?>
		<img src="images/nuevaImagen.jpg">
	</body>
</html>

<?
} else { 

	header("Location: index.php");
} 
?> 