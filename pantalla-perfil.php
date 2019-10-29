<?php
require_once("Clases/autoload.php");

if(is_null(Autenticador::verificarSesion($pdo))){
    header("Location:pantalla_inicio.php");
};


?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Perfil</title>
<link href="https://fonts.googleapis.com/css?family=Spicy+Rice&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/pantalla-perfil.js" charset="utf-8"></script>
        <script src="https://kit.fontawesome.com/0f33fea696.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-3.2.1.js"></script> -->
        <!-- <link rel="stylesheet" href="css/patalla-perfil.css"> -->
        <link rel="stylesheet" href="css/pantalla-perfil.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  </head>
  <body>
    <div class="container-fluid alto-100">
      <?php include_once("header-remodelacion.php") ?>
      <nav class="w100">

    <button class="navbar-toggler" type="button" aria-expanded="false" id= btn-nav>
    <span class="navbar-toggler-icon"></span>


    </button>

    <div class="div-que-se-oculta" id=div-que-se-oculta style="">

<div class="row no-gutters w100">
<div class="padding-tb col-md-3">
<div class="contenedor-img-gral">

  <img src="fotos/<?= $_SESSION["avatar"] ?>"alt="" class="img-usuario">
  <!-- <div class="div-file"> -->
  <form class="" method="post" id=form-img enctype="multipart/form-data">
    <div class="div-agregar-img oculto">
      <label for="inputimg"><i class="fas fa-plus"></i></label>

      <input name="foto" id="inputimg" type="file" style='display: none'/>

    </div>
  </form>
</div>



</div>
<div class="padding-tb col-md-9 align-center">
<div class="row no-gutters">
<div class="padding-tb col-md-10 ">


<div class="row no-gutters">
<h3 class="nav-item nombre-usuario padding-tb col-md-12 text-izq display-3"><?=  $_SESSION["nombreUser"] ?></h3>
</div>

<div class="row no-gutters">

<h4 class="nav-item level-usuario padding-tb col-md-6 text-izq h1">Level: <?= $_SESSION["level"]?></h4>
<h4 class="nav-item experiencia-usuario padding-tb col-md-6 text-izq h1">Experiencia: <?= $_SESSION["exp"] ?></h4>
</div>




</div>

<div class="padding-tb col-md-2">
<a href="cerrarsesion.php">
<button type="button" name="button"  onclick="cerrarsesion.php"class="btn-cerrarsesion-nav min-H100 btn btn-danger">Cerrar Sesion</button></a>
</div>
</div>

</div>


    </div>
    </div>
  </nav>
          <div class="pantalla-contenedor">



              <div class="eleccion-gral">
                <div class="contenedor-eleccion-modo">
                  <section class="modos-de-juego">
                    <article class="modo-juego-contenedor">
                      <button type="button" name="button" class="boton-modo-juego" id=modojuego1>Modo Juego 1</button>
                      <p class="descripcion-modo-juego">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </article>
                    <article class="modo-juego-contenedor">
                      <button type="button" name="button" class="boton-modo-juego"id=modojuego2>Modo Juego 2</button>
                      <p class="descripcion-modo-juego">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </article>
                    <article class="modo-juego-contenedor">
                      <button type="button" name="button" class="boton-modo-juego"id=modojuego3>Modo Juego 3</button>
                      <p class="descripcion-modo-juego">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </article>
                  </section>
                  <div class="descripcion-gral">
                    <span>Descripcion modo juego gral</span>
                  </div>
                </div>
              </div>
            </div>










      <?php include_once("footer-remodelacion.php") ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  </body>
</html>
