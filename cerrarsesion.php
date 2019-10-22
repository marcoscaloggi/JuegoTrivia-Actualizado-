<?php

session_start();
  foreach ($_COOKIE as $key => $value) {
    setcookie($key,"",time()-1);
  }


session_destroy();

header("Location:pantalla_inicio.php");

 ?>
