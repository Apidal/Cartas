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
    $query = sprintf("SELECT nick FROM objetos where nick <> '$nick'");
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

   public function editarObjeto($nick, $nombre, $comprado, $reservado){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("UPDATE objetos SET comprado = $comprado, reservado = $reservado WHERE nick='$nick' AND nombre = '$nombre'");
    $rs = $conn->query($query);
  }

   public function editarObjetoPropio($nick, $nombre, $ayuda){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("UPDATE objetos SET ayuda = '$ayuda' WHERE nick='$nick' AND nombre = '$nombre'");
    $rs = $conn->query($query);
  }

  public function formularioMiCarta($objetos){
    echo "<form action='editarObjeto.php' method='POST'>";
    foreach ($objetos as $objeto) {
      echo "<input type='radio' name='nomObj' value='".$objeto['nombre']."' checked>".$objeto['nombre']."<br>";
    }
    echo "<button class='ui-btn' type='submit'>EDITAR</button>";
    echo "</form>";
  }

  public function formularioCartaX($objetos){
    echo "<form action='com_lib_res_obj.php' method='POST'>";
    foreach ($objetos as $objeto) {
      echo "<input type='radio' name='nomObj' value='".$objeto['nombre']."' checked>".$objeto['nombre']."<br>";
    }
    echo "<button class='ui-btn' type='submit' name ='COMPRADO'>COMPRADO</button>";
    echo "<button class='ui-btn' type='submit' name ='RESERVADO'>RESERVADO</button>";
    echo "<button class='ui-btn' type='submit' name ='LIBERAR'>LIBERAR</button>";
    echo "</form>";
  }

  public function pintarCartas($nombres){
    echo "<form action='cartaX.php' method='POST'>";
    foreach ($nombres as $nombre) {
      echo "<input type='radio' name='nombreUsu' value='".$nombre['nick']."' checked>".$nombre['nick']."<br>";
    }
    echo "<button class='ui-btn' type='submit'>VER</button>";
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