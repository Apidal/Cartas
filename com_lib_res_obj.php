<?php
require_once __DIR__.'/includes/config.php'; 
require_once __DIR__.'/includes/Objeto.php';
$obj= new \equipo\Objeto();


if(isset($_SESSION['nombre'])){
	$nick = $_SESSION['nombre'];
	$nombre = $_POST["nomObj"];
	if(isset($_SESSION['duenoCarta'])){
		$duenoCarta = $_SESSION['duenoCarta'];
	}
	else{
		header("Location:./cartas.php");
	}
	

	if (isset($_POST['COMPRADO'])){ 
		$obj->editarObjeto($duenoCarta, $nombre, 1, 1, $nick);
	}
	elseif (isset($_POST['RESERVADO'])){
		$obj->editarObjeto($duenoCarta, $nombre, 0, 1, $nick);
	}
	else if (isset($_POST['LIBERAR'])){
		$obj->editarObjeto($duenoCarta, $nombre, 0, 0, $nick);
	}
	
	header("Location:./cartaX.php");
}
else
	header("Location:./");

?>