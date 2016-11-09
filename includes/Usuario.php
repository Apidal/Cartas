<?php

namespace equipo;

use equipo\Aplicacion as App;

class Usuario {

  private $nick;

  private $password;

  public function __construct() {

  }

  public static function login($nick, $password) {
  	$app = App::getSingleton();
    $conn = $app->conexionBd(); 
    $password = sha1($password); 
  	$query = sprintf("SELECT password FROM usuario WHERE nick='$nick'");
  	$rs = $conn->query($query);
  	
  	if ($rs && $rs->num_rows == 1) {
      $fila = $rs->fetch_assoc();
      $pass = $fila['password'];
      $rs->free();
  	  if($password ==$pass)
        return true;
    }
    else
      return false;
  }

  public static function existeUsuario($nick) {
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    
    $query = sprintf("SELECT * FROM usuario WHERE nick= '$nick'");
    $rs = $conn->query($query);
    if ($rs && $rs->num_rows == 1) {
      $rs->free();
      return true;
    }
    return false;
  }

  public function compruebaSimilPass($pass1, $pass2){
    return $pass1 == $pass2;
  }

  public function nick() {
    return $this->nick;
  }
  
	public function cambiarPass($nick,$pass) {
		$app = App::getSingleton();
		$conn = $app->conexionBd();
    $pass = sha1($pass);
		$query = sprintf("UPDATE usuario SET password='$pass' WHERE nick='$nick'");
		$rs = $conn->query($query);
	}
		  
	public function registraUsuario($nick,$password) {

		$app = App::getSingleton();
		$conn = $app->conexionBd();
    $password = sha1($password);
		$query = sprintf("INSERT INTO usuario (nick,password) VALUES ('$nick','$password')");
		$rs = $conn->query($query);
	}
 
	
}