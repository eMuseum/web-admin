<?php
	include "../php/dbCon.php";

	//Aquesta es la part que procesara el canvi de contrasenya
	if(isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['id'])){//si tenim les dades que necessitem:
		$pass = mysql_real_escape_string($_POST['pass1']);//les agafo
		$pass2 = mysql_real_escape_string($_POST['pass2']);
		$codi = mysql_real_escape_string($_POST['id']);

		//torno a comprovar que el temps estigui correcte ja que podría ser algú enviant posts des de un altre server
		$query = mysql_query("SELECT `reset_time` FROM `e_users` WHERE reset_key = '$codi';",$con);
		$resposta = mysql_fetch_array($query);
		if($resposta['reset_time'] + 43200  >= time()){//si el codi es correcte:
			if($pass == $pass2 && $pass != ""){
				$query = mysql_query("SELECT `id` FROM `e_users` WHERE reset_key = '$codi';",$con);//agafo la id del usuari
				$resposta = mysql_fetch_array($query);
				$id = $resposta['id'];  
				$pass = sha1($pass);//encripto la contrasenya
				$query = "UPDATE `emuseum`.`e_users` SET password ='$pass' WHERE id='$id';";//cambio la password
				mysql_query($query, $con);
				$query = "UPDATE `emuseum`.`e_users` SET reset_key ='0' WHERE id='$id';";//resetejo valors per evitar que es puguin canviar 2 cops la password
				mysql_query($query, $con);
				$query = "UPDATE `emuseum`.`e_users` SET reset_time ='0' WHERE id='$id';";
				mysql_query($query, $con);
				mysql_close();
				echo "Password Acceptada ";
			}else{
				mysql_close();
				$location = "Location: recupass.php?codi=".$codi."&err=1";
				header($location);
			}
		}
		$location = "Location: recupass.php?codi=".$codi."&err?=1";
		header($location);
	}else{//Si no hem pasat variables per post vol dir que estem intentant solicitar un canvi de password
		if(isset($_GET['codi']) && $_GET['codi'] !== "" && $_GET['codi'] !== 0 && $_GET['codi'] !== "0" && $_GET['codi'] !== False){//algunes comprovacions de seguretat
			$codi = mysql_real_escape_string($_GET['codi']);//escapem els codis per evitar algunes injeccions SQL
			$query = mysql_query("SELECT `reset_time` FROM `e_users` WHERE reset_key = '$codi';",$con);//obtenim si la pass exiteix i en aquest cas obtenim el moment en el que va ser generada
			$resposta = mysql_fetch_array($query);

			if(mysql_num_rows($resposta) > 0 && $resposta['reset_time'] + 43200  >= time()){//si hi ha una resposta i a mes esta dins del temps:
				mysql_close();//tanquem la bd i mostrem el formulari
				?>
					<?php
					if(isset($_GET['err']) && $_GET['err']=="1"){
						echo "<font color=\"red\"> Password Incorrecte </font>";
					}?>
					<body>
						<form name="formulari" method="post" action="recupass.php?send=1"> 
							Nova contrasenya: <br>
							<input type="password" name="pass1" id="pass1"/><br>
							Repeteix la nova contrasenya:<br>
							<input type="password" name="pass2" id="pass2"/><br>
							<input type="hidden" name="id" value="<?php echo $codi;?>"/>
							<input type="submit" value="submit" />
						</form>
					</body>
				</html>
				<?php
			}else{//si no existia el codi o estava fora del temps
				mysql_close();
				echo "Error,el codi no existeix o la seva validesa ha expirat.";
			}

		}else{//si no hi ha codi aquesta persona no tindria que estar aquí.
			mysql_close();
			echo "ooops, sembla que t'has perdut.";
		}
	}


?>