<?php

class BaseMYSQL extends BaseDatos{
    static public function conexion($host,$db_nombre,$usuario,$password,$puerto,$charset){
        try {
            $dsn = "mysql:host=".$host.";"."dbname=".$db_nombre.";"."port=".$puerto.";"."charset=".$charset;
            $baseDatos = new PDO($dsn,$usuario,$password);
            $baseDatos->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $baseDatos;
        } catch (PDOException $errores) {
            echo "No me pude conectar a la BD ". $errores->getmessage();
            exit;
        }
    }


    static public function buscarPorEmail($email,$pdo,$tabla){
        //Aquí hago la sentencia select, para buscar el email, estoy usando bindeo de parámetros por value
        $sql = "select * from $tabla where email = :email";
        // Aquí ejecuto el prepare de los datos
        $query = $pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    }

    static public function buscarPorUser($nombre_usuario,$pdo,$tabla){
        //Aquí hago la sentencia select, para buscar el email, estoy usando bindeo de parámetros por value
        $sql = "select * from $tabla where nombre_usuario = :nombre_usuario";
        // Aquí ejecuto el prepare de los datos
        $query = $pdo->prepare($sql);
        $query->bindValue(':nombre_usuario',$nombre_usuario);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    }

    static public function guardarUsuario($pdo, $usuario){
        $sql = "INSERT INTO usuarios VALUES(default, :nombre, :apellido, :email, :nombre_usuario, :foto_perfil, :pass,$usuario->getExperiencia,$usuario->getLevel)";
        $guardarUsu = $pdo->prepare($sql);
        $guardarUsu->bindValue(':nombre', $usuario->getNombre());
        $guardarUsu->bindValue(':apellido', $usuario->getApellido());
        $guardarUsu->bindValue(':email', $usuario->getEmail());
        $guardarUsu->bindValue(':pass', $usuario->getPass());
        $guardarUsu->bindValue(':foto_perfil', $usuario->getFoto_perfil());
        $guardarUsu->bindValue(':nombre_usuario', $usuario->getNombre_usuario());

        $guardarUsu->execute();
    }
    public function leer(){
        //A futuro trabajaremos en esto
    }
    public function actualizar(){
        //A futuro trabajaremos en esto
    }
    public function borrar(){
        //A futuro trabajaremos en esto
    }
    public function guardar($usuario){

    }
}
 ?>
