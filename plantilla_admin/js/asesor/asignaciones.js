$(document).ready(function(){

    var asesor_arg = $(".admin-name").text();
    $.ajax({
        type: "POST",
        url: "../Asesor/consultar_asignaciones",
        data: {
        asesor: asesor_arg    

        }
    }).done(function(n) {
        $("#tabla-asignaciones").html(n);

        $(".btn-agendar-servicios").click(function(){

            var id = $(this).attr("id");
           $("body").attr("id",id);
$("#tabla-reservas").css("display","block");
           var codigo_reserva_unitaria = $(this).attr("rel");

          var servicio = $(this).parent().prev().prev().prev().text();
          var cliente = $(this).parent().prev().prev().prev().prev().prev().prev().text();
          var cod_reserva = $(this).parent().prev().prev().prev().prev().prev().prev().prev().text();
          var cod = $(this).parent().prev().prev().prev().prev().prev().prev().prev().prev().text();
         $("#master").val(cod);
         
          $("#res").val(cod_reserva);
          $(".padre").css("background","none");
          $(".padre").css("color","black");

           $(this).parent().prev().prev().prev().prev().prev().prev().prev().parent().css("background","gray");
           $(this).parent().prev().prev().prev().prev().prev().prev().prev().parent().css("color","white");

          $("#servicio").val(servicio);
          $("#cliente").val(cliente);
        
        });




       
    }).fail(function(n, t, i) {
       // $("#sel-cliente").html("The following error occured: " + t + " " + i)
    })

    

});