<?php
//session_start();
//echo "estoy iniciando sesion";
require_once __DIR__.'/includes/config.php'; 
require_once __DIR__.'/includes/Objeto.php';
$obj = new \equipo\Objeto();


if(isset($_SESSION['nombre']) && isset($_SESSION['duenoCarta'])){
	$nick = $_SESSION['duenoCarta'];
	$nombre = $_POST["nombre"];
	$descripcion = $_POST["descripcion"];
	
	$obj->anadirObjeto($nick, $nombre, $descripcion, 1);
	header("Location:./cartaX.php");
}
else
	header("Location:./");

?>