<?php
	session_start();
	if($_SESSION['logged'])
	{ 

		if(isset($_POST['nom']) && isset($_POST['direccion']) && isset($_POST['telefon']) && isset($_POST['lat'])
			&& isset($_POST['lng']) && isset($_POST['hor_lab_inici']) && isset($_POST['hor_lab_fi']) && isset($_POST['hor_fes_inici'])
			&& isset($_POST['hor_fes_fi'])  && isset($_POST['info'])){
			$nom = $_POST['nom'];
			$direccio = $_POST['direccion'];
			$telefon = $_POST['telefon'];
			$lat = $_POST['lat'];
			$lng = $_POST['lng'];
			$hor_lab_inici = $_POST['hor_lab_inici'];
			$hor_lab_fi = $_POST['hor_lab_fi'];
			$hor_fes_inici = $_POST['hor_fes_inici'];
			$hor_fes_fi = $_POST['hor_fes_fi'];
			if(isset($_POST['teWifi']) && isset($_POST['passWifi'])){
				$teWifi = $_POST['teWifi'];
				$passWifi = $_POST['passWifi'];
				$wifi_ssid = $_POST['wifiSsid'];
			}else{
				$teWifi = "No";
				$passWifi = "Cap";
				$wifi_ssid = "No";
			}
			$info = $_POST['info'];
			
			if ($_POST['subirBtn']) {
				copy($_FILES['imagen']['tmp_name'], "../images/".$_FILES['imagen']['name']);
			}else{
				echo "Not image to Upload";
			}

			include "dbCon.php";
			$num = 0;
			$path = "http://vps53673.ovh.net/web/images/".$_FILES['imagen']['name'];
			$query = "INSERT INTO `emuseum`.`e_museus` (`nom`, `direccio`, `latitud`,`longitud`,`telefon`,`hora_laboral_inici`,`hora_laboral_fi`,`hora_festiu_inici`,`hora_festiu_fi`,`wifi_ssid`,`wifi_password`,`valoracio`,`num_valoracions`,`descripcio`,`imatge`) VALUES
			                                       ('$nom', '$direccio', '$lat','$lng','$telefon','$hor_lab_inici','$hor_lab_fi','$hor_fes_inici','$hor_fes_fi','$wifi_ssid','$passWifi','$num','$num','$info','$path');";
	
			if (!mysql_query($query, $con))
			{
				die('Error: ' . mysql_error());
				echo "No s'ha pogut crear el museu";
			}

			mysql_close();
			header("Location: http://vps53673.ovh.net/web/afegir_museu.php?err=0");
		}else{
			header("Location: http://vps53673.ovh.net/web/afegir_museu.php?err=1");
		}
	}else { 
		header("Location: index.php");
	} 


?>