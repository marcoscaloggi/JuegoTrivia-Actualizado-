<?php


$usuario=[
  "nombre" => "marcos",
  "apellido" =>"caloggi",
  "email" => "marcoscaloggi@gmail.com",
  "contrasenia" => "123456",
  "nombreUser" => "calo",
  "avatar" =>"imagenes/imagen-usuario.png"


];

$json=json_encode($usuario);
file_put_contents("usuarios.json",$json.PHP_EOL, FILE_APPEND);
?>
