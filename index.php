<?php
require_once 'includes/config.php';
require_once __DIR__.'/includes/usuario.php';
$user= new \equipo\usuario();

?>
<!DOCTYPE HTML>
<hmtl>
	<head>
		<title>Cartas</title>
		<?php require ('includes/headComun.html');?>
	</head>

<body>
	
	
		<!-- === CONTENIDO === -->
		<div id="contenedor">

			

			<form action= "logarse.php" method="post" enctype='multipart/form-data'>
				<p>Nick: <input type="text" name="nick" value="" required></p>
				<p>Contraseña: <input type="password" name="pass" value="" required></p>

				<button type="submit" class="ui-btn">INICIAR</button>
				<button id = "botonPass" class="ui-btn" type="button" onclick="location.href = 'cambiar_contra.php'">CONTRASEÑA</button>
			</form>

		</div> <!-- FIN Contenedor -->

	</body>
</html>