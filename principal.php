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
			    $("#1").click(function(){  
					$(location).attr('href',"./miCarta.php");
			    });

			    $("#2").click(function(){
					$(location).attr('href',"./cartas.php");
			    });

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
			unset($_SESSION["duenoCarta"]);
		}

		else
			header("Location:./");
	?>
		
		<!-- === CONTENIDO === -->
		<div id="contenedor">
			<button id="1">MI CARTA</button>
			<button id="2">OTRAS CARTAS</button>
			<p><a href="./miCarta.php"> MI CARTA</a></p>
			<p><a href="./cartas.php"> CARTAS</a></p>
		</div> <!-- FIN Contenedor -->
	
	</body>
</html>