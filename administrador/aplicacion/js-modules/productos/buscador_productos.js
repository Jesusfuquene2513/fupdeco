$(document).ready(function(){
    
$("#buscador-productos").keyup(function(){

    var arg_busqueda = $(this).val();
    
    var arg_peticion = 6;
    $.ajax({
     type: 'POST',  // Envío con método POST
     url: 'aplicacion/controllers/routes/routes.php',  // Fichero destino (el PHP que trata los datos)
     data: { peticion: arg_peticion , busqueda: arg_busqueda  } // Datos que se envían
     }).done(function( msg ) {  // Función que se ejecuta si todo ha ido bien
    $("#productos-table").html(msg);  // Escribimos en el div consola el mensaje devuelto
     }).fail(function (jqXHR, textStatus, errorThrown){ // Función que se ejecuta si algo ha ido mal
     // Mostramos en consola el mensaje con el error que se ha producido
     $("#respuesta").html("The following error occured: "+ textStatus +" "+ errorThrown); 
    });


    if($(this).val().length < 1){
      // DEjar los Filtro normalmente
      $("#filtro_id_2 , #filtro_id_1 , #filtro_id_3 , #filtro_id_4 , #filtro_id_5 , #filtro_id_6 , #filtro_id_7 , #filtro_id_8 , #filtro_id_9 , #filtro_id_10").show();

      

    } else{
        $("#filtro_id_2 , #filtro_id_1 , #filtro_id_3 , #filtro_id_4 , #filtro_id_5 , #filtro_id_6 , #filtro_id_7 , #filtro_id_8 , #filtro_id_9 , #filtro_id_10").hide();
    }

});

});