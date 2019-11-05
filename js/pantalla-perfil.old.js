function inicioPag(){

  $(".contenedor-img-gral").mouseover(function(){

    $(".div-agregar-img").removeClass("oculto");

  });
  $(".contenedor-img-gral").mouseout(function(){

    $(".div-agregar-img").addClass("oculto");

  });

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


$('#form-img').submit(function(evt) {

  var formData = new FormData();
  var files = $('#inputimg')[0].files[0];
  formData.append('imagen',files);
  console.log(files);
$(".div-agregar-img").addClass("oculto");

  $.ajax({
url: 'Ajax/subirfoto.php',
type: 'POST',
data: formData,
contentType: false,
processData:false,
cache:false,

success:function(response){



  $(".img-usuario").attr("src","fotos/"+response);
}




});


evt.preventDefault();

});
function cambiar(){

$("#form-img").submit();






}

}

document.addEventListener("DOMContentLoaded",inicioPag);
