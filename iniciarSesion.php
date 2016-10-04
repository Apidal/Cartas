<?php
//session_start();
//echo "estoy iniciando sesion";
require_once __DIR__.'/includes/config.php'; 
require_once __DIR__.'/includes/Usuario.php';
$usuario= new \equipo\Usuario();
$url = $_POST["url"];
$urlseparada = explode("?", $url);
if(isset($urlseparada[1])){
	$error = explode("&", $urlseparada[1]);
}
//echo var_dump($urlseparada);
$nick = $_POST["usuario"];
$pass = $_POST["contrasena"];
$pass = sha1($pass);
echo $pass;
$ok=$usuario->login($nick,$pass);
if($ok){
	$_SESSION['nombre'] = $nick;
	$user=$usuario->dameUsuario($nick);
		
}else{
	if($error[0]=="error=true"||$urlseparada[0]=="error=true"){
		header("Location:".$urlseparada[0]."?"."error=true&".$error[1]);
	}else{
		header("Location:".$urlseparada[0]."?"."error=true&".$error[0]);
	}
}
//$_SESSION['nombre'] ="admin";
//header("Location:".$url."");
?>