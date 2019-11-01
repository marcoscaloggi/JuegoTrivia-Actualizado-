<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/PERFIL.css">
<script type="text/javascript" src="js/PERFIL.js">

</script>
  </head>
  <body>
    <div class="contenedor">
      <?php include_once("header-remodelacion.php") ?>
      <div class="top-10vh">

      </div>
      <div class="header">
        <input type="checkbox" id=btn-menu name="" value="">
        <label for="btn-menu" class="icon-menu"></label>

      <nav class="navegacion">


<ul class="barra-responsive">
  <li class="contenedor-foto">
    <img src="fotos/imagen-usuario.png"alt="" class="img-usuario">
    <div class="div-file">
      <form class="" method="post" id=form-img enctype="multipart/form-data">
        <div class="div-agregar-img oculto">
        <label for="inputimg"><i class="fas fa-plus"></i></label>
        <input name="foto" id="inputimg" type="file" style='display: none'/>
      </div>
    </form>
  </li>

  <li class="datos-usuario">
    <ul class="columna">
      <li class="nombreUser"><span>NombreUsuario</span></li>
      <ul class="otrosDatos">
        <li><span>Level: 99</span></li>
        <li><span>Exp: 9999/9999</span></li>

      </ul>

    </ul>
  </li>
  <li class="botones-nav">
    <button type="button" name="config"><img class="config-icon" src="imagenes/config.png"></button>
    <button type="button" name="cerrarsesion"><img src="imagenes/salida.png" class="puerta-icon"></button>
  </li>
</ul>


  <!-- <div class=""> -->

<!-- <div class="contenedor-foto">
  <img src="fotos/<?= $_SESSION["avatar"] ?>"alt="" class="img-usuario"> -->
  <!-- <div class="div-file"> -->

  <!-- <form class="" method="post" id=form-img enctype="multipart/form-data">
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

  </div> -->
</nav>
</div>
<div class="contenedor-pantalla">

</div>
        <?php include_once("footer-remodelacion.php") ?>
      </div>





      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">


function refresh(){
location.reload(true);
}
//Función para actualizar cada 4 segundos(4000 milisegundos)
   // var int=self.setInterval("refresh()",1000);



</script>
  </body>
</html>
