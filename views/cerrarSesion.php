	
<?php
	if(isset($_SESSION['nombre'])){
?>
		
		<div data-role="header" class="ui-content">
	    	<a href="#" id= "botonCerrar" class="ui-btn ui-icon-delete ui-btn-icon-left ui-btn-inline">Cerrar sessión</a>
	  	</div>
	
		<script>
			$(document).ready(function(){
			    $("#botonCerrar").click(function(){
					$(location).attr('href',"./cerrarSesion.php");
			    });
			});
		</script>
<?php
	}
?>
