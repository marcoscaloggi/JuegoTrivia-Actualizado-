function inicioPag(){
  $("#inputimg").change(cambiar);

  $('#form-img').submit(function(evt) {

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
evt.preventDefault();
});

  function cambiar(){
  $("#form-img").submit();
  }
}

//
document.addEventListener("DOMContentLoaded",inicioPag);
