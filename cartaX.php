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
		<title> Carta </title>
	
		<?php require ('includes/headComun.html');?>
				
	</head>
	
<body>
	<?php		
	require ('views/cerrarSesion.php');
	if(isset($_SESSION['nombre'])){
		echo $_SESSION['nombre'];
		if(isset($_POST["nombreUsu"])){
			$nick = $_SESSION['nombre'];
			$duenoCarta = $_POST["nombreUsu"];
			$_SESSION['duenoCarta'] = $duenoCarta;
		}
		else{
			header("Location:./principal.php");
		}
	}
	else
		header("Location:./");

	?>
		
		<!-- === CONTENIDO === -->
		<div id="contenedor">
			<p><h1>Carta de <?php echo $duenoCarta;?></h1></p>
			<?php
				$Objetos = $obj->recuperarCarta($duenoCarta);
				if(empty($Objetos)){
			?>	
					<p><h2>Error al recuperar la carta</h2></p>
			<?php
				}
				else
					$obj->formularioCartaX($Objetos);
			?>
			
			<button class="ui-btn" type="button" onclick="location.href = './anadirExtra.php'" >AÑADIR EXTRA</button>
			<button class="ui-btn" type="button" onclick="location.href = './cartas.php'" >CARTAS</button>
			<button class="ui-btn" type="button" onclick="location.href = './Principal.php'" >PRINCIPAL</button>
			
		</div> <!-- FIN Contenedor -->
	
	</body>
</html>