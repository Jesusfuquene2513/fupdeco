$(document).ready(function(){
var usuario = $(".admin-name").text();


	 $.ajax({
      type: "POST",
      url: "../Contador/listar_reservas",
      data: {
        asesor: usuario
      }
    }).done(function(n) {
      $("#sel-servicios").html(n);

     
	

     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })

});