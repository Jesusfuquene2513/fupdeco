$(document).ready(function(){

	 $.ajax({
      type: "POST",
      url: "Servicios/cargar_servicios_cliente",
      data: {
        
      }
    }).done(function(n) {
      $("#servicios-dinamicos").html(n);

     

	

     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })

});