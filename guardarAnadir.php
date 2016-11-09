<?php
//session_start();
//echo "estoy iniciando sesion";
require_once __DIR__.'/includes/config.php'; 
require_once __DIR__.'/includes/Objeto.php';
$obj = new \equipo\Objeto();


if(isset($_SESSION['nombre'])){
	$nick = $_SESSION['nombre'];
	$nombre = $_POST["nombre"];
	$descripcion = $_POST["descripcion"];
	
	if($nombre !== "" && $descripcion !== "")
		$obj->anadirObjeto($nick, $nombre, $descripcion, 0);
	header("Location:./miCarta.php");
}
else
	header("Location:./");

?>