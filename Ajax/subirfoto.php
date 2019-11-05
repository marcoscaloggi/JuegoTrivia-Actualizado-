<?php

include_once('../Clases/autoload.php');
// cosole.log("error");
$ruta = armarUsuario::armarImagen($_FILES);
$usuario = $_SESSION["nombreUser"];
BaseMYSQL::actualizar_perfil($pdo,$ruta,$usuario);
$_SESSION["avatar"]= $ruta;
echo $ruta;

 ?>
