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
		<title> Principal </title>
	
		<?php require ('includes/headComun.html');?>
				
	</head>
	
<body>
	<?php		
		require ('views/cerrarSesion.php');
		if(isset($_SESSION['nombre'])){
			echo $_SESSION['nombre'];
			unset($_SESSION["duenoCarta"]);
		}

		else
			header("Location:./");
	?>
		
		<!-- === CONTENIDO === -->
		
			<div id="contenedor">
				<button class="ui-btn" onclick="location.href = './miCarta.php'" >MI CARTA</button>
				<button class="ui-btn" onclick="location.href = './cartas.php'" >OTRAS CARTAS</button>
			</div> <!-- FIN Contenedor -->

		
	</body>
</html>