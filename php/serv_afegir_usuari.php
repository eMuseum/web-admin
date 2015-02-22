
<?php

session_start();
if($_SESSION['logged'])
{ 

	if(isset($_POST['nombre']) && $_POST['email'] && isset($_POST['password']) && $_POST['nombre'] != ""  && $_POST['password'] != "" && $_POST['email'] != ""){
		include "dbCon.php";
		$buscarUsuario = "SELECT * FROM e_users WHERE username = '$_POST[nombre]' "; 
		$result = mysql_query($buscarUsuario);
			 
		$count = mysql_num_rows($result);
			  
		 if ($count == 1){
			 header("Location: ../afegir_usuari.php?err=22");
		     exit;
		 }else{	
		 	$query = "INSERT INTO `emuseum`.`e_users` (`username`, `password`, `email`) VALUES ( '$_POST[nombre]', '$_POST[password]', '$_POST[email]');";

		    
		 
		if (!mysql_query($query, $con))
		{
			die('Error: ' . mysql_error());
			echo "Error al crear el usuario." . "<br />";
		}
		 
		else{
			header("Location: ../afegir_usuari.php?err=23");
		}
		 
		}

		 mysql_close($con);
	}else{
		header("Location: ../afegir_usuari.php?err=21");
	}

	
} else { 

	header("Location: index.php");
} 
 
?>