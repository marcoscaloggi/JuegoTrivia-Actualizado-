<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">

    <link rel="stylesheet" href="css/PERFIL.css">

  </head>
  <body>
    <div class="container-fluid">
      <?php include_once("header-remodelacion.php") ?>

      <nav class="navbar navbar-expand-md navbar-light   bg-dark">


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
<div class="contenedor-foto">
  <img src="fotos/<?= $_SESSION["avatar"] ?>"alt="" class="img-usuario">
  <!-- <div class="div-file"> -->
  <form class="" method="post" id=form-img enctype="multipart/form-data">
    <div class="div-agregar-img oculto">
      <label for="inputimg"><i class="fas fa-plus"></i></label>

      <input name="foto" id="inputimg" type="file" style='display: none'/>

    </div>
  </form>
</div>
<div class="datos-usuario">
<h2 class="w-100">NombreUsuario</h2>
<h3 class="w-50">Level: 99</h3><h3 class="w-50">Exp: 9999/9999</h3>
</div>
<div class="botones-nav">

</div>

  </div>
</nav>
<div class="contenedor-pantalla">

</div>
        <?php include_once("footer-remodelacion.php") ?>
      </div>





      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
