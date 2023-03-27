$(document).ready(function(){



 $.ajax({
            type: 'POST',  // Envío con método POST
            url: 'aplicacion/controllers/routes/routes.php',  // Fichero destino (el PHP que trata los datos)
            data: { peticion: 42 } // Datos que se envían
        }).done(function (msg) {  // Función que se ejecuta si todo ha ido bien

           $("#aliados-estrategicos").html(msg);

            $(".customer-logos").slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1500,
    arrows: false,
    dots: false,
    pauseOnHover: false,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 4
        }
      },
      {
        breakpoint: 520,
        settings: {
          slidesToShow: 3
        }
      }
    ]
  });



        }).fail(function (jqXHR, textStatus, errorThrown) { // Función que se ejecuta si algo ha ido mal
            // Mostramos en consola el mensaje con el error que se ha producido
            $("#listado-archivos-multimedia").html("The following error occured: " + textStatus + " " + errorThrown);


        });



});