<?php
	session_start();
	if($_SESSION['logged'])
	{ 

		if(isset($_POST['nom']) && isset($_POST['info'])){
			$nom = $_POST['nom'];
			$info = $_POST['info'];
			
			if ($_POST['subirBtn']) {
				copy($_FILES['imagen']['tmp_name'], "../images/".$_FILES['imagen']['name']);
			}else{
				echo "Not image to Upload";
			}

			include "dbCon.php";
			$num = 0;
			$path = "http://vps53673.ovh.net/web/images/".$_FILES['imagen']['name'];
			$query = "INSERT INTO `emuseum`.`e_autors` (`nom`,`valoracio`,`num_valoracions`,`descripcio`,`imatge`) VALUES
			                                       ('$nom','$num','$num','$info','$path');";
	
			if (!mysql_query($query, $con))
			{
				die('Error: ' . mysql_error());
				echo "No s'ha pogut crear el museu";
			}

			mysql_close();

			header("Location: http://vps53673.ovh.net/web/afegir_autor.php?err=0");
		}else{
			header("Location: http://vps53673.ovh.net/web/afegir_autor.php?err=1");
		}
	}else { 
		header("Location: index.php");
	} 


?>