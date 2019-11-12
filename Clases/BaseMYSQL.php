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
    static public function buscarId($nombre_usuario,$pdo){
      $sql = "select id from usuarios where nombre_usuario = :nombre_usuario";
      // Aquí ejecuto el prepare de los datos
      $query = $pdo->prepare($sql);
      $query->bindValue(':nombre_usuario',$nombre_usuario);
      $query->execute();
      $usuario = $query->fetch(PDO::FETCH_ASSOC);
      return $usuario;
    }

    static public function guardarUsuario($pdo, $usuario){
      $exp = $usuario->getExperiencia();
      $lvl = $usuario->getLevel();
      $tipo = $usuario->getTipo();
      echo "<pre>";
      var_dump($usuario);

      var_dump($tipo);
echo "</pre>";

        $sql = "INSERT INTO usuarios(id,nombre,apellido,email,nombre_usuario,foto_perfil,pass,experiencia,level,tipo) VALUES(default, :nombre, :apellido, :email, :nombre_usuario, :foto_perfil, :pass,$exp,$lvl,:tipo)";
        $guardarUsu = $pdo->prepare($sql);
        $guardarUsu->bindValue(':nombre', $usuario->getNombre());
        $guardarUsu->bindValue(':apellido', $usuario->getApellido());
        $guardarUsu->bindValue(':email', $usuario->getEmail());
        $guardarUsu->bindValue(':pass', $usuario->getPass());
        $guardarUsu->bindValue(':foto_perfil', $usuario->getFoto_perfil());
        $guardarUsu->bindValue(':nombre_usuario', $usuario->getNombre_usuario());
        $guardarUsu->bindValue(':tipo', $usuario->getTipo());

        $guardarUsu->execute();
    }

    static public function actualizar_perfil($pdo,$ruta,$usuario){

$sql= "UPDATE usuarios set foto_perfil = :ruta where nombre_usuario = :usuario";

      $query = $pdo->prepare($sql);
      $query ->bindValue(':ruta',$ruta);
      $query ->bindValue(':usuario',$usuario);

      $query->execute();
    }

    static public function ranking($id_cat,$pdo){
      $sql = "SELECT usuarios.nombre_usuario as Usuario,sum(puntos) as Puntos
              FROM usuarios
              INNER JOIN partida_usuario ON usuarios.id = partida_usuario.usuario_id
              inner join partidas on partidas.id = partida_usuario.partida_id
              where partidas.categoria_id = $id_cat
              group by Usuario
              order by Puntos Desc
              limit 10";

              $query = $pdo->prepare($sql);
              $query->execute();
              $ranking = $query->fetch(PDO::FETCH_ASSOC);
              return $ranking;

    }
    static public function cargar_partidas($id,$pdo){

      $sql="SELECT partidas.id, partidas.updated_at as fecha, vidas, puntos, categorias.color
            from partidas
            inner join categorias on categorias.id = partidas.categoria_id
            inner join partida_usuario on partidas.id = partida_usuario.partida_id
            inner join usuarios on usuarios.id = partida_usuario.usuario_id
            where usuarios.id = $id
            order by fecha";

            $query = $pdo->prepare($sql);
            $query->execute();
            $partidas = $query->fetchAll(PDO::FETCH_ASSOC);
            // BaseMYSQL::ver($categorias);
            return $partidas;

    }
    static public function crear_categorias($pdo){
      $sql = "SELECT categoria_id as id, categorias.nombre as categoria,categorias.color as color
              from preguntas
              inner join categorias on categoria_id = categorias.id
              group by categoria_id
              having count(*)>20
              order by categoria_id";

              $query = $pdo->prepare($sql);
             $query->execute();
               $categorias = $query->fetchAll(PDO::FETCH_ASSOC);
          // BaseMYSQL::ver($categorias);
              return $categorias;

    }

    static public function ver($var){
      echo "<pre>";
      var_dump($var);
      echo "</pre>";
      // exit;
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
