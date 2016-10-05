<?php

namespace equipo;

use equipo\Aplicacion as App;

class Objeto {

  private $nombre;

  private $ayuda;

  private $comprado;

  private $reservado;

  private $nick;

  private $esExtra;


  public function __construct() {

  }

  public static function recuperarCarta($nick){
    $app = App::getSingleton();
    $conn = $app->conexionBd();  
    $query = sprintf("SELECT * FROM objetos where nick = '$nick'");
    $rs = $conn->query($query);
    if($rs){
      $i=1;
      
      while($fila = $rs->fetch_assoc()) { 
        $objetos[$i] = $fila;
        $i++;
      } 
      
      $rs->free();
    }

    return $objetos;

  }

   public function cartasOtros($nick){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("SELECT nombre FROM objetos where nick <> '$nick'");
    $rs = $conn->query($query);
    if($rs){
      $i=1;
      
      while($fila = $rs->fetch_assoc()) { 
        $cartas[$i] = $fila;
        $i++;
      } 
      
      $rs->free();
    }

    return $cartas;

  }

  public function anadirObjeto($nick, $nombre, $ayuda, $esExtra){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("INSERT INTO objetos VALUES ('$con->real_escape_string($nombre)', '$con->real_escape_string($ayuda)', 0, 0, $nick, $esExtra");
    $rs = $conn->query($query);
  }

   public function editarObjeto($nick, $nombre, $ayuda){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("UPDATE objetos SET ayuda = '$con->real_escape_string($ayuda)' WHERE nick='$nick' AND nombre = '$nombre'");
    $rs = $conn->query($query);
  }


}