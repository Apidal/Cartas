<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Usuario.php';

$usuario = new \equipo\Usuario();

?>
<!DOCTYPE HTML>
<hmtl>
	<head>
		<title> Cambiar contraseña</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>	
		<meta http-equiv="Content-Type" content="text/html; charset= utf-8"/>

	</head>
	<body>
			
		<!-- === CONTENIDO === -->
		<div id="contenedor">
			<form action= "registrarse.php" method="post" enctype='multipart/form-data'>
				<p>Nick: <input type="text" name="nick" value="" required></p>
				<p>Contraseña: <input type="password" name="pass" value="" required></p>
				<p>Repetir ontraseña: <input type="password" name="pass2" value="" required></p>

				<input type="submit" value="Aceptar">

			</form>
			<button type="button" onclick="location.href = './'" >Cancelar</button>

		</div> <!-- FIN Contenedor -->
		
		</body>
</html>