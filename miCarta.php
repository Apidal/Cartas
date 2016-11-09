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
		<title> Mi Carta </title>
	
		<?php require ('includes/headComun.html');?>
			
	</head>
	
<body>
	<?php		
	require ('views/cerrarSesion.php');
	if(isset($_SESSION['nombre'])){
		$nick = $_SESSION['nombre'];
		$_SESSION['duenoCarta'] = $nick;
	}
	else
		header("Location:./");

	?>
		
		<!-- === CONTENIDO === -->
		<div id="contenedor" data-role="fieldcontain">
			<p><h1>Mi carta</h1></p>
			<?php
				$misObjetos = $obj->recuperarCartaSinExtra($nick);
				if(empty($misObjetos)){
			?>	
					<p><h2>Todavía no has añadido ningún objeto</h2></p>
					<div class = 'separacionHorizontal'></div>
					<button  type="button" class='ui-btn ui-icon-plus ui-btn-icon-top' onclick="location.href = './anadirObjeto.php'" >AÑADIR</button>
			<?php
				}
				else
					$obj->formularioMiCarta($misObjetos);
			?>
			<button  type="button" class='ui-btn ui-icon-home ui-btn-icon-top' onclick="location.href = './Principal.php'" >PRINCIPAL</button>
			
		</div> <!-- FIN Contenedor -->
	
	</body>
</html>