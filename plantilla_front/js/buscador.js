$(document).ready(function(){

	$("#i").keyup(function(){

		$(".spinner2").css("display","block");
		setTimeout(function(){ 
$(".spinner2").css("display","none");
		 }, 1000);

		if($(this).val().length >0){

			var bus = $(this).val();

 $.ajax({
      type: "POST",
      url: "Servicios/buscador",
      data: {busqueda: bus
        
      }
    }).done(function(n) {

      
      $("#servicios-dinamicos").html(n);

     

     

 
      
      
    }).fail(function(n, t, i) {
      //$("#carrusel-dinamico").html("The following error occured: " + t + " " + i)

      



    })



		} else{
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
		}

	});

});