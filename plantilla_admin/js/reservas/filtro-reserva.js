$(document).ready(function(){
    var tipo_filtro = 1;


    var busqueda_arg = "";
    $.ajax({
        type: "POST",
        url: "../Contador/buscador_reservas",
        data: {
          filtro: tipo_filtro,
          busqueda: busqueda_arg 

        }
    }).done(function(n) {
        $("#tabla-reservas").html(n);
        var codigo_reserva = 0;
        var id = 0;

        var identificacion = 0;


        var estado = 0;
            $(".estado").each(function(){
             
         estado = $(this).text();
      
          if(estado == "0"){
      
              $(this).text("Pendiente Por pago");
              $(this).next().children().text("Procesar");
              $(this).next().children().css("background","#35cd3a");

          
          }else{
              $(this).text("Pago Realizado");
              $(this).next().children().attr("disabled","disabled");
            
             
             
            
          }
        })
        $(".btn-liberar").click(function(){
          
            codigo_reserva = $(this).attr("title");
            id = $(this).attr("rel");
           identificacion = $(this).attr("id");
    
          var  clave=prompt('Ingrese clave de Tesoreria');
    
    
          $.ajax({
            type: "POST",
            url: "../Contador/consultar_clave_tesoreria",
            data: {
                password:clave
    
            }
        }).done(function(n) {
            $(".confirmacion-clave").html(n)
    
            setTimeout(() => {
                var confirmacion_estado = $(".confirmacion-clave").text();
    
                if(confirmacion_estado == 1){
        
                    
                    alertify.confirm('Confirmación', '¿Deseas realizar esta operación?', function(){ alertify.success('Operación Completada');
                
                   
                        
                        
                        $.ajax({
                            type: "POST",
                            url: "../Contador/liberar_reservacion",
                            data: {
                                codigo: codigo_reserva,
                                reserva_id: id,
                                cc:identificacion
                    
                            }
                        }).done(function(n) {
                            $(".confirmacion-clave").html(n)
                    
                            //location.reload();
                        }).fail(function(n, t, i) {
                           // $("#sel-cliente").html("The following error occured: " + t + " " + i)
                        })
                    
                   
                
                }
                    , function(){ alertify.error('Operación cancelada')});
    
    
    
                }else{
                alert("Error de clave");
        
                alert("Salir del sistema");
                }  
            }, 1000);
    
            
    
            //location.reload();
        }).fail(function(n, t, i) {
            //$("#sel-cliente").html("The following error occured: " + t + " " + i)
        })
         
    
    
        
    
    
    
    
        });

    }).fail(function(n, t, i) {
		//$("#sel-cliente").html("The following error occured: " + t + " " + i)
	})



    


    


    $("#filtro").change(function(){
    tipo_filtro = $(this).val();

    if(tipo_filtro == 3){

        $("#busqueda").attr("type","text");
        $("#busqueda").val("");

    } else{
        $("#busqueda").attr("type","number");
        $("#busqueda").val("");
    }
   
    });

    $("#busqueda").keyup(function(){
       if(tipo_filtro == 1 || tipo_filtro == 2  || tipo_filtro == 3  ){
        var busqueda_arg = $(this).val();
        $.ajax({
            type: "POST",
            url: "../Contador/buscador_reservas",
            data: {
              filtro: tipo_filtro,
              busqueda: busqueda_arg 
    
            }
        }).done(function(n) {
            $("#tabla-reservas").html(n);

            

            if(tipo_filtro == 1){

                $(".id:contains('"+busqueda_arg+"')").css({"font-weight": 'bold', "background": 'white' , "color": 'black'});

                var conteo = $(".id").length;
             if(conteo > 0){

                $(".alerta-reservas").text("Hay "+conteo+" Resultados de busqueda ");
            }else{
                $(".alerta-reservas").text("No hay resultados");
            }
            var estado = 0;
            $(".estado").each(function(){
             
         estado = $(this).text();
      
          if(estado == "0"){
      
              $(this).text("Pendiente Por pago");
              $(this).next().children().text("Procesar");
              $(this).next().children().css("background","#35cd3a");

          
          }else{
              $(this).text("Pago Realizado");
              $(this).next().children().attr("disabled","disabled");
            
             
             
            
          }
        })
            }

            if(tipo_filtro == 2){

                $(".cod:contains('"+busqueda_arg+"')").css({"font-weight": 'bold', "background": 'white' , "color": 'black'});
                var conteo = $(".cod").length;
             if(conteo > 0){

                $(".alerta-reservas").text("Hay "+conteo+" Resultados de busqueda ");
            }else{
                $(".alerta-reservas").text("No hay resultados");
            }
            var estado = 0;
            $(".estado").each(function(){
             
         estado = $(this).text();
      
          if(estado == "0"){
      
              $(this).text("Pendiente Por pago");
              $(this).next().children().text("Procesar");
              $(this).next().children().css("background","#35cd3a");

          
          }else{
              $(this).text("Pago Realizado");
              $(this).next().children().attr("disabled","disabled");
            
             
             
            
          }
        })
            }

            if(tipo_filtro == 3){
                $(".cliente3:contains('"+busqueda_arg+"')").css({"font-weight": 'bold', "background": 'white' , "color": 'black'});
              
               
                var conteo = $(".cliente3").length;
             if(conteo > 0){

                $(".alerta-reservas").text("Hay "+conteo+" Resultados de busqueda ");
            }else{
                $(".alerta-reservas").text("No hay resultados");
            }
            var estado = 0;
            $(".estado").each(function(){
             
         estado = $(this).text();
      
          if(estado == "0"){
      
              $(this).text("Pendiente Por pago");
              $(this).next().children().text("Procesar");
              $(this).next().children().css("background","#35cd3a");

          
          }else{
              $(this).text("Pago Realizado");
              $(this).next().children().attr("disabled","disabled");
            
             
             
            
          }
        })
              
            }

           
            var estado = 0;
            $(".estado").each(function(){
             
         estado = $(this).text();
      
          if(estado == "0"){
      
              $(this).text("Pendiente Por pago");
          }else{
              $(this).text("Pago Realizado");
              $(this).next().children(".custom-input-file").children("input").attr("disabled","disabled");
              $(this).next().children(".custom-input-file").text("No hacer Nada");
              $(this).next().children(".custom-input-file").css("background","gray");
             
            
          }
        })


        var codigo_reserva = 0;
    var id = 0;
    $(".btn-liberar").click(function(){
        var identificacion = $(this).attr("id");
        codigo_reserva = $(this).attr("title");
        id = $(this).attr("rel");

      var  clave=prompt('Ingrese clave de Tesoreria');


      $.ajax({
		type: "POST",
		url: "../Contador/consultar_clave_tesoreria",
		data: {
			password:clave

		}
	}).done(function(n) {
		$(".confirmacion-clave").html(n)

        setTimeout(() => {
            var confirmacion_estado = $(".confirmacion-clave").text();

            if(confirmacion_estado == 1){
    
                
                alertify.confirm('Confirmación', '¿Deseas realizar esta operación?', function(){ alertify.success('Operación Completada');
            
               
                    var user = $(".admin-name").text();
                    
                    $.ajax({
                        type: "POST",
                        url: "../Contador/liberar_reservacion",
                        data: {
                            codigo: codigo_reserva,
                            reserva_id: id,
                            cc:identificacion
                
                        }
                    }).done(function(n) {
                        $(".confirmacion-clave").html(n)
                
                        //location.reload();
                    }).fail(function(n, t, i) {
                       // $("#sel-cliente").html("The following error occured: " + t + " " + i)
                    })
                
               
            
            }
                , function(){ alertify.error('Operación cancelada')});



            }else{
            alert("Error de clave");
    
            alert("Salir del sistema");
            }  
        }, 1000);

        

		//location.reload();
	}).fail(function(n, t, i) {
		//$("#sel-cliente").html("The following error occured: " + t + " " + i)
	})
     


    




    });

    
         
        }).fail(function(n, t, i) {
        
        })
    }

   
    });


    $("#calendario").click(function(){

       window.location.href = '../Contador/cerrar_sesion';
    });

});