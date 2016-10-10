<?php
require_once 'includes/config.php';

		
?>
<!-- Cabecera -->
<header>
		
	<?php
		if(isset($_SESSION['nombre'])){
			?>
			<button id= "botonCerrar"> Cerrar sesión</button>
			<?php
			
		}
	?>
	
	<!-- <div id="divClear"></div> -->
</header>