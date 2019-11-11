<?php

function crear_usuarios($pdo){
  include_once 'datos.php';



  for ($i=0; $i <count($nombres); $i++) {


    $email=$nombreUser[$i].'@gmail.com';

    $sql="INSERT INTO usuarios VALUES($i+1,:nombre,:apellido,:email,:nombreUser,:foto_perfil,:pass,0,1,'jugador',null,null)";

    $guardarUsu = $pdo->prepare($sql);
    $guardarUsu->bindValue(':nombre',$nombres[$i]);
    $guardarUsu->bindValue(':apellido',$apellidos[$i]);
    $guardarUsu->bindValue(':email',$email);
    $guardarUsu->bindValue(':nombreUser',$nombreUser[$i]);
    $guardarUsu->bindValue(':foto_perfil','5dc5d37463601.jpg');
    $guardarUsu->bindValue(':pass','$2y$10$Hs/iR99fiC98QuN2lZP86.5BAOyc5lJYcPPlRBITNTlE1.KI9fDne');

    $guardarUsu->execute();
}
}
function crear_preguntas($pdo){
$categorias=find("categorias",$pdo);

// mostrar_var($categorias);

  for ($i=0; $i < 200 ; $i++) {
    $numero_aleatorio= mt_rand(0,(count($categorias)-1));
    $cat =  intval($categorias[$numero_aleatorio]);

  $sql = "INSERT INTO preguntas VALUES($i+1,:pregunta,:respuesta_correcta,:incorrecta_1,:incorrecta_2,:incorrecta_3,:categoria_id,null,null)";
  $query = $pdo->prepare($sql);
  $query->bindValue(':pregunta',"pregunta numero ".$i);
  $query->bindValue(':respuesta_correcta',"respuesta correcta numero ".$i);
  $query->bindValue(':incorrecta_1',"incorrecta_1 numero ".$i);
  $query->bindValue(':incorrecta_2',"incorrecta_2 numero ".$i);
  $query->bindValue(':incorrecta_3',"incorrecta_3 numero ".$i);
  $query->bindValue(':categoria_id', $cat);
  // mostrar_var($numero_aleatorio);

  $query->execute();
}
}

function crear_partidas($pdo){


$categorias=find("categorias",$pdo);
$cantUsuarios = count(find("usuarios",$pdo));
// mostrar_var($cantUsuarios);



for ($i=0; $i < $cantUsuarios*10 ; $i++) {
  $numero_aleatorio= mt_rand(0,(count($categorias)-1));
  $cat =  intval($categorias[$numero_aleatorio]);
  $vidas = mt_rand(-1, 3);
  $puntos = mt_rand(500, 5000);

  $sql="INSERT into partidas values($i+1,null,null,:vidas,:puntos,:categoria_id)";
  $query = $pdo->prepare($sql);
  $query->bindValue(':vidas',$vidas);
  $query->bindValue(':puntos',$puntos);
  $query->bindValue(':categoria_id',$cat);
  $query->execute();



}
}


function borrar_registros($pdo){
$tabla=["partida_usuario","pregunta_partida","usuarios","preguntas","partidas"];
  for ($i=0; $i <count($tabla) ; $i++) {

  $sql="DELETE FROM $tabla[$i]";
  $query = $pdo->prepare($sql);
  $query->execute();
}
}
function asignar_partidas($pdo){
  $usuarios=find("usuarios",$pdo);
  $partidas = find("partidas",$pdo);
  $partidaXusuario = count($partidas)/count($usuarios);


  foreach ($usuarios as $key => $value) {

    for ($i=0; $i <$partidaXusuario ; $i++) {
      $x= $partidas[$i+($partidaXusuario*$key)];
      // mostrar_var($partidas);
      // mostrar_var("valor de partidaXusuario: ".$partidaXusuario);
      // mostrar_var("valor de X: ".$x);
      $sql="INSERT into partida_usuario values(:id,:usuario_id,:partida_id,null,null)";
      $query = $pdo->prepare($sql);
      $query->bindValue(':id',($x));
      $query->bindValue(':usuario_id',$value);
      $query->bindValue(':partida_id',$x);
      $query->execute();
    }

  }

}

function pregunta_partida($pdo){

  $preguntas=find("preguntas",$pdo);
  $partidas = find("partidas",$pdo);

$contador_preguntas= count($preguntas);
$respuestas=["correcta","incorrecta"];
  foreach ($partidas as $key => $value) {


    for ($i=0; $i <10 ; $i++) {
      $preguntaID= mt_rand(0,($contador_preguntas-1));
      $x= $i+(10*$key);

      $resp = mt_rand(0,1);


      $sql="INSERT into pregunta_partida values(:id,:partida_id,:pregunta_id,:respuesta,null,null)";
      $query = $pdo->prepare($sql);
      $query->bindValue(':id',intval($x)+1);
      $query->bindValue(':partida_id',intval($value));
      $query->bindValue(':pregunta_id',intval($preguntas[$preguntaID]));
      $query->bindValue(':respuesta',$respuestas[$resp]);

      $query->execute();
    }

  }

}


function find($tabla,$pdo){
  $sql="SELECT id from $tabla order by id";
  $query= $pdo->prepare($sql);
  $query->execute();
  $datos = $query->fetchall(PDO::FETCH_COLUMN, 0);
  return $datos;
}

function llenar_BD($pdo){
  $usuarios=find("usuarios",$pdo);
  if(count($usuarios)<100){
  borrar_registros($pdo);
  crear_usuarios($pdo);
  crear_preguntas($pdo);
  crear_partidas($pdo);
  asignar_partidas($pdo);
  pregunta_partida($pdo);
}
}

function mostrar_var($var){
  echo "<pre>";
  var_dump($var);
  echo "</pre>";
  // exit;
}

 ?>
