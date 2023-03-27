$(document).ready(function () {
    //click de inicio de sesión
    $("#btn-login").click(function () {
        $(this).css("background","rgb(38, 63, 146)");
        $(this).css("color","white");
        if ($("#user").val().length > 0 && $("#password").val().length > 0) {

            // validación de formulario en la vista realizada correctamente

            var usuario = $("#user").val();
            var clave = $("#password").val();

            //enviar peticion a ajax mediante una funcion
            

            ajax_login(usuario, clave); // funcion ajax con los parametros

        } else {
           // alert("Error de autenticación");
           $(this).attr("disabled","disabled");
           $("#user , #password").attr("disabled","disabled");
           $(".alert").css("background","rgb(204, 93, 28)");
            $(".alert").text("Por favor llena los campos!!!");
            $(".alert").show();
            setTimeout(function() { 
                $(".alert").hide();
                $("#btn-login , #user , #password").removeAttr("disabled");
            }, 2000);
           
        }
    });

    function ajax_login(arg_usuario, arg_clave) {
        
           var arg_peticion = 1;
            $.ajax({
             type: 'POST',  // Envío con método POST
             url: 'aplicacion/controllers/routes/routes.php',  // Fichero destino (el PHP que trata los datos)
             data: { usuario: arg_usuario, clave: arg_clave, peticion: arg_peticion } // Datos que se envían
             }).done(function( msg ) {  // Función que se ejecuta si todo ha ido bien
            $("#respuesta").html(msg);  // Escribimos en el div consola el mensaje devuelto
             }).fail(function (jqXHR, textStatus, errorThrown){ // Función que se ejecuta si algo ha ido mal
             // Mostramos en consola el mensaje con el error que se ha producido
             $("#respuesta").html("The following error occured: "+ textStatus +" "+ errorThrown); 
            });
          
        
    };
});