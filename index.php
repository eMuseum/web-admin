<?php 
error_reporting(0);

session_start();
if(!$_SESSION['logged'])
{ 

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>EMuseum</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="css/style.css" />

	<script>
		$(function(){
		  var $form_inputs =   $('form input');
		  var $rainbow_and_border = $('.rain, .border');
		  /* Used to provide loping animations in fallback mode */
		  $form_inputs.bind('focus', function(){
		  	$rainbow_and_border.addClass('end').removeClass('unfocus start');
		  });
		  $form_inputs.bind('blur', function(){
		  	$rainbow_and_border.addClass('unfocus start').removeClass('end');
		  });
		  $form_inputs.first().delay(800).queue(function() {
			$(this).focus();
		  });
		});
	</script>

	</head>

	<body id="home">

		<center>
			<h1>EMuseum </h1>
			<?php 
				if(isset($_GET["err"])){
					$err = $_GET["err"];
 					if($err == "22"){ 
						echo "<font color=\"red\"> LOGIN INVÀLID </font>";
					}
				}
			?>
		<div class="rain">
			<div class="border start">
				<form action="php/serv_login.php" method = "post" class = "login">
					<label for="email">Username</label>
					<input name="username" type="text" placeholder="username"/>
					<label for="pass">Password</label>
					<input name="pass" type="password" placeholder="Password"/>
                    <input type="submit" value="LOG IN"/>
				</form>
			</div>
		</div>
		<div id="footer">
			Projecte Integrat de Software 2013-2014 <br>
			Grup: PIS_12 <br>
			Universitat de Barcelona

		</div>
		</center>
	</body>
</html>

<?php 
} else { 

	header("Location: panellAdmin.php");
} 
?> 