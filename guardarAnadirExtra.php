<?php

require_once __DIR__.'/includes/config.php'; 
require_once __DIR__.'/includes/Objeto.php';
$obj = new \equipo\Objeto();


if(isset($_SESSION['nombre']) && isset($_SESSION['duenoCarta'])){
	$nick = $_SESSION['duenoCarta'];
	$escritorExtra = $_SESSION['nombre'];
	$nombre = $_POST["nombre"];
	$descripcion = $_POST["descripcion"];
	if($nombre !== "" && $descripcion !== "")
		$obj->anadirObjeto($nick, $nombre, $descripcion, 1, $escritorExtra);
	header("Location:./cartaX.php");
}
else
	header("Location:./");

?>