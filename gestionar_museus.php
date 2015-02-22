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
			<h1> Gestionar Museus </h1>
			<?php 
				if(isset($_GET["err"])){
					$err = $_GET["err"];
					if($err == "21"){ 
							echo "<font color=\"blue\"> Museu Eliminat! </font>";
					}else if($err = 24){
						echo "<font color=\"red\"> No has sel·leccionat cap museu! </font>";
					}
				}
			?>
			<div id='Formulari'>
				<form method="post" action="php/serv_gest_canvis_m.php">
					<div id='scroll_m'>
						<?php
							include "php/dbCon.php";
							$query = mysql_query("SELECT * FROM `e_museus`");
							while ($element = mysql_fetch_array($query)){ ?>
							<div id='museu'>
							<div id='img_m'>
								<img src="<?php echo $element['imatge'];?>" height=90 width=100>
							</div>
							<div id='user_text'>
						<?php
								echo "Nom: ".$element['nom']."<br>";
								echo "Telefon: ".$element['telefon']."<br>";
								echo "Valoració: ".$element['valoracio']."<br>";
						?>
							</div>
							<div id='checkbox'>
								<input type="checkbox" name="modificar" value="<?php  echo $element['id'];?>">
							</div>
						</div>
						<?php }?>
					</div><!--Final del Scroll !-->

					
				<br><input type="submit" id="button_m" name="subirBtn"  style="margin-left:50px; margin-top:10px; background-color:red;" value="Borrar Museu" />
				</div>

			</form>
		<center>
	</body>
</html>

<?
} else { 

	header("Location: index.php");
} 
?> 