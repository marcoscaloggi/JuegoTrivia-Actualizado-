<?php

class Usuarios{

private nombre;
private apellido;
private email;
private nombre_usuario;
private foto_perfil;
private pass;
private experiencia;
private level;

public function __construct($nombre, $apellido, $email, $nombre_usuario, $foto_perfil, $pass){
       $this->nombre = $nombre;
       $this->apellido = $apellido;
       $this->email = $email;
       $this->pass = $pass;
       $this->nombre_usuario = $nombre_usuario;
       $this->foto_perfil = $foto_perfil;
   }




}

 ?>
