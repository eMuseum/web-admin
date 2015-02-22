<?

	if($_SESSION['logged'])
	{ 
?>

<div id='cssmenu'>
	<ul>
	   <li class='active'><a href='panellAdmin.php'><span>PANELL D'ADMINISTRACIÓ APLICACIÓ EMUSEUM</span></a></li>
	   <li class='has-sub'><a href='#'><span>Obres</span></a>
	      <ul>
	         <li><a href='afegir_obra.php'><span>Afegir</span></a></li>
	         <li class='last'><a href='gestionar_obres.php'><span>Eliminar</span></a></li>
	      </ul>
	   </li>
	   <li class='has-sub'><a href='#'><span>Museus</span></a>
	      <ul>
	         <li><a href='afegir_museu.php'><span>Afegir</span></a></li>
	         <li class='last'><a href='gestionar_museus.php'><span>Eliminar</span></a></li>
	      </ul>
	   </li>
	   <li class='has-sub'><a href='#'><span>Usuaris</span></a>
	      <ul>
	         <li><a href='afegir_usuari.php'><span>Afegir</span></a></li>
	         <li class='last'><a href='gestionar_usuaris.php'><span>Modificar / Eliminar</span></a></li>
	      </ul>
	   </li>
	   <li class='has-sub'><a href='#'><span>Autors</span></a>
	      <ul>
	         <li><a href='afegir_autor.php'><span>Afegir</span></a></li>
	         <li class='last'><a href='gestionar_autors.php'><span>Eliminar</span></a></li>
	      </ul>
	   </li>
	   <!--
	   <li class='has-sub'><a href='#'><span>Comentaris</span></a>
	      <ul>
	         <li class='last'><a href='#'><span>Eliminar</span></a></li>
	      </ul>
	   </li>
	-->
	   <li class='has-sub last'><a href='#'><span>Opcions</span></a>
	      <ul>
	         <li><a href="php/logout.php" ><span>Tancar Sessió</span></a></li>
	         <li><a href="actualitzarVersioBD.php" ><span>Actualitzar Versió BD</span></a></li>
	         <li class='last'><a ><span>About</span></a></li>
	      </ul>
	   </li>
	</ul>
</div>


<?
} else { 

	header("Location: index.php");
} 
?> 