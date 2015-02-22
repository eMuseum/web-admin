<?php
session_start();
if($_SESSION['logged'])
{ 

	

	include "dbCon.php";


	$username = $_POST['nombre'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$modificar = $_POST['modificar'];
	$eliminar = "true";

	if($modificar==""){
		 header("Location: ../gestionar_usuaris.php?err=24");
	     exit;
	}
	//Comprovem la unicitat del nom
	if($username != ""){
		$buscarUsuario = "SELECT * FROM e_users WHERE username = '$_POST[nombre]' ";
		$result = mysql_query($buscarUsuario); 
		$count = mysql_num_rows($result);
		 if ($count == 1){
			 header("Location: ../gestionar_usuaris.php?err=22");
		     exit;
		 }
	}
	//canviem email
	if($email != ""){
	 	 $query = "UPDATE `emuseum`.`e_users` SET email ='$email' WHERE username='$modificar';";
		 mysql_query($query, $con);
		 $eliminar = "false";
	}
	//canviem la pass
	if($password != ""){
		 $password = sha1($password);
	 	 $query = "UPDATE `emuseum`.`e_users` SET password ='$password' WHERE username='$modificar';";
		 mysql_query($query, $con);
		 $eliminar = "false";
	}
	//canviem el username
	if($username != ""){
	 	 $query = "UPDATE `emuseum`.`e_users` SET username ='$username' WHERE username='$modificar';";
		 mysql_query($query, $con);
		 $eliminar = "false";

	}


	 if($eliminar =="true"){
	 	 $query = "DELETE FROM  `emuseum`.`e_users` WHERE username='$modificar';";
		 mysql_query($query, $con);
		 $query = "DELETE FROM  `emuseum`.`e_comments` WHERE username='$modificar';";
		 mysql_query($query, $con);
		
		 mysql_close($con);
		 header("Location: ../gestionar_usuaris.php?err=21");
	 }else{
	 	mysql_close($con);
	 	header("Location: ../gestionar_usuaris.php?err=23");	
	 }

} else { 

	header("Location: index.php");
}


 
?>