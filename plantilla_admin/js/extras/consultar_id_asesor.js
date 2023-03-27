$(document).ready(function(){

    var user = $(".admin-name").text();

 

    $.ajax({
        type: "POST",
        url: "../Asesor/listar_id_asesor",
        data: {
          asesor: user
        }
      }).done(function(n) {
        $(".id").html(n);

        var usuario = $(".id").text();
    
     
        
             $.ajax({
              type: "POST",
              url: "../Asesor/listar_servicios_asesor",
              data: {
                asesor: usuario
              }
            }).done(function(n) {
              $("#sel-servicios").html(n);
        
             
            
        
             
        
         
              
              
            }).fail(function(n, t, i) {
              //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)
        
              
        
        
        
            })
  
       
      
  
       
  
   
        
        
      }).fail(function(n, t, i) {
        //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)
  
        
  
  
  
      })
});