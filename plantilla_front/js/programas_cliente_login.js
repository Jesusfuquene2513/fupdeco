$(document).ready(function(){

    $.ajax({
     type: "POST",
     url: "../Servicios/cargar_servicios_cliente_select",
     data: {
       
     }
   }).done(function(n) {
     $("#sel-servicios").html(n);

     var servicio_seleccionado = $("body").attr("id");

    

     let select = document.getElementById("sel-servicios");
     select.value = servicio_seleccionado; 

     
     var pro = $("#sel-servicios").val();

    
 $("#sel-servicios").css("border","solid 2px green");

 $("#precio").css("border","solid 2px green");
     


     $.ajax({
      type: "POST",
      url: "Asesor/cargar_asesor_reserva",
      data: {programa:pro
        
      }
    }).done(function(n) {

      
      $("#asesor").html(n);

     

     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      

$(document).ready(function(){

    $.ajax({
     type: "POST",
     url: "../Servicios/cargar_servicios_cliente_select",
     data: {
       
     }
   }).done(function(n) {
     $("#sel-servicios").html(n);

     var servicio_seleccionado = $("body").attr("id");

    

     let select = document.getElementById("sel-servicios");
     select.value = servicio_seleccionado; 

     
     var pro = $("#sel-servicios").val();

    
 $("#sel-servicios").css("border","solid 2px green");

 $("#precio").css("border","solid 2px green");
     


     $.ajax({
      type: "POST",
      url: "Asesor/cargar_asesor_reserva",
      data: {programa:pro
        
      }
    }).done(function(n) {

      
      $("#asesor").html(n);

     

     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })







    $("#reserva").hide();
   $(".btn-servicio").click(function(){
       var servicio = $(this).attr("title");
   var precio = $(this).attr("rel");

       $("#reserva").show();

       $("#nombre-servicio").text(servicio);

       $("#precio-servicio").text(precio);

   });

    


     
     
   }).fail(function(n, t, i) {
     //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

     



   })

});

    })







    $("#reserva").hide();
   $(".btn-servicio").click(function(){
       var servicio = $(this).attr("title");
   var precio = $(this).attr("rel");

       $("#reserva").show();

       $("#nombre-servicio").text(servicio);

       $("#precio-servicio").text(precio);

   });

    


     
     
   }).fail(function(n, t, i) {
     //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

     



   })

});