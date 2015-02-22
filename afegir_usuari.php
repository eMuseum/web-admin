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
		<title>Subir imágenes con php</title>
	</head>

	<body>
		<?php  include "barra_menu.php";//Incloem la barra del menu ?>
		<center>
			<h1> Afegir Usuari </h1>
			<?php 
				if(isset($_GET["err"])){
					$err = $_GET["err"];
					if($err == "23"){ 
						echo "<font color=\"green\"> Usuari Afegit Correctament!!</font>";
					}else if($err == "22"){ 
							echo "<font color=\"red\"> Nom Usuari repetit </font>";
					}else if($err == "21"){ 
							echo "<font color=\"red\"> Falten Camps! </font>";
					}
				}
			?>
			<div id='Formulari_u'>
				<form id="subirImg" name="subirImg" enctype="multipart/form-data" method="post" action="php/serv_afegir_usuari.php">
					<input id="element_form_u" name="nombre" type="text" placeholder="Nom Usuari"/><br>
					<input id="element_form_u" name="email" type="text" placeholder="Email"/><br>
					<input id="element_form_u" name="password" type="password" placeholder="Pass"/><br>
					<input id="element_form_u" name="password2" type="password" placeholder="Repeteix Pass"/>

					<input type="submit" id="button" name="subirBtn" id="subirBtn" value="Afegir Usuari" />
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