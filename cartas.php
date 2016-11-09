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
		<title> Cartas </title>
	
		<?php require ('includes/headComun.html');?>
				
	</head>
	
<body>
	<?php		
	require ('views/cerrarSesion.php');
	if(isset($_SESSION['nombre'])){
		echo $_SESSION['nombre'];
		unset($_SESSION["duenoCarta"]);
		$nick = $_SESSION['nombre'];
	}
	else
		header("Location:./");

	?>
		
		<!-- === CONTENIDO === -->
		<div id="contenedor" data-role="fieldcontain">
			<p><h1>Cartas</h1></p>
			<?php
				$cartas = $obj->cartasOtros($nick);
				if(empty($cartas)){
			?>	
					<p><h2>Todavía no han añadido ninguna carta</h2></p>
			<?php
				}
				else
					$obj->pintarCartas($cartas);
			?>
			
			<button type="button" class='ui-btn ui-icon-home ui-btn-icon-top' onclick="location.href = './Principal.php'" >PRINCIPAL</button>
			
		</div> <!-- FIN Contenedor -->
	
	</body>
</html>