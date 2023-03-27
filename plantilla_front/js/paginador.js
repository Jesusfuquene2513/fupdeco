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
        
$(".fichas").append('<li class="page-item num" title=""><button type="button" class="page-link" rel="" id="'+i+'" title="">'+i+'</button></li>');
conteo2 = conteo2 + 1;


      }

       var dividir = parseInt(conteo2)/2;

$(".fichas li").each(function(){
  $(this).remove();

});
     for(var i = 1; i <= dividir ; i++){

      var rango_superior = i * 2;

      var rango_inferior = rango_superior - 1;

      $(".paginador").append('<li class="page-item num" title="" id="'+i+'"><button type="button" class="page-link" rel="'+rango_superior+'"  title="'+rango_inferior+'">'+i+'</button></li>');


     }

     $(".paginador2").append(' <li class="page-item anterior"><button type="button" class="page-link" >Anterior</button></li>');

     $(".paginador li").each(function(index){


      if(index > 4){

        $(this).children("button").css("display","none");


      }else{
         $(this).children("button").css("display","block");
      }
     });


     $(".paginador li").each(function(index){

     var display = $(this).children("button").css("display");

  if(display == "block"){
var etiqueta = $(this).html();

var suma = index + 1;
      
      var boton = '<li class="page-item num" title="" style="display:block" id="'+suma+'">'+etiqueta+'</li>';

      $(".paginador2").append(boton);
  }else{
    var etiqueta = $(this).html();
    var suma = index + 1;
      
      var boton = '<li class="page-item num" title="" style="display:none" id="'+suma+'">'+etiqueta+'</li>';

      $(".paginador2").append(boton);
  }

     });
     $(".paginador2").append(' <li class="page-item siguiente"><button type="button" class="page-link" >Siguiente</button></li>');



var limite = 5;
var pos = 1;


 var anterior = 0;




$(".paginador li").each(function(){
  $(this).remove();
});






 


     $(".num").click(function(){

      $(".paginador2 li").children().css("background","none");
      $(".paginador2 li").children().css("color","black");

      var selector = $(this).text();
      pos = selector;

      $(".paginador2 li").each(function(){

  var texto = $(this).text();

  if(texto == selector){

    $(this).children().css("background","#242c5c");
     $(this).children().css("color","white");

  }

});

 


      var posicion = parseInt($(this).text());



      pos = posicion;

      if(pos == limite){

        $(".paginador2 li ").each(function(index){

        var ubicacion = parseInt($(this).text());



      var siguiente = parseInt(pos)+1;

      if(siguiente == ubicacion){

       $(this).css("display","block");
        $(this).children("button").css("display","block");

        $(".paginador2 li").each(function(index){

          if(index == ubicacion-5){

            $(this).css("display","none");

            limite = limite + 1;

          }

        });



      }

        

        });

      }


if(posicion == anterior){


//Natalia te amo

if(anterior >= 2){

  $(".paginador2 li").each(function(index){

  if(index == posicion+4){

    $(this).css("display","none");
    limite = limite - 1;

  }
if(index == posicion-1){

    $(this).css("display","block");

  }
});

}




}


var inferior_arg = $(this).children().attr("rel");
var superior_arg = $(this).children().attr("title");



 $.ajax({
      type: "POST",
      url: "Blog/cargar_publicaciones",
      data: {

        inferior:inferior_arg , superior:superior_arg
      
      }
    }).done(function(n) {
      $("#blog-dinamico").html(n);


$(".album").click(function(){

  var id = $(this).attr("id");
  var enlace = "Blog/visor?album_id="+id+"";

  window.location.href = ''+enlace+'';



});







       }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })



});


    var contador_display = 0;



$(".paginador2 li").each(function(){


  var id = $(this).attr("id");



 if(id == 1){
 
 $(this).click();

 }

});



   

var intervalo = setInterval(function () {


$(".paginador2 li").each(function(){

  var display = $(this).css("display");

  if(display == "block"){

    var numero = $(this).text();
 anterior = numero-4;
  }

 

});



 } , 600);

     
$(".siguiente").click(function(){



 $(".spinner").css("display","block");
  setTimeout(function(){

var suma = pos+1;
       elemento = document.getElementById(suma);

      

$(".paginador2 li").each(function(){

  var id = $(this).attr("id");

 if(id == suma){

  $(this).click();

 }

});


    
     $(".spinner").css("display","none");
   
}, 2000);






});


$(".anterior").click(function(){

 $(".spinner").css("display","block");
  setTimeout(function(){

var suma = pos-1;
       elemento = document.getElementById(suma);

      

$(".paginador2 li").each(function(){

  var id = $(this).attr("id");

 if(id == suma){

  $(this).click();

 }

});


    
     $(".spinner").css("display","none");
   
}, 2000);




   






});







  }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occu<<: " + t + " " + i)

      



    })

});