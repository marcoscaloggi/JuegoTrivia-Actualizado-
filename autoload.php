<?php
session_start();
require_once("Clases/ArmarUsuario.php");
require_once("Clases/BaseDeDatos.php");
require_once("Clases/BaseMYSQL.php");
require_once("Clases/Usuarios.php");
require_once("Clases/Validador.php");



$host = "localhost";
$bd = "juegotrivia";
$usuario = "root";
$password = "";
$puerto = "8889";
$charset = "utf8mb4";
$pdo = BaseMYSQL::conexion($host,$bd,$usuario,$password,$puerto,$charset);
$validador = new Validador();
 ?>
