<?php

	session_start();
	if($_SESSION['logged'])
	{ 
		if(isset($_POST['nombre'] && isset($_POST['password']) && $_POST['nombre'] != ""  && $_POST['password'] != "" )){
			include "dbCon.php";
			$buscarUsuario = "SELECT * FROM e_users WHERE username = '$_POST[nombre]' "; 
			$result = mysql_query($buscarUsuario);
				 
			$count = mysql_num_rows($result);
				  
			 if ($count == 1){
				 echo "<br />". "El Nombre de Usuario ya Existe en nuestra Base de Datos!" . "<br />";
			     exit;
			 }else{	 
			     $query = "INSERT INTO e_users (username, password, email ) VALUES ('$_POST[nombre]', '$_POST[password]')";
			 
			if (!mysql_query($query, $conexion))
			{
				die('Error: ' . mysql_error());
				echo "Error al crear el usuario." . "<br />";
			}
			 
			else{
				echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
				echo "<h4>" . "Bienvenido: " . $_POST['nombre'] . "</h4>";
			}
			 
			}

			 mysql_close($conexion);
		}
} else { 

	header("Location: index.php");
} 
 
?>