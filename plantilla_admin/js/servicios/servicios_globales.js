$(document).ready(function(){
 var acumulador_servicios = 0;
	 $.ajax({
      type: "POST",
      url: "../Servicios/cargar_servicios_globales",
      data: {
        
      }
    }).done(function(n) {
      $("#servicios-globales , #servicios-seleccionados").html(n);


      $("#servicios-globales button").each(function(){

      $(this).addClass("servicio-inactivo");

     });
     


     $("#servicios-seleccionados button").each(function(){

      $(this).css("background","red");
      $(this).attr("disabled","disabled");
       $(this).addClass("servicio-activo");
       $(this).css("display","none");

     });


     $(".servicio-inactivo").click(function(){

      $(this).attr("disabled","disabled");

      var id1 = $(this).attr("id");



$(".servicio-activo").each(function(index){


var id2 = $(this).attr("id");

if(id1 == id2){

  $(this).css("display","inline");

  $(this).removeAttr("disabled");

}


});



     });


     $(".servicio-activo").click(function(){
      $(this).css("display","none");

     var id3 = $(this).attr("id");

     $(".servicio-inactivo").each(function(index){


var id4 = $(this).attr("id");

if(id3 == id4){

  

  $(this).removeAttr("disabled");

}


});

     });



     

    $(".servicio-inactivo").click(function(){

     acumulador_servicios = acumulador_servicios + 1;

     

    });


     $(".servicio-activo").click(function(){

     acumulador_servicios = acumulador_servicios - 1;

    

    });
     
	

     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })


var estado_servicio = 0;
var estado_nombre = 0;

var estado_usuario = 0;
var estado_clave = 0;


$("#nombre").keyup(function(){

  if($(this).val().length > 0){

    
    estado_nombre = 1;

  } else{
   
    estado_nombre = 0;
  }

});



$("#usuario").keyup(function(){

  if($(this).val().length > 0){

    
    estado_usuario = 1;

  } else{
   
    estado_usuurio = 0;
  }

});


$("#clave").keyup(function(){

  if($(this).val().length > 0){

    
    estado_clave = 1;

  } else{
   
    estado_clave = 0;
  }

});

var status_display = 0;


    $("#btn-agregar-asesor").click(function(){

      if(estado_nombre == 1 && estado_usuario == 1 && estado_clave == 1 && acumulador_servicios > 0){

      

     var nombre = $("#nombre").val();

     var usuario = $("#usuario").val();

     var clave = $("#clave").val();



     $.ajax({
      type: "POST",
      url: "../Asesor/crear_asesor",
      data: {
     
     asesor:nombre , user:usuario , password:clave
        
      }
    }).done(function(n) {
      $(".confirmacion2").html(n)




 $(".servicio-activo").each(function(){






      if($(this).is(":visible")){

        var id = $(this).attr("id");

        var servicio = $(this).text();

       // console.log(servicio+"/"+id+nombre+usuario+"/"+clave);


       var asesor_usuario = $(".confirmacion3").text();

       console.log(asesor_usuario);



$.ajax({
      type: "POST",
      url: "../Asesor/crear_servicios_asesor",
      data: {
     asesor_identificador: asesor_usuario , servicio_param:servicio
        
      }
    }).done(function(n) {
      $(".confirmacion4").html(n)

       
    }).fail(function(n, t, i) {
      $(".confirmacion4").html("The following error occured: " + t + " " + i)
    })




      }

     });





        //location.reload();
    }).fail(function(n, t, i) {
      $(".confirmacion2").html("The following error occured: " + t + " " + i)
    })





    






      } else{

        alert("Faltan datos");
      }

    });




});