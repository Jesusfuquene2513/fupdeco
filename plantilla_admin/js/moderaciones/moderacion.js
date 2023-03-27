$(document).ready(function() {
	var user = $(".admin-name").text();
	
	$.ajax({
		type: "POST",
		url: "../Moderador/listar_moderaciones",
		data: {
			

		}
	}).done(function(n) {
		$("#moderaciones").html(n);

      
        $(".btn-parcial").each(function(){
        var texto1 = $(this).text();
        var texto2 = $(this).next().next().text();
       
        if(texto1 == texto2){
         
            
            $(this).parent().prev().children().css("background","green");
            $(this).parent().prev().children().css("border-radius","0%");
            $(this).parent().prev().children().text("Listo");
            $(this).parent().prev().children().removeClass("btn-danger");
            $(this).parent().prev().children().css("color","white");
            $(this).parent().prev().prev().text("Totalidad de servicios asignados");

            var id_moderacion =   $(this).parent().prev().prev().prev().prev().prev().prev().prev().prev().text();

            $.ajax({
                type: "POST",
                url: "../Moderador/actualizar_estado_moderacion",
                data: {
                   id:id_moderacion
        
                }
            }).done(function(n) {
                $(".alerta").html(n)
        
                //location.reload();
            }).fail(function(n, t, i) {
               // $("#sel-cliente").html("The following error occured: " + t + " " + i)
            })
            

        
        }else{
        $(this).parent().prev().prev().text("Faltan Servicios por asignar");
        }
        });

        

		$(".btn-modal-servicios").click(function(){
            var cliente = $(this).parent().prev().prev().prev().prev().prev().prev().text();
            var documento = $(this).parent().prev().prev().prev().prev().prev().text();
            var reserva = $(this).parent().prev().prev().prev().prev().text();
            $("#data-cliente").text(cliente);
            $("#data-cedula").text(documento);
            $("#data-reserva").text(reserva);
            
            $("#resultados").removeClass("d-none");
           

            $.ajax({
                type: "POST",
                url: "../Moderador/consultar_servicios_por_reserva",
                data: {
                    codigo_reserva: reserva,
                    
        
                }
            }).done(function(n) {
                $("#servicios-facturados").html(n);

                $(".estado-final").each(function(){
                    var estado_final = $(this).text();
                   if(estado_final == "1"){
                $(this).text("A la espera de asignar un asesor");
                }
                if(estado_final == "3"){

                    $(this).text("A la espera de agendamiento y toma del servicio");
                }

                if(estado_final == "4"){

                    $(this).text("Este servicio ya ha sido ejecutado por parte del asesor");
                }
                    });

               
                

var contador = 0;
        $(".sel-servicios").each(function(){

            $(this).attr("id",contador);
            contador++;
            
            $.ajax({
                type: "POST",
                url: "../Moderador/listar_asesores_select",
                data: {
                   
        
                }
            }).done(function(n) {

                var elemento = "#"+contador;
               
                $(".sel-servicios").html(n);


                
              
        
               

            }).fail(function(n, t, i) {
               // $("#sel-cliente").html("The following error occured: " + t + " " + i)
            })
        });
        $(".activar-select").click(function(){

            $(this).parent().next().children(".sel-servicios").removeAttr("disabled");
            $(this).css("display","none");
            $(this).next().css("display","block");
           

           
        
        });

        $(".desactivar-select").click(function(){
           
            $(this).parent().next().children(".sel-servicios").attr("disabled","disabled");
            $(this).parent().next().children(".sel-servicios").val("0");
            $(this).css("display","none");
            $(this).prev().css("display","block");
           

           
        
        });

        $(".btn-asignacion-final").click(function(){

            var reserva_id = $(this).attr("title");
        var asesor = $(this).parent().parent().prev().children().val();
        
        $.ajax({
            type: "POST",
            url: "../Moderador/consultar_correo_asesor",
            data: {
                asesor_arg: asesor
    
            }
        }).done(function(n) {
          var asesor_usuario = n;

          var master = $("#data-reserva").text();
          $.ajax({
            type: "POST",
            url: "../Moderador/update_reserva_unitaria",
            data: {
               asesor: asesor_usuario,
               reserva: reserva_id, 
               marter_arg:master
    
            }
        }).done(function(n) {
           alert(n);
    
            location.reload();
        }).fail(function(n, t, i) {
           // $("#sel-cliente").html("The following error occured: " + t + " " + i)
        })
          
    
            //location.reload();
        }).fail(function(n, t, i) {
           // $("#sel-cliente").html("The following error occured: " + t + " " + i)
        })
        
        });

        setInterval(function() {
        $(".sel-servicios").each(function(){

            var valor = $(this).val();
            if(valor == 0){
                $(this).parent().next().children("center").children().css("display","none");
            }else{
            $(this).parent().next().children("center").children().css("display","block");
            }
        });

        


        }, 600);

        var estado = 0;
        $(".asesor").each(function(){
         
     estado = $(this).text();
  
      if(estado == "0"){
  
         $(this).text("Por asignar");
      }else{
         var asesor = $(this).text();
         $(this).next().children().attr("disabled","disabled");
         $(this).next().children().addClass("btn-warning");
         $(this).next().children().text("Ya esta Asignado");
         $(this).next().next().children(".sel-servicios").replaceWith("<label>"+asesor+"</label>");
        
      }
    })
               
            }).fail(function(n, t, i) {
               
            })
           
        });


        


	}).fail(function(n, t, i) {
		$("#moderaciones").html("The following error occured: " + t + " " + i)
	})

 
    
    

});