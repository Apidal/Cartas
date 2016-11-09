<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Usuario.php';
require_once __DIR__.'/includes/Objeto.php';

$user= new \equipo\Usuario();
$obj = new \equipo\Objeto();


?>
<!DOCTYPE HTML>
<hmtl>
	<head>
		<title> Añadir objeto </title>
	
		<?php require ('includes/headComun.html');?>
		
		
	</head>
	
<body>
	<?php		
	require ('views/cerrarSesion.php');
	if(!isset($_SESSION['nombre']))
		header("Location:./");

	?>
		
		<!-- === CONTENIDO === -->
		<div id="contenedor" data-role="fieldcontain">
			<p><h1>Añadir objeto</h1></p>
			<form action="./guardarAnadir.php" data-ajax="false" method="POST">
				<p>Nombre:<input type="text" name="nombre" value="" required></p>
				<p for="descripcion">Descripción:</p>
				<textarea  name="descripcion" id="textarea" required></textarea>
				<div class='ui-grid-a'>
					<div class='ui-block-a'><button class="ui-btn ui-icon-plus ui-btn-icon-top" type="submit">Añadir</button></div>
					<div class='ui-block-b'><button class="ui-btn ui-icon-delete ui-btn-icon-top" type="button" onclick="location.href = './miCarta.php'" >Cancelar</button></div>
				</div>
			</form>

		</div> <!-- FIN Contenedor -->
	
	</body>
</html>