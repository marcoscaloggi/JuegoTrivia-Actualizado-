function inicioPag(){

  function ocultar_mostrar(){



    $("#div-que-se-oculta").toggleClass("mostrar").animate({},1000);

  }

  $("#btn-nav").click(ocultar_mostrar);
  let scripts = document.getElementsByTagName("script");
  let src = scripts[0].src;

  $("#modojuego1").click(function(event) {
  window.location.href = src + "/../../pantalla-juego.php";
  });
  $("#modojuego2").click(function(event) {
window.location.href = src + "/../../pantalla-juego.php";
  });
  $("#modojuego3").click(function(event) {

    window.location.href = src + "/../../pantalla-juego.php";

  });


$("#inputimg").change(cambiar);
function cambiar(){
  alert("Ah cambiado");
  document.forms[0].submit();

}

}

document.addEventListener("DOMContentLoaded",inicioPag);
