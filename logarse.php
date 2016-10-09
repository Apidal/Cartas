<?php
//session_start();
//echo "estoy iniciando sesion";
require_once __DIR__.'/includes/config.php'; 
require_once __DIR__.'/includes/Usuario.php';
$usuario= new \equipo\Usuario();


//echo var_dump($urlseparada);
$nick = $_POST["nick"];
$pass = $_POST["pass"];
//$pass = sha1($pass);

if($usuario->login($nick,$pass)){
	$_SESSION['nombre'] = $nick;
	header("Location:principal.php");
}
else
	header("Location:./");

?>