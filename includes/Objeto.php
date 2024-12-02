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
    $query = sprintf("SELECT u.nick, o.ultimoCambio FROM (SELECT * FROM objetos ORDER BY ultimoCambio DESC) o RIGHT JOIN usuario u on u.nick = o.nick WHERE u.nick <> '$nick' GROUP BY o.nick, u.nick ORDER BY o.ultimoCambio DESC");
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

  public function anadirObjeto($nick, $nombre, $descripcion, $esExtra, $escritorExtra){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    if($escritorExtra == null)
      $personaCambio = null;
    else
      $personaCambio = $escritorExtra;
    $query = sprintf("INSERT INTO objetos VALUES ('$nombre', '$nick','$descripcion', 0, 0, $esExtra, '$escritorExtra', '$personaCambio', CURRENT_TIMESTAMP)");
    $rs = $conn->query($query);
  }

   public function editarObjeto($nick, $nombre, $comprado, $reservado, $personaCambio){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("UPDATE objetos SET comprado = $comprado, reservado = $reservado, personaUltimoCambio = '$personaCambio', ultimoCambio = CURRENT_TIMESTAMP WHERE nick='$nick' AND nombre = '$nombre'");
    $rs = $conn->query($query);
  }

   public function editarDescripcion($nick, $nombre, $descripcion, $duenoCarta){
    $app = App::getSingleton();
    $conn = $app->conexionBd();

    if ($duenoCarta !== "") {
      $query = sprintf("UPDATE objetos SET descripcion = '$descripcion', ultimoCambio = CURRENT_TIMESTAMP WHERE escritorExtra = '$nick' AND nick='$duenoCarta' AND nombre = '$nombre'");
    }
    else {
      $query = sprintf("UPDATE objetos SET descripcion = '$descripcion', ultimoCambio = CURRENT_TIMESTAMP WHERE nick='$nick' AND nombre = '$nombre'");
    }
    
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

  public function formularioCartaX($objetos, $objetosEx, $duenoCarta){
    echo "<form action='' data-ajax='false' method='POST'>";
      echo "<input type='hidden' name='duenoCarta' value='".$duenoCarta."'>";
      echo "<fieldset data-role='controlgroup'>";
        if(empty($objetos))
          echo "<p><h2>".$duenoCarta." todavía no ha añadido nada</h2></p>";
        else{        
          foreach ($objetos as $objeto) {
            //echo "<div id ='izquierda'>";
            echo "<label for='".$objeto['nombre']."' class =".$this->pintarClase($objeto).">".$objeto['nombre']."</label>";
            echo "<input type='radio' name='nomObj' id='".$objeto['nombre']."' value='".$objeto['nombre']."' checked>";
            //echo "</div>";
            $idObjeto = str_replace(' ', '_', $objeto['nombre']);
            echo "<a href='#".$idObjeto."_poppup' data-rel='popup' class='ui-btn ui-btn-inline ui-icon-info ui-btn-icon-notext ui-corner-all ui-shadow ui-nodisc-icon ui-alt-icon' data-position-to='window' data-transition='flip'> f</a>";
            echo "<div data-role='popup' id='".$idObjeto."_poppup' class='ui-content' data-overlay-theme='b'>";
              echo "<h3>Descripción de ".$objeto['nombre']."</h3>";
              echo "----------------------------------";
              echo "</br></br>";
              echo $objeto['descripcion'];
            echo "</div>";
          }
        }
        if(!empty($objetosEx)){
          echo "<div class = 'separacionHorizontal'></div>";

          echo "<h2>Extras para ".$duenoCarta." </h2>";
          foreach ($objetosEx as $objetoEx) {
            //echo "<div id ='izquierda'>";
            echo "<label for='".$objetoEx['nombre']."' class =".$this->pintarClase($objetoEx).">".$objetoEx['nombre']."</label>";
            echo "<input type='radio' name='nomObj' id='".$objetoEx['nombre']."' value='".$objetoEx['nombre']."'>";
            //echo "</div>";
            $idObjeto = str_replace(' ', '_', $objetoEx['nombre']);
            echo "<a href='#".$idObjeto."_poppup' data-rel='popup' class='ui-btn ui-btn-inline ui-icon-info ui-btn-icon-notext ui-corner-all ui-shadow ui-nodisc-icon ui-alt-icon' data-position-to='window' data-transition='flip'> f</a>";
            echo "<div data-role='popup' id='".$idObjeto."_poppup' class='ui-content' data-overlay-theme='b'>";
              echo "<h3>Descripción de ".$objetoEx['nombre']."</h3>";
              echo "----------------------------------";
              echo "</br></br>";
              echo $objetoEx['descripcion'];
            echo "</div>";
          }

        }
      echo "</fieldset>";

      echo "<div class = 'separacionHorizontal'></div>";

      echo "<div class='ui-grid-a'>";
        echo "<div class='ui-block-a'><button class='ui-btn ui-icon-shop ui-btn-icon-top' type='submit' name ='COMPRADO' onclick=this.form.action='com_lib_res_obj.php'>COMPRADO</button></div>";
        echo "<div class='ui-block-b'><button class='ui-btn ui-icon-lock ui-btn-icon-top' type='submit' name ='RESERVADO' onclick=this.form.action='com_lib_res_obj.php'>RESERVADO</button></div>";
        echo "<button class='ui-btn ui-icon-action ui-btn-icon-top' type='submit' name ='LIBERAR' onclick=this.form.action='com_lib_res_obj.php'>LIBERAR OBJETO</button>";
        echo "<button class='ui-btn ui-icon-plus ui-btn-icon-top' type='button' onclick=\"location.href = './anadirExtra.php'\" >AÑADIR EXTRA</button>";
        echo "<div class='ui-grid-a'>";
          echo "<div class='ui-block-a'><button class='ui-btn ui-icon-edit ui-btn-icon-top' type='submit' onclick=this.form.action='./editarObjeto.php'>EDITAR EXTRA</button></div>";
          echo "<div class='ui-block-b'><button class='ui-btn ui-icon-delete ui-btn-icon-top' type='submit' onclick=this.form.action='./borrarExtra.php'>BORRAR EXTRA</button></div>";
        echo "</div>";
        echo "<div class='ui-grid-a'>";
          echo "<div class='ui-block-a'><button class='ui-btn ui-icon-bars ui-btn-icon-top' type='button' onclick=\"location.href = './cartas.php'\" >CARTAS</button></div>";
          echo "<div class='ui-block-b'><button class='ui-btn ui-icon-home ui-btn-icon-top' type='button' onclick=\"location.href = './principal.php'\" >PRINCIPAL</button></div>";
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

  public function borrarExtra($nombrePersona, $duenoCarta, $nombreObj){
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("DELETE FROM objetos where nick = '$duenoCarta' AND nombre = '$nombreObj' AND escritorExtra = '$nombrePersona' AND esExtra = 1");
    $rs = $conn->query($query);
    if($fila > 0)
      $fila = $rs->fetch_assoc();
  }


}