<?
	session_start();
	if($_SESSION['logged'])
	{ 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="styles.css" rel="stylesheet" type="text/css">
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script type='text/javascript' src='menu_jquery.js'></script>
		<title>Afegir Museu</title>


		<script type="text/javascript">
			//Declaramos las variables que vamos a user
			var lat = null;
			var lng = null;
			var map = null;
			var geocoder = null;
			var marker = null;
			         
			jQuery(document).ready(function(){
			     //obtenemos los valores en caso de tenerlos en un formulario ya guardado en la base de datos
			     lat = jQuery('#lat').val();
			     lng = jQuery('#long').val();
			     //Asignamos al evento click del boton la funcion codeAddress
			     jQuery('#pasar').click(function(){
			        codeAddress();
			        return false;
			     });
			     //Inicializamos la función de google maps una vez el DOM este cargado
			    initialize();
			});
			     
			    function initialize() {
			     
			      geocoder = new google.maps.Geocoder();
			        
			       //Si hay valores creamos un objeto Latlng
			       if(lat !='' && lng != '')
			      {
			         var latLng = new google.maps.LatLng(lat,lng);
			      }
			      else
			      {
			         var latLng = new google.maps.LatLng(41.3866634,2.1639244000000417);
			      }
			      //Definimos algunas opciones del mapa a crear
			       var myOptions = {
			          center: latLng,//centro del mapa
			          zoom: 15,//zoom del mapa
			          mapTypeId: google.maps.MapTypeId.ROADMAP //tipo de mapa, carretera, híbrido,etc
			        };
			        //creamos el mapa con las opciones anteriores y le pasamos el elemento div
			        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			         
			        //creamos el marcador en el mapa
			        marker = new google.maps.Marker({
			            map: map,//el mapa creado en el paso anterior
			            position: latLng,//objeto con latitud y longitud
			            draggable: true //que el marcador se pueda arrastrar
			        });
			        
			       //función que actualiza los input del formulario con las nuevas latitudes
			       //Estos campos suelen ser hidden
			        updatePosition(latLng);
			         
			         
			    }
			     
			    //funcion que traduce la direccion en coordenadas
			    function codeAddress() {
			         
			        //obtengo la direccion del formulario
			        var address = document.getElementById("direccion").value;
			        //hago la llamada al geodecoder
			        geocoder.geocode( { 'address': address}, function(results, status) {
			         
			        //si el estado de la llamado es OK
			        if (status == google.maps.GeocoderStatus.OK) {
			            //centro el mapa en las coordenadas obtenidas
			            map.setCenter(results[0].geometry.location);
			            //coloco el marcador en dichas coordenadas
			            marker.setPosition(results[0].geometry.location);
			            //actualizo el formulario      
			            updatePosition(results[0].geometry.location);
			             
			            //Añado un listener para cuando el markador se termine de arrastrar
			            //actualize el formulario con las nuevas coordenadas
			            google.maps.event.addListener(marker, 'dragend', function(){
			                updatePosition(marker.getPosition());
			            });
			      } else {
			          //si no es OK devuelvo error
			          alert("No podemos encontrar la direcci&oacute;n, error: " + status);
			      }
			    });
			  }
			   
			  //funcion que simplemente actualiza los campos del formulario
			  function updatePosition(latLng)
			  {
			       
			       jQuery('#lat').val(latLng.lat());
			       jQuery('#long').val(latLng.lng());
			   
			  }
	</script>
	<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-1749329-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

	</script>
	</head>

	<body>
		<?php  include "barra_menu.php";//Incloem la barra del menu ?>
		<center>
			<h1> Afegir Museu </h1>
			<?php 
				if(isset($_GET["err"])){
					$err = $_GET["err"];
					if($err == "0"){ 
						echo "<font color=\"green\"> Museu Afegit Correctament!!</font>";
					}else if($err == "1"){ 
							echo "<font color=\"red\"> Falten Camps! </font>";
					}
				}
			?>
			<div id='Formulari_m'>
					<form id="subirImg" name="subirImg" enctype="multipart/form-data" method="post" action="php/serv_afegirMuseu.php">
					<input id="element_form" name="nom" type="text" placeholder="Nom Museu"/>
					<input id="element_form" name="telefon" type="text" placeholder="Telefon"/>
					<input style="width:300px" type="text" id="direccion" name="direccion" placeholder="Direcció" value=""/>
					<br>
					<br>
					<button id="pasar">Obtenir Coordenades</button>
					<label>Latitud: </label><input type="text" readonly name="lat" id="lat"/>
					<label> Longitud:</label> <input type="text" readonly name="lng" id="long"/>
					<a href="#google">Veure mapa</a>
					<br>Horari laboral:
					<input id="element_form" name="hor_lab_inici" type="text" maxlength="4" style="margin-left:20px; width:50px;"placeholder="Hora Inici"/>
					<input id="element_form" name="hor_lab_fi" type="text" maxlength="4" style="width:50px;" placeholder="Hora fi"/>
					Horari festius:
					<input id="element_form" name="hor_fes_inici" type="text" maxlength="4" style="margin-left:20px;width:50px;" placeholder="Hora Inici"/>
					<input id="element_form" name="hor_fes_fi" type="text" maxlength="4" style="width:50px;"placeholder="Hora fi"/>
					
					<br>Wifi?
					<input type="checkbox" name="teWifi" value="true">
					<input id="element_form" name="wifiSsid" type="password" placeholder="wifi ssid"/>
					<input id="element_form" name="passWifi" type="password" placeholder="Pass Wifi"/>
					<br><h3>Imatge:</h3><input type="file" style="margin-left:20px;" name="imagen" id="imagen" />
					<textarea  rows="18" cols="100" id="info" name="info" tabindex="200" placeholder="Info..."></textarea><br>

					<input type="submit" id="button" name="subirBtn" id="subirBtn" value="Afegir Museu" />
				</form>


		<br><br><br>
		<h1>Posició del Museu</h1>
		<form id="google" name="google" action="#">
		<div id="map_canvas" style="width:800px;height:300px;"></div>
				<br><br><br>
				<br><br><br>
		</form>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
		</div>
		<center>
	</body>
</html>

<?
} else { 

	header("Location: index.php");
} 
?> 