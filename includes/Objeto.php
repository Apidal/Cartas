<?php

namespace equipo;

use equipo\Aplicacion as App;

class Objeto {

  private $nombre;

  private $descripcion;

  private $comprado;

  private $reservado;

  private $nick;

  private $esExtra;


  public function __construct() {

  }

  public static function recuperarCartaSinExtra($nick){
    $app = App::getSingleton();
    $conn = $app->conexionBd();  
    $query = sprintf("SELECT * FROM objetos where nick = '$nick' and esExtra = 0");
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

  public static function recuperarExtras($nick){
    $app = App::getSingleton();
    $conn = $app->conexionBd();  
    $query = sprintf("SELECT * FROM objetos where nick = '$nick' and esExtra = 1");
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
    $query = sprintf("SELECT nick FROM objetos where nick <> '$nick' group by nick");
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

  public function anadirObjeto($nick, $nombre, $descripcion, $esExtra){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("INSERT INTO objetos VALUES ('$nombre', '$nick','$descripcion', 0, 0, $esExtra)");
    $rs = $conn->query($query);
  }

   public function editarObjeto($nick, $nombre, $comprado, $reservado){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("UPDATE objetos SET comprado = $comprado, reservado = $reservado WHERE nick='$nick' AND nombre = '$nombre'");
    $rs = $conn->query($query);
  }

   public function editarObjetoPropio($nick, $nombre, $descripcion){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("UPDATE objetos SET descripcion = '$descripcion' WHERE nick='$nick' AND nombre = '$nombre'");
    $rs = $conn->query($query);
  }

  public function formularioMiCarta($objetos){
    echo "<form action='editarObjeto.php' data-ajax='false' method='POST'>";
    echo "<fieldset data-role='controlgroup'>";
    foreach ($objetos as $objeto) {
      echo "<label for='".$objeto['nombre']."'>".$objeto['nombre']."</label>";
      echo "<input type='radio' name='nomObj' id='".$objeto['nombre']."' value='".$objeto['nombre']."' checked>";
    }
    echo "</fieldset>";

    echo "<div class = 'separacionHorizontal'></div>";

    echo "<div class='ui-grid-a'>";
    echo "<div class='ui-block-a'><button class='ui-btn ui-icon-plus ui-btn-icon-top' type='button' onclick=\"location.href = './anadirObjeto.php'\" >AÑADIR</button></div>";
    echo "<div class='ui-block-b'><button class='ui-btn ui-icon-edit ui-btn-icon-top' type='submit'>EDITAR</button></div>";
    echo "</div>";
    echo "</form>";
  }

  public function pintarClase($objeto){
    if($objeto['comprado'])
      return "comprado";
    elseif ($objeto['reservado'])
      return "reservado";
    else
      return "libre";
  }

  public function formularioCartaX($objetos, $objetosEx){
    echo "<form action='com_lib_res_obj.php' data-ajax='false' method='POST'>";
      echo "<fieldset data-role='controlgroup'>";
        foreach ($objetos as $objeto) {
          echo "<label for='".$objeto['nombre']."' class =".$this->pintarClase($objeto).">".$objeto['nombre']."</label>";
          echo "<input type='radio' name='nomObj' id='".$objeto['nombre']."' value='".$objeto['nombre']."' checked>";
        }
        if(!empty($objetosEx)){
          echo "<div class = 'separacionHorizontal'></div>";

          echo "<h2>Extras para ".$objeto['nick']." </h2>";
          foreach ($objetosEx as $objeto) {
            echo "<label for='".$objeto['nombre']."' class =".$this->pintarClase($objeto).">".$objeto['nombre']."</label>";
            echo "<input type='radio' name='nomObj' id='".$objeto['nombre']."' value='".$objeto['nombre']."'>";
          }

        }
      echo "</fieldset>";

      echo "<div class = 'separacionHorizontal'></div>";

      echo "<div class='ui-grid-a'>";
        echo "<div class='ui-block-a'><button class='ui-btn ui-icon-shop ui-btn-icon-top' type='submit' name ='COMPRADO'>COMPRADO</button></div>";
        echo "<div class='ui-block-b'><button class='ui-btn ui-icon-lock ui-btn-icon-top' type='submit' name ='RESERVADO'>RESERVADO</button></div>";
        echo "<button class='ui-btn ui-icon-action ui-btn-icon-top' type='submit' name ='LIBERAR'>LIBERAR OBJETO</button>";
        echo "<button class='ui-btn ui-icon-plus ui-btn-icon-top' type='button' onclick=\"location.href = './anadirExtra.php'\" >AÑADIR EXTRA</button>";
        echo "<div class='ui-grid-a'>";
          echo "<div class='ui-block-a'><button class='ui-btn ui-icon-bars ui-btn-icon-top' type='button' onclick=\"location.href = './cartas.php'\" >CARTAS</button></div>";
          echo "<div class='ui-block-b'><button class='ui-btn ui-icon-home ui-btn-icon-top' type='button' onclick=\"location.href = './Principal.php'\" >PRINCIPAL</button></div>";
        echo "</div>";
      echo "</div>";
    echo "</form>";
  }

  public function pintarCartas($nombres){
    echo "<form action='cartaX.php' data-ajax='false' method='POST'>";
    echo "<fieldset data-role='controlgroup'>";
    foreach ($nombres as $nombre) {
      echo "<label for='".$nombre['nick']."'>".$nombre['nick']."</label>";
      echo "<input type='radio' name='nombreUsu' id='".$nombre['nick']."'' value='".$nombre['nick']."' checked>";
    }
    echo "</fieldset>";

    echo "<div class = 'separacionHorizontal'></div>";
    
    echo "<button class='ui-btn ui-icon-eye ui-btn-icon-top' type='submit'>VER</button>";
    echo "</form>";
  }

  public function recuperarObjeto($nombre){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("SELECT descripcion FROM objetos where nombre = '$nombre'");
    $rs = $conn->query($query);
    $fila = $rs->fetch_assoc();
    return $fila['descripcion'];
  }


}