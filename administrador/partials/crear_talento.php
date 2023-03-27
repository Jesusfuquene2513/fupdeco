<div class="row" >
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 m-auto">
        <div class="card">
            <div class="card-header ">
                <h4 class="text-center text-light" style="position:relative; top:4px">Creación de Funcionarios</h4>
            </div>
            <div class="card-body">
                <form action="aplicacion/controllers/routes/routes.php" method="post">
                    <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12 p-1 mt-2 mb-2" style="float:left;">
                        <label for="">Nombre completo</label>
                        <input type="text" class="form-control" placeholder="Nombre completo del funcionario" required name="nombre_funcionario">
                        <input type="hidden" value="7" name="peticion">
                    </div>
                    <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12 p-1 mt-2 mb-2" style="float:left;">
                        <label for="">Cargo</label>
                        <input type="text" class="form-control" placeholder="Cargo del funcionario" required name="cargo">
                    </div>
                    <div class=" p-1">
                        <label for="">Carge imagen de perfil</label>
                        <div class="card">
                            <div class="card-body">
                                <center><span class="text-center">Archivos multimedia</span></center>
                                <input type="hidden" class="form-control" placeholder="SELECCION" id="ruta-seleccionada" required   name="foto_perfil">
                                <input type="text" class="form-control" id="ruta-visible" disabled value="No se ha seleccionado ninguna ruta" style="color:red; font-weight:bolder">
                                <button class="btn btn-primary" type="button" style="width:100%" id="abrir-multimedia">Abrir galería +</button>
                            </div>
                            <div class="card-body">
                                <div class="row" id="contenedor-carga">


                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="">Orden</label>
                        <input type="number" required name="orden" class="form-control">
                    </div>
                    <div class="form-group">
                        <center> <button type="submit" class="btn btn-success text-center" style="position:fixed; bottom:0; right:0; height:75px; width:75px; border-radius:50%; font-size:30px"><span class="fa fa-check-square"></span></button></center>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
<script>

$(document).ready(function(){

    $("#contenedor-carga").hide();
    // Carga los archivos multimedia para usarse
$("#abrir-multimedia").click(function(){
    $("#contenedor-carga").toggle();
    cargar_archivos_multimedia();
    if ($('#contenedor-carga').is(':visible')) {
   $("#abrir-multimedia").text("Cerrar Galería -");
} else {
    $("#abrir-multimedia").text("Abrir Galería +");
}
});


function cargar_archivos_multimedia(){
    $.ajax({
            type: 'POST',  // Envío con método POST
            url: 'aplicacion/controllers/routes/routes.php',  // Fichero destino (el PHP que trata los datos)
            data: { peticion: 6 } // Datos que se envían
        }).done(function (msg) {  // Función que se ejecuta si todo ha ido bien

            $("#contenedor-carga").html(msg);  // Escribimos en el div consola el mensaje devuelto
            $(".imagen-archivo").each(function () {

                var tipo_elemento = $(this).attr("id");
                if (tipo_elemento == 1) {
                    var ruta = $(this).attr("src");
                    var ruta_nueva = ruta.slice(28)
                    var new_string = "aplicacion/biblioteca/multimedia/" + ruta_nueva;
                    $(this).attr("src", new_string);
                }

                if (tipo_elemento == 3) {

                   $(this).parent().remove();
                }


            });

            
            $(".capa").click(function(){
var ruta_imagen_carga = $(this).parent().children(".imagen-archivo").attr("src");

$(".imagen-archivo").css("border","none");
$(this).parent().children(".imagen-archivo").css("border","solid 2px red");
$("#ruta-seleccionada").removeAttr("disabled");
$("#ruta-seleccionada").val(ruta_imagen_carga);
$("#ruta-visible").val(ruta_imagen_carga);
//$("#ruta-seleccionada").attr("disabled","disabled");
var tipo_elemento = $(this).parent().children(".imagen-archivo").attr("id");
$(".tipo-archivo-sel").val(tipo_elemento);


});



        }).fail(function (jqXHR, textStatus, errorThrown) { // Función que se ejecuta si algo ha ido mal
            // Mostramos en consola el mensaje con el error que se ha producido
            $("#listado-archivos-multimedia").html("The following error occured: " + textStatus + " " + errorThrown);


        });
};

// Selecciona un archivo y agrega la ruta para su utilizacion



});
</script>
