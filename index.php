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
					
		</div> <!-- FIN Contenedor -->

	</body>
</html>