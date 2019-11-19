var posicion_categ;
var cant_categ;
var categorias;
function inicioPag(){
  cargar_categorias();


  $("#inputimg").change(cambiar);
  $("#flecha_avanzar").click(flecha_avanzar);
//   $('#form-img').submit(function(evt) {
//
//
// // Este comando evita que la pagina refresque
// evt.preventDefault();
// });

  function cambiar(){

    var campo = $("#inputimg").val().length;
    if(campo>1){
      // $("#form-img").submit();

      var formData = new FormData();
      var files = $('#inputimg')[0].files[0];
      formData.append('imagen',files);


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
    }
  }


  function flecha_avanzar(){
    if(posicion_categ<(cant_categ-1)){
      posicion_categ+=1;
      var color = categorias[posicion_categ].color;
      var nombre = categorias[posicion_categ].nombre;
      asignar_categ(nombre,color);


    }
    else{
      posicion_categ=0;
      var color = categorias[0].color;
      var nombre = categorias[0].nombre;
      asignar_categ(nombre,color);
    }
// var data= posicion_categ;
    $.ajax({
  url: 'Ajax/cargar_ranking.php',
  type: 'POST',
  data:{id:posicion_categ},

  cache:false,

  success:function(response){
    console.log(response);

  }
});

  }
  function flecha_retroceder(){

  }

  function asignar_categ(nombre,color){

    span = document.getElementById("nombre_categoria");
    if(span.firstChild){
      span.removeChild(span.firstChild);
    }
    txt = document.createTextNode(nombre);
    span.appendChild(txt);
    document.getElementById("categoria_tabla").style.backgroundColor = color ;
  }

  function cargar_categorias(){
    $.ajax({
  url: 'Ajax/cargar_categorias.php',
  type: 'POST',

  contentType: false,
  processData:false,
  cache:false,

  success:function(response){
  var array = JSON.parse(response);

  var color = array[0].color;
  var nombre = array[0].nombre;
  asignar_categ(nombre,color);
  cant_categ = array.length;
  categorias=array;
  posicion_categ =0;
  }
});
  }
}


document.addEventListener("DOMContentLoaded",inicioPag);
