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
				<div data-role="fieldcontain">
					<p>Nick: <input type="text" name="nick" value="" required></p>
					<p>Contraseña: <input type="password" name="pass" value="" required></p>
					<p>Repetir contraseña: <input type="password" name="pass2" value="" required></p>
				
					<div class = "ui-grid-a">
						<div class="ui-block-a"><button class="ui-btn ui-icon-check ui-btn-icon-top" type="submit">Aceptar</button></div>
						<div class="ui-block-b"><button class="ui-btn ui-icon-delete ui-btn-icon-top" type="button" onclick="location.href = './'" >Cancelar</button></div>
					</div>
				</div>
			</form>
			

		</div> <!-- FIN Contenedor -->
		
		</body>
</html>