<?php

require_once("Clases/autoload.php");

if(is_null(Autenticador::verificarSesion($pdo))){
    header("Location:pantalla_inicio.php");
};


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/pantalla-perfil.css">
<script type="text/javascript" src="js/pantalla-perfil.js">

</script>
  </head>
  <body>
    <div class="contenedor">
      <?php include_once("header-remodelacion.php") ?>
      <div class="top-10vh"></div>
      <div class="header">
        <input type="checkbox" id=btn-menu name="" value="">
        <label for="btn-menu" class="icon-menu"></label>

      <nav class="navegacion">


<ul class="barra-responsive">
  <li class="contenedor-foto">
    <img src="fotos/<?= $_SESSION["avatar"] ?>" alt="" id=img-usuario class="img-usuario">

    <div class="div-agregar-img oculto">
      <form class="" method="post" id=form-img enctype="multipart/form-data">
        <label for="inputimg"><img class="icon-foto"></label>
        <input name="foto" id="inputimg" type="file" style='display: none'/>
    </form>
  </div>

  </li>

  <li class="datos-usuario">
    <ul class="columna">
      <li class="nombreUser"><span><?=  $_SESSION["nombreUser"] ?></span></li>
      <ul class="otrosDatos">
        <li><span>Level: <?= $_SESSION["level"]?></span></li>
        <li><span>Exp: <?= $_SESSION["exp"]?>/9999</span></li>

      </ul>

    </ul>
  </li>
  <li class="botones-nav">
    <button type="button" class="config"><img class="config-icon" src="imagenes/config.png"></button>
<button type="button" class="cerrarsesion" onclick="cerrarsesion.php"><img src="imagenes/salida.png" class="puerta-icon"><a href="cerrarsesion.php" class="link-cerrarsesion"></a></button>
  </li>
</ul>


</nav>
</div>

<div class="contenedor-pantalla">
  <!-- Notas:
  - Falta el formulario para editar lo datos del Usuario

  -En modo tablet y mobile tengo que desactivar el hover y con javascript agregar onclick en la foto del usuario para que muestre el div que permite cambiar la foto.
  este tiene que tener un setTimeout() para que desaparezca solo

  -Falta la logica paa que las partidas y y las categorias se completen de manera automatica

  -Considerar asignar un color para cada categoria y guardarlo como un campo en la bd

  -Pensar en la logica para subir de nivel y Exp

  -Eliminar los botones de cerrarsesion y congig y pasarle los estilos a los <a> que los contienen

  -Terminar la BD:
        tablas: Usuarios, Preguntas, Partidas, Usuario-Partida. -->
<section class="section-partidas">
  <article class="article-categorias">
    <h4>Categorias</h4>
    <div class="contenedor-categorias">
      <!-- Aca Van las Categorias. Se van a generar automaticamente dependendiendo si hay las preguntas suficientes -->
      <a href="#" class="categoria"style="background-color: lightblue"><span>Categoria 1</span></a>
      <a href="#" class="categoria"style="background-color: red"><span>Categoria 2</span></a>
      <a href="#" class="categoria"style="background-color: green"><span>Categoria 3</span></a>
      <a href="#" class="categoria"style="background-color: yellow"><span>Categoria 1</span></a>
      <a href="#" class="categoria"style="background-color: orange"><span>Categoria 2</span></a>
      <a href="#" class="categoria"style="background-color: blue"><span>Categoria 3</span></a>
    </div>
  </article>
  <article class="article-partidas">
    <h4>Partidas</h4>
    <div class="contenedor-partidas">
      <!-- Aca se van a generar las partidas automaticamente, teniendo un alto maximo con un overflow-y:scroll -->
<a href="#" class="juego" style="background-color: lightblue">
  <span class="estado-partida">En curso</span>
  <span class="fecha-juego">11/11/1999</span>
  <span class="puntos-juego">Pts: 99999</span>
  <div class="vidas">
    <img src="imagenes/corazon.png" alt="" class="size-icon icon-vida">
    <img src="imagenes/corazon.png" alt="" class="size-icon icon-vida">
    <img src="imagenes/corazon.png" alt="" class="size-icon icon-vida">
  </div>
</a>
<a href="#" class="juego" style="background-color: green">
  <span class="estado-partida">En curso</span>
  <span class="fecha-juego">11/11/1999</span>
  <span class="puntos-juego">Pts: 99999</span>
  <div class="vidas">
    <img src="imagenes/corazon.png" alt="" class="size-icon icon-vida">
    <img src="imagenes/corazon.png" alt="" class="size-icon icon-vida">
    <img src="imagenes/corazon.png" alt="" class="size-icon icon-vida">
  </div>
</a>
<a href="#" class="juego" style="background-color: red">
  <span class="estado-partida">En curso</span>
  <span class="fecha-juego">11/11/1999</span>
  <span class="puntos-juego">Pts: 99999</span>
  <div class="vidas">
    <img src="imagenes/corazon.png" alt="" class="size-icon icon-vida">
    <img src="imagenes/corazon.png" alt="" class="size-icon icon-vida">
    <img src="imagenes/corazon.png" alt="" class="size-icon icon-vida">
  </div>
</a>
    </div>
  </article>
</section>
<section class="section-ranking">

<table class="tabla-ranking">

  <thead>
    <tr>
      <th colspan="3" class="titulo-tabla"><a href="#"><img src="imagenes/flecha-izquierda.png"  class="icon-flecha"  alt=""></a> Ranking <a href="#"> <img src="imagenes/flecha-derecha.png" class="icon-flecha"  alt=""> </a> </th>
    </tr>
    <tr>
      <th colspan="3" id=categoria-tabla style="background-color: lightblue">Nombre Categoria</th>
    </tr>
    <tr>
      <th>/</th>
      <th>Usuario</th>
      <th>Puntos</th>
    </tr>
  </thead>

    <tbody>

        <tr>
          <th>1</th><th>caloggi</th><th>999999</th>
        </tr>

        <tr>
          <th>2</th><th>caloggi</th><th>999999</th>
        </tr>

        <tr>
          <th>3</th><th>caloggi</th><th>999999</th>
        </tr>

        <tr>
          <th>4</th><th>caloggi</th><th>999999</th>
        </tr>

        <tr>
          <th>5</th><th>caloggi</th><th>999999</th>
        </tr>

        <tr>
          <th>6</th><th>caloggi</th><th>999999</th>
        </tr>

        <tr>
          <th>7</th><th>caloggi</th><th>999999</th>
        </tr>

        <tr>
          <th>8</th><th>caloggi</th><th>999999</th>
        </tr>

        <tr>
          <th>9</th><th>caloggi</th><th>999999</th>
        </tr>
        <tr>
        <th>10</th><th>caloggi</th><th>999999</th>

      </tr>
    </tbody>
</table>
</section>
</div>
        <?php include_once("footer-remodelacion.php") ?>
      </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



  </body>
</html>
