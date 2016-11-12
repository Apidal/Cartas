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
		<title>Carta</title>
	
		<?php require ('includes/headComun.html');?>
				
	</head>
	
<body>
	<?php		
	require ('views/cerrarSesion.php');
	if(isset($_SESSION['nombre'])){
		if(isset($_POST["nombreUsu"]) || isset($_SESSION['duenoCarta'])){
			$nick = $_SESSION['nombre'];

			if(isset($_POST["nombreUsu"]))
				$duenoCarta = $_POST["nombreUsu"];
			else
				$duenoCarta = $_SESSION['duenoCarta'];

			if($duenoCarta !== $nick)
				$_SESSION['duenoCarta'] = $duenoCarta;
			else
				header("Location:./principal.php");
			
		}
		else{
			header("Location:./principal.php");
		}
	}
	else
		header("Location:./");

	?>
		
		<!-- === CONTENIDO === -->
		<div id="contenedor" data-role="fieldcontain">
			<p><h1>Carta de <?php echo $duenoCarta;?></h1></p>
			<?php
				$objetos = $obj->recuperarCartaSinExtra($duenoCarta);
				$objetosEx = $obj->recuperarExtras($duenoCarta);
				
				$obj->formularioCartaX($objetos, $objetosEx, $duenoCarta);
				
			?>	
		</div> <!-- FIN Contenedor -->
	
	</body>
</html>