<?php
require_once("autoload.php");

if(is_null(Autenticador::verificarSesion())){
    header("Location:pantalla_inicio.php");
};

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>

  <meta charset="utf-8">
  <link rel="stylesheet" href="css/estilos.css">
  <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
  <title></title>
     <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
     <script type="text/javascript" src="js/script-pantalla-juego.js"></script>
     <script type="text/javascript" src="js/index.js"></script>

</head>

<body class="body-pantalla-juego">

  <div class="contenedor">

    <?php include_once("header-remodelacion.php") ?>

    <div class="datos-partida centrar-div">
      <span class="tema-pregunta">Tema de la pregunta</span>
    </div>
    <div id=pantalla class="pantalla-juego fondo-pantalla">
      <div class="jugador">
        <div class="imagen-jugador">
          <button id=boton-foto-jugador class="boton-foto-jugador" name="" value="" onclick="clickImagenUser()"><img src="imagenes/imagen-usuario.png"></button>
        </div>
        <div id=datos-jugador class="datos-jugador">
          <ul class="ul-datos-jugador">
            <li>Usuario: <?=  $_SESSION["nombreUser"] ?></li>
            <li>Level: <?= $_SESSION["level"]?></li>
            <li>Experiencia: <?= $_SESSION["exp"] ?></li>
          </ul>

            <a  class="boton-cerrar-sesion" name="cerrar-sesion" href="cerrarsesion.php">CERRAR SESION</a>

        </div>
      </div>
      <div class="contenedor-pregunta">
        <!-- <div class="tarjeta-fondo">
              </div> -->
        <div class="tarjeta-pregunta">
          <p class="pregunta"> ¿Sera esta la pregunta que solo estoy escribiendo para ver como queda?</p>
        </div>
      </div>
      <div class="contenedor-respuestas centrar-div">
        <?php for($i=1;$i<=4;$i++){ ?>
        <button type="button" class="boton-opcion" name="button">Opcion <?php echo "$i"; ?></button>
        <?php  }?>
      </div>
    </div>
    <?php include_once("footer-remodelacion.php") ?>
  </div>

  <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">$(document).ready(paginaok)</script>
</body>

</html>
