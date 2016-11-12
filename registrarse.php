<?php

require_once __DIR__.'/includes/config.php'; 
require_once __DIR__.'/includes/Usuario.php';
$usuario= new \equipo\Usuario();

$pass1 = "";
$nick = ucwords(strtolower($_POST["nick"]));
$pass1 = $_POST["pass"];
$pass2 = $_POST["pass2"];


//$pass = sha1($pass);

if(!$usuario->compruebaSimilPass($pass1,$pass2)){
	header("Location:./cambiar_contra.php");
	
}
elseif($usuario->existeUsuario($nick)){
	$usuario->cambiarPass($nick,$pass1);
	header("Location:./#inicio");
}
else{
	header("Location:./cambiar_contra.php");
}

?>