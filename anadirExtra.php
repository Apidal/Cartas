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
		<title>Añadir objeto extra</title>
	
		<?php require ('includes/headComun.html');?>
		
		
	</head>
	
<body>
	<?php		
	require ('views/cerrarSesion.php');
	if(isset($_SESSION['nombre']) && isset($_SESSION['duenoCarta'])){
		$duenoCarta = $_SESSION['duenoCarta'];
	}
	else
		header("Location:./");

	?>
		
		<!-- === CONTENIDO === -->
		<div id="contenedor" data-role="fieldcontain">
			<p><h1>Añadir extra a la carta de <?php echo $duenoCarta;?></h1></p>
			<form action="./guardarAnadirExtra.php" data-ajax="false" method="POST">
				<p>Nombre:<input type="text" name="nombre" value="" required></p>
				<p for="descripcion">Descripción:</p>
				<textarea  name="descripcion" id="textarea" required></textarea>
				<div class='ui-grid-a'>
					<div class='ui-block-a'><button class="ui-btn ui-icon-plus ui-btn-icon-top" type="submit">AÑADIR</button></div>
					<div class='ui-block-b'><button class="ui-btn ui-icon-delete ui-btn-icon-top" type="button" onclick="location.href = './cartaX.php'" >CANCELAR</button></div>
				</div>
			</form>

		</div> <!-- FIN Contenedor -->
	
	</body>
</html>