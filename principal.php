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
		<title>Principal</title>
	
		<?php require ('includes/headComun.html');?>
				
	</head>
	
<body>
	<?php		
		require ('views/cerrarSesion.php');
		if(isset($_SESSION['nombre']))
			unset($_SESSION["duenoCarta"]);
		else
			header("Location:./");
	?>
		
		<!-- === CONTENIDO === -->
		
			<div data-role="fieldcontain">
				<button id= "botonMicartaPrincipal" class="ui-btn ui-icon-bullets ui-btn-icon-top" onclick="location.href = './miCarta.php'" >MI CARTA</button>
				<button class="ui-btn ui-icon-bars ui-btn-icon-top" onclick="location.href = './cartas.php'" >OTRAS CARTAS</button>
			</div> <!-- FIN Contenedor -->

		
	</body>
</html>