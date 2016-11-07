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
			$descripcion = $obj->recuperarObjeto($nombre);
		}
		else
			header("Location:javascript:history.back(-1)");
	
		
	}
	else
		header("Location:./");

	?>
		
		<!-- === CONTENIDO === -->
		<div id="contenedor" data-role = "fieldcontain">
			<p><h1>Editar objeto</h1></p>
			<form action="./guardarEditar.php" data-ajax="false" method="POST">
				<p>Nombre: <input type="text" name="nombre" value="<?php echo $nombre;?>" readonly></p>
				<label for="descripcion">Descripción</label>
				<textarea  name="descripcion" id="textarea" required><?php echo $descripcion;?></textarea>
				<div class='ui-grid-a'>
					<div class='ui-block-a'><button class="ui-btn ui-icon-check ui-btn-icon-top" type="submit">Guardar</button></div>
					<div class='ui-block-b'><button class="ui-btn ui-icon-delete ui-btn-icon-top" type="button" onclick="location.href = './miCarta.php'">Cancelar</button></div>
				</div>
			</form>

			
		</div> <!-- FIN Contenedor -->
	
	</body>
</html>