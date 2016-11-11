<?php
require_once './includes/config.php';
require_once __DIR__.'/includes/Usuario.php';
$user= new \equipo\Usuario();

?>
<!DOCTYPE HTML>
<hmtl>
	<head>
		<title>Cartas</title>
		<?php require ('includes/headComun.html');?>
	</head>

<body>
	<?php
		if(isset($_SESSION['nombre']))
			header("Location:./principal.php");
	?>
	
		<!-- === CONTENIDO === -->
		<div id="contenedor">

			

			<form action= "logarse.php" method="post" data-ajax="false" enctype='multipart/form-data'>
				<div data-role="fieldcontain">
					<p>Nick: <input type="text" name="nick" value="" required></p>
					<p>Contraseña: <input type="password" name="pass" value="" required></p>
				
					<div class="ui-grid-a">
						<div class="ui-block-a"><button type="submit" class="ui-btn ui-icon-check ui-btn-icon-top">INICIAR</button></div>
						<div class="ui-block-b"><button id = "botonPass" class="ui-btn ui-icon-edit ui-btn-icon-top" type="button" onclick="location.href = 'cambiar_contra.php'">CONTRASEÑA</button></div>
					
					</div>
				</div>
			</form>

		</div> <!-- FIN Contenedor -->

	</body>
</html>