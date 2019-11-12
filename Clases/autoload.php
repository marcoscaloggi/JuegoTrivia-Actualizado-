<?php
session_start();
require_once "ArmarUsuario.php";
require_once "BaseDeDatos.php";
require_once "BaseMYSQL.php";
require_once "Usuarios.php";
require_once "Validador.php";
require_once "Autenticador.php";

$host = "localhost";
$bd = "juegotrivia";
$usuario = "root";
$password = "";
$puerto = "3306";
$charset = "utf8mb4";

$pdo = BaseMYSQL::conexion($host,$bd,$usuario,$password,$puerto,$charset);


$validador = new Validador();
