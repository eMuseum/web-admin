<?php
	session_start();
	if($_SESSION['logged'])
	{ 

	//Actualitzar versio amb sockets
	}else { 
		header("Location: index.php");
	} 


?>