<?php
//session_start();
//echo "estoy iniciando sesion";
require_once __DIR__.'/includes/config.php'; 
require_once __DIR__.'/includes/Usuario.php';
$usuario= new \equipo\Usuario();


//echo var_dump($urlseparada);
$pass1 = "";
$nick = $_POST["nick"];
$pass1 = $_POST["pass"];

$pass2 = $_POST["pass2"];


//$pass = sha1($pass);

if(!$usuario->compruebaSimilPass($pass1,$pass2)){
	header("Location:./cambiar_contra.php");
	
}
else if($usuario->existeUsuario($nick)){
	$usuario->cambiarPass($nick,$pass1);
	header("Location:./");
}
else{
	$usuario->registraUsuario($nick,$pass1);
	header("Location:./");
}

?>