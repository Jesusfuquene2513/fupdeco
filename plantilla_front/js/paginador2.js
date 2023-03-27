$(document).ready(function(){

  $.ajax({
      type: "POST",
      url: "Blog/total_publicaciones",
      data: {
      
      }
    }).done(function(n) {
      $(".paginador").html(n);

      var conteo = $(".paginador").text();

      var conteo2 = 0;

      for(var i = 1 ; i <= conteo ; i++){
        
$(".fichas").append('<li class="page-item num" title=""><button class="page-link" rel=""  title="">'+i+'</button></li>');
conteo2 = conteo2 + 1;


      }

     var dividir = parseInt(conteo2)/2;

$(".fichas li").each(function(){
  $(this).remove();

});
     for(var i = 1; i <= dividir ; i++){

      var rango_superior = i * 2;

      var rango_inferior = rango_superior - 1;

      $(".paginador").append('<li class="page-item num" title=""><button class="page-link" rel="'+rango_superior+'"  title="'+rango_inferior+'">'+i+'</button></li>');


     }

     $(".paginador2").append(' <li class="page-item"><button class="page-link" >Anterior</button></li>');

     $(".paginador li").each(function(){

      var etiqueta = $(this).html();
      
      var boton = '<li class="page-item num" title="">'+etiqueta+'</li>';

      $(".paginador2").append(boton);

     });


      $(".paginador li").each(function(){

      $(this).remove();

     });

      $(".paginador2 li ").each(function(index){
        if(index > 5){
          var etiqueta = $(this).html();
      
      var boton = '<li class="page-item num" title="">'+etiqueta+'</li>';
       $(".paginador").append(boton);

          $(this).remove();

        }

      });

      $(".paginador2").append(' <li class="page-item"><button class="page-link">Siguiente</button></li>');
  


var posicion = 1;

var limite = 5;



     
$(".num").click(function(){
alert("entrada al ciclo");
  var indicador = parseInt($(this).text());

  posicion = indicador;

  alert(posicion);

  if(posicion == limite){

    alert("Hol");

    $(".paginador2 li").each(function(index){

      if(index == 1){
 var etiqueta = $(this).html();
      
      var boton = '<li class="page-item num" title="">'+etiqueta+'</li>';
       $(".paginador").append(boton);
       $(this).remove();


       $(".paginador li").each(function(index){
        
        var pos = parseInt($(this).text());

        if(pos == posicion+1){
$(".paginador2 li").each(function(){

  var borrar = $(this).text();
 
  if(borrar == "Siguiente"){

    $(this).remove();

    $(".paginador li").each(function(index){

 var nuevo = $(this).text();
if(nuevo == pos){

   var etiqueta = $(this).html();
      
      var boton = '<li class="page-item num" title="">'+etiqueta+'</li>';
       $(".paginador2").append(boton);
       $(this).remove();

       limite = limite + 1;
      posicion = posicion +1;



}


    });

  }

});
        }

       });



      }

    });



  }



});
    

  

     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })

});