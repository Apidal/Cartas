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
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset= utf-8"/>
		<script>
			$(document).ready(function(){
			    
			    $("#botonCerrar").click(function(){

					$(location).attr('href',"./cerrarSesion.php");
			    });
			});
		</script>
		
	</head>
	
<body>
	<?php		
	require ('views/cerrarSesion.php');
	if(isset($_SESSION['nombre'])){
		echo $_SESSION['nombre'];
		$nombre = $_POST["nomObj"];
		$ayuda = $obj->recuperarObjeto($nombre);
		
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
				<input type="submit" value="Guardar">
			</form>

			<button type="button" onclick="location.href = './miCarta.php'" >Cancelar</button>
		</div> <!-- FIN Contenedor -->
	
	</body>
</html>