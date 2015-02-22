<?
	session_start();
	if($_SESSION['logged'])
	{


	include "php/dbCon.php";
	$query1 = mysql_query("SELECT * FROM `e_users`");
	$query2 = mysql_query("SELECT * FROM `e_museus`"); 
	$query3 = mysql_query("SELECT * FROM `e_obres`"); 
	$query4 = mysql_query("SELECT * FROM `e_autors`"); 

	$num_users = mysql_num_rows($query1);
	$num_museus = mysql_num_rows($query2);;
	$num_obres = mysql_num_rows($query3);;
	$num_autors = mysql_num_rows($query4);; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="styles.css" rel="stylesheet" type="text/css">
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script type='text/javascript' src='menu_jquery.js'></script>
		<title>Editar/Modificar Usuaris</title>
	<script type="text/javascript">
		function change()
		{
			document.getElementById("button_mod").value="Modificar"; 
		}
	</script>

	</head>

	<body>
		<?php  include "barra_menu.php";//Incloem la barra del menu ?>
		<center>
			<h1> Panell Administració eMuseum  </h1>
			<table>

				<tr height=130>
					<td><img src="images/user.jpg" width=100 height=100 style="padding: 5px 20px 5px 20px;"></td><td><img src="images/museu.gif" width=100 height=100 style="padding: 5px 20px 5px 20px;"></td><td><img src="images/obra.jpg" width=100 height=100 style="padding: 5px 20px 5px 20px;"></td><td><img src="images/autor.jpg" width=100 style="padding: 5px 20px 5px 20px;"></td>
				<tr>
				<tr height=40>
					<td align="center">Nº Usuaris:<b><?php echo $num_users;?></b></td>
					<td align="center">Nº Museus: <b><?php echo $num_museus;?></b></td>
					<td align="center">Nº Obres:  <b><?php echo $num_obres;?></b></td>
					<td align="center">Nº Autors: <b><?php echo $num_autors;?></b></td>

				<tr>
				<tr height=40>
					<td><a href="afegir_usuari.php" style="color:white; border: 2px #0000FF solid; padding: 5px 20px 5px 20px; background-color:black; font-family: Comic Sans MS, Calibri, Arial; font-size: 12px; font-weight: bold; text-decoration: none;   border-radius: 15px; ">+ Afegir Usuari</a></td>
					<td><a href="afegir_museu.php" style="color:white; border: 2px #0000FF solid; padding: 5px 20px 5px 20px; background-color:black; font-family: Comic Sans MS, Calibri, Arial; font-size: 12px; font-weight: bold; text-decoration: none;   border-radius: 15px; ">+ Afegir Museu</a></td>
					<td><a href="afegir_obra.php" style="color:white; border: 2px #0000FF solid; padding: 5px 20px 5px 20px; background-color:black; font-family: Comic Sans MS, Calibri, Arial; font-size: 12px; font-weight: bold; text-decoration: none;   border-radius: 15px; ">+ Afegir Obres</a></td>
					<td><a href="afegir_autor.php" style="color:white; border: 2px #0000FF solid; padding: 5px 20px 5px 20px; background-color:black; font-family: Comic Sans MS, Calibri, Arial; font-size: 12px; font-weight: bold; text-decoration: none;   border-radius: 15px; ">+ Afegir Autor</a></td>
				<tr>
				<tr>
					<td><a href="gestionar_usuaris.php" style="color:white; border: 2px #0000FF solid; padding: 5px 20px 5px 20px; background-color:black; font-family: Comic Sans MS, Calibri, Arial; font-size: 12px; font-weight: bold; text-decoration: none;   border-radius: 15px; ">Gestionar Usuaris</a></td>
					<td><a href="gestionar_museus.php" style="color:white; border: 2px #0000FF solid; padding: 5px 20px 5px 20px; background-color:black; font-family: Comic Sans MS, Calibri, Arial; font-size: 12px; font-weight: bold; text-decoration: none;   border-radius: 15px; ">Gestionar Museus</a></td>
					<td><a href="gestionar_obres.php" style="color:white; border: 2px #0000FF solid; padding: 5px 20px 5px 20px; background-color:black; font-family: Comic Sans MS, Calibri, Arial; font-size: 12px; font-weight: bold; text-decoration: none;   border-radius: 15px; ">Gestionar Obres</a></td>
					<td><a href="gestionar_autors.php" style="color:white; border: 2px #0000FF solid; padding: 5px 20px 5px 20px; background-color:black; font-family: Comic Sans MS, Calibri, Arial; font-size: 12px; font-weight: bold; text-decoration: none;   border-radius: 15px; ">Gestionar Autors</a></td>
				<tr>
			</table>
			<br>
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
			<br>
			<a href="actualitzarVersioBD.php" style="color:white; border: 2px #0000FF solid; padding: 5px 20px 5px 20px; background-color:black; font-family: Comic Sans MS, Calibri, Arial; font-size: 12px; font-weight: bold; text-decoration: none;   border-radius: 15px; ">Actualitzar BD</a></td>
	</body>
</html>

<?
} else { 

	header("Location: index.php");
} 
?> 