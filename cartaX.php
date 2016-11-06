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
				$Objetos = $obj->recuperarCartaSinExtra($duenoCarta);
				if(empty($Objetos)){
			?>	
					<p><h2>Error al recuperar la carta</h2></p>
			<?php
				}
				else
					$obj->formularioCartaX($Objetos);
			?>
			
			<button class="ui-btn ui-icon-plus ui-btn-icon-top" type="button" onclick="location.href = './anadirExtra.php'" >AÑADIR EXTRA</button>
			<div class='ui-grid-a'>
				<div class='ui-block-a'><button class="ui-btn ui-icon-bars ui-btn-icon-top" type="button" onclick="location.href = './cartas.php'" >CARTAS</button></div>
				<div class='ui-block-b'><button class="ui-btn ui-icon-home ui-btn-icon-top" type="button" onclick="location.href = './Principal.php'" >PRINCIPAL</button></div>
			</div>
		</div> <!-- FIN Contenedor -->
	
	</body>
</html>