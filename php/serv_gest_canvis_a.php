<?php
session_start();
if($_SESSION['logged'])
{ 

	

	include "dbCon.php";


	if(isset($_POST['modificar'])){
		$modificar = $_POST['modificar'];
	}else{
		$modificar = "";
	}


	if($modificar==""){
		 header("Location: ../gestionar_autors.php?err=24");
	     exit;

	 }else{

	 	 $query = "DELETE FROM  `emuseum`.`e_autors` WHERE id='$modificar';";
		 mysql_query($query, $con);
		 mysql_close($con);
		 header("Location: ../gestionar_autors.php?err=21");

	 }

} else { 

	header("Location: index.php");
}


 
?>