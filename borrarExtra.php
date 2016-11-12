<?php

require_once __DIR__.'/includes/config.php'; 
require_once __DIR__.'/includes/Objeto.php';
$obj = new \equipo\Objeto();


if(isset($_SESSION['nombre']) && isset($_SESSION['duenoCarta'])){
	$duenoCarta = $_SESSION['duenoCarta'];
	$nombrePersona = $_SESSION['nombre'];
	$nombre = $_POST["nomObj"];
	$obj->borrarExtra($nombrePersona, $duenoCarta, $nombre);
	header("Location:./cartaX.php");
}
else
	header("Location:./");

?>