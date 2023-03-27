$(document).ready(function(){


    var servicio_original = $("body").attr("id");

    $.ajax({
        type: "POST",
        url: "Pagos/actualizar_enlace_pago",
        data: {servicio_arg:servicio_original
          
        }
      }).done(function(n) {
  
        
        $("#payu-btn").html(n);

        $("#payu-btn").children("center").children("a").each(function(){

          $(this).addClass("payu");

        });

        
  
       
  
       
  
   
        
        
      }).fail(function(n, t, i) {
        //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)
  
        
  
  
  
      })


    $("#sel-servicios").change(function(){

        var servicio = $(this).val();

        $.ajax({
            type: "POST",
            url: "Pagos/actualizar_enlace_pago",
            data: {servicio_arg:servicio
              
            }
          }).done(function(n) {
      
            
            $("#payu-btn").html(n);

            
      
           
      
           
      
       
            
            
          }).fail(function(n, t, i) {
            //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)
      
            
      
      
      
          })


    });

});