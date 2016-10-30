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
		<title> Editar Objeto </title>
	
		<?php require ('includes/headComun.html');?>
				
	</head>
	
<body>
	<?php		
	require ('views/cerrarSesion.php');
	if(isset($_SESSION['nombre'])){
		if(isset($_POST["nomObj"])){
			echo $_SESSION['nombre'];
			$nombre = $_POST["nomObj"];
			$ayuda = $obj->recuperarObjeto($nombre);
		}
		else
			header("Location:javascript:history.back(-1)");
	
		
	}
	else
		header("Location:./");

	?>
		
		<!-- === CONTENIDO === -->
		<div id="contenedor">
			<p><h1>Editar objeto</h1></p>
			<form action="./guardarEditar.php" method="POST">
				<p>Nombre: <input type="text" name="nombre" value=<?php echo $nombre;?> readonly></p>
				<p>Ayuda: <input type="text" name="ayuda" value="<?php echo $ayuda;?>" required></p>
				<button type="submit">Guardar</button>
			</form>

			<button type="button" onclick="location.href = './miCarta.php'" >Cancelar</button>
		</div> <!-- FIN Contenedor -->
	
	</body>
</html>