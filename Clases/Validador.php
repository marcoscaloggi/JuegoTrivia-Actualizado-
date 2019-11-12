<?php
require_once "autoload.php";

class Validador
{

    public function validarRegistro($datos,$pdo)
    {
        $errores = [];

        if ($datos) {
            if (strlen($datos["nombre"])==0) {
                $errores[0] = "El campo nombre se encuentra vacio";
            }
            if (strlen($datos["apellido"])==0) {
                $errores[1] = "El campo apellido se encuentra vacio";
            }
            if (!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)) {
                $errores[3] = "El email tiene un formato incorrecto";
            }
            if (BaseMYSQL::buscarPorEmail($_POST["email"],$pdo,'usuarios')!= null) {
                $errores[6] ="Este mail ya esta registrado";
            }
            if (strlen($datos["contrasenia"])<=6) {
                $errores[4] ="La contraseña tiene menos de 6 caracteres";
            }
            if ($datos["contrasenia"] != $datos["recontras"]) {
                $errores[5] = "Las contraseñas no coinciden";
            }
            if (BaseMYSQL::buscarPorUser($datos["nombreUser"],$pdo,'usuarios')!=null) {
                $errores[2] = "Este nombre de usuario ya esta en uso";
            }
        
        }
        return $errores;
    }

    public function validarLogin($datos,$pdo)
    {
        $errores = [];
        $usuario = BaseMYSQL::buscarPorUser($datos["nombreUser"],$pdo,'Usuarios');

        if ($usuario == null) {
            $errores[0] = "Usuario no se encuentra registrado";
        }
$contraHash = password_hash($datos["contrasenia"], PASSWORD_DEFAULT);

        if (password_verify($datos["contrasenia"], $usuario["pass"]) == false) {
            $errores[1] = "La contrasenia es incorrecta";
        }
        return $errores;
    }
}
