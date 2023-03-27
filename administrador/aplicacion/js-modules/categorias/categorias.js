$(document).ready(function () {

    cargar_categorias();
    function cargar_categorias() {


        var arg_peticion = 2;
        $.ajax({
            type: 'POST',  // Envío con método POST
            url: 'aplicacion/controllers/routes/routes.php',  // Fichero destino (el PHP que trata los datos)
            data: { peticion: arg_peticion } // Datos que se envían
        }).done(function (msg) {  // Función que se ejecuta si todo ha ido bien
            $("#respuesta").html(msg);  // Escribimos en el div consola el mensaje devuelto
        }).fail(function (jqXHR, textStatus, errorThrown) { // Función que se ejecuta si algo ha ido mal
            // Mostramos en consola el mensaje con el error que se ha producido
            $("#respuesta").html("The following error occured: " + textStatus + " " + errorThrown);
        });

    };

    $(".select-categorias").change(function () {
        var valor_select_categoria = $(this).val();
        if (valor_select_categoria > 0) {


            var arg_peticion = 3;
            var id_categoria = valor_select_categoria;
            $.ajax({
                type: 'POST',  // Envío con método POST
                url: 'aplicacion/controllers/routes/routes.php',  // Fichero destino (el PHP que trata los datos)
                data: { peticion: arg_peticion , id: id_categoria  } // Datos que se envían
            }).done(function (msg) {  // Función que se ejecuta si todo ha ido bien
                $("#select-subcategorias-contenedor").css("display","block");
                $("#select_subcategoria").html(msg);  // Escribimos en el div consola el mensaje devuelto
            }).fail(function (jqXHR, textStatus, errorThrown) { // Función que se ejecuta si algo ha ido mal
                // Mostramos en consola el mensaje con el error que se ha producido
                $("#select_subcategoria").html("The following error occured: " + textStatus + " " + errorThrown);
            });



        } else{
            
          
          $("#select-subcategorias-contenedor").css("display","none");
        }
    });
});