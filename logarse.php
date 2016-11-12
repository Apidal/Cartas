<?php

require_once __DIR__.'/includes/config.php'; 
require_once __DIR__.'/includes/Usuario.php';
$user= new \equipo\Usuario();

$nick = $_POST["nick"];
$pass = $_POST["pass"];


if($user->login($nick,$pass)){
	$nick = ucwords(strtolower($_POST["nick"]));
	$_SESSION['nombre'] = $nick;
	header("Location:principal.php");
	$page = $_SERVER['principal.php'];
	$sec = "10";
	header("Refresh: 0; url=$page");
}
else
	header("Location:./#inicio");

?>