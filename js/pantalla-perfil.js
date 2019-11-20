var posicion_categ;
var cant_categ;
var categorias;

function inicioPag(){
  cargar_categorias();


  $("#inputimg").change(cambiar);
  $("#flecha_avanzar").click(flecha_avanzar);
  $("#flecha_retroceder").click(flecha_retroceder);

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
    var color;
    var nombre;

    if(posicion_categ<(cant_categ-1)){
      posicion_categ+=1;
      color = categorias[posicion_categ].color;
      nombre = categorias[posicion_categ].nombre;



    }
    else{
      posicion_categ=0;
      var color = categorias[0].color;
      var nombre = categorias[0].nombre;
    }

    asignar_categ(nombre,color);
    var pos = posicion_categ+1;
    ajax_ranking(pos);

  }
  function flecha_retroceder(){
      var color;
      var nombre;
    if(posicion_categ>0){
      posicion_categ-=1;
      color = categorias[posicion_categ].color;
      nombre = categorias[posicion_categ].nombre;



    }
    else{
      posicion_categ=cant_categ-1;
      color = categorias[posicion_categ].color;
      nombre = categorias[posicion_categ].nombre;
    }

    asignar_categ(nombre,color);
var pos = posicion_categ+1;
ajax_ranking(pos);
  }

  function asignar_categ(nombre,color){
    console.log(posicion_categ);
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
  ajax_ranking((posicion_categ+1));
  }
});
  }

  function cargar_tabla_ranking(usuarios){
    var array_user = JSON.parse(usuarios);
    var tabla = document.getElementById('body_tabla_ranking');
    var filas = tabla.getElementsByTagName('tr');


    for(let key=0;key<array_user.length;key++){
      var user = array_user[key];
      var celdas = filas[key].getElementsByTagName('th');

      celdas[1].innerText=user['Usuario'];
      celdas[2].innerText=user['Puntos'];
    }
  }
function ajax_ranking(pos){
  $.ajax({
url: 'Ajax/cargar_ranking.php',
type: 'POST',
data:{id:pos},

cache:false,

success:function(response){
  cargar_tabla_ranking(response);

}
});

}

}


document.addEventListener("DOMContentLoaded",inicioPag);
