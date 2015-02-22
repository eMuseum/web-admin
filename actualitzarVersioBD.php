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
		<title>Actualitzar Versió BD</title>
	</head>

	<body>
		<?php  include "barra_menu.php";//Incloem la barra del menu ?>
		<center>
			<h1> Actualitzar Versió BD</h1>
			<h3> Versions Actual BD</h3>
			<table>
				<tr>
					<td>Nom</td><td>Versió</td>
				</tr>
					<?php
							include "php/dbCon.php";
							$query = mysql_query("SELECT * FROM `e_version`");
							while ($element = mysql_fetch_array($query)){ 
								echo "<tr><td><b>".$element['name']."</b></td><td>".$element['version']."<tr>";
							}
					?>
			</table>
			<form id="subirImg" name="subirImg" enctype="multipart/form-data" method="post" action="php/serv_actualitzarVersioBD.php">
				<input type="submit" id="button" name="subirBtn" id="subirBtn" style="margin-top:10px;" value="Actualitzar Versio BD" />
			</form>


		<center>
	</body>
</html>

<?
} else { 

	header("Location: index.php");
} 
?> 