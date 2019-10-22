function paginaok() {

  datosJugadorMedidas();
  window.onresize = datosJugadorMedidas;

}

function copiarAlto(altoMaster, altoHijo) {
  var altura = $(altoMaster).css("height");
  $(altoHijo).css("height", altura);
}

function cambioCSS(idMedida, fuenteMedida, objetoACambiar, tipoCambio) {
  var padding = $(idMedida).css(fuenteMedida);
  $(objetoACambiar).css(tipoCambio, padding);
}

function datosJugadorMedidas() {
  copiarAlto("#pantalla", "#datos-jugador");
  cambioCSS(".imagen-jugador", "height", "#datos-jugador", "padding-top");
  cambioCSS(".imagen-jugador", "padding-left", "#datos-jugador", "padding-left");
  ajustarAltoPantalla();
}

function clickImagenUser() {
  if ($("#datos-jugador").css('left') === "0px") {
    // alert($(".datos-jugador").css('left'));
    $("#datos-jugador").animate({
      left: "-100%"
    }, 600, function() {

      $("#datos-jugador").css("display", "none");

    });
  } else {
    $("#datos-jugador").css("display", "flex");
    $("#datos-jugador").animate({
      left: "0%"
    });
  }


}
