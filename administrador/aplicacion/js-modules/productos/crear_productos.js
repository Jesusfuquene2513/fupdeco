$(document).ready(function () {



    

    $("#btn-crear-producto").click(function () {

        if ($("#producto").val().length < 1 || $(".select-categorias").val() < 1 || $("#precio").val().length < 1) {
            // alert("Error");
            mostrar_errores(1);
        } else {

            if ($("#select_subcategoria").val() < 1) {
                // alert("error falta subcategoria");
                mostrar_errores(2);
            } else {

                var arg_producto = $("#producto").val();
                var arg_categoria = $(".select-categorias").val();
                var arg_subcategoria = $("#select_subcategoria").val();
                var arg_precio = $("#precio").val();

                var arg_peticion = 4;
                $.ajax({
                 type: 'POST',  // Envío con método POST
                 url: 'aplicacion/controllers/routes/routes.php',  // Fichero destino (el PHP que trata los datos)
                 data: { producto: arg_producto, precio: arg_precio, categoria:arg_categoria , subcategoria: arg_subcategoria , peticion: arg_peticion } // Datos que se envían
                 }).done(function( msg ) {  // Función que se ejecuta si todo ha ido bien
                $("#res").html(msg);  // Escribimos en el div consola el mensaje devuelto
                 }).fail(function (jqXHR, textStatus, errorThrown){ // Función que se ejecuta si algo ha ido mal
                 // Mostramos en consola el mensaje con el error que se ha producido
                 $("#respuesta").html("The following error occured: "+ textStatus +" "+ errorThrown); 
                });



                $(".alert-success").css("display", "block");

                
            }
        }

    });

    function mostrar_errores($tipo_error) {

        if ($tipo_error == 1) {

            if ($("#producto").val().length < 1) {
                $("#error1").css("display", "block");
                setTimeout(function () {
                    $("#error1").css("display", "none");
                }, 4000);
            }

            if ($(".select-categorias").val() < 1) {
                $("#error2").css("display", "block");
                setTimeout(function () {
                    $("#error2").css("display", "none");
                }, 4000);
            }

            if ($("#precio").val().length < 1) {
                $("#error4").css("display", "block");
                setTimeout(function () {
                    $("#error4").css("display", "none");
                }, 4000);
            }

        }

        if ($tipo_error == 2) {
            $("#error3").css("display", "block");
            setTimeout(function () {
                $("#error3").css("display", "none");
            }, 4000);
        }

    };

});