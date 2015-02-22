<?
	session_start();
	if($_SESSION['logged'])
	{ 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="styles.css" rel="stylesheet" type="text/css">
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script type='text/javascript' src='menu_jquery.js'></script>
		<title>Afegir Autor</title>
	</head>

	<body>
		<?php  include "barra_menu.php";//Incloem la barra del menu ?>
		<center>
			<h1> Afegir Autor </h1>
				<?php 
				if(isset($_GET["err"])){
					$err = $_GET["err"];
					if($err == "0"){ 
						echo "<font color=\"green\"> Autor Afegit Correctament!!</font>";
					}else if($err == "1"){ 
							echo "<font color=\"red\"> Falten Camps! </font>";
					}
				}
			?>
			<div id='Formulari'>
				<form id="subirImg" name="subirImg" enctype="multipart/form-data" method="post" action="php/serv_afegir_autor.php">

					<input id="element_form" name="nom" type="text" placeholder="Nom Autor"/><br><br>
					Imatge:
					<input type="file" name="imagen" id="imagen" /><br>
					<textarea  rows="20" cols="100" id="info" name="info" tabindex="200" placeholder="Descripcio del autor..."></textarea><br>
					<input type="submit" id="button" name="subirBtn" id="subirBtn" style="margin-top:10px;" value="Afegir Autor" />
				</form>
			</div>
		<center>
	</body>
</html>

<?
} else { 

	header("Location: index.php");
} 
?> 