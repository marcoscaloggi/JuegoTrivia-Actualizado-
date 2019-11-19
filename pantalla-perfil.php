<?php
require_once("Clases/autoload.php");
if(is_null(Autenticador::verificarSesion($pdo))){
    header("Location:pantalla_inicio.php");
};
?>
<html lang="es" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/estilos.css">
    <meta charset="utf-8">
    <title>Perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="css/fontello.css">
<link rel="stylesheet" href="css/pantalla-perfil.css">
<script type="text/javascript" src="js/pantalla-perfil.js"></script>
  </head>
  <body>
    <div class="contenedor">
      <?php    include_once("header-remodelacion.php")?>
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
        <input name="foto" id="inputimg" type="file" style="display:none"
    </form>
  </div>

  </li>

  <li class="datos-usuario">
    <ul class="columna">
      <li class="nombreUser"><span><?= $_SESSION["nombreUser"] ?></span></li>
      <ul class="otrosDatos">
        <li><span>Level: <?=    $_SESSION["level"]?></span></li>
        <li><span>Exp: <?=    $_SESSION["exp"]?>/9999</span></li>

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

  -Pensar en la logica para subir de nivel y Exp

  -Eliminar los botones de cerrarsesion y congig y pasarle los estilos a los <a> que los contienen
-->

<section class="section-partidas">
  <article class="article-categorias">
    <h4>Categorias</h4>
    <div class="contenedor-categorias">

      <a id=1 href="#" class="categoria"style="background-color: #EB3912"><span>General</span></a>

      <?php    $categorias=BaseMYSQL::crear_categorias($pdo);
      foreach($categorias as $array => $categoria):?>
      <a id = <?php $categoria["id"]?> href="#" class="categoria" style="background-color:<?php echo $categoria['color']; ?>"><span><?php echo $categoria['categoria']; ?></span></a>

      <?php endforeach;?>

    </div>
  </article>
  <article class="article-partidas">
    <h4>Partidas</h4>
    <div class="contenedor-partidas">


      <?php    $partidas= BaseMYSQL::cargar_partidas($_SESSION["id"],$pdo);
        foreach ($partidas as $key => $partida):?>

        <a id=<?= $partida['id'] ?>   <?php if($partida["vidas"]>-1){echo "href='pantalla-juego.php'";}?> class="juego" style="background-color: <?=$partida['color'] ?>">
          <span class="estado-partida" ><?php  if($partida["vidas"]<0){echo "Finalizado";}else{echo "En Curso";} ?></span>
          <span class="fecha-juego"><?php  echo "nada"?></span>
          <span class="puntos-juego"><?php   echo $partida['puntos'];?> Pts</span>
          <div class="vidas">
            <img src=<?php   if($partida['vidas']<1){echo "imagenes/corazon-gris.png";}else{echo "imagenes/corazon.png";} ?> alt="" class="size-icon icon-vida">
            <img src=<?php    if($partida['vidas']<2){echo "imagenes/corazon-gris.png";}else{echo "imagenes/corazon.png";} ?> alt="" class="size-icon icon-vida">
            <img src=<?php    if($partida['vidas']<3){echo "imagenes/corazon-gris.png";}else{echo "imagenes/corazon.png";} ?> alt="" class="size-icon icon-vida">
          </div>
        </a>

      <?php endforeach?>

    </div>
  </article>
</section>
<section class="section-ranking">

<input type="checkbox" id=btn-ranking name="" value="">
<label for="btn-ranking" class="titulo-mis-puntos"><span>Mis puntuaciones</span> </label>

<?php
$puntajes= BaseMYSQL::puntajes($_SESSION["id"],$pdo);
// var_dump($puntajes);
?>
<table class="mis-puntajes">
  <thead class="tabla-ranking">
    <tr>

      <th>Categoria</th>
      <th>Puntos</th>
    </tr>

  </thead>
  <tbody>
<?php foreach ($puntajes as $key => $categoria):?>
  <tr>
    <th><?= $categoria['categorias']?></th>
    <th> <?= $categoria['puntos']  ?></th>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php
  // var_dump($categorias_ranking);
  ?>


<table style="margin-top:2%;margin-bottom: 15px;">

  <thead class="tabla-ranking ">
    <tr>
      <th colspan="3"class="titulo-tabla">
        <button type="button" id=flecha_retroceder class=""><img src="imagenes/flecha-izquierda.png" class="icon-flecha"></button> Ranking <button type="button" id=flecha_avanzar><img src="imagenes/flecha-derecha.png" class="icon-flecha"></button>
      </th>

    </tr>
    <tr>
      <th colspan="3" id=categoria_tabla><span id=nombre_categoria></span> </th>
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
        <?php    include_once("footer-remodelacion.php") ?>
      </div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



  </body>
</html>
