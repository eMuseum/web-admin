<?php 
	$con=mysql_connect("localhost","emuseum_u","123qwe");
	
	 mysql_select_db("emuseum", $con) or die
	 	("La DB no existeix");

	 mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $con);
	
?>