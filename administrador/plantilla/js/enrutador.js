$(document).ready(function () {
$(".fa-bars").css("color","#283b62");



$(".modulo").click(function(){
$(this).next().toggle();
});



    //* pagina inicial por defecto
    var pagina = $(".user").attr("id");

     if(pagina == 0){

    $("#contenedor-dinamico").load("partials/welcome.html");

   }

   if(pagina == 1){

    $("#contenedor-dinamico").load("partials/crear_elementos_multimedia.html");

   }
   if(pagina == 2){

    $("#contenedor-dinamico").load("partials/ver_multimedia.html");

   }

    if(pagina == 3){

    $("#contenedor-dinamico").load("partials/crear_talento.php");

   }

    if(pagina == 4){

    $("#contenedor-dinamico").load("partials/ver_funcionarios.html");

   }

    if(pagina == 5){

    $("#contenedor-dinamico").load("partials/crear_blog.html");

   }

    if(pagina == 6){

    $("#contenedor-dinamico").load("partials/listar_blog.html");

   }

    if(pagina == 7){

    $("#contenedor-dinamico").load("partials/crear_programa.html");

   }

    if(pagina == 8){

    $("#contenedor-dinamico").load("partials/listar_programas.html");

   }

    if(pagina == 9){

    $("#contenedor-dinamico").load("partials/crear_slider.html");

   }

    if(pagina == 10){

    $("#contenedor-dinamico").load("partials/listar_banners.html");

   }

   if(pagina == 11){

    $("#contenedor-dinamico").load("partials/contacto.html");

   }

    if(pagina == 12){

    $("#contenedor-dinamico").load("partials/ver_contactos.html");

   }

   if(pagina == 13){

    $("#contenedor-dinamico").load("partials/crear_aliado.html");

   }

   if(pagina == 14){

    $("#contenedor-dinamico").load("partials/ver_aliados.html");

   }
    if(pagina == 15){

    $("#contenedor-dinamico").load("partials/crear_album.html");

   }

   if(pagina == 16){

    $("#contenedor-dinamico").load("partials/ver_albums.html");

   }

   if(pagina == 17){

    $("#contenedor-dinamico").load("partials/crear_contenido_galeria.html");

   }

   if(pagina == 18){

    $("#contenedor-dinamico").load("partials/ver_elementos_galeria.html");

   }

   if(pagina == 19){

    //$("#contenedor-dinamico").load("partials/ver_elementos_galeria.html");

   }





    // Enrutamiento de paginas por click y respectivo load de jquery
    $("#btn-crear-funcionario").click(function () {
       
        window.location.href = 'dashboard.php?window=3';     
    });
    $("#btn-listar-funcionarios").click(function () {
        window.location.href = 'dashboard.php?window=4';     
    });


    $("#btn-crear-multimedia").click(function () {
         window.location.href = 'dashboard.php?window=1';
    });
    $("#btn-listar-multimedia").click(function () {
          window.location.href = 'dashboard.php?window=2';
    });



    $("#btn-crear-publicacion").click(function () {
          window.location.href = 'dashboard.php?window=5';
    });
    $("#btn-listar-publicaciones").click(function () {
       window.location.href = 'dashboard.php?window=6';
    });

    $("#btn-crear-programa").click(function () {
         window.location.href = 'dashboard.php?window=7';
    });
    $("#btn-listar-programas").click(function () {
         window.location.href = 'dashboard.php?window=8';
    });

    $("#btn-crear-slider").click(function () {
         window.location.href = 'dashboard.php?window=9';
    });
    $("#btn-listar-slider").click(function () {
       window.location.href = 'dashboard.php?window=10';
    });

     $("#btn-crear-solicitud").click(function () {
        window.location.href = 'dashboard.php?window=11';
    });

      $("#btn-listar-solicitud").click(function () {
          window.location.href = 'dashboard.php?window=12';
    });


    $("#btn-crear-aliado").click(function () {
         window.location.href = 'dashboard.php?window=13';
    });
    $("#btn-listar-aliados").click(function () {
         window.location.href = 'dashboard.php?window=14';
    });


    $("#btn-visitantes").click(function(){
    $("#visitas").load("partials/conteo_visitas.php");

    });


     $("#btn-crear-galeria").click(function(){
     window.location.href = 'dashboard.php?window=15';

    });

     $("#btn-listar-albumnes").click(function(){
     window.location.href = 'dashboard.php?window=16';

    });

     $("#btn-crear-imagen-galeria").click(function(){

      window.location.href = 'dashboard.php?window=17';

     });

      $("#btn-listar-imagen-galeria").click(function(){

      window.location.href = 'dashboard.php?window=18';

     });

    
$(".card").css("font-size","bolder");

$(".text-section , .nav-item a , .fa-layer-group , .caret").css("color","white");



$("p").css("color","white");

});