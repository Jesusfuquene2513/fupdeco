$(document).ready(function(){

    var asesor = $(".admin-name").text();
    $.ajax({
        type: "POST",
        url: "../Asesor/consultar_citas",
        data: {
        asesor_arg:asesor

        }
    }).done(function(n) {
        $("#tabla-citas").html(n);

       $(".estado").each(function(){
    var estado = $(this).text();

    if(estado == 3){

        $(this).text("Esperando a dia de cita");
       
    
    }
    if(estado == 4){

        $(this).next().children().attr("disabled","disabled");
        $(this).next().children().text("Servicio ejecutado");
       
        $(this).html('Servicio Agendado, <span class="btn" style="font-weight:bolder; text-decoration:underline; font-style: oblique;">Ver fecha de agendamiento</span>');


        var codigo_reserva = $(this).attr("rel");
      var ser = $(this).attr("id");

      $.ajax({
        type: "POST",
        url: "../Asesor/consultar_fecha_agendamiento",
        data: {
       cod:codigo_reserva,
       servicio:ser

        }
    }).done(function(n) {
        
$(".estado").children("span").attr("title",n);
      

       
    }).fail(function(n, t, i) {
       // $("#sel-cliente").html("The following error occured: " + t + " " + i)
    })
    
    }
    });

    $(".btn-reportar-servicio").click(function(){

        var id = $(this).attr("id");
       

        $.ajax({
            type: "POST",
            url: "../Asesor/tomar_servicio_reportar",
            data: {
           id_arg: id 
    
            }
        }).done(function(n) {
            
    
          
    
           
        }).fail(function(n, t, i) {
           // $("#sel-cliente").html("The following error occured: " + t + " " + i)
        })

    });   

    }).fail(function(n, t, i) {
       // $("#sel-cliente").html("The following error occured: " + t + " " + i)
    })
});