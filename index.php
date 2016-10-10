<?php
require_once 'includes/config.php';
require_once __DIR__.'/includes/usuario.php';
$user= new \equipo\usuario();

?>
<!DOCTYPE HTML>
<hmtl>
	<head>
		<title>Cartas</title>
				
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
		<meta http-equiv="Content-Type" content="text/html; charset= utf-8"/>
	</head>

<body>
	
	
		<!-- === CONTENIDO === -->
		<div id="contenedor">

			

			<form action= "logarse.php" method="post" enctype='multipart/form-data'>
				<p>Nick: <input type="text" name="nick" value="" required></p>
				<p>Contraseña: <input type="password" name="pass" value="" required></p>

				<input type="submit" value="Iniciar">
			</form>

			<button type="button" onclick="location.href = 'cambiar_contra.php'" >Contraseña</button>
			<!--
			
							<php $contenidos= $cont -> cargaContenidoRecientes($plataforma,"noticia");
							$count =count($contenidos);
							if($count>0){
								for($i = 1; $i <= $count && $i <=4   ; $i++) {
									$id = $contenidos[$i]['id'];
									echo "<li>
										<div onclick=location.href='noticiaX.php?id=".$id."' style='cursor:pointer' >";
									$img = $contenidos[$i]['imagen_portada'];
									echo "<img class='destacBg md-whiteframe-2' src = ".$img.">";
									$titulo = $contenidos[$i]['titulo'];
									echo "<p>".$titulo."</p>";
									echo "</div></li>";
								}
							}else{
								echo "<li><div><p>Aun no hay noticias :( </p></div></li>";
							}
							?>
							-->
		
		</div> <!-- FIN Contenedor -->

	</body>
</html>