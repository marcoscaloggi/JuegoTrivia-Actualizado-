<?php
require_once("../autoload.php")

static public function seteoUsuario($usuario, $dato=""){


  $_SESSION["nombre"] = $usuario["nombre"];
  $_SESSION["apellido"] = $usuario["apellido"];
  $_SESSION["nombreUser"] = $usuario["nombreUser"];
  $_SESSION["email"] = $usuario["email"];
  $_SESSION["avatar"] = $usuario["avatar"];
    $_SESSION["level"] = $usuario["level"];
      $_SESSION["exp"] = $usuario["exp"];

  if(isset($dato["recordar"])){
    if($dato["recordar"] =="S"){

        setcookie("nombreUser",$dato["nombreUser"],time()+3600);
        setcookie("contrasenia",$dato["contrasenia"],time()+3600);
    }
}
}


static public function verificarCookies(){
  if(isset($_COOKIE["nombreUser"])){
    $Nombre_Usuario=$_COOKIE["nombreUser"];
  }
  else{
   $Nombre_Usuario="";
 }
 if(isset($_COOKIE["contrasenia"])){
   $Contrasenia_Usuario=$_COOKIE["contrasenia"];
 }
 else{
  $Contrasenia_Usuario="";
}
$cookies =[
  "nombreUser"=> $Nombre_Usuario,
  "contrasenia" => $Contrasenia_Usuario,
];
return $cookies;
}


static public function verificarSesion(){
if(isset($_SESSION["nombreUser"])){
  $usuario = BaseMYSQL::buscarPorUser($_SESSION["nombreUser"]);
    if(is_null($usuario)){


      return null;
      exit;
    }
    else{
      return 1;

    }
}else{
    if(isset($_COOKIE["nombreUser"]) && isset($_COOKIE["contrasenia"])){
      $usuario= BaseMYSQL::buscarPorUser($_COOKIE["nombreUser"]);
      if(is_null($usuario)==false){
        $contraHash = password_hash($_COOKIE["contrasenia"], PASSWORD_DEFAULT);
        if (password_verify($_COOKIE["contrasenia"], $usuario["contrasenia"])) {
              armadoVerificadoDeUser($usuario);
              header("Location:pantalla-perfil.php");
              return 1;
        }else{
          // header("Location:pantalla_inicio.php");
        return null;

          exit;


        }
      }else{


        return null;

        exit;

      }
    }else {


      return null;


      exit;

    }
  }
  }

 ?>