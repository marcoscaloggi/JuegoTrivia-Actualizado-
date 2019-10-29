<?php

include_once('Clases/autoload.php');




$ruta = armarUsuario::armarImagen($_FILES);
$usuario = $_SESSION["nombreUser"];

BaseMYSQL::actualizar_perfil($pdo,$ruta,$usuario);

echo $ruta;

 ?>
