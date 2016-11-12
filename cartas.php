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
		<title>Cartas</title>
	
		<?php require ('includes/headComun.html');?>
				
	</head>
	
<body>
	<?php		
	require ('views/cerrarSesion.php');
	if(isset($_SESSION['nombre'])){
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
				$usuarios = $user->recuperarNombres($nick);
				if(empty($usuarios)){
			?>	
					<p><h2>Error al recuperar las cartas</h2></p>
			<?php
				}
				else
					$obj->pintarCartas($usuarios);
			?>
			
			<button type="button" class='ui-btn ui-icon-home ui-btn-icon-top' onclick="location.href = './principal.php'" >PRINCIPAL</button>
			
		</div> <!-- FIN Contenedor -->
	
	</body>
</html>