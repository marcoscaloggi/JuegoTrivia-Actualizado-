<?php
require_once("funciones.php");
require_once("autoload.php");

$misCookies = Autenticador::verificarCookies();

if(isset($_COOKIE['btn-registro'])==false){
    setcookie('btn-registro','inicio',time()+(60*60*24),"/");
    // echo "Estoy creando la cookie";
}



if ($_POST) {

  if(count($_POST)==2||count($_POST)==3){

    $errores = $validador -> validarLogin($_POST);
    if (count($errores) == 0) {

      // $usuario = buscarPorUser($_POST["nombreUser"]);
      $usuario = BaseMYSQL::buscarPorUser($_POST["nombreUser"],$validador,'Usuarios');

      // inicioSesion($usuario, $_POST);
      Autenticador::seteoUsuario($usuario[0],$_POST);

      header("Location:pantalla-perfil.php");
      exit;
      }
    }

    if(count($_POST)==6){
      $errores = $validador->validarRegistro($_POST);

      if (count($errores) == 0) {

        // $usuario = buscarPorEmail($_POST["email"]);

            $avatar = "imagenes/imagen-usuario.png";
            $usuario = ArmarUsuario::armarUsuario($_POST, $avatar);
            BaseMYSQL::guardarUsuario($usuario);

            inicioSesion($usuario, $_POST);
            header("Location:pantalla-perfil.php");
            exit;
          }}
}
verificarSesion();

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/0f33fea696.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
 <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
 <script type="text/javascript" src="js/pantalla-inicio.js"></script>
    <link rel="stylesheet" href="css/estilos.css">

    <title>Juego trivia</title>
  </head>
  <body>
    <div class="container-fluid">

      <?php include_once("header-remodelacion.php") ?>
      <div class="contenedor-pantalla">

        <div class="contenedor-btn-mobile">
          <input id=cambioLoginRegistro type="button" name="button"value="Registrarse" >


          <div class="contenedor-circulos">
            <i class="fas fa-circle circulo-1"></i>
            <i class="fas fa-circle circulo-2"></i>
          </div>


          </div>
      <section class="contenedor-login-registro">




        <article class="article-login">
          <div class="login-contenedor">
            <h2>Inicio Sesion</h2>
            <form class="" action="pantalla_inicio.php" method="post">
              <div class="login-input">

                <div class="input-contenedor">
                  <i class="far fa-user icon icono-medida"></i>
                  <input type="text" name="nombreUser"placeholder="nombre de usuario" value="<?php $misCookies['nombreUser']?>">
                </div>
                <?php if(isset($errores[0]) && count($_POST)<6) : ?>
                <span class="alert alert-danger 0"><?= $errores[0]  ?></span>
              <?php endif;  ?>

                <div class="input-contenedor">
                  <i class="fas fa-key icon icono-medida"></i>
                  <input type="password" name="contrasenia" placeholder="contraseña" value="<?php $misCookies['contrasenia']  ?>">
                </div>
                <?php if(isset($errores[1]) && count($_POST)<6): ?>
                <span class="alert alert-danger 1"><?= $errores[1]  ?></span>
                <?php endif;  ?>


              </div>

              <div class="login-recordar">
                <input type="checkbox" name="recordar" value="S" class="">
                <label class="text-blanco">Recordame</label>
              </div>

                  <input type="submit" value="Ingresar" class="boton-formulario btn-login">
            </form>
          </div>
        </article>
        <article class="article-registro">
          <div class="contenedor-titulo-registro">
            <h2>Registrarse</h2>
          </div>
          <form class="" action="pantalla_inicio.php" method="post">
            <div class="contenedor-form-registro">
              <div class="input-contenedor ancho-input-registro">
                    <i class="fas fa-users icon icono-medida"></i>
                    <input type="text" name="nombre" placeholder="nombre">
              </div>
              <?php if(isset($errores[0]) && count($_POST)==6): ?>
              <span class="alert alert-danger 0"><?= $errores[0]  ?></span>
              <?php endif;  ?>
              <div class="input-contenedor ancho-input-registro">
                    <i class="fas fa-users icon icono-medida"></i>
                    <input type="text" name=apellido placeholder="apellido" value="">
              </div>
              <?php if(isset($errores[1]) && count($_POST)==6): ?>
              <span class="alert alert-danger 1"><?= $errores[1]  ?></span>
              <?php endif;  ?>


              <div class="input-contenedor ancho-input-registro">
                    <i class="far fa-user icon icono-medida"></i>
                    <input type="text" name="nombreUser" placeholder="nombre de usuario">
              </div>
              <?php if(isset($errores[2]) && count($_POST)==6): ?>
              <span class="alert alert-danger 2"><?= $errores[2]  ?></span>
              <?php endif;  ?>


              <div class="input-contenedor ancho-input-registro">
                  <i class="far fa-envelope icon icono-medida"></i>
                  <input type="text" name="email" placeholder="correo electronico" value="">
              </div>
              <?php if(isset($errores[3]) && count($_POST)==6): ?>
              <span class="alert alert-danger 3"><?= $errores[3]  ?></span>
              <?php endif;  ?>
              <?php if(isset($errores[6]) && count($_POST)==6): ?>
              <span class="alert alert-danger 6"><?= $errores[6]  ?></span>
              <?php endif;  ?>

              <div class="input-contenedor ancho-input-registro">
                  <i class="fas fa-key icon icono-medida"></i>
                  <input type="password" name="contrasenia" placeholder="contraseña">
              </div>
              <?php if(isset($errores[4]) && count($_POST)==6): ?>
              <span class="alert alert-danger 4"><?= $errores[4]  ?></span>
              <?php endif;  ?>

              <div class="input-contenedor ancho-input-registro">
                  <i class="fas fa-key icon icono-medida"></i>
                  <input type="password" name="recontras" placeholder="confirmar contraseña">
              </div>
              <?php if(isset($errores[5]) && count($_POST)==6): ?>
              <span class="alert alert-danger 5"><?= $errores[5]  ?></span>
              <?php endif;  ?>

            </div>
            <div class="aceptar-terminos">

              <label class="text-blanco">
                <input type="checkbox" class="">
                 Acepto los <a class="link text-blanco " href="">Términos y Condiciones</a> de Uso de JUEGOTRIVIA.
              </label>

            </div>
            <div class="contenedor-btn-Registro">
              <input type="submit"  value="Registrarse" class="boton-formulario btn-Registro">
            </div>
          </form>

        </article>
      </section>
    </div>


      <?php include_once("footer-remodelacion.php") ?>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<!-- <script type="text/javascript"src="js/js-cookie-latest/src/js.cookie.mjs"></script> -->
<script src = "https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"> </script>


<div id="like_button_container"></div>

<script src = " https://unpkg.com/react@16/umd/react.development.js "  crossorigin></script>
<script src = "https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>

<script src = " like_button.js "></script>

  </body>
</html>
