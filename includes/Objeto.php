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
    $objetos = null;
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
    $cartas = null;
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
    $query = sprintf("INSERT INTO objetos VALUES ('$nombre', '$nick','$ayuda', 0, 0, $esExtra)");
    $rs = $conn->query($query);
  }

   public function editarObjeto($nick, $nombre, $ayuda){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("UPDATE objetos SET ayuda = '$ayuda' WHERE nick='$nick' AND nombre = '$nombre'");
    $rs = $conn->query($query);
  }

  public function pintarObjetos($objetos){
   echo "<form action='editarObjeto.php' method='POST'>";
    foreach ($objetos as $objeto) {
      echo "<input type='radio' name='nomObj' value='".$objeto['nombre']."' checked>".$objeto['nombre']."<br>";
    }
    echo "<input type='submit' value='Editar'>";
   echo "</form>";
  }

  public function recuperarObjeto($nombre){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("SELECT ayuda FROM objetos where nombre = '$nombre'");
    $rs = $conn->query($query);
    $fila = $rs->fetch_assoc();
    return $fila['ayuda'];
  }


}