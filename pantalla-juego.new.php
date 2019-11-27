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
    <title>JuegoTrivia</title>
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/pantalla-juego.new.css">
    <script src="js/pantalla-juego.new.js"></script>
  </head>
  <body>
    <div class="contenedor">
      <?php include_once("header-remodelacion.php") ?>
        <div class="contenedor-pantallas">
        <div class="nombre-categoria">

    </div>

      <section class="pantalla-ruleta">

          <article class="boton-foto">

          </article>
          <article class="datos-partida">

          </article>
        </section>


      <section class="pantalla-preguntas">

      </section>
    </div>

    </div>

</div>
  </body>
</html>
