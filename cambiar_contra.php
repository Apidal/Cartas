<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Usuario.php';

$usuario = new \equipo\Usuario();


session_destroy();

?>
<!DOCTYPE HTML>
<hmtl>
	<head>
		<title> Cambiar contraseña</title>
		
		<?php require ('includes/headComun.html');?>

	</head>
	<body>
			
		<!-- === CONTENIDO === -->
		<div id="contenedor">
			<form action= "registrarse.php" method="post" enctype='multipart/form-data'>
				<p>Nick: <input type="text" name="nick" value="" required></p>
				<p>Contraseña: <input type="password" name="pass" value="" required></p>
				<p>Repetir contraseña: <input type="password" name="pass2" value="" required></p>

				<button class="ui-btn" type="submit">Aceptar</button>

			</form>
			<button class="ui-btn" type="button" onclick="location.href = './'" >Cancelar</button>

		</div> <!-- FIN Contenedor -->
		
		</body>
</html>