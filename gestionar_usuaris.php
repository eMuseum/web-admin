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
			<h1> Modificar/Eliminar Usuaris </h1>
			<div id='Formulari'>
				<form method="post" action="php/serv_gest_canvis_u.php">
					<div id='scroll'>
						<?php
							include "php/dbCon.php";
							$query = mysql_query("SELECT * FROM `e_users`");
							while ($element = mysql_fetch_array($query)){ ?>
							<div id='user'>
							<div id='img'>
								<img src="images/user.png"  height=50 width=50>
							</div>
							<div id='user_text'>
						<?php
								echo "Usuari: ".$element['username']."<br>";
								echo "Pass: ".$element['password']."<br>";
								echo "email: ".$element['email']."<br>";
						?>
							</div>
							<div id='checkbox'>
								<input type="checkbox" name="modificar" value="<?php  echo $element['username'];?>">
							</div>
						</div>
						<?php }?>
					</div><!--Final del Scroll !-->
					<div id='modicar_dreta'>
						<?php 
							if(isset($_GET["err"])){
								$err = $_GET["err"];
								if($err == "23"){ 
									echo "<font color=\"blue\"> Dades Modificades Correctament!!</font>";
								}else if($err == "22"){ 
										echo "<font color=\"red\"> Nom Usuari repetit </font>";
								}else if($err == "24"){ 
										echo "<font color=\"red\"> Sel·lecciona al menys un usuari </font>";
								}
								else if($err == "21"){ 
										echo "<font color=\"blue\"> Usuari eliminat Correctament! </font>";
								}
							}
						?>
						<h2> Noves Dades: </h2>
						<input id="element_form_mod" name="nombre" type="text" onclick="change()" placeholder="Nou Nom Usuari"/><br>
						<input id="element_form_mod" name="email" type="text" onclick="change()" placeholder="Nou Email"/><br>
						<input id="element_form_mod" name="password" type="password" onclick="change()" placeholder="Nova Pass"/><br>
						<input type="submit" id="button_mod" name="subirBtn" id="subirBtn_mod" value="Eliminar" />

							<font size=2px color=orange>
								<br><br>
								*Sel·lecciona el usuari que vols elminar o modificar.<br> 
								Si el vols eliminar prem el botó eliminar deixant els 
								camps en blanc, sinó omple la dada o dades que vulguis 
								i prem el mateix botó que haurà canviat de nom.
							<font>

					</div>
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